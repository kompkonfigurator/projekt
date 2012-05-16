<?php

# sql functions, currently only set up to work with MySql
# replace functions in this file to make it work with other Databases

if (!function_exists("mysql_connect")) {
  print "Fatal Error: Mysql is not supported in your PHP, recompile and try again.";
  exit;
}

function Sql_Connect($host,$user,$password,$database) {
  if ($host && $user)
    $db = mysql_connect($host , $user ,$password );
  $errno = mysql_errno();
  if (!$errno) {
    $res = mysql_select_db($database,$db);
    $errno = mysql_errno();
  }
  if ($errno) {
    switch ($errno) {
      case 1049: # unknown database
        Fatal_Error("unknown database, cannot continue");
        exit;
      case 1045: # access denied
        Fatal_Error("Cannot connect to database, access denied. Please contact the administrator");
        exit;
      case 2002:
        Fatal_Error("Cannot connect to database, Sql server is not running. Please contact the administrator");
        exit;
      case 1040: # too many connections
        Fatal_Error("Sorry, the server is currently too busy, please try again later.");
        exit;
      case 0:
        break;
      default:
        SQL_Error($errno, "Server error:". mysql_error());
    }
    print "Cannot connect to Database, please check your configuration";
    exit;
  }
  if (!$db) {
    print "Cannot connect to Database, please check your configuration";
    exit;
  }
  if (strcasecmp($GLOBALS['strCharSet'], 'utf-8') == 0) {
    mysql_query ("SET NAMES 'utf8'");
  }
  return $db;
}

function Sql_has_error ($dbconnection) {
  return mysql_errno($dbconnection);
}

function Sql_Error ($dbconnection,$errno = 0) {
  $msg = mysql_error($dbconnection);
  return '<div id="dberror" style="position: relative;
      background-color: #aa0000;
      border: 2px solid #000000;
      color: #ffffff;
      ">Database error '. $errno.' while doing query '.$GLOBALS['lastquery']. ' ' .$msg.'</div>';
   if (function_exists("logevent")) {
     logevent("Database error: $msg");
   }
#  return "<table border=1><tr><td class=\"error\">Database Error</td></tr><tr><td><!--$errno: -->$msg</td></tr></table>";
}

function Sql_Check_error($dbconnection,$errno = 0) {
  if (!$errno)
    $errno = Sql_has_error($dbconnection);
  if ($errno) {
    switch ($errno) {
      case 1049: # unknown database
        Fatal_Error("unknown database, cannot continue");
        exit;
      case 1045: # access denied
        Fatal_Error("Cannot connect to database, access denied. Please contact the administrator");
        exit;
      case 2002:
        Fatal_Error("Cannot connect to database, Sql server is not running. Please contact the administrator");
        exit;
      case 1040: # too many connections
        Fatal_Error("Sorry, the server is currently too busy, please try again later.");
        exit;
      case 0:
        break;
      default:
        print Sql_error($dbconnection,$errno);
    }
    return 1;
  }
}

function Sql_Query($query,$ignore = 0) {
  if (isset($GLOBALS['lastquery'])) {
    unset($GLOBALS['lastquery']);
  }
  if (isset($GLOBALS["developer_email"])) {
  #  if (preg_match("/dev$/",VERSION))
  #  print "<b>$query</b><br>\n";
  #  if ($GLOBALS["commandline"]) {
  #    ob_end_clean();
  #    print "Sql: $query\n";
  #    ob_start();
  #  }
    # time queries to see how slow they are, so they can
    # be optimized
    $now =  gettimeofday();
    $start = $now["sec"] * 1000000 + $now["usec"];
    $GLOBALS['lastquery'] = $query;
  }
  $GLOBALS["pagestats"]["number_of_queries"]++;
  $result = mysql_query($query,$GLOBALS["database_connection"]);
  if (!$ignore) {
    if (Sql_Check_Error($GLOBALS["database_connection"]))
      dbg("Sql error in $query");
  }
  if (isset($GLOBALS["developer_email"])) {
    # log time queries take
    $now = gettimeofday();
    $end = $now["sec"] * 1000000 + $now["usec"];
    $elapsed = $end - $start;
    if ($elapsed > 300000) {
      $query = substr($query,0,200);
      sqllog(' ['.$elapsed.'] '.$query,"/tmp/phplist-sqltimer.log");
    }
  }

  return $result;
}

function sqllog($msg,$logfile = "") {
  if (!$logfile) return;
  $fp = @fopen($logfile,"a");
  $line = "[".date("d M Y, H:i:s")."] ".getenv("REQUEST_URI").'('.$GLOBALS["pagestats"]["number_of_queries"].") $msg \n";
  @fwrite($fp,$line);
  @fclose($fp);
}

function db_db_Query($query,$database,$db_connection) {
  $res = mysql_db_query($database,$query,$db_connection);
  if (db_has_Error($db_connection))
    Sql_Error($db_connection);
  return $res;
}

function Sql_Verbose_Query($query) {
  if (preg_match("/dev/",VERSION))
    print "<b>$query</b><br>\n";
  flush();
  if ($GLOBALS["commandline"]) {
    ob_end_clean();
    print "Sql: $query\n";
    ob_start();
  }
  return Sql_Query($query);
}

function Sql_Fetch_Array($dbresult) {
  return mysql_fetch_array($dbresult);
}

function Sql_Fetch_Assoc($dbresult) {
  return mysql_fetch_assoc($dbresult);
}

function Sql_Fetch_Row($dbresult) {
  return mysql_fetch_row($dbresult);
}

function Sql_Fetch_Row_Query($query) {
  $req = Sql_Query($query);
  return Sql_Fetch_Row($req);
}

function Sql_Fetch_Array_Query($query) {
  $req = Sql_Query($query);
  return Sql_Fetch_Array($req);
}

function Sql_Fetch_Assoc_Query($query) {
  $req = Sql_Query($query);
  return Sql_Fetch_Assoc($req);
}

function Sql_Affected_Rows() {
  return mysql_affected_rows($GLOBALS["database_connection"]);
}

function Sql_Num_Rows($result = "") {
  return mysql_num_rows($result);
}

function Sql_Insert_id() {
  return mysql_insert_id($GLOBALS["database_connection"]);
}

function Sql_Result($result,$index,$column) {
  return mysql_result($result,$index,$column);
}

function Sql_Free_Result($dbresult) {
  mysql_free_result($dbresult);
};

function Sql_Table_exists($table,$refresh = 0) {
  if (!empty($_GET['pi']) || $refresh || !isset($_SESSION) || !isset($_SESSION["dbtables"]) || !is_array($_SESSION["dbtables"])) {
    $_SESSION["dbtables"] = array();
    $req = Sql_Query("show tables");
    while ($row = Sql_Fetch_Row($req)) {
      array_push($_SESSION["dbtables"],$row[0]);
    }
  }
  return in_array($table,$_SESSION["dbtables"]);
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

function sql_escape($string) {
  return mysql_real_escape_string($string);
}

function Sql_create_Table ($table,$structure) {
  $query = "CREATE TABLE $table (\n";
  while (list($column, $val) = each($structure)) {
    if (preg_match('/index_\d+/',$column)) {
      $query .= "index " . $structure[$column][0] . ",";
    } elseif (preg_match('/unique_\d+/',$column)) {
      $query .= "unique " . $structure[$column][0] . ",";
    } else {
      $query .= "$column " . $structure[$column][0] . ",";
    }
  }
  # get rid of the last ,
  $query = substr($query,0,-1);
  $query .= "\n)";
  # submit it to the database
  $res = Sql_Query($query);
}

?>
