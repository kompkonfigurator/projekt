<?php
require_once dirname(__FILE__).'/accesscheck.php';

# quick installation checklist

# initialise database
# setup config values
# configure attributes
# create lists
# create subscribe pages

print "<table>";
print
'<tr><td>'.$GLOBALS['I18N']->get('initialise_database').'</td>
<td>'.PageLink2("initialise",$GLOBALS['I18N']->get('go_there')).'</td><td>';

if (Sql_Table_Exists($tables["config"],1)) {
  print $GLOBALS["img_tick"];
} else {
  print $GLOBALS["img_cross"];
}

print '</td></tr>';

if ($GLOBALS["require_login"]) {
print '<tr><td>'.$GLOBALS['I18N']->get('change_admin_passwd').' </td>
<td>'.PageLink2("admin&id=1",$GLOBALS['I18N']->get('go_there')).'</td><td>';

  $curpwd = Sql_Fetch_Row_Query("select password from {$tables["admin"]} where loginname = \"admin\"");
  if ($curpwd[0] != "phplist") {
    print $GLOBALS["img_tick"];
  } else {
    print $GLOBALS["img_cross"];
  }

  print '</td></tr>';
}

print '<tr><td>'.$GLOBALS['I18N']->get('config_gral_values').'</td><td>'.PageLink2("configure",$GLOBALS['I18N']->get('go_there')).'</td><td>';
$data = Sql_Fetch_Row_Query("select value from {$tables["config"]} where item = \"admin_address\"");
if ($data[0]) {
  print $GLOBALS["img_tick"];
} else {
  print $GLOBALS["img_cross"];
}

print '</td></tr>';

print '<tr><td>'.$GLOBALS['I18N']->get('config_attribs').'</td>
<td>'.PageLink2("attributes",$GLOBALS['I18N']->get('go_there')).'</td><td>';
$req = Sql_Query("select * from {$tables["attribute"]}");
if (Sql_Affected_Rows()) {
  print $GLOBALS["img_tick"];
} else {
  print $GLOBALS["img_cross"];
}

print '</td></tr>';

print '<tr><td>'.$GLOBALS['I18N']->get('create_lists').'</td>
<td>'.PageLink2("list",$GLOBALS['I18N']->get('go_there')).'</td><td>';
$req = Sql_Query("select * from {$tables["list"]} where active");
if (Sql_Affected_Rows()) {
  print $GLOBALS["img_tick"];
} else {
  print $GLOBALS["img_cross"];
}

print '</td></tr>';

print '<tr><td>'.$GLOBALS['I18N']->get('create_subscr_pages').'</td>
<td>'.PageLink2("spage",$GLOBALS['I18N']->get('go_there')).'</td><td>';
$req = Sql_Query("select * from {$tables["subscribepage"]}");
if (Sql_Affected_Rows()) {
  print $GLOBALS["img_tick"];
} else {
  print $GLOBALS["img_cross"];
}

print '</td></tr>';
print '</table>';