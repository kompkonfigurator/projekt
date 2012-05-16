<?php

require_once dirname(__FILE__).'/accesscheck.php';
print '<script language="javascript" type="text/javascript" src="js/jslib.js"></script>';

if (isset($_REQUEST['delete']) && $_REQUEST['delete']) {
  # delete the index in delete
  print $GLOBALS['I18N']->get('deleting').' '.$_REQUEST['delete']."..\n";
  if ($GLOBALS["require_login"] && !isSuperUser()) {
  } else {
    deleteBounce($_REQUEST['delete']);
  }
  print $GLOBALS['I18N']->get('done') . "<br /><hr><br />\n";
}

if (isset($_GET['action']) && $_GET['action']) {
  switch($_GET['action']) {
    case "deleteunidentified":
      Sql_Query(sprintf('delete from %s where status = "unidentified bounce" and `date` < date_sub(now(),interval 2 month)',$tables["bounce"]));
      break;
    case "deleteprocessed":
      Sql_Query(sprintf('delete from %s where comment != "not processed" and `date` < date_sub(now(),interval 2 month)',$tables["bounce"]));
      break;
    case "deleteall":
      Sql_Query(sprintf('delete from %s',$tables["bounce"]));
      break;
    case "reset":
      Sql_Query(sprintf('update %s set bouncecount = 0',$tables["user"]));
      Sql_Query(sprintf('update %s set bouncecount = 0',$tables["message"]));
      Sql_Query(sprintf('delete from %s',$tables["bounce"]));
      Sql_Query(sprintf('delete from %s',$tables["user_message_bounce"]));
   }
}

# view bounces
$count = Sql_Query(sprintf('select count(*) from %s',$tables["bounce"]));
$totalres = Sql_fetch_Row($count);
$total = $totalres[0];
$find_url = '';
if (isset($_GET['s'])) {
  $s = sprintf('%d',$_GET['s']);
} else {
  $s = 0;
}
$where = ' where status != "unidentified bounce" ';

print $total . ' '.$GLOBALS['I18N']->get('bounces') . " <br/>";
if ($total > MAX_USER_PP) {
  if (isset($s) && $s) {
    $listing = $GLOBALS['I18N']->get('listing') . " $s " . $GLOBALS['I18N']->get('to') . ($s + MAX_USER_PP);
    $limit = "limit $s,".MAX_USER_PP;
  } else {
    $listing = $GLOBALS['I18N']->get('listing') . " 1 " . $GLOBALS['I18N']->get('to') ." 50";
    $limit = "limit 0,50";
    $s = 0;
  }
  printf ('<table border=1><tr><td colspan=4 align=center>%s</td></tr><tr><td>%s</td><td>%s</td><td>
          %s</td><td>%s</td></tr></table><p><hr>',
          $listing,
          PageLink2("bounces","&lt;&lt;","s=0".$find_url),
          PageLink2("bounces","&lt;",sprintf('s=%d',max(0,$s-MAX_USER_PP)).$find_url),
          PageLink2("bounces","&gt;",sprintf('s=%d',min($total,$s+MAX_USER_PP)).$find_url),
          PageLink2("bounces","&gt;&gt;",sprintf('s=%d',$total-MAX_USER_PP).$find_url));
  $result = Sql_query(sprintf('select * from %s %s order by date desc %s',$tables["bounce"],$where,$limit));
} else {
  $result = Sql_Query(sprintf('select * from %s %s order by date desc',$tables["bounce"],$where));
}
#  $result = Sql_Verbose_Query(sprintf('select * from %s where status not like "bounced list message%%" order by date desc',$tables["bounce"]));
#  $result = Sql_Verbose_Query(sprintf('select * from %s where data like "%%systemmessage%%" order by date desc',$tables["bounce"]));

printf("[ 
   <a href=\"javascript:deleteRec2('" . $GLOBALS['I18N']->get('are you sure you want to delete all unidentified bounces older than 2 months') . "?','%s');\">" . $GLOBALS['I18N']->get('delete all unidentified (&gt; 2 months old)') . "</a> |
   <a href=\"javascript:deleteRec2('" . $GLOBALS['I18N']->get('are you sure you want to delete all bounces older than 2 months') . "?','%s');\">" . $GLOBALS['I18N']->get('delete all processed (&gt; 2 months old)') . "</a> |
   <a href=\"javascript:deleteRec2('" . $GLOBALS['I18N']->get('are you sure you want to delete all bounces,\\n even the ones that have not been processed') . "?','%s');\">" . $GLOBALS['I18N']->get('Delete all') . "</a> |
   <a href=\"javascript:deleteRec2('" . $GLOBALS['I18N']->get('are you sure you want to reset all counters') . "?','%s');\">" . $GLOBALS['I18N']->get('Reset bounces') . "</a> ] ",
   PageURL2("bounces",$GLOBALS['I18N']->get('delete'),"s=$s&action=deleteunidentified"),
   PageURL2("bounces",$GLOBALS['I18N']->get('delete'),"s=$s&action=deleteprocessed"),
   PageURL2("bounces",$GLOBALS['I18N']->get('delete'),"s=$s&action=deleteall"),
   PageURL2("bounces",$GLOBALS['I18N']->get('delete'),"s=$s&action=reset"));

if (!Sql_Affected_Rows())
  print "<p>" . $GLOBALS['I18N']->get('no unprocessed bounces available') . "</p>";

print "<table><tr><td></td><td>" . $GLOBALS['I18N']->get('message') . "</td><td>" . $GLOBALS['I18N']->get('user') . "</td><td>" . $GLOBALS['I18N']->get('date') . "</td></tr>";
while ($bounce = Sql_fetch_array($result)) {
#@@@ not sure about these ones - bounced list message
  if (preg_match("#bounced list message ([\d]+)#",$bounce["status"],$regs)) {
    $messageid = sprintf('<a href="./?page=message&id=%d">%d</a>',$regs[1],$regs[1]);
  } elseif ($bounce["status"] == "bounced system message") {
    $messageid = $GLOBALS['I18N']->get('System Message');
  } else {
    $messageid = $GLOBALS['I18N']->get('Unknown');
   }
  if (preg_match("#([\d]+) bouncecount increased#",$bounce["comment"],$regs)) {
    $userid = sprintf('<a href="./?page=user&id=%d">%d</a>',$regs[1],$regs[1]);
  } elseif (preg_match("#([\d]+) marked unconfirmed#",$bounce["comment"],$regs)) {
    $userid = sprintf('<a href="./?page=user&id=%d">%d</a>',$regs[1],$regs[1]);
  } else {
    $userid = $GLOBALS['I18N']->get('Unknown');
  }

  printf( "<tr><td>[ <a href=\"javascript:deleteRec('%s');\">%s</a> |
   %s ] </td><td>%s</td><td>%s</td><td>%s</td></tr>\n",
   PageURL2("bounces",$GLOBALS['I18N']->get('delete'),"s=$s&delete=".$bounce["id"]),
   $GLOBALS['I18N']->get('delete'),
   PageLink2("bounce",$GLOBALS['I18N']->get('show'),"s=$s&id=".$bounce["id"]),
   $messageid,
   $userid,
   $bounce["date"]
   );
}
print "</table>";
?>
