
<h1>Database Check</h1>

<?php

$ls = new WebblerListing("Database Structure");
while (list($table, $tablename) = each($GLOBALS["tables"])) {
  $ls->addElement($table);
  if ($table != $tablename) {
    $ls->addColumn($table,"real name",$tablename);
  }
  $req = Sql_Query("show columns from $tablename",0);
  $columns = array();
  if (!Sql_Affected_Rows()) {
    $ls->addColumn($table,"exist",$GLOBALS["img_cross"]);
  }
  while ($row = Sql_Fetch_Array($req)) {
    $columns[strtolower($row["Field"])] = $row["Type"];
  }
  $tls = new WebblerListing($table);
  $struct = $DBstruct[$table];
  $haserror = 0;
  foreach ($struct as $column => $colstruct) {
    if (!ereg("index_",$column) && !ereg("^unique_",$column) && $column != "primary key") {
      $tls->addElement($column);
      $exist = isset($columns[strtolower($column)]);
      if ($exist) {
        $tls->addColumn($column,"exist",$GLOBALS["img_tick"]);
      } else {
        $haserror = 1;
        $tls->addColumn($column,"exist",$GLOBALS["img_cross"]);
      }
    }
  }
  if (!$haserror) {
    $tls->collapse();
    $ls->addColumn($table,"ok",$GLOBALS["img_tick"]);
  } else {
    $ls->addColumn($table,"ok",$GLOBALS["img_cross"]);
  }
  $ls->addColumn($table,"check",$tls->display());
}
print $ls->display();

