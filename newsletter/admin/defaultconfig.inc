<?php


# default configuration. These values can be changed
# via the admin page, so you do not need to edit them here
# they are used to initialise things
# if you *do* edit them, make sure they stay in the correct format
# otherwise you will end up with parse errors and things will stop working

$defaultheader = '
<link href="styles/phplist.css" type="text/css" rel="stylesheet">

</head>
<body bgcolor="#ffffff">
<a name="top"></a>
<div align=center>
<table cellspacing=0 cellpadding=0 width=710 border=0>

<tr>
<td bgcolor="#000000" rowspan=3><img height=1 alt="" src="images/transparent.png" width=1 border=0></td>
<td bgcolor="#000000"><img height=1 alt="" src="images/transparent.png" width=708 border=0></td>
<td bgcolor="#000000" rowspan=3><img height=1 alt="" src="images/transparent.png" width=1 border=0></td>
</tr>

<tr valign="top">
<td>
<!--TOP TABLE starts-->
<table cellspacing=0 cellpadding=0 width=708 border="0" bgcolor="#ffffff">

<tr valign="top">
<td height="41" background="images/top01.png" colspan="2">
<span class="phphead"><a href="http://www.phplist.com" class="phphead"><b>PHP</b>list</a></span></td>
<td background="images/top02.png" align="left">
<font size="-2">&nbsp;<i>powered by:
</i><br />&nbsp;<b>[<a class="powered" href="http://www.php.net/" target="_new"><i>PHP</i></a>]</b> + <b>[<a class="powered" href="http://www.mysql.com/" target="_new">mySQL</a>]</b></font></td>
</tr>

<tr valign="bottom">
<td><img src="images/top03a.png" width=20 height=34 alt="" border="0"></td>
<td background="images/top03b.png" height="34"><!--hello <b>ben</b>:&nbsp;<a class="urhere" href="">you are here &gt; main admin</a>-->
<td width="132" valign="bottom" background="images/top04.png"><span class="webblermenu">phplist</span></td>
</tr>

<tr>
<td bgcolor="#000000"><img height=1 alt="" src="images/transparent.png" width=20 border=0></td>
<td bgcolor="#000000"><img height=1 alt="" src="images/transparent.png" width=576 border=0></td>
<td bgcolor="#000000"><img height=1 alt="" src="images/transparent.png" width=132 border=0></td>
</tr>

<tr valign="top">
<td>&nbsp;</td>
<td>
<br />
';

$defaultfooter = '
</td>
<td>
&nbsp;</td>
</tr>
<tr><td colspan="4">&nbsp;</td></tr>
<tr><td colspan="4">&nbsp;</td></tr>
</table>
<!--TOP TABLE ends-->

</td></tr>

<!-- main page content-->

<!-- end of main page content--><!-- bottom black line-->
<tr>
<td bgcolor="#000000" colspan=3><img height=1 alt="" src="images/transparent.png" width=1 border=0></td>
</tr>

<tr>
<td bgcolor="#000000"><img height=1 alt="" src="images/transparent.png" width=1 border=0></td>
<td bgcolor="#ff9900" class="bottom">&copy; <a href="http://phplist.com" target="_phplist" class="urhere">phpList limited</a> | <a class="urhere" href="http://www.phplist.com" target="_blank">phplist</a></td>
<td bgcolor="#000000"><img height=1 alt="" src="images/transparent.png" width=1 border=0></td>
</tr>

<tr>
<td bgcolor="#000000" colspan=3><img height=1 alt="" src="images/transparent.png" width=1 border=0></td>
</tr>

<tr>
<td colspan=3><img height=3 alt="" src="images/transparent.png" width=1 border=0></td>
</tr>

<tr>
<td colspan=3>
&nbsp;
</td>
</tr>
</tbody>
</table>

</div>
</body></html>
';

if (is_file(dirname(__FILE__)."/../config/header.inc")) {
	$defaultheader = file_get_contents(dirname(__FILE__)."/../config/header.inc");
}
if (is_file(dirname(__FILE__)."/../config/footer.inc")) {
	$defaultfooter = file_get_contents(dirname(__FILE__)."/../config/footer.inc");
}

if (isset ($_SERVER['HTTP_HOST'])) {
	$D_website = $_SERVER['HTTP_HOST'];
} else {
	$D_website = $_SERVER['SERVER_NAME'];
}
$D_domain = $D_website;
if (preg_match("#^www\.(.*)#i", $D_domain, $regs))
	$D_domain = $regs[1];

# for starters, you want to leave this line as it is.
$default_config = array (

  # any next line has the format
  # "name" => array('value','description','type'),

  # what is your website location (url)
"website" => array (
  $D_website,
  "Website address (without http://)",
  "text"
),

  # what is your domain (for sending emails)
"domain" => array (
  $D_domain,
  "Domain Name of your server (for email)",
  "text"
),

  # admin address is the person who is in charge of this system
"admin_address" => array (
  'webmaster@[DOMAIN]',
  "Person in charge of this system (one email address)",
  "text"
),

  # how often to check for new versions of PHPlist
"check_new_version" => array (
  "7",
  "How often do you want to check for a new version of phplist (days)",
  "text"
),

  # admin addresses are other people who receive copies of subscriptions
"admin_addresses" => array (
  '',
  "List of people to CC in system emails (separate by commas)",
  "text",
  1
),

  # report address is the person who gets the reports
"report_address" => array (
  'listreports@[DOMAIN]',
  "Who gets the reports (email address, separate multiple emails with a comma)",
  "text"
),

  # where will messages appear to come from
"message_from_address" => array (
  "noreply@[DOMAIN]",
  "From email address for system messages",
  "text"
),

"message_from_name" => array (
  "Webmaster",
  "What name do system messages appear to come from",
  "text"
),

  # what is the reply-to on messages?
"message_replyto_address" => array (
  "noreply@[DOMAIN]",
  "Reply-to email address for system messages",
  "text"
),

  # if there is only one visible list, do we hide it and automatically
  # subscribe users who sign up
"hide_single_list" => array (
  "1",
  "if there is only one visible list, should it be hidden in the page and automatically
    subscribe users who sign up (0/1)",
  "boolean"
),

  # width of a textline field
"textline_width" => array (
  "40",
  "width of a textline field (numerical)",
  "text"
),

  # dimensions of a textarea field
"textarea_dimensions" => array (
  "10,40",
  "dimensions of a textarea field (rows,columns)",
  "text"
),

  # send copies of subscribe, update unsubscribe messages to the administrator
"send_admin_copies" => array (
  "0",
  "Does the admin get copies of subscribe, update and unsubscribe messages (0/1)",
  "boolean"
),

  # the main subscribe page, when there are multiple
"defaultsubscribepage" => array (
  1,
  "The default subscribe page when there are multiple",
  "text"
),

  # the default template for sending an html message
"defaultmessagetemplate" => array (
  0,
  "The default HTML template to use when sending a message",
  "text"
),

  ## the location of your subscribe script
  #"public_baseurl" => array("http://[WEBSITE]$pageroot/",
  #  "Base URL for public pages","text"),

  # the location of your subscribe script
"subscribeurl" => array (
  $GLOBALS['scheme'] . "://[WEBSITE]$pageroot/?p=subscribe",
  "URL where users can subscribe",
  "text"
),

  # the location of your unsubscribe script:
"unsubscribeurl" => array (
  $GLOBALS['scheme'] . "://[WEBSITE]$pageroot/?p=unsubscribe",
  "URL where known users can unsubscribe",
  "text"
),

  #0013076: Blacklisting posibility for unknown users
  # the location of your blacklist script:
"blacklisturl" => array (
  $GLOBALS['scheme'] . "://[WEBSITE]$pageroot/?p=blacklist",
  "URL where unknown users can unsubscribe (blacklist)",
  "text"
),

# the location of your confirm script:
"confirmationurl" => array (
  $GLOBALS['scheme'] . "://[WEBSITE]$pageroot/?p=confirm",
  "URL where users have to confirm their subscription",
  "text"
),

  # url to change their preferences
"preferencesurl" => array (
  $GLOBALS['scheme'] . "://[WEBSITE]$pageroot/?p=preferences",
  "URL where users can update their details",
  "text"
),

  # url to change their preferences
"forwardurl" => array (
  $GLOBALS['scheme'] . "://[WEBSITE]$pageroot/?p=forward",
  "URL where messages can be forwarded",
  "text"
),

  # the location of your subscribe script
  #"subscribe_baseurl" => array("http://[WEBSITE]$pageroot/",
  #  "Base URL for public pages","text"),

  # the subject of the message
"subscribesubject" => array (
  "Request for confirmation",
  "Subject of the message users receive when they subscribe",
  "text"
),

  # message that is sent when people sign up to a list
  # [LISTS] will be replaced with the list of lists they have signed up to
  # [CONFIRMATIONURL] will be replaced with the URL where a user has to confirm
  # their subscription
"subscribemessage" => array (
  '

  Almost welcome to our newsletter(s) ...

  Someone, hopefully you, has subscribed your email address to the following newsletters:
  
  [LISTS]

  If this is correct, please click the following link to confirm your subscription.
  Without this confirmation, you will not receive any newsletters.
  
  [CONFIRMATIONURL]
  
  If this is not correct, you do not need to do anything, simply delete this message.

  Thank you
  
    ',
  "Message users receive when they subscribe",
  "textarea"
),

  # subject of the message when they unsubscribe
"unsubscribesubject" => array (
  "Goodbye from our Newsletter",
  "Subject of the message users receive when they unsubscribe",
  "text"
),

  # message that is sent when they unsubscribe
"unsubscribemessage" => array (
  '
  
  Goodbye from our Newsletter, sorry to see you go.

  You have been unsubscribed from our newsletters.

  This is the last email you will receive from us. We have added you to our
  "blacklist", which means that our newsletter system will refuse to send
  you any other email, without manual intervention by our administrator.

  If there is an error in this information, you can re-subscribe:
  please go to [SUBSCRIBEURL] and follow the steps.

  Thank you
  
  ',
  "Message users receive when they unsubscribe",
  "textarea"
),

  # confirmation of subscription
"confirmationsubject" => array (
  'Welcome to our Newsletter',
  "Subject of the message users receive after confirming their email address",
  "text"
),

  # message that is sent to confirm subscription
"confirmationmessage" => array (
  '
  
  Welcome to our Newsletter

  Please keep this email for later reference.

  Your email address has been added to the following newsletter(s):
  [LISTS]

  To update your details and preferences please go to [PREFERENCESURL].
  If you do not want to receive any more messages, please go to [UNSUBSCRIBEURL].

  Thank you
  
  ',
  "Message users receive after confirming their email address",
  "textarea"
),

  # the subject of the message sent when changing the user details
"updatesubject" => array (
  "[notify] Change of List-Membership details",
  "Subject of the message users receive when they have changed their details",
  "text"
),

  # the message that is sent when a user updates their information.
  # just to make sure they approve of it.
  # confirmationinfo is replaced by one of the options below
  # userdata is replaced by the information in the database
"updatemessage" => array (
  '
  
  This message is to inform you of a change of your details on our newsletter database

  You are currently member of the following newsletters:
  
  [LISTS]
  
  [CONFIRMATIONINFO]
  
  The information on our system for you is as follows:
  
  [USERDATA]
  
  If this is not correct, please update your information at the following location:
  
  [PREFERENCESURL]
  
  Thank you
  
    ',
  "Message that is sent when users change their information",
  "textarea"
),

  # this is the text that is placed in the [!-- confirmation --] location of the above
  # message, in case the email is sent to their new email address and they have changed
  # their email address
"emailchanged_text" => array (
  '
  When updating your details, your email address has changed.
  Please confirm your new email address by visiting this webpage:
  
  [CONFIRMATIONURL]
  
  ',
  "Part of the message that is sent to their new email address when users change their information, and the email address has changed",
  "textarea"
),

  # this is the text that is placed in the [!-- confirmation --] location of the above
  # message, in case the email is sent to their old email address and they have changed
  # their email address
"emailchanged_text_oldaddress" => array (
  '
  Please Note: when updating your details, your email address has changed.

  A message has been sent to your new email address with a URL
  to confirm this change. Please visit this website to activate
  your membership.
  ',
  "Part of the message that is sent to their old email address when users change their information, and the email address has changed",
  "textarea"
),

"personallocation_subject" => array (
  'Your personal location',
  "Subject of message to send when users request their personal location",
  "text"
),

"personallocation_message" => array (
  '
  
  You have requested your personal location to update your details from our website.
  The location is below. Please make sure that you use the full line as mentioned below.
  Sometimes email programme can wrap the line into multiple lines.
  
  Your personal location is:
  [PREFERENCESURL]
  
  Thank you.
  ',
  'Message to send when they request their personal location',
  "textarea"
),

"messagefooter" => array (
  "--\n$strToUnsubscribe [UNSUBSCRIBE]\n\n$strToUpdate [PREFERENCES]\n$strForwardTitle [FORWARD]",
  "Default footer for sending a message",
  "textarea"
),

"forwardfooter" => array (
  "--\n$strForwardFooter\n\n [SUBSCRIBE]\nClick [BLACKLIST] to refuse further email from this website",

  "Footer used when a message has been forwarded",
  "textarea"
),

"pageheader" => array (
  $defaultheader,
  "Header of public pages. The header should start with &lt;/head&gt; . You can add header elements, but don't add the title or other basic header elements.",
  "textarea"
),

"pagefooter" => array (
  $defaultfooter,
  "Footer of public pages",
  "textarea"
),

"html_charset" => array (
  "UTF-8",
  "Charset for HTML messages",
  "text"
),
"text_charset" => array (
  "UTF-8",
  "Charset for Text messages",
  "text"
),

"html_email_style" => array (
  '
  <style type="text/css">
  body { font-size : 11px; font-family: Verdana, Arial, Helvetica, sans-serif; }
  a { font-size: 11px; color: #ff6600; font-style: normal; font-family: verdana, sans-serif; text-decoration: none; }
  a:visited { color: #666666; }
  a:hover {  text-decoration: underline; }
  p { font-weight: normal; font-size: 11px; color: #666666; font-style: normal; font-family: verdana, sans-serif; text-decoration: none; }
  h1 {font-weight: bold; font-size: 14px; color: #666666; font-style: normal; font-family: verdana, sans-serif; text-decoration: none;}
  h2 {font-weight: bold; font-size: 13px; color: #666666; font-style: normal; font-family: verdana, sans-serif; text-decoration: none;}
  h3 {font-weight: bold; font-size: 12px; color: #666666; font-style: normal; font-family: verdana, sans-serif; text-decoration: none; margin:0px; padding:0px;}
  h4 {font-weight: bold; font-size: 11px; color: #666666; font-style: normal; font-family: verdana, sans-serif; text-decoration: none; margin:0px; padding:0px;}
  hr {width : 100%; height : 1px; color: #ff9900; size:1px;}
  .forwardform {margin: 0 0 0 0; padding: 0 0 0 0;}
  .forwardinput {margin: 0 0 0 0; padding: 0 0 0 0;}
  .forwardsubmit {margin: 0 0 0 0; padding: 0 0 0 0;}
  div.emailfooter { font-size : 11px; font-family: Verdana, Arial, Helvetica, sans-serif; }
  div.emailfooter a { font-size: 11px; color: #ff6600; font-style: normal; font-family: verdana, sans-serif; text-decoration: none; }
  </style>
  ',
  "CSS for HTML messages without a template",
  "textarea"
),

"alwayssendtextto" => array (
  "mail.com\nemail.com",
  "Domains that only accept text emails, one per line",
  "textarea"
),
  # do not do anything with this line
"last one" => "blah"
);

if (defined("ENABLE_RSS") && ENABLE_RSS) {
  $default_config["rssthreshold"] = array (
    4,
    "Minimum amount of items to send in an RSS feed",
    "text"
  );
  $default_config["rsstexttemplate"] = array (
    '
      [title]
      [description]
      URL: [link]
      ',
    "Template for text item in RSS feeds",
    "textarea"
  );
  $default_config["rsshtmltemplate"] = array (
    '<br/>
      <a href="[link]"><b>[title]</b></a><br/>
      <p>[description]</p>
      <hr/>
      ',
    "Template for HTML item in RSS feeds",
    "textarea"
  );
  $default_config["rssthreshold"] = array (
    4,
    "Minimum amount of items to send in an RSS feed",
    "text"
  );
  $default_config["rssmax"] = array (
    30,
    "Maximum amount of items to send in an RSS feed",
    "text"
  );
  $default_config["rsstextseparatortemplate"] = array (
    '**** [listname] ******
    
      ',
    "Template for separator between feeds in RSS feeds (text)",
    "textarea"
  );
  $default_config["rsshtmlseparatortemplate"] = array (
    '<br/>
      <h3>[listname]</h3>
      ',
    "Template for separator between feeds in RSS feeds (HTML)",
    "textarea"
  );

}

#if (USEFCK) {
$default_config["fckeditor_width"] = array (
	600,
	"Width in px of FCKeditor Area",
	"text"
);
$default_config["fckeditor_height"] = array (
	600,
	"Height in px of FCKeditor Area",
	"text"
);
#}

########## certainly do not edit after this #########

$redfont = "<font color=\"red\">";
$efont = "</font>";

if (!TEST && REGISTER && defined("VERSION")) {
	if (ereg("dev", VERSION))
		$v = "dev";
	else
		$v = VERSION;
	$PoweredBy = '<p align=left><a href="http://www.phplist.com"><img src="http://powered.phplist.com/images/' . $v . '/power-phplist.png" width=88 height=31 title="powered by phplist" alt="powered by phplist" border="0"></a></p>';
} else
	$PoweredBy = '<center><a href="http://www.phplist.com"><img src="images/power-phplist.png" width=88 height=31 title="powered by phplist" alt="powered by phplist" border="0"></a></center>';

if (!function_exists("getconfig")) { 
	function getConfig($item) {
		global $default_config, $domain, $website, $tables;

		if ($item != 'website' && isset ($GLOBALS['config'][$item])) {
			return $GLOBALS['config'][$item];
		}
		if (!isset ($GLOBALS['config']) || !is_array($GLOBALS['config'])) {
			$GLOBALS['config'] = array ();
		}

		$hasconf = Sql_Table_Exists($tables["config"], 1);
		# correct old methods for finding public urls
		# @@@@ hmm maybe need to revert this
		/*
		if ($item == "forwardurl" || $item == "subscribeurl" || $item == "unsubscribeurl" || $item == "confirmationurl" || $item == "preferencesurl") {
		  $toget = 'public_baseurl';
		} else {
		  $toget = $item;
		}
		*/
		$toget = $item;
		if ($hasconf)
			$req = Sql_Query("select value from {$tables["config"]} where item = \"$toget\"");
		if (!Sql_Affected_Rows() || !$hasconf) {
			if (isset ($default_config[$item])) {
				$value = $default_config[$item][0];
			} else {
				$value = "";
			}
			# save the default value to the database, so we can obtain
			# the information when running from commandline
			if (Sql_Table_Exists($tables["config"]))
				saveConfig($item, $value);
			#    print "$item => $value<br/>";
		} else {
			$row = Sql_fetch_Row($req);
			$value = $row[0];
		}
		/*
		    $sep = ereg('\?',$value)?'&':'?';
		    switch ($item) {
		      case "subscribeurl":$value .= $sep.'p=subscribe';break;
		      case "unsubscribeurl":$value .= $sep.'p=unsubscribe';break;
		      case "preferencesurl":$value .= $sep.'p=preferences';break;
		      case "confirmationurl":$value .= $sep.'p=confirm';break;
		      case "forwardurl": $value .= $sep.'p=forward';break;
		    }
		*/
		$value = preg_replace('/\[DOMAIN\]/i', $domain, $value);
		$value = preg_replace('/\[WEBSITE\]/i', $website, $value);
		$value = preg_replace('/<\?=VERSION\?>/i', VERSION, $value);
		if (isset ($default_config[$item])) {
			$type = $default_config[$item][2];
		} else {
			$type = "";
		}

		if ($type == "boolean") {
			if ($value == "0") {
				$value = "false";
			}
			elseif ($value == "1") {
				$value = "true";
			}
		}
		#  print "$item => $value<br/>";
		# if this is a subpage item, and no value was found get the global one
		if (!$value && ereg(":", $item)) {
			list ($a, $b) = split(":", $item);
			return getConfig($a);
		} else {
			$GLOBALS['config'][$item] = stripslashes($value);
			return $GLOBALS['config'][$item];
		}
	}
} else {
	reset($default_config);
	while (list ($item, $values) = each($default_config)) {
		$val = getConfig($item);
		if (!isset ($val)) {
			#0013076: Blacklisting posibility for unknown users
			if ($item == 'preferencesurl' || $item == 'unsubscribeurl' || $item == 'blacklisturl' || $item == 'subscribeurl' || $item == 'forwardurl' || $item == 'confirmationurl') {
				$base = getConfig('public_baseurl');
				$sep = ereg('\?', $base) ? '&amp;' : '?';
				if (trim($base) != '') {
					switch ($item) {
						case "preferencesurl" :
							$values[0] = $base . $sep . 'p=preferences';
							break;
            case "unsubscribeurl" :
              $values[0] = $base . $sep . 'p=unsubscribe';
              break;
            #0013076: Blacklisting posibility for unknown users
            case "blacklisturl" :              
              $values[0] = $base . $sep . 'p=blacklist';
              break;
            case "subscribeurl" :
							$values[0] = $base . $sep . 'p=subscribe';
							break;
						case "forwardurl" :
							$values[0] = $base . $sep . 'p=forward';
							break;
						case "confirmationurl" :
							$values[0] = $base . $sep . 'p=confirm';
							break;
					}
				}
			}
			saveConfig($item, $values[0], 0);
		}
	}
}

function getUserConfig($item, $userid = 0) {
	global $default_config, $tables, $domain, $website;
	$hasconf = Sql_Table_Exists($tables["config"]);
	if ($hasconf)
		$req = Sql_Query("select value from {$tables["config"]} where item = \"$item\"");
	if (!Sql_Affected_Rows() || !$hasconf)
		$value = (isset($default_config[$item][0]))?$default_config[$item][0]:"";
	else {
		$row = Sql_fetch_Row($req);
		$value = $row[0];
	}
	# if this is a subpage item, and no value was found get the global one
	if (!$value && ereg(":", $item)) {
		list ($a, $b) = split(":", $item);
		$value = getUserConfig($a, $userid);
	}
	if ($userid) {
		$user_req = Sql_Fetch_Row_Query("select uniqid from {$tables["user"]} where id = $userid");
		$uniqid = $user_req[0];
		# parse for placeholders
		# do some backwards compatibility:
		# hmm, reverted back to old system

    $url = getConfig("unsubscribeurl");
    $sep = ereg('\?', $url) ? '&' : '?';
    $value = eregi_replace('\[UNSUBSCRIBEURL\]', $url . $sep . 'uid=' . $uniqid, $value);
		$url = getConfig("confirmationurl");
		$sep = ereg('\?', $url) ? '&' : '?';
		$value = eregi_replace('\[CONFIRMATIONURL\]', $url . $sep . 'uid=' . $uniqid, $value);
		$url = getConfig("preferencesurl");
		$sep = ereg('\?', $url) ? '&' : '?';
		$value = eregi_replace('\[PREFERENCESURL\]', $url . $sep . 'uid=' . $uniqid, $value);
	}
	$value = eregi_replace('\[SUBSCRIBEURL\]', getConfig("subscribeurl"), $value);
	$value = preg_replace('/\[DOMAIN\]/i', $domain, $value); #@ID Should be done only in one place. Combine getConfig and this one?
	$value = preg_replace('/\[WEBSITE\]/i', $website, $value);
	if ($value == "0") {
		$value = "false";
	}
	elseif ($value == "1") {
		$value = "true";
	}
	return $value;
}

# list of pages and categorisation in the system
$system_pages = array (
	"system" => array (
		"adminattributes" => "none",
		"attributes" => "none",
		"upgrade" => "none",
		"configure" => "none",
		"spage" => "owner",
		"spageedit" => "owner",
		"defaultconfig" => "none",
		"defaults" => "none",
		"initialise" => "none",
		"bounces" => "none",
		"bounce" => "none",
		"processbounces" => "none",
		"eventlog" => "none",
		"reconcileusers" => "none",
		"getrss" => "owner",
		"viewrss" => "owner",
		"purgerss" => "none",
		"setup" => "none",
		"dbcheck" => "none",
		
	),
	"list" => array (
		"list" => "owner",
		"editlist" => "owner",
		"members" => "owner"
	),
	"user" => array (
		"user" => "none",
		"users" => "none",
		"dlusers" => "none",
		"editattributes" => "none",
		"usercheck" => "none",
		"import1" => "none",
		"import2" => "none",
		"import3" => "none",
		"import4" => "none",
		"import" => "none",
		"export" => "none",
		"massunconfirm" => "none",
		
	),
	"message" => array (
		"message" => "owner",
		"messages" => "owner",
		"processqueue" => "none",
		"send" => "owner",
		"preparesend" => "none",
		"sendprepared" => "all",
		"template" => "none",
		"templates" => "none"
	),
	"clickstats" => array (
		'statsmgt' => 'owner',
		'mclicks' => 'owner',
		'uclicks' => 'owner',
		'userclicks' => 'owner',
		'mviews' => 'owner',
		'statsoverview' => 'owner',
		
	),
	"admin" => array (
		"admins" => "none",
		"admin" => "owner"
	)
);

$access_levels = array (
	0 => "none",
	1 => "all",
	2 => "view",
		#   3 => "edit",
	4 => "owner"
);
?>
