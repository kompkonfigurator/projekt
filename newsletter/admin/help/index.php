<?php
ob_start();
error_reporting(0);
if (!empty($_SERVER["ConfigFile"]) && is_file($_SERVER["ConfigFile"])) {
#  print '<!-- using '.$_SERVER["ConfigFile"].'-->'."\n";
  include $_SERVER["ConfigFile"];
} elseif (!empty($_ENV["CONFIG"]) && is_file($_ENV["CONFIG"])) {
#  print '<!-- using '.$_ENV["CONFIG"].'-->'."\n";
  include $_ENV["CONFIG"];
} elseif (is_file("../../config/config.php")) {
#  print '<!-- using ../../config/config.php-->'."\n";
  include "../../config/config.php";
} else {
  print "Error, cannot find config file\n";
  exit;
}
$now =  gettimeofday();
$GLOBALS["pagestats"] = array();
$GLOBALS["pagestats"]["time_start"] = $now["sec"] * 1000000 + $now["usec"];
$GLOBALS["pagestats"]["number_of_queries"] = 0;

require_once dirname(__FILE__).'/../init.php';
require_once dirname(__FILE__).'/../'.$GLOBALS["database_module"];
require_once dirname(__FILE__)."/../../texts/english.inc";
include_once dirname(__FILE__)."/../../texts/".$GLOBALS["language_module"];
require_once dirname(__FILE__)."/../defaultconfig.inc";
require_once dirname(__FILE__).'/../connect.php';
include_once dirname(__FILE__)."/../languages.php";
require_once dirname(__FILE__)."/../commonlib/lib/interfacelib.php";
include_once dirname(__FILE__)."/../pagetop.php";
# record the start time(usec) of script

if (!isset($_GET["topic"]))
  $topic = "home";
else
  $topic = $_GET["topic"];

preg_match("/([\w_]+)/",$topic,$regs);
$topic = $regs[1];
$include = '';
$topic = basename($topic);
if ($topic) {
  if (is_file($_SESSION['adminlanguage']['iso'].'/'.$topic.".php")) {
    $include = $_SESSION['adminlanguage']['iso'].'/'.$topic . ".php";
  }
}

?>
<HTML>
<HEAD>
<TITLE>help</TITLE>
<link rel="stylesheet" type="text/css" href="../styles/styles_help.css"></HEAD>
<BODY>
<!-- content -->
<?php
print "<table width=100%><tr><td valign=top><h3>phplist Help: $topic</h3></td><td align=right valign=top>";
printf('<A HREF="Javascript:close()">%s</A></td></tr></table>',$GLOBALS['I18N']->get('closewindow'));
if ($include) {
  include $include;
} else {
  print $GLOBALS['I18N']->get('nohelpavailable')." ".'<i>'.$topic.'</i>';
}

ob_end_flush();

printf('<HR WIDTH="75%%">
<A HREF="Javascript:close()">%s</A>
</BODY></HTML>',$GLOBALS['I18N']->get('closewindow'));

