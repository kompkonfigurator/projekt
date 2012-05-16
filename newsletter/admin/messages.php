
<script language="Javascript" src="js/jslib.js" type="text/javascript"></script>
<hr>

<?php

require_once dirname(__FILE__).'/accesscheck.php';

$access = accessLevel('messages');
#print "Access: $access";
switch ($access) {
  case 'owner':
    $ownerselect_where = ' where owner = ' . $_SESSION["logindetails"]["id"];
    $owner_select_and = ' and owner = ' . $_SESSION["logindetails"]["id"];
    break;
  case 'all':
    $ownerselect_where = '';
    $owner_select_and = '';
    break;
  case 'none':
  default:
    $ownerselect_where = ' where id = 0';
    $owner_select_and = ' and owner = 0';
    break;
}

if (isset($_GET['start'])) {
  $start = sprintf('%d',$_GET['start']);
} else {
  unset($start);
}

# remember last one listed
if (!isset($_GET["type"]) && !empty($_SESSION["lastmessagetype"])) {
  $_GET["type"] = $_SESSION["lastmessagetype"];
} elseif (isset($_GET["type"])) {
  $_SESSION["lastmessagetype"] = $_GET["type"];
}

#print '<p>'.PageLink2("messages&type=sent","Sent Messages").'&nbsp;&nbsp;&nbsp;';
#print PageLink2("messages&type=draft","Draft Messages").'&nbsp;&nbsp;&nbsp;';
#print PageLink2("messages&type=queue","Queued Messages").'&nbsp;&nbsp;&nbsp;';
#print PageLink2("messages&type=stat","Static Messages").'&nbsp;&nbsp;&nbsp;';
#if (ENABLE_RSS) {
#  print PageLink2("messages&type=rss","RSS Messages").'&nbsp;&nbsp;&nbsp;';
#}
#print '</p>';

### Print tabs
$tabs = new WebblerTabs();
$tabs->addTab($GLOBALS['I18N']->get("sent"),PageUrl2("messages&type=sent"));
$tabs->addTab($GLOBALS['I18N']->get("draft"),PageUrl2("messages&type=draft"));
$tabs->addTab($GLOBALS['I18N']->get("queued"),PageUrl2("messages&type=queued"));#
if (USE_PREPARE) {
  $tabs->addTab($GLOBALS['I18N']->get("static"),PageUrl2("messages&type=static"));
}
#if (ENABLE_RSS) {
#  $tabs->addTab("rss",PageUrl2("messages&type=rss"));
#}
if (!empty($_GET['type'])) {
  $tabs->setCurrent($_GET["type"]);
} else {
  $_GET['type'] = 'sent';
  $tabs->setCurrent('sent');
}

print $tabs->display();

### Process 'Action' requests
if (!empty($_GET["delete"])) {
  $todelete = array();
  if ($_GET["delete"] == "draft") {
    $req = Sql_Query(sprintf('select id from %s where status = "draft" and (subject = "" or subject = "(no subject)") %s',$tables["message"],$ownerselect_and));
    while ($row = Sql_Fetch_Row($req)) {
      array_push($todelete,$row[0]);
    }
  } else {
    array_push($todelete,sprintf('%d',$_GET["delete"]));
  }
  foreach ($todelete as $delete) {
    # delete the index in delete
    $result = Sql_query("select id from ".$tables["message"]." where id = $delete $ownerselect_and");
    while ($row = Sql_Fetch_Row($result)) {
      print $GLOBALS['I18N']->get("Deleting")." $row[0] ...";
      $result = Sql_query("delete from ".$tables["message"]." where id = $row[0]");
      $suc6 = Sql_Affected_Rows();
      $result = Sql_query("delete from ".$tables["usermessage"]." where messageid = $row[0]");
      $result = Sql_query("delete from ".$tables["listmessage"]." where messageid = $row[0]");
      if ($suc6)
        print "... ".$GLOBALS['I18N']->get("Done");
      else
        print "... ".$GLOBALS['I18N']->get("failed");
      print '<br/>';
    }
  }
  print "<hr /><br />\n";
}

if (isset($_GET['resend'])) {
  $resend = sprintf('%d',$_GET['resend']);
  # requeue the message in $resend
  print $GLOBALS['I18N']->get("Requeuing")." $resend ..";
  $result = Sql_query("update ".$tables["message"]." set status = \"submitted\",sendstart = now() where id = $resend $ownerselect_and");
  $suc6 = Sql_Affected_Rows();
  # only send it again to users, if we are testing, otherwise only to new users
  if (TEST)
    $result = Sql_query("delete from ".$tables["usermessage"]." where messageid = $resend $ownerselect_and");
  if ($suc6)
    print "... ".$GLOBALS['I18N']->get("Done");
  else
    print "... ".$GLOBALS['I18N']->get("failed");
  print"<br /><hr /><br /><p>\n";
}

if (isset($_GET['suspend'])) {
  $suspend = sprintf('%d',$_GET['suspend']);
  print $GLOBALS['I18N']->get('Suspending')." $suspend ..";
  $result = Sql_query(sprintf('update %s set status = "suspended" where id = %d and (status = "inprocess" or status = "submitted") %s',$tables["message"],$suspend,$ownerselect_and));
  $suc6 = Sql_Affected_Rows();
  if ($suc6)
    print "... ".$GLOBALS['I18N']->get("Done");
  else
    print "... ".$GLOBALS['I18N']->get("failed");
  print"<br /><hr /><br /><p>\n";
}

$subselect = '';
### Switch tab
switch ($_GET["type"]) {
  case "queued":
#    $subselect = ' status in ("submitted") and (rsstemplate is NULL or rsstemplate = "") ';
    $subselect = ' status in ("submitted","suspended") ';
    $url_keep = '&type=queued';
    break;
  case "static":
    $subselect = ' status in ("prepared") ';
    $url_keep = '&type=static';
    break;
#  case "rss":
#    $subselect = ' rsstemplate != ""';
#    $url_keep = '&type=sent';
#    break;
  case "draft":
    $subselect = ' status in ("draft") ';
    $url_keep = '&type=draft';
    break;
  case "sent":
  default:
    $subselect = ' status in ("sent","inprocess") ';
    $url_keep = '&type=sent';
    break;
}

### Query messages from db
if(empty($ownerselect_where)){
  $subselect = ' where '.$subselect;
} else {
  $subselect =  $ownerselect_where. ' and '.$subselect;
}
$req = Sql_query("SELECT count(*) FROM " . $tables["message"].' '. $subselect);

$total_req = Sql_Fetch_Row($req);
$total = $total_req[0];
$end = isset($start) ? $start + MAX_MSG_PP : MAX_MSG_PP;
if ($end > $total) $end = $total;

## Browse buttons table
if (isset($start) && $start > 0) {
  $listing = $GLOBALS['I18N']->get("Listing message")." $start ".$GLOBALS['I18N']->get("to")." " . $end;
  $limit = "limit $start,".MAX_MSG_PP;
} else {
  $listing =  $GLOBALS['I18N']->get("Listing message 1 to")." ".$end;
  $limit = "limit 0,".MAX_MSG_PP;
  $start = 0;
}
  print $total. " ".$GLOBALS['I18N']->get("Messages")."</p>";
if ($total)
  printf ('<table border=1><tr><td colspan=4 align=center>%s</td></tr><tr><td>%s</td><td>%s</td><td>
          %s</td><td>%s</td></tr></table><p><hr>',
          $listing,
          PageLink2("messages$url_keep","&lt;&lt;","start=0"),
          PageLink2("messages$url_keep","&lt;",sprintf('start=%d',max(0,$start-MAX_MSG_PP))),
          PageLink2("messages$url_keep","&gt;",sprintf('start=%d',min($total,$start+MAX_MSG_PP))),
          PageLink2("messages$url_keep","&gt;&gt;",sprintf('start=%d',$total-MAX_MSG_PP)));
if ($_GET["type"] == "draft") {
  print '<p>'.PageLink2("messages&delete=draft",$GLOBALS['I18N']->get("Delete all draft messages without subject")).'</p>';
}

?>

<table border=1>
<tr>
<?php

## messages table
if ($total) {
  print "<td>".$GLOBALS['I18N']->get("Message info")."</td><td>".$GLOBALS['I18N']->get("Status")."</td><td>".$GLOBALS['I18N']->get("Action")."</td></tr>";
  $result = Sql_query("SELECT * FROM ".$tables["message"]." $subselect order by status,entered desc $limit");
  while ($msg = Sql_fetch_array($result)) {
    $uniqueviews = Sql_Fetch_Row_Query("select count(userid) from {$tables["usermessage"]} where viewed is not null and messageid = ".$msg["id"]);
    $clicks = Sql_Fetch_Row_Query("select sum(clicked) from {$tables["linktrack"]} where messageid = ".$msg["id"]);
    $messagedata = loadMessageData($msg['id']);
    printf ('<tr><td valign="top"><table>
      <tr><td valign="top">'.$GLOBALS['I18N']->get("From:").'</td><td valign="top">%s</td></tr>
      <tr><td valign="top">'.$GLOBALS['I18N']->get("Subject:").'</td><td valign="top">%s</td></tr>
      <tr><td valign="top">'.$GLOBALS['I18N']->get("Entered:").'</td><td valign="top">%s</td></tr>
      <tr><td valign="top">'.$GLOBALS['I18N']->get("Embargo:").'</td><td valign="top">%s</td></tr>
      </table>
      </td>',
      stripslashes($msg["fromfield"]),
      stripslashes($msg["subject"]),
      $msg["entered"],
      $msg["embargo"]
    );

    if ($clicks[0]) {
      $clicked = sprintf('<tr><td></td>
        <td align="right" colspan=2>
        <b>'.$GLOBALS['I18N']->get('Clicks').'</b></td>
        <td align="center"><b>%d</b></td></tr>
        ',$clicks[0]);
    } else {
      $clicked = '';
    }
    
    ## Rightmost two columns per message
    if ($msg['status'] == 'sent') {
      $status = $GLOBALS['I18N']->get("Sent").": ".$msg['sent'].'<br/>'.$GLOBALS['I18N']->get("Time to send").': '.timeDiff($msg["sendstart"],$msg["sent"]);
      
      if ($msg['viewed']) {
        $viewed = sprintf('<tr><td></td>
          <td align="right" colspan=2>
          <b>'.$GLOBALS['I18N']->get("Viewed").'</b></td>
          <td align="center"><b>%d</b></td></tr>
          <tr><td></td><td align="right" colspan=2>
          <b>'.$GLOBALS['I18N']->get("Unique Views").'</b></td>
          <td align="center"><b>%d</b></td></tr>
          ',$msg["viewed"],$uniqueviews[0]);
      } else {
        $viewed = '';
      }

      $sendstats =
        sprintf('<br /><table border=1>
        <tr>
          <td>'.$GLOBALS['I18N']->get("total").'</td>
          <td>'.$GLOBALS['I18N']->get("text").'</td>
          <td>'.$GLOBALS['I18N']->get("html").'</td>
          <td>'.$GLOBALS['I18N']->get("PDF").'</td>
          <td>'.$GLOBALS['I18N']->get("both").'</td>
        </tr>
        <tr>
          <td align="center"><b>%d</b></td>
          <td align="center"><b>%d</b></td>
          <td align="center"><b>%d</b></td>
          <td align="center"><b>%d</b></td>
          <td align="center"><b>%d</b></td>
        </tr>
        %s
        %s
        %s
        </table>',
      #  $msg["processed"],
        $msg['astext'] + $msg['ashtml'] + $msg['astextandhtml'] + $msg['aspdf'] + $msg['astextandpdf'],
        $msg["astext"],
        $msg["ashtml"] + $msg["astextandhtml"], //bug 0009687
        $msg["aspdf"],
        $msg["astextandpdf"],
        $viewed,
        $clicked,
        $msg["bouncecount"] ? sprintf('<tr><td></td><td align="right" colspan=2><b>'.$GLOBALS['I18N']->get("Bounced").'</b></td><td align="center"><b>%d</b></td></tr>
        ',$msg["bouncecount"]):""
        );
    } else { ##Status <> sent
      $status = $msg['status'].'<br/>'.$msg['rsstemplate'];
      if ($msg['status'] == 'inprocess') {
        $status .= '<br/>'.
        '<meta http-equiv="Refresh" content="300">'.
        $messagedata['to process'].' '.$GLOBALS['I18N']->get('still to process').'<br/>'.
        $GLOBALS['I18N']->get('ETA').': '.$messagedata['ETA'].'<br/>'.
        $GLOBALS['I18N']->get('Processing').' '.sprintf('%d',$messagedata['msg/hr']).' '.$GLOBALS['I18N']->get('msgs/hr')
        ;
      }
      $sendstats = '';
    }
    if ($msg['status'] == 'inprocess' || $msg['status'] == 'submitted') {
      $status .= '<br/>'.
        PageLink2('messages&suspend='.$msg['id'],$GLOBALS['I18N']->get('Suspend Sending'));
    }

    $totalsent = $msg['astext'] + $msg['ashtml'] + $msg['astextandhtml'] + $msg['aspdf'] + $msg['astextandpdf'];

    printf('
      <td>
      %s<br />
      </td><td>
      %s<br />
      %s<br />
      %s<br />
      %s
      <a href="javascript:deleteRec(\'%s\');">'.$GLOBALS['I18N']->get("delete").'</a>
      </td>
      </tr>',
      $status.
      $sendstats,
      PageLink2("message",$GLOBALS['I18N']->get("View"),"id=".$msg["id"]),
      $msg['status'] != 'inprocess' ? PageLink2("messages",$GLOBALS['I18N']->get("Requeue"),"resend=".$msg["id"]) : $totalsent." ".$GLOBALS['I18N']->get("sent"),
      $msg["status"] != 'prepared' ? PageLink2("send",$GLOBALS['I18N']->get("Edit"),"id=".$msg["id"]) : PageLink2("preparesend",$GLOBALS['I18N']->get("Edit"),"id=".$msg["id"]),
      $clicks[0] && CLICKTRACK ? PageLink2("mclicks",$GLOBALS['I18N']->get("click stats"),"id=".$msg["id"]).'<br/>':'',
      PageURL2("messages$url_keep","","delete=".$msg["id"])
    );
  }
}

?>

</table>


