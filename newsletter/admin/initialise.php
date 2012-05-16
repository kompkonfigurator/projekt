<?php
require_once dirname(__FILE__).'/accesscheck.php';

include dirname(__FILE__).'/structure.php';
ob_end_flush();

print "<h3>".$GLOBALS['I18N']->get("Creating tables")."</h3><br />\n";
$success = 1;
$force = !empty($_GET['force']) && $_GET['force'] == 'yes';

while (list($table, $val) = each($DBstruct)) {
  if ($force) {
    if ($table == "attribute") {
      $req = Sql_Query("select tablename from {$tables["attribute"]}");
      while ($row = Sql_Fetch_Row($req))
        Sql_Query("drop table if exists $table_prefix"."listattr_$row[0]",1);
     }
    Sql_query("drop table if exists $tables[$table]");
  }
  $query = "CREATE TABLE $tables[$table] (\n";
  while (list($column, $struct) = each($DBstruct[$table])) {
    if (preg_match('/index_\d+/',$column)) {
      $query .= "index " . $struct[0] . ",";
    } elseif (preg_match('/unique_\d+/',$column)) {
      $query .= "unique " . $struct[0] . ",";
    } else {
      $query .= "$column " . $struct[0] . ",";
    }
  }
  # get rid of the last ,
  $query = substr($query,0,-1);
  $query .= "\n)";

  # submit it to the database
  echo $GLOBALS['I18N']->get("Initialising table")." <b>$table</b>";
  if ($force && Sql_Table_Exists($tables[$table])) {
    Error( $GLOBALS['I18N']->get("Table already exists").'<br />');
    echo "... ".$GLOBALS['I18N']->get("failed")."<br />\n";
    $success = 0;
  } else {
    $res = Sql_Query($query,0);
    $error = Sql_Has_Error($database_connection);
    $success = $force || ($success && !$error);
    if (!$error || $force) {
      if ($table == "admin") {
        # create a default admin
        Sql_Query(sprintf('insert into %s values(0,"%s","%s","%s",now(),now(),"%s","%s",now(),%d,0)',
          $tables["admin"],"admin","admin","",$adminname,"phplist",1));
      } elseif ($table == "task") {
        while (list($type,$pages) = each ($system_pages)) {
          foreach ($pages as $page => $access_level)
            Sql_Query(sprintf('replace into %s (page,type) values("%s","%s")',
              $tables["task"],$page,$type));
        }
      }

      echo "... ".$GLOBALS['I18N']->get("ok")."<br />\n";
    }
    else
      echo "... ".$GLOBALS['I18N']->get("failed")."<br />\n";
  }
}
#

if ($success) {
  # mark the database to be our current version
  Sql_Query(sprintf('replace into %s (item,value,editable) values("version","%s",0)',
    $tables["config"],VERSION));
  # mark now to be the last time we checked for an update
  Sql_Query(sprintf('replace into %s (item,value,editable) values("updatelastcheck",now(),0)',
    $tables["config"]));
  # add a testlist
  $info = $GLOBALS['I18N']->get("List for testing.");
  $result = Sql_query("insert into {$tables["list"]} (name,description,entered,active,owner) values(\"test\",\"$info\",now(),0,1)");
  $body = '
    Version: '.VERSION."\r\n".
   ' Url: '.getConfig("website").$pageroot."\r\n";
  printf('<p>'.$GLOBALS['I18N']->get('Success').': <a href="mailto:info@phplist.com?subject=Successful installation of phplist&body=%s">'.$GLOBALS['I18N']->get('Tell us about it').'</a>. </p>', $body);
  printf('<p>
    '.$GLOBALS['I18N']->get("Please make sure to read the file README.security that can be found in the zip file.").'</p>');
  printf('<p>
    '.$GLOBALS['I18N']->get("Please make sure to").'
    <a href="http://announce.hosted.phplist.com/lists/?p=subscribe"> '.$GLOBALS['I18N']->get("subscribe to the announcements list")."</a> ".
    $GLOBALS['I18N']->get("to make sure you are updated when new versions come out. Sometimes security bugs are found which make it important to upgrade. Traffic on the list is very low.").' </p>');
  print "<p>".$GLOBALS['I18N']->get("Continue with")." ".PageLink2("setup",$GLOBALS['I18N']->get("PHPlist Setup"))."</p>";
} else {
 print ('<ul><li>'.$GLOBALS['I18N']->get("Maybe you want to")." ".PageLink2("upgrade",$GLOBALS['I18N']->get("Upgrade")).' '.$GLOBALS['I18N']->get("instead?").'
    <li>'.PageLink2("initialise",$GLOBALS['I18N']->get("Force Initialisation"),"force=yes").' '.$GLOBALS['I18N']->get("(will erase all data!)").' '."</ul>\n");
}
/*
if ($_GET["firstinstall"] || $_SESSION["firstinstall"]) {
  $_SESSION["firstinstall"] = 1;
  print "<p>".$GLOBALS['I18N']->get("Checklist for Installation")."</p>";
  require "setup.php";
}
*/

?>
