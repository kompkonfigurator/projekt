<?php
require_once dirname(__FILE__).'/accesscheck.php';

$access = accessLevel("send");
switch ($access) {
  case "owner":
    $subselect = " where owner = ".$_SESSION["logindetails"]["id"];
    $ownership = ' and owner = '.$_SESSION["logindetails"]["id"];
    break;
  case "all":
    $subselect = "";
    $ownership = '';
    break;
  case "none":
  default:
    $subselect = " where id = 0";
    $ownership = " and id = 0";
    break;
}

# handle commandline
if ($GLOBALS["commandline"]) {
#  error_reporting(63);
  $cline = parseCline();
  reset($cline);
  if (!$cline || !is_array($cline) || !$cline["s"] || !$cline["l"]) {
    clineUsage("-s subject -l list [-f from] < message");
    exit;
  }

  $listnames = explode(" ",$cline["l"]);
  $listids = array();
  foreach ($listnames as $listname) {
    if (!is_numeric($listname)) {
      $listid = Sql_Fetch_Array_Query(sprintf('select * from %s where name = "%s"',
        $tables["list"],$listname));
      if ($listid["id"]) {
        $listids[$listid["id"]] = $listname;
      }
     } else {
      $listid = Sql_Fetch_Array_Query(sprintf('select * from %s where id = %d',
        $tables["list"],$listname));
      if ($listid["id"]) {
        $listids[$listid["id"]] = $listid["name"];
      }
    }
  }

  $_POST["targetlist"] = array();
  foreach ($listids as $key => $val) {
    $_POST["targetlist"][$key] = "signup";
    $lists .= '"'.$val.'"' . " ";
  }

  if ($cline["f"]) {
    $_POST["from"] = $cline["f"];
  } else {
    $_POST["from"] = getConfig("message_from_name") . ' '.getConfig("message_from_address");
  }
  $_POST["subject"] = $cline["s"];
  $_POST["send"] = "1";
  $_POST["footer"] = getConfig("messagefooter");
  while (!feof (STDIN)) {
    $_POST["message"] .= fgets(STDIN, 4096);
  }

#  print clineSignature();
#  print "Sending message with subject ".$_POST["subject"]. " to ". $lists."\n";
}
ob_start();
include "send_core.php";

if ($done) {
  if ($GLOBALS["commandline"]) {
    ob_end_clean();
    print clineSignature();
    print "Message with subject ".$_POST["subject"]. " was sent to ". $lists."\n";
    exit;
  }
  return;
}

/*if (!$_GET["id"]) {
  Sql_Query(sprintf('insert into %s (subject,status,entered)
    values("(no subject)","draft",now())',$GLOBALS["tables"]["message"]));
  $id = Sql_Insert_id();
  Redirect("send&id=$id");
}
*/
$list_content = '
<p>'.$GLOBALS['I18N']->get('selectlists').':</p>
<ul>
<li><input type=checkbox name="targetlist[all]"
';
  if (isset($_POST["targetlist"]["all"]) && $_POST["targetlist"]["all"])
    $list_content .= "checked";
$list_content .= '>'.$GLOBALS['I18N']->get('alllists').'</li>';

$list_content .= '<li><input type=checkbox name="targetlist[allactive]"
';
  if (isset($_POST["targetlist"]["allactive"]) && $_POST["targetlist"]["allactive"])
    $list_content .= "checked";
$list_content .= '>'.$GLOBALS['I18N']->get('All Active Lists').'</li>';

$result = Sql_query("SELECT * FROM $tables[list] $subselect");
while ($row = Sql_fetch_array($result)) {
  # check whether this message has been marked to send to a list (when editing)
  $checked = 0;
  if ($_GET["id"]) {
    $sendtolist = Sql_Query(sprintf('select * from %s where
      messageid = %d and listid = %d',$tables["listmessage"],$_GET["id"],$row["id"]));
    $checked = Sql_Affected_Rows();
  }
  $list_content .= sprintf('<li><input type=checkbox name="targetlist[%d]" value="%d" ',$row["id"],$row["id"]);
  if ($checked || (isset($_POST["targetlist"][$row["id"]]) && $_POST["targetlist"][$row["id"]]))
    $list_content .= "checked";
  $list_content .= ">".stripslashes($row["name"]);
  if ($row["active"])
    $list_content .= ' (<font color=red>'.$GLOBALS['I18N']->get('listactive').'</font>)';
  else
    $list_content .= ' (<font color=red>'.$GLOBALS['I18N']->get('listnotactive').'</font>)';

  $desc = nl2br(stripslashes($row["description"]));

  $list_content .= "<br>$desc</li>";
  $some = 1;
}
$list_content .= '</ul>';

if (USE_LIST_EXCLUDE) {
  $list_content .= '
    <hr/><h1>'.$GLOBALS['I18N']->get('selectexcludelist').'</h1><p>'.$GLOBALS['I18N']->get('excludelistexplain').'</p>
    <ul>';

  $dbdata = Sql_Fetch_Row_Query(sprintf('select data from %s where name = "excludelist" and id = %d',
    $GLOBALS["tables"]["messagedata"],$_GET["id"]));
  $excluded_lists = explode(",",$dbdata[0]);

  $result = Sql_query(sprintf('SELECT * FROM %s %s',$GLOBALS["tables"]["list"],$subselect));
  while ($row = Sql_fetch_array($result)) {
    $checked = in_array($row["id"],$excluded_lists);
    $list_content .= sprintf('<li><input type=checkbox name="excludelist[%d]" value="%d" ',$row["id"],$row["id"]);
    if ($checked || isset($_POST["excludelist"][$row["id"]]))
      $list_content .= "checked";
    $list_content .= ">".stripslashes($row["name"]);
    if ($row["active"])
      $list_content .= ' (<font color=red>'.$GLOBALS['I18N']->get('listactive').'</font>)';
    else
      $list_content .= ' (<font color=red>'.$GLOBALS['I18N']->get('listnotactive').'</font>)';

    $desc = nl2br(stripslashes($row["description"]));

    $list_content .= "<br>$desc</li>";
  }
  $list_content .= '</ul>';
}

if (!$some)
  $list_content = $GLOBALS['I18N']->get('nolistsavailable');

$list_content .= '


<p><input type=submit name=send value="'.$GLOBALS['I18N']->get('sendmessage').'">
</form>

';

if (isset($show_lists) && $show_lists) {
  print $list_content;
} else {
  print '</form>';
}