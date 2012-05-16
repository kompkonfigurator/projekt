<?php
require_once dirname(__FILE__)."/accesscheck.php";
# library used for plugging into the webbler, instead of "connect"
# depricated and should be removed

#error_reporting(63);

# set some defaults if they are not specified
if (!defined("REGISTER")) define("REGISTER",1);
if (!defined("USE_PDF")) define("USE_PDF",0);
if (!defined("VERBOSE")) define("VERBOSE",0);
if (!defined("ENABLE_RSS")) define("ENABLE_RSS",0);
if (!defined("ALLOW_ATTACHMENTS")) define("ALLOW_ATTACHMENTS",0);
if (!defined("EMAILTEXTCREDITS")) define("EMAILTEXTCREDITS",0);
if (!defined("PAGETEXTCREDITS")) define("PAGETEXTCREDITS",0);
if (!defined("USEFCK")) define("USEFCK",0);
if (!defined("ASKFORPASSWORD")) define("ASKFORPASSWORD",0);
if (!defined("UNSUBSCRIBE_REQUIRES_PASSWORD")) define("UNSUBSCRIBE_REQUIRES_PASSWORD",0);
if (!defined("UNSUBSCRIBE_JUMPOFF")) define("UNSUBSCRIBE_JUMPOFF",0);
if (!defined("ENCRYPTPASSWORD")) define("ENCRYPTPASSWORD",0);
if (!defined("PHPMAILER")) define("PHPMAILER",0);
if (!defined("MANUALLY_PROCESS_QUEUE")) define("MANUALLY_PROCESS_QUEUE",1);
if (!defined("CHECK_SESSIONIP")) define("CHECK_SESSIONIP",1);
if (!defined("FILESYSTEM_ATTACHMENTS")) define("FILESYSTEM_ATTACHMENTS",0);
if (!defined("MIMETYPES_FILE")) define("MIMETYPES_FILE","/etc/mime.types");
if (!defined("DEFAULT_MIMETYPE")) define("DEFAULT_MIMETYPE","application/octet-stream");
if (!defined("USE_REPETITION")) define("USE_REPETITION",0);
if (!defined("USE_EDITMESSAGE")) define("USE_EDITMESSAGE",0);
if (!defined("FCKIMAGES_DIR")) define("FCKIMAGES_DIR","uploadimages");
if (!defined("USE_MANUAL_TEXT_PART")) define("USE_MANUAL_TEXT_PART",0);
if (!defined("ALLOW_NON_LIST_SUBSCRIBE")) define("ALLOW_NON_LIST_SUBSCRIBE",0);
if (!defined("MAILQUEUE_BATCH_SIZE")) define("MAILQUEUE_BATCH_SIZE",0);
if (!defined("MAILQUEUE_BATCH_PERIOD")) define("MAILQUEUE_BATCH_PERIOD",3600);
if (!defined('MAILQUEUE_THROTTLE')) define('MAILQUEUE_THROTTLE',0);
if (!defined('MAILQUEUE_AUTOTHROTTLE')) define('MAILQUEUE_AUTOTHROTTLE',0);
if (!defined("NAME")) define("NAME",'phplist');
if (!defined("USE_OUTLOOK_OPTIMIZED_HTML")) define("USE_OUTLOOK_OPTIMIZED_HTML",0);
if (!defined("EXPORT_EXCEL")) define("EXPORT_EXCEL",0);
if (!defined("USE_PREPARE")) define("USE_PREPARE",0);
if (!defined("HTMLEMAIL_ENCODING")) define("HTMLEMAIL_ENCODING","quoted-printable");
if (!defined('TEXTEMAIL_ENCODING')) define('TEXTEMAIL_ENCODING','7bit');
if (!defined("USE_LIST_EXCLUDE")) define("USE_LIST_EXCLUDE",0);
if (!defined("WARN_SAVECHANGES")) define("WARN_SAVECHANGES",1);
if (!defined("STACKED_ATTRIBUTE_SELECTION")) define("STACKED_ATTRIBUTE_SELECTION",0);
if (!defined("REMOTE_URL_REFETCH_TIMEOUT")) define('REMOTE_URL_REFETCH_TIMEOUT',3600);
if (!defined('CLICKTRACK')) define('CLICKTRACK',0);
if (!defined('CLICKTRACK_SHOWDETAIL')) define('CLICKTRACK_SHOWDETAIL',0);
if (!defined('USETINYMCEMESG')) define('USETINYMCEMESG',0);
if (!defined('USETINYMCETEMPL')) define('USETINYMCETEMPL',0);
if (!defined('TINYMCEPATH')) define('TINYMCEPATH','');
if (!defined('STATS_INTERVAL')) define('STATS_INTERVAL','monthly');
if (!defined('USE_DOMAIN_THROTTLE')) define('USE_DOMAIN_THROTTLE',0);
if (!defined('DOMAIN_BATCH_SIZE')) define('DOMAIN_BATCH_SIZE',1);
if (!defined('DOMAIN_BATCH_PERIOD')) define('DOMAIN_BATCH_PERIOD',120);
if (!defined('DOMAIN_AUTO_THROTTLE')) define('DOMAIN_AUTO_THROTTLE',0);
if (!defined('LANGUAGE_SWITCH')) define('LANGUAGE_SWITCH',1);
if (!defined('USE_ADVANCED_BOUNCEHANDLING')) define('USE_ADVANCED_BOUNCEHANDLING',0);
if (!defined('DATE_START_YEAR')) define('DATE_START_YEAR',1900);
if (!defined('DATE_END_YEAR')) define('DATE_END_YEAR',0);
if (!defined('ALLOW_IMPORT')) define('ALLOW_IMPORT',1);
if (!defined('EMPTY_VALUE_PREFIX')) define('EMPTY_VALUE_PREFIX','--');
if (!defined('USE_ADMIN_DETAILS_FOR_MESSAGES')) define('USE_ADMIN_DETAILS_FOR_MESSAGES',1);
if (!defined('SEND_ONE_TESTMAIL')) define('SEND_ONE_TESTMAIL',0);
if (!defined('USE_SPAM_BLOCK')) define('USE_SPAM_BLOCK',1);
if (!defined('NOTIFY_SPAM')) define('NOTIFY_SPAM',1);
if (!defined('FORWARD_ALTERNATIVE_CONTENT')) define('FORWARD_ALTERNATIVE_CONTENT',0);
if (!defined('KEEPFORWARDERATTRIBUTES')) define('KEEPFORWARDERATTRIBUTES',0);
if (!defined('FORWARD_EMAIL_COUNT') ) define('FORWARD_EMAIL_COUNT',1);
if (FORWARD_EMAIL_COUNT < 1) {Error('FORWARD_EMAIL_COUNT must be > (int) 0');}
# allows FORWARD_EMAIL_COUNT forwards per user per period in mysql interval terms default one day  
if (!defined('FORWARD_EMAIL_PERIOD') ) define('FORWARD_EMAIL_PERIOD', '1 day');
if (!defined('SEND_QUEUE_PROCESSING_REPORT')) define('SEND_QUEUE_PROCESSING_REPORT',true);
if (!defined('FORWARD_PERSONAL_NOTE_SIZE')) define('FORWARD_PERSONAL_NOTE_SIZE',0);
if (!defined('FORWARD_FRIEND_COUNT_ATTRIBUTE')) define('FORWARD_FRIEND_COUNT_ATTRIBUTE','');
if (!defined('EMBEDUPLOADIMAGES')) define('EMBEDUPLOADIMAGES',0);
if (!defined('IMPORT_FILESIZE'))  define('IMPORT_FILESIZE',1);
if (!defined('CHECK_REFERRER')) define('CHECK_REFERRER',false);
if (!defined("EMAIL_ADDRESS_VALIDATION_LEVEL")) define("EMAIL_ADDRESS_VALIDATION_LEVEL",1); 
if (!isset($GLOBALS["export_mimetype"])) $GLOBALS["export_mimetype"] = 'application/csv';
if (!isset($GLOBALS["admin_auth_module"])) $GLOBALS["admin_auth_module"] = 'phplist_auth.inc';
if (!isset($GLOBALS["require_login"])) $GLOBALS["require_login"] = 0;

if (!isset($allowed_referrers)) $allowed_referrers = array();

if (!defined("WORKAROUND_OUTLOOK_BUG") && defined("USE_CARRIAGE_RETURNS")) {
  define("WORKAROUND_OUTLOOK_BUG",USE_CARRIAGE_RETURNS);
}
if (!isset($GLOBALS["blacklist_gracetime"])) $GLOBALS["blacklist_gracetime"] = 5;
if (!isset($GLOBALS["message_envelope"])) $GLOBALS["message_envelope"] = '';

$domain = getConfig("domain");
$website = getConfig("website");

if (defined("IN_WEBBLER") && is_object($GLOBALS["config"]["plugins"]["phplist"])) {
  $GLOBALS["tables"] = $GLOBALS["config"]["plugins"]["phplist"]->tables;
  $GLOBALS["table_prefix"] = $GLOBALS["config"]["plugins"]["phplist"]->table_prefix;
}

$usephpmailer = 0;
if (PHPMAILER && is_file(dirname(__FILE__).'/phpmailer/class.phpmailer.php')) {
  include_once dirname(__FILE__) . '/class.phplistmailer.php';
  $usephpmailer = 1;
}

$GLOBALS['bounceruleactions'] = array(
  'deleteuser' => $GLOBALS['I18N']->get('delete user'),
  'unconfirmuser' => $GLOBALS['I18N']->get('unconfirm user'),
  'blacklistuser' => $GLOBALS['I18N']->get('blacklist user'),
  'deleteuserandbounce' => $GLOBALS['I18N']->get('delete user and bounce'),
  'unconfirmuseranddeletebounce' => $GLOBALS['I18N']->get('unconfirm user and delete bounce'),
  'blacklistuseranddeletebounce' => $GLOBALS['I18N']->get('blacklist user and delete bounce'),
  'deletebounce' => $GLOBALS['I18N']->get('delete bounce'),
);

# check whether Pear HTTP/Request is available
@include_once "HTTP/Request.php";
$GLOBALS['has_pear_http_request'] = class_exists('HTTP_Request');

ini_set('error_append_string','<font style=\"{font-variant: small-caps;font-size: 12px}\">phplist</font> version '.VERSION);
ini_set('error_prepend_string','<P><font color=red style=\"{font-size: 12px}\">Sorry a software error occurred:</font><br/>
  Please <a href="http://mantis.phplist.com">report a bug</a> when reporting the bug, please include URL and the entire content of this page.<br/>');

function listName($id) {
  global $tables;
  $req = Sql_Fetch_Row_Query(sprintf('select name from %s where id = %d',$tables["list"],$id));
  return $req[0] ? stripslashes($req[0]) : $GLOBALS['I18N']->get('Unnamed List');
}

function setMessageData($msgid,$name,$value) {
  Sql_Query(sprintf('replace into %s set id = %d,name = "%s", data = "%s"',
    $GLOBALS['tables']['messagedata'],$msgid,addslashes($name),$value));
#  print "setting $name for $msgid to $value";
#  exit;
}

function loadMessageData($msgid) {
  $messagedata = array();
  $msgdata_req = Sql_Query(sprintf('select * from %s where id = %d',
    $GLOBALS['tables']['messagedata'],$msgid));
  while ($row = Sql_Fetch_Array($msgdata_req)) {
    $messagedata[$row['name']] = $row['data'];
  }
  return $messagedata;
}

function HTMLselect ($name, $table, $column, $value) {
  $res = "<!--$value--><select name=$name>\n";
  $result = Sql_Query("SELECT id,$column FROM $table");
  while($row = Sql_Fetch_Array($result)) {
    $res .= "<option value=".$row["id"] ;
    if ($row["$column"] == $value)
      $res .= " selected";
    if ($row["id"] == $value)
      $res .= " selected";
    $res .= ">" . $row[$column] . "\n";
  }
  $res .= "</select>\n";
  return $res;
}

function sendMail ($to,$subject,$message,$header = "",$parameters = "",$skipblacklistcheck = 0) {
  if (TEST)
    return 1;

  # do a quick check on mail injection attempt, @@@ needs more work
  if (preg_match("/\n/",$to)) {
    logEvent("Error: invalid recipient, containing newlines, email blocked");
    return 0;
  }
  if (preg_match("/\n/",$subject)) {
    logEvent("Error: invalid subject, containing newlines, email blocked");
    return 0;
  }

  if (!$to)  {
    logEvent("Error: empty To: in message with subject $subject to send");
    return 0;
  } elseif (!$subject) {
    logEvent("Error: empty Subject: in message to send to $to");
    return 0;
  }
  if (!$skipblacklistcheck && isBlackListed($to)) {
    logEvent("Error, $to is blacklisted, not sending");
    Sql_Query(sprintf('update %s set blacklisted = 1 where email = "%s"',$GLOBALS["tables"]["user"],$to));
    addUserHistory($to,"Marked Blacklisted","Found user in blacklist while trying to send an email, marked black listed");
    return 0;
  }
  if ($GLOBALS['usephpmailer']) {
    return sendMailPhpMailer($to,$subject,$message);
  } else {
    return sendMailOriginal($to,$subject,$message,$header,$parameters);
  }
  return 0;
}


function sendMailOriginal ($to,$subject,$message,$header = "",$parameters = "") {
  # global function to capture sending emails, to avoid trouble with
  # older (and newer!) php versions
  $v = phpversion();
  $v = preg_replace("/\-.*$/","",$v);
  if ($GLOBALS["message_envelope"]) {
    $header = rtrim($header);
    if ($header)
      $header .= "\n";
    $header .= "Errors-To: ".$GLOBALS["message_envelope"];
    if (!$parameters || !ereg("-f".$GLOBALS["message_envelope"],$parameters)) {
      $parameters = '-f'.$GLOBALS["message_envelope"];
    }
  }

  // Use the system email encoding method
  if (TEXTEMAIL_ENCODING) {
    // only add if the required header is not already present
    if (!strpos(strtolower($header), 'content-transfer-encoding')) {
      $header = rtrim($header);
      if ($header)
        $header .= "\n";
      $header .= "Content-Transfer-Encoding: " . TEXTEMAIL_ENCODING;
    }
  }

  if (WORKAROUND_OUTLOOK_BUG) {
    $header = rtrim($header);
    if ($header)
      $header .= "\n";
     $header .= "X-Outlookbug-fixed: Yes";
    $message = preg_replace("/\r?\n/", "\r\n", $message);
  }

  # version 4.2.3 (and presumably up) does not allow the fifth parameter in safe mode
  # make sure not to send out loads of test emails to ppl when developing
  if (!ereg("dev",VERSION)) {
    if ($v > "4.0.5" && !ini_get("safe_mode")) {
      if (mail($to,$subject,$message,$header,$parameters))
        return 1;
      else
        return mail($to,$subject,$message,$header);
    }
    else
      return mail($to,$subject,$message,$header);
  } else {
    # send mails to one place when running a test version
    $message = "To: $to\n".$message;
    if ($GLOBALS["developer_email"]) {
      # fake occasional failure
      if (mt_rand(0,50) == 1) {
        return 0;
      } else {
        if(@mail($GLOBALS["developer_email"],$subject,$message,$header,$parameters)) {
          return 1;
        } else {
          # Changed by Bas: Always ok, since the mac/xampp return false while sending and no error in /var/log/mail.log
          # We are in developermode anyway, and errors are faked by code just above this.
          mail($GLOBALS["developer_email"],$subject,$message,$header);
          return 1;
        }
      }
    } else {
      print "Error: Running CVS version, but developer_email not set";
    }
  }
}

function sendMailPhpMailer ($to,$subject,$message) {
  # global function to capture sending emails, to avoid trouble with
  # older (and newer!) php versions
  $fromemail = getConfig("message_from_address");
  $fromname = getConfig("message_from_name");
  $message_replyto_address = getConfig("message_replyto_address");
  if ($message_replyto_address)
    $reply_to = $message_replyto_address;
  else
    $reply_to = $from_address;
  $destinationemail = '';

  if (!ereg("dev",VERSION)) {
    $mail = new PHPlistMailer('systemmessage',$to);
    $destinationemail = $to;
    $mail->add_text($message);
  } else {
    # send mails to one place when running a test version
    $message = "To: $to\n".$message;
    if ($GLOBALS["developer_email"]) {
      # fake occasional failure
      if (mt_rand(0,50) == 1) {
        return 0;
      } else {
        $mail = new PHPlistMailer('systemmessage',$GLOBALS["developer_email"]);
        $mail->add_text($message);
        $destinationemail = $GLOBALS["developer_email"];
      }
    } else {
      print "Error: Running CVS version, but developer_email not set";
    }
  }
  # 0008549: message envelope not passed to php mailer,
  $mail->Sender = $GLOBALS["message_envelope"]; 
  
  $mail->build_message(
      array(
        "html_charset" => getConfig("html_charset"),
        "html_encoding" => HTMLEMAIL_ENCODING,
        "text_charset" => getConfig("text_charset"),
        "text_encoding" => TEXTEMAIL_ENCODING)
      );
  return $mail->send("", $destinationemail, $fromname, $fromemail, $subject);
}


function sendAdminCopy($subject,$message) {
  $sendcopy = getConfig("send_admin_copies");
  if ($sendcopy == "true") {
    $admin_mail = getConfig("admin_address");
    $mails = explode(",",getConfig("admin_addresses"));
    array_push($mails,$admin_mail);
    $sent = array();
    foreach ($mails as $admin_mail) {
      $admin_mail = trim($admin_mail);
      if (!$sent[$admin_mail] && $admin_mail) {
        sendMail($admin_mail,$subject,$message,system_messageheaders($admin_mail));
        $sent[$admin_mail] = 1;
       }
     }
  }
}

function safeImageName($name) {
  $name = "image".ereg_replace("\.","DOT",$name);
  $name = ereg_replace("-","DASH",$name);
  $name = ereg_replace("_","US",$name);
  $name = ereg_replace("/","SLASH",$name);
  $name = ereg_replace(':','COLON',$name);
  return $name;
}

function clean2 ($value) {
  $value = trim($value);
  $value = ereg_replace("\r","",$value);
  $value = ereg_replace("\n","",$value);
  $value = ereg_replace('"',"&quot;",$value);
  $value = ereg_replace("'","&rsquo;",$value);
  $value = ereg_replace("`","&lsquo;",$value);
  $value = stripslashes($value);
  return $value;
}

function cleanEmail ($value) {
  $value = trim($value);
  $value = preg_replace("/\r/","",$value);
  $value = preg_replace("/\n/","",$value);
  $value = preg_replace('/"/',"&quot;",$value);
  ## these are allowed in emails
//  $value = preg_replace("/'/","&rsquo;",$value);
  $value = preg_replace("/`/","&lsquo;",$value);
  $value = stripslashes($value);
  return $value;
}

if (TEST && REGISTER)
  $pixel = '<img src="http://powered.phplist.com/images/pixel.gif" width=1 height=1>';


function timeDiff($time1,$time2) {
  if (!$time1 || !$time2) {
    return $GLOBALS['I18N']->get('Unknown');
   }
  $t1 = strtotime($time1);
  $t2 = strtotime($time2);

  if ($t1 < $t2) {
    $diff = $t2 - $t1;
  } else {
    $diff = $t1 - $t2;
  }
  if ($diff == 0)
    return $GLOBALS['I18N']->get('very little time');
  $hours = (int)($diff / 3600);
  $mins = (int)(($diff - ($hours * 3600)) / 60);
  $secs = (int)($diff - $hours * 3600 - $mins * 60);

  $res = '';
  if ($hours)
    $res = $hours . " hours";
  if ($mins)
    $res .= " ".$mins . " mins";
  if ($secs)
    $res .= " ".$secs . " secs";
  return $res;
}

function previewTemplate($id,$adminid = 0,$text = "", $footer = "") {
  global $tables;
  if (defined("IN_WEBBLER")) {
    $more = '&pi='.$_GET["pi"];
  } else {
    $more = '';
  }
  $tmpl = Sql_Fetch_Row_Query(sprintf('select template from %s where id = %d',$tables["template"],$id));
  $template = stripslashes($tmpl[0]);
  $img_req = Sql_Query(sprintf('select id,filename from %s where template = %d order by filename desc',$tables["templateimage"],$id));
  while ($img = Sql_Fetch_Array($img_req)) {
    $template = preg_replace("#".preg_quote($img["filename"])."#","?page=image&id=".$img["id"].$more,$template);
  }
  if ($adminid) {
    $att_req = Sql_Query("select name,value from {$tables["adminattribute"]},{$tables["admin_attribute"]} where {$tables["adminattribute"]}.id = {$tables["admin_attribute"]}.adminattributeid and {$tables["admin_attribute"]}.adminid = $adminid");
    while ($att = Sql_Fetch_Array($att_req)) {
      $template = preg_replace("#\[LISTOWNER.".strtoupper(preg_quote($att["name"]))."\]#",$att["value"],$template);
    }
  }
  if ($footer)
    $template = eregi_replace("\[FOOTER\]",$footer,$template);
  $template = preg_replace("#\[CONTENT\]#",$text,$template);
  $template = eregi_replace("\[UNSUBSCRIBE\]",sprintf('<a href="%s">%s</a>',getConfig("unsubscribeurl"),$GLOBALS["strThisLink"]),$template);
  #0013076: Blacklisting posibility for unknown users
  $template = eregi_replace("\[BLACKLIST\]",sprintf('<a href="%s">%s</a>',getConfig("blacklisturl"),$GLOBALS["strThisLink"]),$template);
  $template = eregi_replace("\[PREFERENCES\]",sprintf('<a href="%s">%s</a>',getConfig("preferencesurl"),$GLOBALS["strThisLink"]),$template);
  if (!EMAILTEXTCREDITS) {
    $template = eregi_replace("\[SIGNATURE\]",$GLOBALS["PoweredByImage"],$template);
  } else {
    $template = eregi_replace("\[SIGNATURE\]",$GLOBALS["PoweredByText"],$template);
  }
  $template = ereg_replace("\[[A-Z\. ]+\]","",$template);
  $template = ereg_replace('<form','< form',$template);
  $template = ereg_replace('</form','< /form',$template);

  return $template;
}


function parseMessage($content,$template,$adminid = 0) {
  global $tables;
  $tmpl = Sql_Fetch_Row_Query("select template from {$tables["template"]} where id = $template");
  $template = $tmpl[0];
  $template = preg_replace("#\[CONTENT\]#",$content,$template);
  $att_req = Sql_Query("select name,value from {$tables["adminattribute"]},{$tables["admin_attribute"]} where {$tables["adminattribute"]}.id = {$tables["admin_attribute"]}.adminattributeid and {$tables["admin_attribute"]}.adminid = $adminid");
  while ($att = Sql_Fetch_Array($att_req)) {
    $template = preg_replace("#\[LISTOWNER.".strtoupper(preg_quote($att["name"]))."\]#",$att["value"],$template);
  }
  return $template;
}

function listOwner($listid = 0) {
  global $tables;
  $req = Sql_Fetch_Row_Query("select owner from {$tables["list"]} where id = $listid");
  return $req[0];
}

function system_messageHeaders($useremail = "") {
  $from_address = getConfig("message_from_address");
  $from_name = getConfig("message_from_name");
  if ($from_name)
    $additional_headers = "From: \"$from_name\" <$from_address>\n";
  else
    $additional_headers = "From: $from_address\n";
  $message_replyto_address = getConfig("message_replyto_address");
  if ($message_replyto_address)
    $additional_headers .= "Reply-To: $message_replyto_address\n";
  else
    $additional_headers .= "Reply-To: $from_address\n";
  $v = VERSION;
  $v = ereg_replace("-dev","",$v);
  $additional_headers .= "X-Mailer: phplist version $v (www.phplist.com)\n";
  $additional_headers .= "X-MessageID: systemmessage\n";
  if ($useremail)
    $additional_headers .= "X-User: ".$useremail."\n";
  return $additional_headers;
}

function logEvent($msg) {
  global $tables;
  if (isset($GLOBALS['page'])) {
    $p = $GLOBALS['page'];
  } elseif (isset($_GET['page'])) {
    $p = $_GET['page'];
  } elseif (isset($_GET['p'])) {
    $p = $_GET['p'];
  } else {
    $p = 'unknown page';
  }
  $p = removeXss($p);
  if (Sql_Table_Exists($tables["eventlog"]))
  Sql_Query(sprintf('insert into %s (entered,page,entry) values(now(),"%s","%s")',$tables["eventlog"],
    sql_escape($p),htmlspecialchars(sql_escape($msg))));
}

### process locking stuff
function getPageLock() {
  global $tables;
  $thispage = $GLOBALS["page"];
  $running_req = Sql_query("select now() - modified,id from ".$tables["sendprocess"]." where page = \"$thispage\" and alive order by started desc");
  $running_res = Sql_Fetch_row($running_req);
  $waited = 0;
  while ($running_res[1]) { # a process is already running
    if ($running_res[0] > 600) {# some sql queries can take quite a while
      # process has been inactive for too long, kill it
      Sql_query("update {$tables["sendprocess"]} set alive = 0 where id = $running_res[1]");
    } else {
      output ($GLOBALS['I18N']->get('A process for this page is already running and it was still alive').' '.$running_res[0].' '.$GLOBALS['I18N']->get('seconds ago'));
      sleep(1); # to log the messages in the correct order
      if ($GLOBALS["commandline"]) {
        output("Running commandline, quitting. We'll find out what to do in the next run.");
        exit;
      }
      output ($GLOBALS['I18N']->get('Sleeping for 20 seconds, aborting will quit'));
      flush();
      $abort = ignore_user_abort(0);
      sleep(20);
    }
    $waited++;
    if ($waited > 10) {
      # we have waited 10 cycles, abort and quit script
      output($GLOBALS['I18N']->get('We have been waiting too long, I guess the other process is still going ok'));
      exit;
    }
    $running_req = Sql_query("select now() - modified,id from ".$tables["sendprocess"]." where page = \"$thispage\" and alive order by started desc");
    $running_res = Sql_Fetch_row($running_req);
  }
  $res = Sql_query('insert into '.$tables["sendprocess"].' (started,page,alive,ipaddress) values(now(),"'.$thispage.'",1,"'.getenv("REMOTE_ADDR").'")');
  $send_process_id = Sql_Insert_Id();
  $abort = ignore_user_abort(1);
  return $send_process_id;
}

function keepLock($processid) {
  global $tables;
  $thispage = $GLOBALS["page"];
  Sql_query("Update ".$tables["sendprocess"]." set alive = alive + 1 where id = $processid");
}

function checkLock($processid) {
  global $tables;
  $thispage = $GLOBALS["page"];
  $res = Sql_query("select alive from {$tables['sendprocess']} where id = $processid");
  $row = Sql_Fetch_Row($res);
  return $row[0];
}

function addAbsoluteResources($text,$url) {
  $parts = parse_url($url);
  $tags = array('src\s*=\s*','href\s*=\s*','action\s*=\s*',
    'background\s*=\s*','@import\s+','@import\s+url\(');
  foreach ($tags as $tag) {
#   preg_match_all('/'.preg_quote($tag).'"([^"|\#]*)"/Uim', $text, $foundtags);
# we're only handling nicely formatted src="something" and not src=something, ie quotes are required
# bit of a nightmare to not handle it with quotes.
    preg_match_all('/('.$tag.')"([^"|\#]*)"/Uim', $text, $foundtags);
    for ($i=0; $i< count($foundtags[0]); $i++) {
      $match = $foundtags[2][$i];
      $tagmatch = $foundtags[1][$i];
#      print "$match<br/>";
      if (preg_match("#^(http|javascript|https|ftp|mailto):#i",$match)) {
        # scheme exists, leave it alone
      } elseif (preg_match("#\[.*\]#U",$match)) {
        # placeholders used, leave alone as well
      } elseif (ereg("^/",$match)) {
        # starts with /
        $text = preg_replace('#'.preg_quote($foundtags[0][$i]).'#im',$tagmatch.'"'.$parts["scheme"].'://'.$parts["host"].$match.'"',$text,1);
      } else {
        $path = '';
        if (isset($parts['path'])) {
          $path = $parts["path"];
        }
        if (!preg_match('#/$#',$path)) {
          $pathparts = explode('/',$path);
          array_pop($pathparts);
          $path = join('/',$pathparts);
          $path .= '/';
        }
        $text = preg_replace('#'.preg_quote($foundtags[0][$i]).'#im',
          $tagmatch.'"'.$parts["scheme"].'://'.$parts["host"].$path.$match.'"',$text,1);
      }
    }
  }

 # $text = preg_replace('#PHPSESSID=[^\s]+
  return $text;
}

function getPageCache($url,$lastmodified = 0) {
  $req = Sql_Fetch_Row_Query(sprintf('select content from %s where url = "%s" and lastmodified >= %d',$GLOBALS["tables"]["urlcache"],$url,$lastmodified));
  return $req[0];
}

function getPageCacheLastModified($url) {
  $req = Sql_Fetch_Row_Query(sprintf('select lastmodified from %s where url = "%s"',$GLOBALS["tables"]["urlcache"],$url));
  return $req[0];
}

function setPageCache($url,$lastmodified = 0,$content) {
  if (isset($GLOBALS['developer_email'])) return;
  Sql_Query(sprintf('delete from %s where url = "%s"',$GLOBALS["tables"]["urlcache"],$url));
  Sql_Query(sprintf('insert into %s (url,lastmodified,added,content)
    values("%s",%d,now(),"%s")',$GLOBALS["tables"]["urlcache"],$url,$lastmodified,addslashes($content)));
}

function fetchUrl($url,$userdata = array()) {
  require_once "HTTP/Request.php";
 # logEvent("Fetching $url");
  if (sizeof($userdata)) {
    foreach ($userdata as $key => $val) {
      $url = eregi_replace("\[$key\]",urlencode($val),$url);
    }
  }

  if (!isset($GLOBALS['urlcache'])) {
    $GLOBALS['urlcache'] = array();
  }

  # keep in memory cache in case we send a page to many emails
  if (isset($GLOBALS['urlcache'][$url]) && is_array($GLOBALS['urlcache'][$url])
    && (time() - $GLOBALS['urlcache'][$url]['fetched'] < REMOTE_URL_REFETCH_TIMEOUT)) {
#     logEvent($url . " is cached in memory");
      return $GLOBALS['urlcache'][$url]['content'];
  }

  $dbcache_lastmodified = getPageCacheLastModified($url);
  $timeout = time() - $dbcache_lastmodified;
  if ($timeout < REMOTE_URL_REFETCH_TIMEOUT) {
#    logEvent($url.' was cached in database');
    return getPageCache($url);
  } else {
#    logEvent($url.' is not cached in database '.$timeout.' '. $dbcache_lastmodified." ".time());
  }

  # add a small timeout, although the biggest timeout will exist in doing the DNS lookup,
  # so it won't make too much of a difference
  $request_parameters = array(
    'timeout' => 10,
    'allowRedirects' => 1,
    'method' => 'HEAD',
  );
  $headreq =& new HTTP_Request($url,$request_parameters);
  $headreq->addHeader('User-Agent', 'phplist v'.VERSION.' (http://www.phplist.com)');
  if (!PEAR::isError($headreq->sendRequest(false))) {
    $code = $headreq->getResponseCode();
    if ($code != 200) {
      logEvent('Fetching '.$url.' failed, error code '.$code);
      return 0;
    }
    $header = $headreq->getResponseHeader();

    ## relying on the last modified header doesn't work for many pages
    ## use current time instead
    ## see http://mantis.phplist.com/view.php?id=7684
#    $lastmodified = strtotime($header["last-modified"]);
    $lastmodified = time();
    $cache = getPageCache($url,$lastmodified);
    if (!$cache) {
      $request_parameters['method'] = 'GET';
      $req =& new HTTP_Request($url,$request_parameters);
      $req->addHeader('User-Agent', 'phplist v'.VERSION.' (http://www.phplist.com)');
      logEvent('Fetching '.$url);
      if (!PEAR::isError($req->sendRequest(true))) {
        $content = $req->getResponseBody();
        $content = addAbsoluteResources($content,$url);
        logEvent('Fetching '.$url.' success');
        setPageCache($url,$lastmodified,$content);
      } else {
        logEvent('Fetching '.$url.' failed');
        return 0;
      }
    } else {
      logEvent($url.' was cached in database');
      $content = $cache;
    }
  } else {
    logEvent('Fetching '.$url.' failed');
    return 0;
  }
  $GLOBALS['urlcache'][$url] = array(
    'fetched' => time(),
    'content' => $content,
  );
  return $content;
}

function releaseLock($processid) {
  global $tables;
  if (!$processid) return;
  Sql_query("delete from {$tables["sendprocess"]} where id = $processid");
}

function cleanUrl($url,$disallowed_params = array('PHPSESSID')) {
  $parsed = @parse_url($url);
  $params = array();

  if (empty($parsed['query'])) {
    $parsed['query'] = '';
  }
  # hmm parse_str should take the delimiters as a parameter
  if (strpos($parsed['query'],'&amp;')) {
    $pairs = explode('&amp;',$parsed['query']);
    foreach ($pairs as $pair) {
      list($key,$val) = explode('=',$pair);
      $params[$key] = $val;
    }
  } else {
    parse_str($parsed['query'],$params);
  }
  $uri = !empty($parsed['scheme']) ? $parsed['scheme'].':'.((strtolower($parsed['scheme']) == 'mailto') ? '':'//'): '';
  $uri .= !empty($parsed['user']) ? $parsed['user'].(!empty($parsed['pass'])? ':'.$parsed['pass']:'').'@':'';
  $uri .= !empty($parsed['host']) ? $parsed['host'] : '';
  $uri .= !empty($parsed['port']) ? ':'.$parsed['port'] : '';
  $uri .= !empty($parsed['path']) ? $parsed['path'] : '';
#  $uri .= $parsed['query'] ? '?'.$parsed['query'] : '';
  $query = '';
  foreach ($params as $key => $val) {
    if (!in_array($key,$disallowed_params)) {
      //0008980: Link Conversion for Click Tracking. no = will be added if key is empty.
      $query .= $key . ( $val ? '=' . $val . '&' : '&' );
    }
  }
  $query = substr($query,0,-1);
  $uri .= $query ? '?'.$query : '';
#  if (!empty($params['p'])) {
#    $uri .= '?p='.$params['p'];
#  }
  $uri .= !empty($parsed['fragment']) ? '#'.$parsed['fragment'] : '';
  return $uri;
}

function adminName($id = 0) {
  if (!$id) {
    $id = $_SESSION["logindetails"]["id"];
  }
  if (is_object($GLOBALS["admin_auth"])) {
    return $GLOBALS["admin_auth"]->adminName($id);
  }
  $req = Sql_Fetch_Row_Query(sprintf('select loginname from %s where id = %d',$GLOBALS["tables"]["admin"],$id));
  return $req[0] ? $req[0] : "<font color=red>Nobody</font>";
}

//if (!function_exists("dbg")) {
//  function dbg($msg,$logfile = "") {
//    if (!$logfile) return;
//    $fp = @fopen($logfile,"a");
//    $line = "[".date("d M Y, H:i:s")."] ".getenv("REQUEST_URI").'('.$config["stats"]["number_of_queries"].") $msg \n";
//    @fwrite($fp,$line);
//    @fclose($fp);
//  }
//}

function addSubscriberStatistics($item = '',$amount,$list = 0) {
  switch (STATS_INTERVAL) {
    case 'monthly':
      # mark everything as the first day of the month
      $time = mktime(0,0,0,date('m'),1,date('Y'));
      break;
    case 'weekly':
      # mark everything for the first sunday of the week
      $time = mktime(0,0,0,date('m'),date('d') - date('w'),date('Y'));
      break;
    case 'daily':
      $time = mktime(0,0,0,date('m'),date('d'),date('Y'));
      break;
  }
  Sql_Query(sprintf('update %s set value = value + %d where unixdate = %d and item = "%s" and listid = %d',
    $GLOBALS['tables']['userstats'],$amount,$time,$item,$list));
  $done = Sql_Affected_Rows();
  if (!$done) {
    Sql_Query(sprintf('insert into %s set value = %d,unixdate = %d,item = "%s",listid = %d',
      $GLOBALS['tables']['userstats'],$amount,$time,$item,$list));
  }
}

function deleteBounce($id = 0) {
  if (!$id) return;
  $id = sprintf('%d',$id);
  Sql_query(sprintf('delete from %s where id = %d',$GLOBALS['tables']['bounce'],$id));
  Sql_query(sprintf('delete from %s where bounce = %d',$GLOBALS['tables']['user_message_bounce'],$id));
  Sql_query(sprintf('delete from %s where bounce = %d',$GLOBALS['tables']['bounceregex_bounce'],$id));
}

function reverse_htmlentities($mixed)
{
   $htmltable = get_html_translation_table(HTML_ENTITIES);
   foreach($htmltable as $key => $value)
   {
       $mixed = ereg_replace(addslashes($value),$key,$mixed);
   }
   return $mixed;
}

function loadBounceRules($all = 0) {
  if ($all) {
    $status = '';
  } else {
    $status = ' where status = "active"';
  }
  $result = array();
  $req = Sql_Query(sprintf('select * from %s %s order by listorder',$GLOBALS['tables']['bounceregex'],$status));
  while ($row = Sql_Fetch_Array($req)) {
    if ($row['regex'] && $row['action']) {
      $result[$row['regex']] = array(
        'action' => $row['action'],
        'id' => $row['id']
      );
    }
  }
  return $result;
}

function matchedBounceRule($text,$activeonly = 0) {
  if ($activeonly) {
    $status = ' where status = "active"';
  } else {
    $status = '';
  }
  $req = Sql_Query(sprintf('select * from %s %s order by listorder',$GLOBALS['tables']['bounceregex'],$status));
  while ($row = Sql_Fetch_Array($req)) {
    $pattern = str_replace(' ','\s+',$row['regex']);
 #   print "Trying to match ".$pattern;
    #print ' with '.$text;
 #   print '<br/>';
    if (@preg_match('/'.preg_quote($pattern).'/iUm',$text)) {
      return $row['id'];
    } elseif (@preg_match('/'.$pattern.'/iUm',$text)) {
      return $row['id'];
    }
  }
  return '';
}

function matchBounceRules($text,$rules = array()) {
  if (!sizeof($rules)) {
    $rules = loadBounceRules();
  }

  foreach ($rules as $pattern => $rule) {
    $pattern = str_replace(' ','\s+',$pattern);
    if (@preg_match('/'.preg_quote($pattern).'/iUm',$text)) {
      return $rule;
    } elseif (@preg_match('/'.$pattern.'/iUm',$text)) {
      return $rule;
    } else {
#      print "Trying to match $pattern failed<br/>";
    }
  }
  return '';
}

function validateRssFrequency($freq = '') {
  if (!$freq) return '';
  if (in_array($freq,array_keys($GLOBALS['rssfrequencies']))) {
    return $freq;
  }
  return '';
}

function strip_newlines( $str, $placeholder = '' ) {
  $str = str_replace(chr(13) . chr(10), $placeholder , $str);
  $str = str_replace(chr(10), $placeholder , $str);
  $str = str_replace(chr(13), $placeholder , $str);
  return $str;
}

class timer {
  var $start;

  function timer() {
    $now =  gettimeofday();
    $this->start = $now["sec"] * 1000000 + $now["usec"];
  }

  function elapsed($seconds = 0) {
    $now = gettimeofday();
    $end = $now["sec"] * 1000000 + $now["usec"];
    $elapsed = $end - $this->start;
    if ($seconds) {
      return $elapsed / 1000000;
    } else {
      return $elapsed;
    }
  }

}

?>
