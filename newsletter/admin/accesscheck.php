<?php
/*
function listArray($array,$indent = 0) {
	if (!is_array($array))
  	return $array;
	if ($indent)
	  $prefix = str_repeat(" ",$indent);
  else
  	$prefix = "";
	$res = "\n".$prefix . "### start array ###";
  while (list($key,$val) = each ($array)) {
    $res .= "\n".$prefix ."$key => ";
    if (is_array($val) && $key != "creditcard" && $key != "cardnumber" && $key != "card_number") {
      $res .= listArray($val,$indent+2);
    } else {
      $res .= $prefix . $val;
    }
    $res .= "\n";
  }
  $res .= "\n### end array ###\n";
  return $res;
}


function backtrace() {
	$msg = "";
  if (function_exists("debug_backtrace")) {
	  $debug = debug_backtrace();
  	while (list($key,$val) = each($debug)) {
	  	$msg .= $key .'=>'."<br/>\n";
      if (is_array($val))
      	$msg .= listArray($val);
      else
      	$msg .= $val;
    }
  } else {
  	return 'backtrace not available';
  }
  return $msg;
}
*/
if (!function_exists("checkAccess")) {
#	print backtrace();
  print "Invalid Request";
  exit;
}

function accessLevel($page) {
  global $tables,$access_levels;
  if (!$GLOBALS["require_login"] || isSuperUser())
    return "all";
  if (!isset($_SESSION["adminloggedin"])) return 0;
  if (!is_array($_SESSION["logindetails"])) return 0;
  # check whether it is a page to protect
  Sql_Query("select id from {$tables["task"]} where page = \"$page\"");
  if (!Sql_Affected_Rows())
    return "all";
  $req = Sql_Query(sprintf('select level from %s,%s where adminid = %d and page = "%s" and %s.taskid = %s.id',
    $tables["task"],$tables["admin_task"],$_SESSION["logindetails"]["id"],$page,$tables["admin_task"],$tables["task"]));
  $row = Sql_Fetch_Row($req);
  return $access_levels[$row[0]];
}

function requireAccessLevel($page,$level) {
  $adminlevel = accessLevel($page);
  return $adminlevel == $level;
}

function isSuperUser() {
  global $tables;
  if (!isset($_SESSION["adminloggedin"])) return 0;
  if (!is_array($_SESSION["logindetails"])) return 0;
  if (isset($_SESSION["logindetails"]["superuser"]))
    return $_SESSION["logindetails"]["superuser"];
  if ($GLOBALS["require_login"]) {
    if (is_object($GLOBALS["admin_auth"])) {
      $issuperuser = $GLOBALS["admin_auth"]->isSuperUser($_SESSION["logindetails"]["id"]);
    } else {
      $req = Sql_Fetch_Row_Query(sprintf('select superuser from %s where id = %d',$tables["admin"],$_SESSION["logindetails"]["id"]));
      $issuperuser = $req[0];
    }
    $_SESSION["logindetails"]["superuser"] = $issuperuser;
    return $issuperuser;
  }
}


?>
