<?php
require_once dirname(__FILE__).'/accesscheck.php';

$GLOBALS["plugins"] = array();
if (!defined("PLUGIN_ROOTDIR")) {
  define("PLUGIN_ROOTDIR","notdefined");
}
if (is_dir(PLUGIN_ROOTDIR)) {
  include_once "defaultplugin.php";
  $files = array();
  $dh=opendir(PLUGIN_ROOTDIR);
  while (false!==($file = readdir($dh))) {
    if ($file != "." && $file != ".." &&
      !preg_match("/~$/",$file) &&
      is_file(PLUGIN_ROOTDIR."/".$file) &&
      preg_match("/\.php$/",$file) ){
      array_push($files,$file);
    }
  }
  closedir($dh);
  asort($files);
  reset($files);
  foreach ($files as $file) {
    list($name,$ext) = explode(".",$file);
    if (preg_match("/[\w]+/",$name)) {
      include_once PLUGIN_ROOTDIR."/" . $file;
      eval("\$class = new ". $name ."();");
#      print "$name = $class<br/>";
      $GLOBALS["plugins"][$name] = $class;
    }
  }
}

?>
