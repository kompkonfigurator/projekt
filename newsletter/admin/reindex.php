<?php

# This page will recreate all indexes from the structure.php file.
# It can be called from your phpserver: ~/lists/admin/?page=reindex
# PHP will skip indexes that are already created by name.
# WARNING: This can take a long time on large tables, there is no feedback 
# and te session can be killed by your browser or server after a timeout.
# Just reload if you think nothing happens after 30 minutes or so.

@ob_end_flush();
include dirname(__FILE__).'/structure.php';

foreach ($DBstruct as $table => $columns) {
  print '<h3>'.$table.'</h3><br/>';
  foreach ($columns as $column => $definition) {
    if (strpos($column,'index') === 0) {
      print "Adding index: <b>$definition[0]</b> to $table, <br/>";
      flush();
      # ignore errors, which are most likely that the index already exists
      Sql_Query(sprintf('alter table %s add index %s',$table,$definition[0]),1);
    } elseif (strpos($column,'unique') === 0) {
      print "Adding unique index: $definition[0] to $table, <br/>";
      flush();
      # ignore errors, which are most likely that the index already exists
      Sql_Query(sprintf('alter table %s add unique %s',$table,$definition[0]),1);
    }
  }
}
