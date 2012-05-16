<?php
require_once dirname(__FILE__).'/accesscheck.php';

# configuration to make PHPlist work via AdoDB
# which will make it work with any database supported by AdoDB

if (is_file($GLOBALS["adodb_inc_file"])) {
  require_once $GLOBALS["adodb_inc_file"];
} else {
  print("ADOdb specified, but inc file cannot be found");
  exit;
}

$GLOBALS["adodb_connection"] = ADONewConnection($GLOBALS["adodb_driver"]);
#$GLOBALS["adodb_connection"]->debug = true;

$GLOBALS["adodb_lastresult"] = "";

function Sql_Connect($host,$user,$password,$database) {
  if ($host && $user) {
    $GLOBALS["adodb_connection"]->Connect($host, $user, $password, $database);
    return 1;
  }
  return 0;
}

function Sql_has_error ($dbconnection) {
  return 0;
}

function Sql_Error ($errno = 0) {
  $msg = $GLOBALS["adodb_connection"]->ErrorMsg();
  return '<div id="dberror" style="position: relative;
      background-color: #aa0000;
      border: 2px solid #000000;
      color: #ffffff;
      ">Database error '. $errno.' '.$msg.'</div>';
   if (function_exists("logevent")) {
     logevent("Database error: $msg");
   }
}

function Sql_Query($query,$ignore = 0) {
  $result = $GLOBALS["adodb_connection"]->Execute($query);
  $GLOBALS["adodb_lastresult"] = $result;
  if ($result) {
    return $result;
  } else {
    Sql_Error($GLOBALS["adodb_connection"]->ErrNo());
    return 0;
  }
}

function Sql_Verbose_Query($query) {
  if (preg_match("/dev$/",VERSION))
    print "<b>$query</b><br>\n";
  flush();
  return Sql_Query($query);
}

function Sql_Fetch_Array(&$dbresult) {
  $array = $dbresult->fetchRow();
  return $array;
}

function Sql_Fetch_Row(&$dbresult) {
  $row = $dbresult->FetchRow();
  return $row;
}

function Sql_Fetch_Row_Query($query) {
#  print "Sql Fetch_Row $query<br/>";
  $req = Sql_Query($query);
  return Sql_Fetch_Row($req);
}

function Sql_Fetch_Array_Query($query) {
  $req = Sql_Query($query);
  return Sql_Fetch_Array($req);
}

function Sql_Affected_Rows() {
  if (is_object($GLOBALS["adodb_lastresult"])) {
#    print "is object".$GLOBALS["adodb_lastresult"]->RecordCount();
#    print '<hr/>';
#    print_r($GLOBALS["adodb_lastresult"]);
#    print '<hr/>';
    if ($GLOBALS["adodb_lastresult"]->RecordCount())
      return $GLOBALS["adodb_lastresult"]->RecordCount();
  }
  return $GLOBALS["adodb_connection"]->affected_rows();
}

function Sql_Num_Rows($result="") {
  if (is_object($GLOBALS["adodb_lastresult"])) {
#    print "is object".$GLOBALS["adodb_lastresult"]->RecordCount();
#    print '<hr/>';
#    print_r($GLOBALS["adodb_lastresult"]);
#    print '<hr/>';
    if ($GLOBALS["adodb_lastresult"]->RecordCount())
      return $GLOBALS["adodb_lastresult"]->RecordCount();
  }
  return $GLOBALS["adodb_connection"]->affected_rows();
}

function Sql_Insert_id() {
  return $GLOBALS["adodb_connection"]->insert_id();
}

function Sql_Table_exists($table) {
  if (isset($GLOBALS["dbtables"]) && is_array($GLOBALS["dbtables"])) {
    if (isset($GLOBALS["dbtables"][$table]))
      return 1;
  }
  if (!isset($GLOBALS["dbtables"]) || !is_array($GLOBALS["dbtables"])) {
    $GLOBALS["dbtables"] = array();
    $req = Sql_Query("show tables");
    while ($row = Sql_Fetch_Row($req)) {
  #    print $row[0]."<br/>";
      $GLOBALS["dbtables"][$row[0]] = $row[0];
  #    if ($row[0] == $table)
  #      return 1;
    }
  }
  return isset($GLOBALS["dbtables"][$table]);
}

function Sql_Table_Column_Exists($table,$column) {
  if (Sql_Table_exists($table)) {
    $req = Sql_Query("show columns from $table");
    while ($row = Sql_Fetch_Row($req)) {
      if ($row[0] == $column)
        return 1;
    }
  }
}

function Sql_Check_For_Table($table) {
  return Sql_Table_exists($table);
}

function Sql_create_Table ($table,$structure) {
  $query = "CREATE TABLE $table (\n";
  while (list($column, $val) = each($structure)) {
    $query .= "$column " . $structure[$column][0] . ",";
  }
  # get rid of the last ,
  $query = substr($query,0,-1);
  $query .= "\n)";
  # submit it to the database
  $res = Sql_Verbose_Query($query);
}

?>


?>
