
<script language="Javascript" src="js/jslib.js" type="text/javascript"></script>

<?php
require_once dirname(__FILE__).'/accesscheck.php';

if (isset($_GET['id'])) {
  $id = sprintf('%d',$_GET["id"]);
} else {
  $id = 0;
}
if (isset($_GET['delete'])) {
  $delete = sprintf('%d',$_GET["delete"]);
} else {
  $delete = 0;
}
$useremail = isset($_GET["useremail"]) && is_email($_GET["useremail"])? $_GET["useremail"] : ''; ## @TODO sanitize
$deletebounce = isset($_GET["deletebounce"]); #BUGFIX #15286 - nickyoung
$amount = isset($_GET["amount"]) ? sprintf('%d',$_GET["amount"]) : ''; #BUGFIX #15286 - CS2 
$unconfirm = isset($_GET["unconfirm"]); #BUGFIX #15286 - CS2 
$maketext = isset($_GET["maketext"]); #BUGFIX #15286 - CS2 
$deleteuser = isset($_GET["deleteuser"]);  #BUGFIX #15286 - CS2 
if (!$id && !$delete) {
  Fatal_Error($GLOBALS['I18N']->get('NoRecord'));
  exit;
}

if ($GLOBALS["require_login"] && !isSuperUser()) {
  $access = accessLevel("bounce");
  switch ($access) {
    case "all":
      $subselect = "";break;
    case "none":
    default:
      $subselect = " and ".$tables["list"].".id = 0";break;
  }
}
if (isset($start))
  echo "<br />".PageLink2("bounces",$GLOBALS['I18N']->get('BackToBList'),"start=$start")."\n";


if (isset($_GET["doit"]) && (($GLOBALS["require_login"] && isSuperUser()) || !$GLOBALS["require_login"])) {
  if ($useremail) {
    $req = Sql_Fetch_Row_Query(sprintf('select id from %s where email = "%s"',
      $tables["user"],sql_escape($useremail)));
     $userid = $req[0];
    if (!$userid) {
      print "$useremail => ".$GLOBALS['I18N']->get('NotFound')."\n";
    }
  }
  if (isset($userid) && $amount) {
    Sql_Query(sprintf('update %s set bouncecount = bouncecount + %d where id = %d',
      $tables["user"],$amount,$userid));
     if (Sql_Affected_Rows()) {
      print sprintf($GLOBALS['I18N']->get('AddedToB'),$amount,$userid)."\n";
    } else {
      print sprintf($GLOBALS['I18N']->get('AddedToB'),$amount,$userid)."\n";
    }
  }

  if ($userid && $unconfirm) {
    Sql_Query(sprintf('update %s set confirmed = 0 where id = %d',
      $tables["user"],$userid));
     print sprintf($GLOBALS['I18N']->get('MadeUnconfirmed'), $userid);
  }

  if ($userid && $maketext) {
    Sql_Query(sprintf('update %s set htmlemail = 0 where id = %d',
      $tables["user"],$userid));
     print sprintf($GLOBALS['I18N']->get('MadeUserRText'), $userid);
  }

  if ($userid && $deleteuser) {
    deleteUser($userid);
    print sprintf($GLOBALS['I18N']->get('DelUser').'\n', $userid);
  }

  if ($deletebounce) {
    print sprintf($GLOBALS['I18N']->get('DeletingB').'\n', $id);
    Sql_query("delete from {$tables["bounce"]} where id = $id");
    print $GLOBALS['I18N']->get('DoneAndLoading')."<br /><hr><br />\n";
    print PageLink2("bounces",$GLOBALS['I18N']->get('BackToBList'));
    $next = Sql_Fetch_Row_query(sprintf('select id from %s where id > %d',$tables["bounce"],$id));
    $id = $next[0];
    if (!$id) {
      $next = Sql_Fetch_Row_query(sprintf('select id from %s order by id desc limit 0,5',$tables["bounce"],$id));
      $id = $next[0];
    }
  }
}

$guessedemail = '';
if ($id) {
  $result = Sql_query("SELECT * FROM {$tables["bounce"]} where id = $id");
  if (!Sql_Affected_Rows())
    Fatal_Error($GLOBALS['I18N']->get('NoSRecord'));
  $bounce = sql_fetch_array($result);
 #printf( "<br /><li><a href=\"javascript:deleteRec('%s');\">Delete</a>\n",PageURL2("bounce","","delete=$id"));
  if (preg_match("#([\d]+) bouncecount increased#",$bounce["comment"],$regs)) {
    $guessedid = $regs[1];
    $emailreq = Sql_Fetch_Row_Query(sprintf('select email from %s where id = %d',
      $tables["user"],$guessedid));
    $guessedemail = $emailreq[0];
    if (isSuperUser()) {
      print PageLink2('user&id='.$guessedid,$GLOBALS['I18N']->get('Edit user'));
    }
  }
  
  $newruleform = '<form method=post action="./?page=bouncerules">';
  $newruleform .= '<table>';
  $newruleform .= sprintf('<tr><td>%s</td><td><input type=text name="newrule" size=30></td></tr>',$GLOBALS['I18N']->get('Regular Expression'));
  $newruleform .= sprintf('<tr><td>%s</td><td><select name="action">',$GLOBALS['I18N']->get('Action'));
  foreach ($GLOBALS['bounceruleactions'] as $action => $desc) {
    $newruleform .= sprintf('<option value="%s" %s>%s</option>',$action,'',$desc);
  }
  $newruleform .= '</select></td></tr>';
  $newruleform .= sprintf('<tr><td colspan=2>%s</td></tr><tr><td colspan=2><textarea name="comment" rows=10 cols=65></textarea></td></tr>',
    $GLOBALS['I18N']->get('Memo for this rule'));
  $newruleform .= '<tr><td colspan=2><input type=submit name="add" value="'.$GLOBALS['I18N']->get('Add new Rule').'"></td></tr>';
  $newruleform .= '</table></form>';

   print '<form method=get>';
  print '<input type=hidden name=page value="'.$page.'">';
  print '<input type=hidden name=id value="'.$id.'">';
  print '<table><tr><td>'.$GLOBALS['I18N']->get('PossibleActions').'</td></tr>';
  print '<tr><td>'.$GLOBALS['I18N']->get('ForUser').'</td><td><input type=text name="useremail" value="'.$guessedemail.'" size=35></td></tr>';
  print '<tr><td>'.$GLOBALS['I18N']->get('IncreaseB').'</td><td><input type=text name=amount value="1" size=5>'.$GLOBALS['I18N']->get('IncreaseBNote').'</td></tr>';
  print '<tr><td>'.$GLOBALS['I18N']->get('MarkAsUnconfirmed').' </td><td><input type=checkbox name=unconfirm value="1"> '.$GLOBALS['I18N']->get('MarkAsUnconfirmedNote').'</td></tr>';
  print '<tr><td>'.$GLOBALS['I18N']->get('SetReceiveText').' </td><td><input type=checkbox name=maketext value="1"></td></tr>';
  print '<tr><td>'.$GLOBALS['I18N']->get('DelUser1').' </td><td><input type=checkbox name=deleteuser value="1"></td></tr>';
  print '<tr><td>'.$GLOBALS['I18N']->get('DelAndGo').' </td><td><input type=checkbox name=deletebounce value="1" checked></td></tr>';
  print '<tr><td><input type=submit name="doit" value="'.$GLOBALS['I18N']->get('DoAbove').'"></td></tr>';
  print "</table></form>";
  if (USE_ADVANCED_BOUNCEHANDLING) {
    print '<p><a href="#newrule">'.$GLOBALS['I18N']->get('Create New Rule based on this bounce').'</a></p>';
  }
  
  print "<p>".$GLOBALS['I18N']->get('BounceDetails')."<table border=1>";
  printf ('
  <tr><td valign="top">'.$GLOBALS['I18N']->get('ID').'</td><td valign="top">%d</td></tr>
  <tr><td valign="top">'.$GLOBALS['I18N']->get('Date').'</td><td valign="top">%s</td></tr>
  <tr><td valign="top">'.$GLOBALS['I18N']->get('Status').'</td><td valign="top">%s</td></tr>
  <tr><td valign="top">'.$GLOBALS['I18N']->get('Comment').'</td><td valign="top">%s</td></tr>
  <tr><td valign="top">'.$GLOBALS['I18N']->get('Header').'</td><td valign="top">%s</td></tr>
  <tr><td valign="top">'.$GLOBALS['I18N']->get('Body').'</td><td valign="top">%s</td></tr>',$id,
  $bounce["date"],$bounce["status"],$bounce["comment"],
  nl2br(htmlspecialchars($bounce["header"])),nl2br(htmlspecialchars($bounce["data"])));
#   print '<tr><td colspan=2><input type=submit name=change value="Save Changes">';
  print '</table>';
  if (USE_ADVANCED_BOUNCEHANDLING) {
    print '<a name="newrule"></a>';
    print $newruleform;
  }
}
?>


