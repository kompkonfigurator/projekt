<?php
ob_start();
$er = error_reporting(0); # some ppl have warnings on
require_once dirname(__FILE__) .'/admin/commonlib/lib/unregister_globals.php';
require_once dirname(__FILE__) .'/admin/commonlib/lib/magic_quotes.php';
require_once dirname(__FILE__).'/admin/init.php';
## none of our parameters can contain html for now
$_GET = removeXss($_GET);
$_POST = removeXss($_POST);
$_REQUEST = removeXss($_REQUEST);

if ($_SERVER["ConfigFile"] && is_file($_SERVER["ConfigFile"])) {
  include $_SERVER["ConfigFile"];
} elseif ($_ENV["CONFIG"] && is_file($_ENV["CONFIG"])) {
  include $_ENV["CONFIG"];
} elseif (is_file("config/config.php")) {
  include "config/config.php";
}
#error_reporting($er);

require_once dirname(__FILE__).'/admin/'.$GLOBALS["database_module"];
require_once dirname(__FILE__)."/texts/english.inc";
include_once dirname(__FILE__)."/texts/".$GLOBALS["language_module"];
require_once dirname(__FILE__)."/admin/defaultconfig.inc";
require_once dirname(__FILE__).'/admin/connect.php';
include_once dirname(__FILE__)."/admin/languages.php";

$id = sprintf('%s',$_GET['id']);
if ($id != $_GET['id']) {
  print "Invalid Request";
  exit;
}

$track = base64_decode($id);
$track = $track ^ XORmask;
@list($msgtype,$linkid,$messageid,$userid) = explode('|',$track);
$userid = sprintf('%d',$userid);
$linkid = sprintf('%d',$linkid);
$messageid = sprintf('%d',$messageid);
$linkdata = Sql_Fetch_array_query(sprintf('select * from %s where linkid = %d and userid = %d and messageid = %d',
  $GLOBALS['tables']['linktrack'],$linkid,$userid,$messageid));
if (!$linkid || $linkdata['linkid'] != $linkid || !$userid || !$messageid) {
  FileNotFound();
#  echo 'Invalid Request';
  # maybe some logging?
  exit;
}
#print "$track<br/>";
#print "User $userid, Mess $messageid, Link $linkid";

if (!isset($linkdata['firstclick'])) {
  Sql_query(sprintf('update %s set firstclick = now() where linkid = %d and userid = %d and messageid = %d',
    $GLOBALS['tables']['linktrack'],$linkid,$userid,$messageid));
} 
Sql_query(sprintf('update %s set clicked = clicked + 1 where linkid = %d and userid = %d and messageid = %d',
  $GLOBALS['tables']['linktrack'],$linkid,$userid,$messageid));
   
$viewed = Sql_Fetch_Row_query(sprintf('SELECT viewed FROM %s WHERE messageid = %d AND userid = %d',
  $GLOBALS['tables']['usermessage'], $messageid, $userid));
if (!$viewed[0]) {
  Sql_Query(sprintf('update %s set viewed = now() where messageid = %d and userid = %d', 
    $GLOBALS['tables']['usermessage'], $messageid, $userid));
  Sql_Query(sprintf('update %s set viewed = (viewed + 1) where id = %d', 
    $GLOBALS['tables']['message'], $messageid));
}

switch ($msgtype) {
  case 'H':
    Sql_Query(sprintf('insert into %s (linkid,userid,messageid,name,data,date)
      values(%d,%d,%d,"Message Type","HTML",now())',
      $GLOBALS['tables']['linktrack_userclick'],$linkid,$userid,$messageid));
      break;
  case 'T':
    Sql_Query(sprintf('insert into %s (linkid,userid,messageid,name,data,date)
      values(%d,%d,%d,"Message Type","Text",now())',
      $GLOBALS['tables']['linktrack_userclick'],$linkid,$userid,$messageid));
      break;
  default:      
    Sql_Query(sprintf('insert into %s (linkid,userid,messageid,name,data,date)
      values(%d,%d,%d,"Message Type","Unknown",now())',
      $GLOBALS['tables']['linktrack_userclick'],$linkid,$userid,$messageid));
      break;
}

$sysarrays = array_merge($_ENV,$_SERVER);
if (is_array($GLOBALS["userhistory_systeminfo"])) {
  foreach ($GLOBALS["userhistory_systeminfo"] as $key) {
    if (!empty($sysarrays[$key])) {
      Sql_Query(sprintf('insert into %s (linkid,userid,messageid,name,data,date)
        values(%d,%d,%d,"%s","%s",now())',
        $GLOBALS['tables']['linktrack_userclick'],$linkid,$userid,$messageid,$key,addslashes($sysarrays[$key])));
    }
  }
}

header("Location: " . $linkdata['forward']);
exit;
?>
