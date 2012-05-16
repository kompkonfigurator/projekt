<?php
require_once dirname(__FILE__).'/accesscheck.php';

/*
if ($_GET["firstinstall"] || $_SESSION["firstinstall"]) {
  $_SESSION["firstinstall"] = 1;
  print "<p>" . $GLOBALS['I18N']->get('checklist for installation') . "</p>";
  require "setup.php";
}
*/
if (empty($_REQUEST['id'])) {
  $id = '';
} else {
  $id = $_REQUEST['id'];
  if (!isset($default_config[$id])) {
    print $GLOBALS['I18N']->get('invalid request');
    return;
  }
}

# configure options
reset($default_config);
if (!empty($_REQUEST['save']) && $id) {
  $info = $default_config[$id];
  if (is_array($_POST)) {
    if (!verifyToken()) {
      print Error($GLOBALS['I18N']->get('No Access'));
      return;
    }
    if ($id == "website" || $id == "domain") {
      $_POST["values"][$id] = str_replace("[DOMAIN]","",$_POST["values"][$id]);
      $_POST["values"][$id] = str_replace("[WEBSITE]","",$_POST["values"][$id]);
    }
    if ($_POST["values"][$id] == "" && !$info[3])
      Error("$info[1] " . $GLOBALS['I18N']->get('cannot be empty'));
    else {
      SaveConfig($id,$_POST["values"][$id],0);
      Redirect("configure");
      exit;
    }
  }
}

if (!$id) {
  while (list($key,$val) = each($default_config)) {
    if (is_array($val)) {
      $dbval = getConfig($key);
      if (isset($dbval))
        $value = $dbval;
      else
        $value = $val[0];
      printf('<p><a href="%s">%s</a> <b>%s</b><br/>',PageURL2("configure","","id=$key"),$GLOBALS['I18N']->get('edit'),$GLOBALS['I18N']->get($val[1]));
      print nl2br(htmlspecialchars(stripslashes($value))) . "<br/><hr/>";
    }
  }
} else {
  $val = $default_config[$id];
  printf('%s<p>' . $GLOBALS['I18N']->get('editing') . ' <b>%s</b><br/>',formStart(),$GLOBALS['I18N']->get($val[1]));
  printf ('<input type=hidden name="id" value="%s">',$id);
  $dbval = getConfig($id);
#  print $dbval.'<br/>';
  if (isset($dbval))
    $value = $dbval;
  else
    $value = $val[0];
#  print $value . " ".$website . " ".$domain.'<br/>';
  if ($id != "website" && $id != "domain") {
    $value = preg_replace('/'.preg_quote($domain, '/').'/i','[DOMAIN]', $value);
    $value = preg_replace('/'.preg_quote($website, '/').'/i','[WEBSITE]', $value);
  }
#  print $value . '<br/>';
  if ($val[2] == "textarea")
    printf('<textarea name="values[%s]" rows=25 cols=55>%s</textarea><br/>',
      $id,htmlspecialchars(stripslashes($value)));
  else if ($val[2] == "text")
    printf('<input type="text" name="values[%s]" size="70" value="%s"><br/>',
    $id,htmlspecialchars(stripslashes($value)));
  else if ($val[2] == "boolean")
    printf('<input type="text" name="values[%s]" size="10" value="%s"><br/>',
    $id,htmlspecialchars(stripslashes($value)));
  print '<br/><input type="hidden" name="save" value="1"><input type="submit" name="savebutton" value="' . $GLOBALS['I18N']->get('save changes') . '"></form>';
}
?>
