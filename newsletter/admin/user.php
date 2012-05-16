
<script language="Javascript" src="js/jslib.js" type="text/javascript"></script>

<?php
require_once dirname(__FILE__).'/accesscheck.php';
require_once dirname(__FILE__).'/date.php';

#if (!$_GET["id"] && !$_GET["delete"]) {
#  Fatal_Error("No such user");
#  return;
#}
$id = sprintf('%d',isset($_GET["id"]) ? $_GET['id']:0);
$delete = sprintf('%d',isset($_GET['delete']) ? $_GET["delete"]:0);
$start = sprintf('%d',isset($_GET['start']) ? $_GET["start"]:0);
$date = new Date();
if (isset($_GET['find'])) {
  $find = preg_replace('/\W/','',$_GET['find']);
} else {
  $find = '';
}
if (isset($_GET['findby'])) {
  $findby = preg_replace('/\W/','',$_GET['findby']);
} else {
  $findby = '';
}
$access = accessLevel("user");
switch ($access) {
  case "owner":
    $subselect = sprintf(' and %s.owner = %d',$tables["list"],$_SESSION["logindetails"]["id"]);
    $subselect_where = sprintf(' where %s.owner = %d',$tables["list"],$_SESSION["logindetails"]["id"]);break;

  case "all":
    $subselect = "";break;

  case "view":
    $subselect = "";
    if (sizeof($_POST)) {
      print Error("You only have privileges to view this page, not change any of the information");
      return;
    }
    break;

  case "none":
  default:
    $subselect = " and ".$tables["list"].".id = 0";
    $subselect_where = " where ".$tables["list"].".owner = 0";break;
}
if ($access == "all") {
  $delete_message = '<br />Delete will delete user from the list<br />';
} else {
  $delete_message = '<br />Delete will delete user and all listmemberships<br />';
}

function groupName($id) {
  if (!$id) return;
  $data = Sql_Fetch_Array_Query("select * from groups where id = $id");
  return $data["name"];
}

require dirname(__FILE__).'/structure.php';

$struct = $DBstruct["user"];


if (isset($_GET['list']))
  echo "<br />".PageLink2("members","Back to Members of this list","id=".sprintf('%d',$_GET['list']))."\n";
if (isset($start))
  echo "<br />".PageLink2("users","Back to the list of users","start=$start&unconfirmed=".isset($_GET["unconfirmed"])?'1':'0')."\n";
if ($find)
  echo "<br />".PageLink2("users","Back to the search results","start=$start&find=".urlencode($find)."&findby=".urlencode($findby)."&unconfirmed=".$_GET["unconfirmed"]."\n");
$more = '';

if (!empty($_REQUEST['returnpage'])) {
  $returnpage = preg_replace('/\W/','',$_REQUEST['returnpage']);
  if (isset($_REQUEST['returnoption'])) {
    $more = "&option=".preg_replace('/\W/','',$_GET['returnoption']);
   }
  echo "<br/>".PageLink2("$returnpage$more","Return to $returnpage");
  $returnurl = "returnpage=$returnpage&returnoption=$returnoption";
}
include dirname(__FILE__).'/commonlib/pages/user.php';
return;

?>


