<?php

@ob_start();
$er = error_reporting(0);
# check for commandline and cli version
if (!isset($_SERVER["SERVER_NAME"]) && !PHP_SAPI == "cli") {
  print "Warning: commandline only works well with the cli version of PHP";
}

if (isset($_REQUEST['_SERVER'])) { exit; }
$cline = array();
$GLOBALS['commandline'] = 0;

require_once dirname(__FILE__) .'/commonlib/lib/unregister_globals.php';
require_once dirname(__FILE__) .'/commonlib/lib/magic_quotes.php';

# setup commandline
if (php_sapi_name() == "cli") {
  for ($i=0; $i<$_SERVER['argc']; $i++) {
    $my_args = array();
    if (ereg("(.*)=(.*)",$_SERVER['argv'][$i], $my_args)) {
      $_GET[$my_args[1]] = $my_args[2];
      $_REQUEST[$my_args[1]] = $my_args[2];
    }
  }
  $GLOBALS["commandline"] = 1;
  $cline = parseCLine();
  $dir = dirname($_SERVER["SCRIPT_FILENAME"]);
  chdir($dir);
} else {
  $GLOBALS["commandline"] = 0;
  header("Cache-Control: no-cache, must-revalidate");           // HTTP/1.1
  header("Pragma: no-cache");                                   // HTTP/1.0
}

if (isset($_SERVER["ConfigFile"]) && is_file($_SERVER["ConfigFile"])) {
  print '<!-- using '.$_SERVER["ConfigFile"].'-->'."\n";
  include $_SERVER["ConfigFile"];
} elseif (isset($cline["c"]) && is_file($cline["c"])) {
  print '<!-- using '.$cline["c"].' -->'."\n";
  include $cline["c"];
} elseif ($GLOBALS['commandline'] && isset($_ENV["CONFIG"]) && is_file($_ENV["CONFIG"])) {
#  print '<!-- using '.$_ENV["CONFIG"].'-->'."\n";
  include $_ENV["CONFIG"];
} elseif (is_file("../config/config.php")) {
  print '<!-- using ../config/config.php -->'."\n";
  include "../config/config.php";
} else {
  print "Error, cannot find config file\n";
  exit;
}

# record the start time(usec) of script
$now =  gettimeofday();
$GLOBALS["pagestats"] = array();
$GLOBALS["pagestats"]["time_start"] = $now["sec"] * 1000000 + $now["usec"];
$GLOBALS["pagestats"]["number_of_queries"] = 0;

if (!$GLOBALS["commandline"] && isset($GLOBALS["developer_email"]) && $_SERVER['HTTP_HOST'] != 'cvs.phplist.com' && $GLOBALS['show_dev_errors']) {
  error_reporting(E_ALL | E_NOTICE);
  ini_set('display_errors',1);
  foreach ($_REQUEST as $key => $val) {
    unset($$key);
  }
} else {
#  error_reporting($er);
  error_reporting(0);
}

# load all required files
require_once dirname(__FILE__).'/init.php';
require_once dirname(__FILE__).'/'.$GLOBALS["database_module"];
require_once dirname(__FILE__)."/../texts/english.inc";
include_once dirname(__FILE__)."/../texts/".$GLOBALS["language_module"];
require_once dirname(__FILE__)."/defaultconfig.inc";
require_once dirname(__FILE__).'/connect.php';
include_once dirname(__FILE__)."/languages.php";
include_once dirname(__FILE__)."/lib.php";
require_once dirname(__FILE__)."/commonlib/lib/interfacelib.php";
include_once dirname(__FILE__)."/pagetop.php";

if ($GLOBALS["commandline"]) {
  if (!isset($_SERVER["USER"]) && sizeof($GLOBALS["commandline_users"])) {
    clineError("USER environment variable is not defined, cannot do access check. Please make sure USER is defined.");
    exit;
  }
  if (is_array($GLOBALS["commandline_users"]) && sizeof($GLOBALS["commandline_users"]) && !in_array($_SERVER["USER"],$GLOBALS["commandline_users"])) {
    clineError("Sorry, You (".$_SERVER["USER"].") do not have sufficient permissions to run phplist on commandline");
    exit;
  }
  $GLOBALS["require_login"] = 0;

  # getopt is actually useless
  #$opt = getopt("p:");
  if ($cline["p"]) {
    if (!in_array($cline["p"],$GLOBALS["commandline_pages"])) {
      clineError($cline["p"]." does not process commandline");
    } else {
      $_GET["page"] = $cline["p"];
    }
  } else {
    clineUsage(" [other parameters]");
    exit;
  }
} else {
  if (CHECK_REFERRER && isset($_SERVER['HTTP_REFERER'])) {
    ## do a crude check on referrer. Won't solve everything, as it can be faked, but shouldn't hurt
    $ref = parse_url($_SERVER['HTTP_REFERER']);
    if ($ref['host'] != $_SERVER['HTTP_HOST'] && !in_array($ref['host'],$allowed_referrers)) {
      print 'Access denied';exit;
    }
  }
}

# fix for old PHP versions, although not failsafe :-(
if (!isset($_POST) && isset($HTTP_POST_VARS)) {
  include_once dirname(__FILE__) ."/commonlib/lib/oldphp_vars.php";
}

if (!isset($_GET['page']))
  $page = 'home';
else
  $page = $_GET['page'];
preg_match("/([\w_]+)/",$page,$regs);
$page = $regs[1];
if (!is_file($page.'.php') && !isset($_GET['pi'])) {
  $page = 'home';
}

if (!$GLOBALS["admin_auth_module"]) {
  # stop login system when no admins exist
  if (!Sql_Table_Exists($tables["admin"])) {
    $GLOBALS["require_login"] = 0;
  } else {
    $num = Sql_Query("select * from {$tables["admin"]}");
    if (!Sql_Affected_Rows())
      $GLOBALS["require_login"] = 0;
  }
} elseif (!Sql_Table_exists($GLOBALS['tables']['config'])) {
  $GLOBALS['require_login'] = 0;
}

$page_title = NAME;
@include_once dirname(__FILE__)."/lan/".$_SESSION['adminlanguage']['iso']."/pagetitles.php";

print '<script language="javascript" type="text/javascript" src="js/select_style.js"></script>';
print '<meta http-equiv="Cache-Control" content="no-cache, must-revalidate">';           // HTTP/1.1
print '<meta http-equiv="Pragma" content="no-cache">';           // HTTP/1.1
print "<title>".NAME." :: ";
if (isset($GLOBALS["installation_name"]))
  print $GLOBALS["installation_name"] .' :: ';
print "$page_title</title>";

if (isset($GLOBALS["require_login"]) && $GLOBALS["require_login"]) {
  if ($GLOBALS["admin_auth_module"] && is_file("auth/".$GLOBALS["admin_auth_module"])) {
    require_once "auth/".$GLOBALS["admin_auth_module"];
  } elseif ($GLOBALS["admin_auth_module"] && is_file($GLOBALS["admin_auth_module"])) {
    require_once $GLOBALS["admin_auth_module"];
  } else {
    if ($GLOBALS["admin_auth_module"]) {
      logEvent("Warning: unable to use ".$GLOBALS["admin_auth_module"]. " for admin authentication, reverting back to phplist authentication");
      $GLOBALS["admin_auth_module"] = 'phplist_auth.inc';
    }
    require_once 'auth/phplist_auth.inc';
  }
  if (class_exists('admin_auth')) {
    $GLOBALS["admin_auth"] = new admin_auth();
  } else {
    print Fatal_Error($GLOBALS['I18N']->get('admininitfailure'));
    return;
  }
  if ((!isset($_SESSION["adminloggedin"]) || !$_SESSION["adminloggedin"]) && isset($_REQUEST["login"]) && isset($_REQUEST["password"])) {
    $loginresult = $GLOBALS["admin_auth"]->validateLogin($_REQUEST["login"],$_REQUEST["password"]);
    if (!$loginresult[0]) {
      $_SESSION["adminloggedin"] = "";
      $_SESSION["logindetails"] = "";
      $page = "login";
      logEvent(sprintf($GLOBALS['I18N']->get('invalid login from %s, tried logging in as %s'),$_SERVER['REMOTE_ADDR'],$_REQUEST["login"]));
      $msg = $loginresult[1];
    } else {
      $_SESSION["adminloggedin"] = $_SERVER["REMOTE_ADDR"];
      $_SESSION["logindetails"] = array(
        "adminname" => $_REQUEST["login"],
        "id" => $loginresult[0],
        "superuser" => $admin_auth->isSuperUser($loginresult[0]),
      );
      if ($_POST["page"] && $_POST["page"] != "") {
        $page = $_POST["page"];
      }
    }
  } elseif (isset($_REQUEST["forgotpassword"])) {
    $pass = '';
    if (is_email($_REQUEST["forgotpassword"])) {
      $pass = $GLOBALS["admin_auth"]->getPassword($_REQUEST["forgotpassword"]);
    } 
    if ($pass) {
      sendMail ($_REQUEST["forgotpassword"],$GLOBALS['I18N']->get('yourpassword'),"\n\n".$GLOBALS['I18N']->get('yourpasswordis')." $pass");
      $msg = $GLOBALS['I18N']->get('passwordsent');
      logEvent(sprintf($GLOBALS['I18N']->get('successful password request from %s for %s'),$_SERVER['REMOTE_ADDR'],$_REQUEST["forgotpassword"]));
    } else {
      $msg = $GLOBALS['I18N']->get('cannotsendpassword');
      logEvent(sprintf($GLOBALS['I18N']->get('failed password request from %s for %s'),$_SERVER['REMOTE_ADDR'],$_REQUEST["forgotpassword"]));
    }
    $page = "login";
  } elseif (!isset($_SESSION["adminloggedin"]) || !$_SESSION["adminloggedin"]) {
    #$msg = 'Not logged in';
    $page = "login";
  } elseif (CHECK_SESSIONIP && $_SESSION["adminloggedin"] && $_SESSION["adminloggedin"] != $_SERVER["REMOTE_ADDR"]) {
    logEvent(sprintf($GLOBALS['I18N']->get('login ip invalid from %s for %s (was %s)'),$_SERVER['REMOTE_ADDR'],$_SESSION["logindetails"]['adminname'],$_SESSION["adminloggedin"]));
    $msg = $GLOBALS['I18N']->get('ipchanged');
    $_SESSION["adminloggedin"] = "";
    $_SESSION["logindetails"] = "";
    $page = "login";
  } elseif ($_SESSION["adminloggedin"] && $_SESSION["logindetails"]) {
    $validate = $GLOBALS["admin_auth"]->validateAccount($_SESSION["logindetails"]["id"]);
    if (!$validate[0]) {
      logEvent(sprintf($GLOBALS['I18N']->get('invalidated login from %s for %s (error %s)'),$_SERVER['REMOTE_ADDR'],$_SESSION["logindetails"]['adminname'],$validate[1]));
      $_SESSION["adminloggedin"] = "";
      $_SESSION["logindetails"] = "";
      $page = "login";
      $msg = $validate[1];
    }
  }
}

$include = '';
include "header.inc";
if ($page != '') {
  preg_match("/([\w_]+)/",$page,$regs);
  $include = $regs[1];
  $include .= ".php";
  $include = $page . ".php";
} else {
  $include = "home.php";
}

print '<p class="leaftitle">'.NAME.' - '.strtolower($page_title).'</p>';

if ($GLOBALS["require_login"] && $page != "login") {
  if ($page == 'logout') {
    $greeting = $GLOBALS['I18N']->get('goodbye');
  } else {
    $hr = date("G");
    if ($hr > 0 && $hr < 12) {
      $greeting = $GLOBALS['I18N']->get('goodmorning');
    } elseif ($hr <= 18) {
      $greeting = $GLOBALS['I18N']->get('goodafternoon');
    } else {
      $greeting = $GLOBALS['I18N']->get('goodevening');
    }
  }
  print '<div><font style="font-size : 12px;font-family : Arial, Helvetica, sans-serif;  font-weight : bold;"> '.$greeting." ".adminName($_SESSION["logindetails"]["id"]). "</font></div>";
  if ($page != "logout") {
    print '<div align="right">'.PageLink2("logout",$GLOBALS['I18N']->get('logout'));
  }
  print '</div>';
}
if (LANGUAGE_SWITCH) {
  $ls = '<div align="right" id="languageswitch"><br/><form name="languageswitch" method="post" style="margin: 0; padding: 0">';
  $ls .= '<select name="setlanguage" onChange="document.languageswitch.submit()" style="width: 100px; font-size: 10px; color: #666666">';
  $lancount = 0;
  foreach ($GLOBALS['LANGUAGES'] as $iso => $rec) {
    if (is_dir(dirname(__FILE__).'/lan/'.$iso)) {
      $ls .= sprintf('<option value="%s" %s>%s</option>',$iso,$_SESSION['adminlanguage']['iso'] == $iso ? 'selected':'',$rec[0]);
      $lancount++;
    }
  }
  $ls .= '</select></form></div>';
  if ($lancount > 1) {
    print $ls;
  }
}

if ($page != "login") {
  if (ereg("dev",VERSION) && !TEST) {
    if ($GLOBALS["developer_email"]) {
      print Info("Running CVS version. All emails will be sent to ".$GLOBALS["developer_email"]);
    } else {
      print Info("Running CVS version, but developer email is not set");
    }
  }
  if (TEST) {
    print Info($GLOBALS['I18N']->get('Running in testmode, no emails will be sent. Check your config file.'));
  }

  if (ini_get("register_globals") == "on" && WARN_ABOUT_PHP_SETTINGS) {
    Error($GLOBALS['I18N']->get('It is safer to set Register Globals in your php.ini to be <b>off</b> instead of ').ini_get("register_globals") );
  }
  if (((bool)ini_get("safe_mode") === true ) && WARN_ABOUT_PHP_SETTINGS)
    Warn($GLOBALS['I18N']->get('safemodewarning'));

    /* this needs checking 
  if (!ini_get("magic_quotes_gpc") && WARN_ABOUT_PHP_SETTINGS)
    Warn($GLOBALS['I18N']->get('magicquoteswarning'));
    
  if (ini_get("magic_quotes_runtime") && WARN_ABOUT_PHP_SETTINGS)
    Warn($GLOBALS['I18N']->get('magicruntimewarning'));
    */
  if (defined("ENABLE_RSS") && ENABLE_RSS && !function_exists("xml_parse") && WARN_ABOUT_PHP_SETTINGS)
    Warn($GLOBALS['I18N']->get('noxml'));

  if (ALLOW_ATTACHMENTS && WARN_ABOUT_PHP_SETTINGS && (!is_dir($GLOBALS["attachment_repository"]) || !is_writable ($GLOBALS["attachment_repository"]))) {
    if (ini_get("open_basedir")) {
      Warn($GLOBALS['I18N']->get('warnopenbasedir'));
    }
    Warn($GLOBALS['I18N']->get('warnattachmentrepository'));
  }
}

# always allow access to the about page
if (isset($_GET['page']) && $_GET['page'] == 'about') {
  $page = 'about';
  $include = 'about.php';
}

# include some information
if (is_file("info/".$_SESSION['adminlanguage']['info']."/$include")) {
  @include "info/".$_SESSION['adminlanguage']['info']."/$include";
} else {
  @include "info/en/$include";
#  print "Not a file: "."info/".$adminlanguage["info"]."/$include";
}


/*
if (USEFCK) {
  $imgdir = getenv("DOCUMENT_ROOT").$GLOBALS["pageroot"].'/'.FCKIMAGES_DIR.'/';
  if (!is_dir($imgdir) || !is_writeable ($imgdir)) {
    Warn("The FCK image directory does not exist, or is not writable");
  }
}
*/

if (defined("USE_PDF") && USE_PDF && !defined('FPDF_VERSION')) {
  Warn($GLOBALS['I18N']->get('nofpdf'));
}

$this_doc = getenv("REQUEST_URI");
if (preg_match("#(.*?)/admin?$#i",$this_doc,$regs)) {
  $check_pageroot = $pageroot;
  $check_pageroot = preg_replace('#/$#','',$check_pageroot);
  if ($check_pageroot != $regs[1] && WARN_ABOUT_PHP_SETTINGS)
    Warn($GLOBALS['I18N']->get('warnpageroot'));
}
clearstatcache();
if (checkAccess($page,"") || $page == 'about') {
  if (!$_GET['pi'] && (is_file($include) || is_link($include))) {
    # check whether there is a language file to include
    if (is_file("lan/".$_SESSION['adminlanguage']['iso']."/".$include)) {
      include "lan/".$_SESSION['adminlanguage']['iso']."/".$include;
    }
  #  print "Including $include<br/>";

    # hmm, pre-parsing and capturing the error would be nice
    #$parses_ok = eval(@file_get_contents($include));
    $parses_ok = 1;

    if (!$parses_ok) {
      print Error("cannot parse $include");
      print '<p>Sorry, an error occurred. This is a bug. Please <a href="http://mantis.phplist.com">report the bug to the Bug Tracker</a><br/>Sorry for the inconvenience</a></p>';
    } else {
      if (isset($GLOBALS['developer_email'])) {
        include $include;
      } else {
        @include $include;
      }
    }
  #  print "End of inclusion<br/>";
  } elseif ($_GET['pi'] && isset($GLOBALS['plugins']) && is_array($GLOBALS['plugins']) && is_object($GLOBALS['plugins'][$_GET['pi']])) {
    $plugin = $GLOBALS["plugins"][$_GET["pi"]];
    $menu = $plugin->adminmenu();
    if (is_file($plugin->coderoot . $include)) {
      include ($plugin->coderoot . $include);
    } elseif ($include == 'main.php') {
      print '<h1>'.$plugin->name.'</h1><ul>';
      foreach ($menu as $page => $desc) {
        print '<li>'.PageLink2($page,$desc).'</li>';
      }
      print '</ul>';
    } else {
      print '<br/>'."$page -&gt; ".$I18N->get("pagenotfoundinplugin").'<br/>';#.' '.$plugin->coderoot.$include.'<br/>';
      #print $plugin->coderoot . "$include";
    }
  } else {
    if ($GLOBALS["commandline"]) {
      clineError("Sorry, that module does not exist");
      exit;
    }

    print "$page -&gt; ".$GLOBALS['I18N']->get('notimplemented');
  }
} else {
  Error($GLOBALS['I18N']->get('noaccess'));
}

# some debugging stuff
if (ereg("dev",VERSION)) {
  $now =  gettimeofday();
  $finished = $now["sec"] * 1000000 + $now["usec"];
  $elapsed = $finished - $GLOBALS["pagestats"]["time_start"];
  $elapsed = ($elapsed / 1000000);
#  print "\n\n".'<!--';
  print '<br clear="all" /><font style="{font-size:8;font-color:#cccccc}">';
  print $GLOBALS["pagestats"]["number_of_queries"]." db queries in $elapsed seconds";
  print '</font>';
  if (isset($GLOBALS["statslog"])) {
    if ($fp = @fopen($GLOBALS["statslog"],"a")) {
      @fwrite($fp,getenv("REQUEST_URI")."\t".$GLOBALS["pagestats"]["number_of_queries"]."\t$elapsed\n");
    }
  }
#  print '-->';
}

if (isset($GLOBALS["commandline"]) && $GLOBALS["commandline"]) {
  ob_clean();
  exit;
} elseif (!isset($_GET["omitall"])) {
  if (!$GLOBALS['compression_used']) {
    @ob_end_flush();
  }
  include_once "footer.inc";
}

function parseCline() {
  $res = array();
  $cur = "";
  foreach ($GLOBALS["argv"] as $clinearg) {
    if (substr($clinearg,0,1) == "-") {
      $par = substr($clinearg,1,1);
      $clinearg = substr($clinearg,2,strlen($clinearg));
     # $res[$par] = "";
      $cur = strtolower($par);
      $res[$cur] .= $clinearg;
     } elseif ($cur) {
      if ($res[$cur])
        $res[$cur] .= ' '.$clinearg;
      else
        $res[$cur] .= $clinearg;
    }
  }
/*  ob_end_clean();
  foreach ($res as $key => $val) {
    print "$key = $val\n";
  }
  ob_start();*/
  return $res;
}

