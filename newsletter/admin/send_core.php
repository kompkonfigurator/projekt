<?php
// 2004-1-7  This function really isn't quite ready for register globals.
require_once dirname(__FILE__).'/accesscheck.php';

#initialisation###############

// Verify that FCKeditor is available
if (USEFCK && file_exists("./FCKeditor/fckeditor.php")) {
  include("./FCKeditor/fckeditor.php") ;

  // Create the editor object here so we can check to see if *it* wants us to use it (this
  // does a browser check, etc.
  $oFCKeditor = new FCKeditor('message') ;
  $usefck = $oFCKeditor->IsCompatible();
  unset($oFCKeditor); // This object is *very* short-lived.  Thankfully, it's also light-weight
} else {
  $usefck = 0;
}

// Verify that TinyMCE is available
$useTinyMCE = 0;
if (USETINYMCEMESG && file_exists(TINYMCEPATH)) {
  $useTinyMCE = 1;
}

include_once dirname(__FILE__). "/date.php";

$errormsg = '';
$rss_content = '';
$done = 0;
$messageid = 0;
$duplicate_atribute = 0; # not actually used it seems @@@ check
$embargo = new date("embargo");
$embargo->useTime = true;
$repeatuntil = new date("repeatuntil");
$repeatuntil->useTime = true;
if (empty($_GET['id'])) {
  $_GET['id'] = '';
}
$baseurl = PageURL2($_GET["page"].'&id='.$_GET["id"]);

echo '<script language="Javascript" src="js/jslib.js" type="text/javascript"></script><hr><p>';

// load some variables in a register globals-safe fashion
if (isset($_POST['send'])) {
  $send = $_POST["send"]; // Only get this from the POST variable (not session or anywhere else)
} else {
  $send = '';
}
if (isset($_POST['prepare'])) {
  $prepare = $_POST["prepare"];
} else {
  $prepare = '';
}
if (isset($_GET['id'])) {
  $id = sprintf('%d',$_GET["id"]);  // Only get this from the GET variable
} else {
  $id = 0;
}
if (isset($_POST['save'])) {
  $save = $_POST["save"]; // Save button pressed?
} else {
  $save = '';
}
if (isset($_POST['sendtest'])) {
  $sendtest = $_POST["sendtest"];
} else {
  $sendtest = '';
}
if (!isset($_GET['tab'])) $_GET['tab'] = '';

if (!$id) {
  $defaulttemplate = getConfig('defaultmessagetemplate');
  Sql_Query(sprintf('insert into %s (subject,status,entered,sendformat,embargo,repeatuntil,owner,template,tofield,replyto)
    values("(no subject)","draft",now(),"HTML",now(),now(),%d,%d,"","")',$GLOBALS["tables"]["message"],$_SESSION["logindetails"]["id"],$defaulttemplate));
  $id = Sql_Insert_id();
  # 0008720: Using -p send from the commandline doesn't seem to work
  if(!$GLOBALS["commandline"]){
    Redirect($_GET["page"]."&id=$id");
    exit;
  }
}

if (isset($_GET['deleterule']) && $_GET["deleterule"]) {
  Sql_Query(sprintf('delete from %s where name = "criterion%d" and id = %d',$GLOBALS["tables"]["messagedata"],$_GET["deleterule"],$_GET["id"]));
  Redirect($_GET["page"]."&id=$id&tab=".$_GET["tab"]);
}
ob_end_flush();

#load database data###########################

// If we were passed an ID in the get, and we *weren't* posted a send, then
// initialize the variables from the database.
#if (((!$send) && (!$save) && (!$sendtest)) && ($id)) {
if ($id) {
  // Load message attributes / values

  require $GLOBALS["coderoot"] . "structure.php";  // This gets the database structures into DBStruct

  $result = Sql_query("SELECT * FROM {$tables["message"]} where id = $id $ownership");
  if (!Sql_Affected_Rows()) {
    print $GLOBALS['I18N']->get("noaccess");
    $done = 1;
    return;
  }
  foreach (array('message', 'msgsubject') as $key) {
    if (isset($_POST[$key])) {
     $_POST[$key] = stripslashes($_POST[$key]);
    }
  }
  while ($msg = Sql_fetch_array($result)) {
    foreach ($DBstruct["message"] as $field => $rec) {
      if (!isset($_POST[$field])) {
  #      print "Db: $field = $msg[$field]<br/>";
        $_POST[$field] = $msg[$field];
      }
    }
  }
  if (!isset($_POST['targetlist']) || !is_array($_POST["targetlist"])) {
    $_POST["targetlist"] = array();
    // Load lists that were targetted with message...
    $result = Sql_Query("select $tables[list].name,$tables[list].id from $tables[listmessage],$tables[list] where $tables[listmessage].messageid = $id and $tables[listmessage].listid = $tables[list].id");
    while ($lst = Sql_fetch_array($result)) {
      $_POST["targetlist"][$lst["id"]] = 1;
    }
  }

  // A bit of additional cleanup
  if (!isset($_POST["from"]))
    $_POST["from"] = $_POST["fromfield"];  // Database field name doesn't match form fieldname...

  if (!isset($_POST["forwardsubject"])) {
     $_POST["forwardsubject"] = "";
  }
  else $_POST["forwardsubject"] = sprintf("%s", $_POST["forwardsubject"]);

  if (!isset($_POST["forwardmessage"])) {
     $_POST["forwardmessage"] = "";
  }
  else $_POST["forwardmessage"] = sprintf("%s", $_POST["forwardmessage"]);

  if (!isset($_POST["forwardfooter"])) {
     $_POST["forwardfooter"] = "";
  }
  else $_POST["forwardfooter"] = sprintf("%s", $_POST["forwardfooter"]);

  if (!isset($_POST["msgsubject"])) {
    $_POST["msgsubject"] = sprintf("%s",$_POST["subject"]);
  } else {
    $_POST['subject'] = sprintf("%s",$_POST['msgsubject']);
  }
  if ((!isset($_POST["year"]) || !is_array($_POST["year"])) && $_POST["embargo"] && $_POST["embargo"] != "0000-00-00 00:00:00") {
     $embargo->setDateTime($_POST["embargo"]);
  }
  if ((!isset($_POST["year"]) || !is_array($_POST["year"])) && $_POST["repeatuntil"] && $_POST["repeatuntil"] != "0000-00-00 00:00:00") {
    $repeatuntil->setDateTime($_POST["repeatuntil"]);
  }

  # not sure why this is here, but it breaks things when tables are used in the
  # message, so for now disable it.
  if (0) {#$usefck) {
    $_POST["message"] = nl2br($_POST["message"]);
  }

  // Load the criteria settings...
}

// If we've got magic quotes on, then we need to get rid of the slashes - either
// from the database or from the previous $_POST
#if (get_magic_quotes_gpc()) {
//  $_POST["msgsubject"] = stripslashes($_POST["msgsubject"]);
    #0013076: different content when forwarding 'to a friend'
  $_POST["forwardsubject"] = stripslashes($_POST["forwardsubject"]);
  $_POST["from"] = stripslashes($_POST["from"]);
  $_POST["tofield"] = stripslashes($_POST["tofield"]);
  $_POST["replyto"] = stripslashes($_POST["replyto"]);
//  $_POST["message"] = stripslashes($_POST["message"]);
  #0013076: different content when forwarding 'to a friend'
  $_POST["forwardmessage"] = stripslashes($_POST["forwardmessage"]);
  $_POST["textmessage"] = stripslashes($_POST["textmessage"]);
  $_POST["footer"] = stripslashes($_POST["footer"]);
  #0013076: different content when forwarding 'to a friend'
  $_POST["forwardfooter"] = stripslashes($_POST["forwardfooter"]);
#}

#input checking#######################
$duplicate_attribute = 0;
# check the criterias, one attribute can only exist once
if ($send) {
  $used_attributes = array();
  for ($i=1;$i<=NUMCRITERIAS;$i++) {
    if (isset($_POST["use"][$i])) {
      $attribute = $_POST["criteria"][$i];
      if (!in_array($attribute,$used_attributes))
        array_push($used_attributes,$attribute);
      else
        $duplicate_attribute = 1;
    }
  }
}

if (!isset($id)) { $id = $_POST["id"]; }; // Pull in the id value from the post if it wasnt in the get

#if ($_POST["htmlformatted"] == "auto")
  $htmlformatted = strip_tags($_POST["message"]) != $_POST["message"];
#else
#  $htmlformatted = $_POST["htmlformatted"];

# sanitise the header fields, what else do we need to check on?
if (preg_match("/\n|\r/",$_POST["from"])) {
  $from = "";
} else {
  $from = $_POST["from"];
}

if (preg_match("/\n|\r/",$_POST["msgsubject"])) {
  $subject = "";
} else {
  $subject = $_POST["msgsubject"];
}

if (preg_match("/\n|\r/",$_POST["forwardsubject"])) {
  $forwardsubject = "";
} else {
  $forwardsubject = $_POST["forwardsubject"];
}

if (preg_match("/\n|\r/",$_POST["forwardmessage"])) {
  $forwardmessage = "";
} else {
  $forwardmessage = $_POST["forwardmessage"];
}

if (preg_match("/\n|\r/",$_POST["forwardfooter"])) {
  $forwardfooter = "";
} else {
  $forwardfooter = $_POST["forwardfooter"];
}

$message = $_POST["message"];

// If the variable isn't filled in, then the input fields don't default to the
// values selected.  Need to fill it in so a post will correctly display.
if ((isset($_POST['year']) && is_array($_POST["year"])) || $_POST["embargo"] || $_POST["embargo"] == "0000-00-00 00:00:00") {
  $_POST["embargo"] = $embargo->getDate() ." ".$embargo->getTime().':00';
}

if ((isset($_POST['year']) && is_array($_POST["year"])) || !$_POST["repeatuntil"] || $_POST["repeatuntil"] == "0000-00-00 00:00:00") {
  $_POST["repeatuntil"] = $repeatuntil->getDate() ." ".$repeatuntil->getTime().':00';
}

if (!isset($_SESSION["fckeditor_height"])) {
  $_SESSION["fckeditor_height"] = getConfig("fckeditor_height");
}
if (isset($_POST['expand']) && $_POST["expand"]) {
  // request to expand editor area
//  $defaultheight = getConfig("fckeditor_height");
//  SaveConfig("fckeditor_height",$curheight+100,1);
  $_SESSION["fckeditor_height"] += 100;
}
if (isset($_REQUEST['prepare'])) {
  $prepare = $_REQUEST['prepare'];
} else {
  $prepare = '';
}

#actions and store in database#######################

if ($send || $sendtest || $prepare || $save) {

  if ($save || $sendtest) {
    // We're just saving, not sending.
    if (!isset($_POST['status']) || $_POST["status"] == "") {
      // No status - move to draft state
      $status = "draft";
    } else {
      // Keep the status the same
      $status = $_POST["status"];
    }
  } elseif ($send) {
    // We're sending - change state to "send-it" status!
    if (is_array($_POST["targetlist"]) && sizeof($_POST["targetlist"]) && $subject && $from && $message && !$duplicate_attribute) {
      $status = "submitted";
    } else {
      if (USE_PREPARE) {
        $status = "prepared";
      } else {
        $status = "draft";
      }
    }
  }

  if (ENABLE_RSS && $_POST["rsstemplate"]) {
    # mark previous RSS templates with this frequency and owner as sent
    # this should actually be much more complex than this:
    # templates should be allowed by list and therefore a subset of lists, but
    # for now we leave it like this
    # the trouble is that this may duplicate RSS messages to users, because
    # it can cause multiple template for lists. The user_rss should handle that, but it is
    # not guaranteed which message will be used.
#    Sql_Query(sprintf('update %s set status = "sent" where rsstemplate = "%s" and owner = %d',
#      $tables["message"],$_POST["rsstemplate"],$_SESSION["logindetails"]["id"]));


    # with RSS message we enforce repeat
    switch ($_POST["rsstemplate"]) {
      case "weekly": $_POST["repeatinterval"] = 10080; break;
      case "monthly": $_POST["repeatinterval"] = 40320; break;
      case "daily":
      default: $_POST["repeatinterval"] = 1440; break;
    }
    $_POST["repeatuntil"] = date("Y-m-d H:i:00",mktime(0,0,0,date("m"),date("d"),date("Y")+1));
  }

  if (!$htmlformatted  && strip_tags($_POST["message"]) !=  $_POST["message"])
    $errormsg = '<span  class="error">'.$GLOBALS['I18N']->get("htmlusedwarning").'</span>';

  $query = sprintf('update %s  set  '.
      'subject = "%s", '.
      'fromfield = "%s", '.
      'tofield = "%s", '.
      'replyto = "%s", '.
      'embargo = "%s", '.
      'repeatinterval  =  %d,  '.
      'repeatuntil = "%s", '.
      'message = "%s", '.
      'textmessage = "%s", '.
      'footer  =  "%s",  '.
      'status = "%s", '.
      'htmlformatted = %d, '.
      'sendformat  =  "%s",  '.
      'template  =  %d,  '.
      'rsstemplate = "%s"  '.
      'where id  =  %d',
      $tables["message"],
      addslashes($subject),
      addslashes($from),
      addslashes($_POST["tofield"]),
      addslashes($_POST["replyto"]),
      $_POST["embargo"],
      $_POST["repeatinterval"],
      $_POST["repeatuntil"],
      addslashes($_POST["message"]),
      addslashes($_POST["textmessage"]),
      addslashes($_POST["footer"]),
      $status,
      $htmlformatted,
      $_POST["sendformat"],
      $_POST["template"],
      $_POST["rsstemplate"],
      $id);
#    print $query;
    $result  =  Sql_query($query);
    $messageid = $id;
#    print "Message ID: $id";
    #    exit;
    if (!$GLOBALS["has_pear_http_request"] && preg_match("/\[URL:/i",$_POST["message"])) {
      print Warn($GLOBALS['I18N']->get('warnnopearhttprequest'));
    }

  // More  "Insert  only"  stuff  here (no need  to change  it on  an edit!)
  if (isset($_POST["targetlist"]) && is_array($_POST["targetlist"]))  {
    Sql_query("delete from {$tables["listmessage"]} where messageid = $messageid");
    if ( (isset($_POST["targetlist"]["all"]) && $_POST["targetlist"]["all"] == "on") ||
      (isset($_POST["targetlist"]["allactive"]) && $_POST["targetlist"]["allactive"] == "on")
      )
    {
      $res = Sql_query("select * from  $tables[list] $subselect");
      while($row = Sql_fetch_array($res))  {
        $listid  =  $row["id"];
        if ($row["active"] || $_POST["targetlist"]["all"] == "on")  {
          $result  =  Sql_query("insert ignore into $tables[listmessage]  (messageid,listid,entered) values($messageid,$listid,now())");
        }
      }
    } else {
      foreach($_POST["targetlist"] as $listid => $val) {
        $result = Sql_query("insert ignore into $tables[listmessage]  (messageid,listid,entered) values($messageid,$listid,now())");
      }
    }
  } else {
    #  mark this  message  as listmessage for list  0
    $result  =  Sql_query("insert ignore into $tables[listmessage]  (messageid,listid,entered) values($messageid,0,now())");
  }
  if (USE_LIST_EXCLUDE) {
    if (isset($_POST["excludelist"]) && is_array($_POST["excludelist"])) {
      $exclude = join(",",$_POST["excludelist"]);
      Sql_Query(sprintf('replace into %s (name,id,data) values("excludelist",%d,"%s")',$tables["messagedata"],$messageid,$exclude));
    } else {
      Sql_Query(sprintf('replace into %s (name,id,data) values("excludelist",%d,"%s")',$tables["messagedata"],$messageid,0));
    }
  }

  #0013076: different content when forwarding 'to a friend'
  if (FORWARD_ALTERNATIVE_CONTENT && $_GET['tab'] == 'Forward') {
    foreach( array('forwardsubject', 'forwardmessage', 'forwardfooter') as $var) {
      Sql_Query(sprintf('replace into %s (name,id,data) values("%s",%d,"%s")',
        $tables["messagedata"], $var, $messageid, addslashes($_REQUEST[$var])));
    }
  }

# we want to create a join on tables as follows, in order to find users who have their attributes to the values chosen
# (independent of their list membership).
# select
#  table1.userid from user_attribute as table1
#  left join user_attribute as table2 on table1.userid = table2.userid
#  left join user_attribute as table3 on table1.userid = table3.userid
#  ...
# where
#  table1.attributeid = 2 and table1.value in (1,2,3,4)
#  and table2.attributeid = 1 and table2.value in (3,15)
#  and table3.attributeid = 3 and table3.value in (4,5,6)
#  ...

  # check the criterias, create the selection query
  $used_tables = array();
  for ($i=1;$i<=NUMCRITERIAS;$i++) {
    if (isset($_POST["use"][$i])) {
      $attribute = $_POST["criteria"][$i];
      $type = $_POST["attrtype"][$attribute];
      switch($type) {
        case "checkboxgroup":
          $values = "attr$attribute$i";
          $or_clause = '';
          if (isset($where_clause)) {
            $where_clause .= " and ";
            $select_clause .= " left join $tables[user_attribute] as table$i on table$first.userid = table$i.userid ";
          } else {
            $select_clause = "table$i.userid from $tables[user_attribute] as table$i ";
            $first = $i;
          }

          $where_clause .= "table$i.attributeid = $attribute and (";
          if (is_array($_POST[$values])) {
            foreach ($_POST[$values] as $val) {
              if ($or_clause != '') {
                $or_clause .= " or ";
              }
              $or_clause .= "find_in_set('$val',table$i.value) > 0";
            }
          }
          $where_clause .= $or_clause . ")";
          break;
        case "checkbox":
          $values = "attr$attribute$i";
          $value = $_POST[$values][0];

          if (isset($where_clause)) {
            $where_clause .= " and ";
            $select_clause .= " left join $tables[user_attribute] as table$i on table$first.userid = table$i.userid ";
          } else {
            $select_clause = "table$i.userid from $tables[user_attribute] as table$i ";
            $first = $i;
          }

          $where_clause .= "table$i.attributeid = $attribute and ";
          if ($value) {
            $where_clause .= "( length(table$i.value) and table$i.value != \"off\" and table$i.value != \"0\") ";
          } else {
            $where_clause .= "( table$i.value = \"\" or table$i.value = \"0\" or table$i.value = \"off\") ";
          }
          break;
         default:
          $values = "attr$attribute$i";
          if (isset($where_clause)) {
            $where_clause .= " and ";
            $select_clause .= " left join $tables[user_attribute] as table$i on table$first.userid = table$i.userid ";
          } else {
            $select_clause = "table$i.userid from $tables[user_attribute] as table$i ";
            $first = $i;
          }

          $where_clause .= "table$i.attributeid = $attribute and table$i.value in (";
          $list = array();
          if (is_array($_POST[$values])) {
            while (list($key,$val) = each ($_POST[$values]))
              array_push($list,$val);
          }
          $where_clause .= join(", ",$list) . ")";
      }
    }
  }

  # if no selection was made, use all
  if (!isset($where_clause)) {
    $count_query = "";
#    $count_query = addslashes("select distinct userid from $tables[user_attribute]");
  } else {
    $count_query = addslashes("select $select_clause where $where_clause");
    Sql_query("update $tables[message] set userselection = \"$count_query\" where id = $messageid");
  }
 # commented, because this could take too long
 # Sql_Query($count_query);
 # $num = Sql_Affected_rows();

  # new criteria system, add one by one:
  if (isset($_POST["criteria_attribute"]) && $_POST["criteria_attribute"]) {
    $operator = $_POST["criteria_operator"];
    if (is_array($_POST["criteria_values"])) {
      $values = join(", ",$_POST["criteria_values"]);
      $values = cleanCommaList($values);
    } else {
      $values = $_POST["criteria_values"];
    }
    foreach ($_POST["attribute_names"] as $key => $val) {
      $att_names[$key] = $val;
    }
    $newcriterion = array(
      "attribute" => sprintf('%d',$_POST["criteria_attribute"]),
      "attribute_name" => $att_names[$_POST["criteria_attribute"]],
      "operator" => $operator,
      "values" => $values,
    );
    # find out what number we are
    $numarr = Sql_Fetch_Row_Query(sprintf('select data from %s where id = %d and name = "numcriteria"',
      $tables["messagedata"],$messageid));
    $num = sprintf('%d',$numarr[0]+1);
    # store this one
#    print $att_names[$_POST["criteria_attribute"]];
#    print $_POST["attribute_names[".$_POST["criteria_attribute"]."]"];
    print "<p>".$GLOBALS['I18N']->get("adding")." ".$newcriterion["attribute_name"]." ".$newcriterion["operator"]." ".$newcriterion["values"]."</p>";
    Sql_Query(sprintf('insert into %s (name,id,data) values("criterion%d",%d,"%s")',
      $tables["messagedata"],$num,$messageid,delimited($newcriterion)));
    # increase number
    Sql_Query(sprintf('replace into %s (name,id,data) values("numcriteria",%d,"%s")',
      $tables["messagedata"],$messageid,$num));
    # save overall operator
  }
  if (isset($_POST["criteria_match"])) {
    Sql_Query(sprintf('replace into %s (name,id,data) values("criteria_overall_operator",%d,"%s")',
      $tables["messagedata"],$messageid,$_POST["criteria_match"]));
  }
  if (isset($_POST['notify_start']) && $_POST['notify_start']) {
    Sql_Query(sprintf('replace into %s set name = "notify_start",id = %d,data = "%s"',
      $GLOBALS['tables']['messagedata'],$id,$_POST['notify_start']));
  }
  if (isset($_POST['notify_end']) && $_POST['notify_end']) {
    Sql_Query(sprintf('replace into %s set name = "notify_end",id = %d,data = "%s"',
      $GLOBALS['tables']['messagedata'],$id,$_POST['notify_end']));
  }


  if (ALLOW_ATTACHMENTS && isset($_FILES) && is_array($_FILES) && sizeof($_FILES) > 0) {
    for ($att_cnt = 1;$att_cnt <= NUMATTACHMENTS;$att_cnt++) {
      $fieldname = "attachment".$att_cnt;
      $tmpfile = $_FILES[$fieldname]['tmp_name'];
      $remotename = $_FILES[$fieldname]["name"];
      $type = $_FILES[$fieldname]["type"];
      $newtmpfile = $remotename.time();
      move_uploaded_file($tmpfile, $GLOBALS['tmpdir'].'/'. $newtmpfile);
      if (is_file($GLOBALS['tmpdir'].'/'.$newtmpfile) && filesize($GLOBALS['tmpdir'].'/'.$newtmpfile)) {
        $tmpfile = $GLOBALS['tmpdir'].'/'.$newtmpfile;
      }
      if (strlen($_POST[$type]) > 255)
        print Warn($GLOBALS['I18N']->get("longmimetype"));
      $description = $_POST[$fieldname."_description"];
      if ($tmpfile && filesize($tmpfile) && $tmpfile != "none") {
        list($name,$ext) = explode(".",basename($remotename));
        # create a temporary file to make sure to use a unique file name to store with
        $newfile = tempnam($GLOBALS["attachment_repository"],$name);
        $newfile .= ".".$ext;
        $newfile = basename($newfile);
        $file_size = filesize($tmpfile);
        $fd = fopen( $tmpfile, "r" );
        $contents = fread( $fd, filesize( $tmpfile ) );
        fclose( $fd );
        if ($file_size) {
          # this may seem odd, but it allows for a remote (ftp) repository
          # also, "copy" does not work across filesystems
          $fd = fopen($GLOBALS["attachment_repository"]."/".$newfile, "w" );
          fwrite( $fd, $contents );
          fclose( $fd );
          Sql_query(sprintf('insert into %s (filename,remotefile,mimetype,description,size) values("%s","%s","%s","%s",%d)',
          $tables["attachment"],
          basename($newfile),$remotename,$type,$description,$file_size)
          );
          $attachmentid = Sql_Insert_id();
          Sql_query(sprintf('insert into %s (messageid,attachmentid) values(%d,%d)',
          $tables["message_attachment"],$messageid,$attachmentid));
          if (is_file($tmpfile)) {
            unlink($tmpfile);
          }

          # do a final check
          if (filesize($GLOBALS["attachment_repository"]."/".$newfile))
            print Info($GLOBALS['I18N']->get("addingattachment")." ".$att_cnt . " .. ok");
          else
            print Info($GLOBALS['I18N']->get("addingattachment")." ".$att_cnt." .. failed");
        } else {
          print Warn($GLOBALS['I18N']->get("uploadfailed"));
        }
      } elseif ($_POST["localattachment".$att_cnt]) {
        $type = findMime(basename($_POST["localattachment".$att_cnt]));
        Sql_query(sprintf('insert into %s (remotefile,mimetype,description,size) values("%s","%s","%s",%d)',
          $tables["attachment"],
          $_POST["localattachment".$att_cnt],$type,$description,filesize($_POST["localattachment".$att_cnt]))
        );
        $attachmentid = Sql_Insert_id();
        Sql_query(sprintf('insert into %s (messageid,attachmentid) values(%d,%d)',
        $tables["message_attachment"],$messageid,$attachmentid));
        print Info($GLOBALS['I18N']->get("addingattachment")." ".$att_cnt. " mime: $type");
      }
    }
  }

  if ($_POST["id"]) {
    print "<h3>".$GLOBALS['I18N']->get("saved")."</H3><br/>";
  } else {
    $id = $messageid; // New ID - need to set it for later use (test email).
    print "<h3>".$GLOBALS['I18N']->get("added")."</H3><br/>";
  }

  // If we're sending the message, just return now to the calling script

  # we only need to check that everything is there, once we actually want to send
  if ($send && $subject && $from && $message && !$duplicate_atribute && sizeof($_POST["targetlist"])) {
    if ($status == "submitted") {
      print "<h3>".$GLOBALS['I18N']->get("queued")."</h3>";
      print '<p>'.PageLink2("processqueue",$GLOBALS['I18N']->get("processqueue")).'</p>';
    }
    $done = 1;
    return;
  } elseif ($send || $sendtest) {
    $errormessage = "";
    if ($subject != stripslashes($_POST["subject"])) {
      $errormessage = $GLOBALS['I18N']->get("errorsubject");
    } elseif ($from != $_POST["from"]) {
      $errormessage = $GLOBALS['I18N']->get("errorfrom");
    } elseif (!$from) {
      $errormessage = $GLOBALS['I18N']->get("enterfrom");
    } elseif (!$message) {
      $errormessage = $GLOBALS['I18N']->get("entermessage");
    } elseif (!$subject) {
      $errormessage = $GLOBALS['I18N']->get("entersubject");
    } elseif ($duplicate_attribute) {
      $errormessage = $GLOBALS['I18N']->get("duplicateattribute");
    } elseif ($send && !is_array($_POST["targetlist"])) {
      $errormessage = $GLOBALS['I18N']->get("selectlist");
    }
    echo "<font color=red size=+2>$errormessage</font><br>\n";
  }

  // OK, the message has been saved, now check to see if we need to send a test message
  if ($sendtest) {

    echo "<HR>";
    // Let's send test messages to everyone that was specified in the
    if ($_POST["testtarget"] == "") {
      print "<font color=red size=+2>".$GLOBALS['I18N']->get("notargetemail")."</font><br>";
    }

    if (isset($cached))
    unset($cached[$id]);

    include "sendemaillib.php";

    // OK, let's get to sending!
    $emailaddresses = split('[/,,/;]', $_POST["testtarget"]);

    foreach ($emailaddresses as $address) {
      $address = trim($address);
      $result = Sql_query(sprintf('select id,email,uniqid,htmlemail,rssfrequency,confirmed from %s where email = "%s"',$tables["user"],$address));
      if ($user = Sql_fetch_array($result)) {
        if ( FORWARD_ALTERNATIVE_CONTENT && $_GET['tab'] == 'Forward') {
          if (SEND_ONE_TESTMAIL) {
            $success = sendEmail($id, $address, $user["uniqid"], $user['htmlemail'], array(), array($address) );
          } else {
            $success = sendEmail($id, $address, $user["uniqid"], 1,  array(), array($address) ) && sendEmail($id, $address, $user["uniqid"], 0,  array(), array($address));
          }
        } else {
          if (SEND_ONE_TESTMAIL) {
            $success = sendEmail($id, $address, $user["uniqid"], $user['htmlemail']);
          } else {
            $success = sendEmail($id, $address, $user["uniqid"], 1) && sendEmail($id, $address, $user["uniqid"], 0);
          }
        }
        print $GLOBALS['I18N']->get("sentemailto").": $address ";
        if (!$success) {
          print $GLOBALS['I18N']->get('failed');
        } else {
          print $GLOBALS['I18N']->get('success');
        }
        print '<br/>';
      } else {
        print "<font color=red>".$GLOBALS['I18N']->get("emailnotfound").": $address</font><br>";
      }
    }
    echo "<HR>";
  }
} elseif (isset($_POST["deleteattachments"]) && is_array($_POST["deleteattachments"]) && $id) {
  if (ALLOW_ATTACHMENTS) {
    // Delete Attachment button hit...
    $deleteattachments = $_POST["deleteattachments"];
    foreach($deleteattachments as $attid)
    {
      $result = Sql_Query(sprintf("Delete from %s where id = %d and messageid = %d",
        $tables["message_attachment"],
        $attid,
        $id));
      print Info($GLOBALS['I18N']->get("removedattachment")." ".$att_cnt);
      // NOTE THAT THIS DOESN'T ACTUALLY DELETE THE ATTACHMENT FROM THE DATABASE, OR
      // FROM THE FILE SYSTEM - IT ONLY REMOVES THE MESSAGE / ATTACHMENT LINK.  THIS
      // SHOULD PROBABLY BE CORRECTED, BUT I (Pete Ness) AM NOT SURE WHAT OTHER IMPACTS
      // THIS MAY HAVE.
      // (My thoughts on this are to check for any orphaned attachment records and if
      //  there are any, to remove it from the disk and then delete it from the database).
    }
  }
}

# load all message data
$messagedata = loadMessageData($id);

#0013076: different content when forwarding 'to a friend'
if (FORWARD_ALTERNATIVE_CONTENT) {
  foreach( array('forwardsubject', 'forwardmessage', 'forwardfooter') as $var) {
  	if (isset($_REQUEST[$var])) {
      ${$var} = stripslashes($_REQUEST[$var]);
    } else {
      ${$var} = stripslashes($messagedata[$var]);
    }
  }
  if (!$forwardfooter)
    $forwardfooter = getConfig("forwardfooter");
}

##############################
# Stacked attributes, processing and calculation
##############################

if (STACKED_ATTRIBUTE_SELECTION) {

# read criteria and parse it into a user query
$num = sprintf('%d',isset($messagedata['numcriteria']) ? $messagedata['numcriteria']: 0);
  #  print '<br/>'.$num . " criteria already defined";
$ls = new WebblerListing($GLOBALS['I18N']->get("existingcriteria"));
$used_attributes = array();
$delete_base = sprintf('%s&amp;id=%d&amp;tab=%s',$_GET["page"],$_GET["id"],$_GET["tab"]);
$tc = 0; # table counter
if (!isset($messagedata['criteria_overall_operator'])) {
  $messagedata['criteria_overall_operator'] = '';
}
$mainoperator = $messagedata['criteria_overall_operator'] == "all"? ' and ':' or ';

$subqueries = array();

for ($i = 1; $i<=$num;$i++) {
  $crit_data = parseDelimitedData($messagedata[sprintf('criterion%d',$i)]);
  if ($crit_data["attribute"]) {
    array_push($used_attributes,$crit_data["attribute"]);
    $ls->addElement('<!--'.$crit_data["attribute"].'-->'.$crit_data["attribute_name"]);
    $ls->addColumn('<!--'.$crit_data["attribute"].'-->'.$crit_data["attribute_name"],$GLOBALS['I18N']->get('operator'),$GLOBALS['I18N']->get($crit_data["operator"]));
    $ls->addColumn('<!--'.$crit_data["attribute"].'-->'.$crit_data["attribute_name"],$GLOBALS['I18N']->get('values'),$crit_data["values"]);
    $ls->addColumn('<!--'.$crit_data["attribute"].'-->'.$crit_data["attribute_name"],$GLOBALS['I18N']->get('remove'),PageLink2($delete_base."&amp;deleterule=".$i,$GLOBALS['I18N']->get("remove")));
    if (isset($_POST["criteria"][$i])) {
      $attribute = $_POST["criteria"][$i];
    } else {
      $attribute = '';
    }
    ## fix 6063
  #  $crit_data["values"] = str_replace(" ,", "",$crit_data["values"]);
    $crit_data['values'] = cleanCommaList($crit_data["values"]);

    # hmm, rather get is some other way, this is a bit unnecessary
    $type = Sql_Fetch_Row_Query("select type from {$tables["attribute"]} where id = ".$crit_data["attribute"]);
    $operator = $where_clause = $select_clause = "";
    switch($type[0]) {
      case "checkboxgroup":
        $or_clause = '';
        if ($tc) {
          $where_clause .= " $mainoperator ";
          $select_clause .= " left join $tables[user_attribute] as table$tc on table0.userid = table$tc.userid ";
        } else {
          $select_clause = "table$tc.userid from $tables[user_attribute] as table$tc ";
        }

        $where_clause .= " ( table$tc.attributeid = ".$crit_data["attribute"]." and (";
        if ($crit_data["operator"] == "is") {
          $operator = ' or ';
          $compare = ' > ';
        } else {
          $operator = ' and ';
          $compare = ' <  ';
        }
        foreach (explode(",",$crit_data["values"]) as $val) {
          if ($or_clause != '') {
            $or_clause .= " $operator ";
          }
          $or_clause .= "find_in_set('$val',table$tc.value) $compare 0";
        }
        $where_clause .= $or_clause . ") ) ";
        $subqueries[$i]['query'] = sprintf('select userid from %s as table%d where attributeid = %d
          and ( %s )',$GLOBALS['tables']['user_attribute'],$tc,$crit_data['attribute'],$or_clause);
        break;
      case "checkbox":
        $value = $crit_data["values"][0];

        if ($tc) {
          $where_clause .= " $mainoperator ";
          $select_clause .= " left join $tables[user_attribute] as table$tc on table0.userid = table$tc.userid ";
        } else {
          $select_clause = "table$tc.userid from $tables[user_attribute] as table$tc";
        }

        $where_clause .= " ( table$tc.attributeid = ".$crit_data["attribute"]." and ";
        if ($crit_data["operator"] == "isnot") {
          $where_clause .= ' not ';
        }
        $valueselect = '';
        if ($value) {
          $valueselect = " length(table$tc.value) and table$tc.value != \"off\" and table$tc.value != \"0\" ";
        } else {
          $valueselect = " table$tc.value = \"\" or table$tc.value = \"0\" or table$tc.value = \"off\" ";
        }

        $where_clause .= '( '.$valueselect . ') ) ';
        $subqueries[$i]['query'] = sprintf('select userid from %s as table%d where attributeid = %d
          and ( %s )',$GLOBALS['tables']['user_attribute'],$tc,$crit_data['attribute'],$valueselect);

        break;
      case "date":
        $date_value = parseDate($crit_data["values"]);
        if (!$date_value) {
          break;
        }
        if (isset($where_clause)) {
          $where_clause .= " $mainoperator ";
          $select_clause .= " left join $tables[user_attribute] as table$tc on table0.userid = table$tc.userid ";
        } else {
          $select_clause = " table$tc.userid from $tables[user_attribute] as table$tc ";
        }

        $where_clause .= ' ( table'.$tc.'.attributeid = '.$crit_data["attribute"].' and table'.$tc.'.value != "" and table'.$tc.'.value ';
        $dateoperator = '';
        switch ($crit_data["operator"]) {
          case "is":
            $where_clause .= ' = "'.$date_value . '" )';$dateoperator = '=';break;
          case "isnot":
            $where_clause .= ' != "'.$date_value . '" )';$dateoperator = '!=';break;
          case "isbefore":
            $where_clause .= ' <= "'.$date_value . '" )';$dateoperator = '<=';break;
          case "isafter":
            $where_clause .= ' >= "'.$date_value . '" )';$dateoperator = '>=';break;
        }
#        $where_clause .= " )";
        $subqueries[$i]['query'] = sprintf('select userid from %s where attributeid = %d and value != "" and value %s "%s" ',$GLOBALS['tables']['user_attribute'],
          $crit_data['attribute'],
          $dateoperator,
          $date_value);

        break;
      default:
        if (isset($where_clause)) {
          $where_clause .= " $mainoperator ";
          $select_clause .= " left join $tables[user_attribute] as table$tc on table0.userid = table$tc.userid ";
        } else {
          $select_clause = " table$tc.userid from $tables[user_attribute] as table$tc ";
        }

        $where_clause .= " ( table$tc.attributeid = ".$crit_data["attribute"]." and table$tc.value ";
        if ($crit_data["operator"] == "isnot") {
          $where_clause .= ' not in (';
        } else {
          $where_clause .= ' in (';
        }
        $where_clause .= cleanCommaList($crit_data["values"]) . ") )";
        $subqueries[$i]['query'] = sprintf('select userid from %s
        where attributeid = %d and
        value %s in (%s) ',$GLOBALS['tables']['user_attribute'],
          $crit_data['attribute'],
          $crit_data["operator"] == "isnot" ? 'not' :'',
          $crit_data["values"]);

    }
    $tc++;
  }
}
$existing_criteria = '';
if (sizeof($subqueries)) {
#    $count_query = "select distinct $select_clause where $where_clause";
#    $count_query = addslashes($count_query);
  if (!empty($_GET["calculate"])) {
    ob_end_flush();
   # print "<h1>$count_query</h1>";
    print "<p>".$GLOBALS['I18N']->get("calculating")." ...";
    flush();
  }
  foreach ($subqueries as $qid => $querydetails) {
    $req = Sql_Query($querydetails['query']);
    $subqueries[$qid]['results'] = array();
    while ($row = Sql_Fetch_Row($req)) {
      array_push($subqueries[$qid]['results'],$row[0]);
    }
  }
  $first = array_shift($subqueries);
  $userids = $first['results'];
  foreach ($subqueries as $subquery) {
    if ($messagedata['criteria_overall_operator'] == 'all') {
      $userids = array_intersect($userids,$subquery['results']);
    } else {
      $userids = array_merge($userids,$subquery['results']);
    }
  }
  $userids = array_unique($userids);
  $num_users = sizeof($userids);

  $count_query = sprintf('select * from %s where id in (%s)',$GLOBALS['tables']['user'],join(', ',$userids));

  if (!empty($_GET["calculate"])) {
    printf('.. '.$GLOBALS['I18N']->get('%d users apply'),$num_users).'</p>';
  }

  if ($messageid) {
    Sql_query(sprintf('update %s set userselection = "%s" where id = %d',
      $tables["message"],addslashes($count_query),$messageid));
  }

  if (!isset($_GET['calculate'])) {
    $ls->addButton($GLOBALS['I18N']->get("calculate"),$baseurl.'&amp;tab='.$_GET["tab"].'&amp;calculate=1');
  } else {
    $ls->addButton($GLOBALS['I18N']->get("reload"),$baseurl.'&amp;tab='.$_GET["tab"]);
  }
  $existing_criteria = $ls->display();
} else {
  if ($messageid) {
    Sql_query(sprintf('update %s set userselection = "" where id = %d',
      $tables["message"],$messageid));
  }
}


} // end of define STACKED_ATTRIBUTES

##############################
# Stacked attributes, end
##############################


// Pull in $footer variable from post
if (isset($_POST["footer"]))
  $footer = $_POST["footer"];

// If $id wasn't passed in (if it was passed, then $_POST should have
// the database value in it already, and if it's empty, then we should
// leave it empty) and $footer is blank, load the default.
if (!$footer)
  $footer = getConfig("messagefooter");

echo $errormsg;
if (!$done) {
  if (ALLOW_ATTACHMENTS) {
    $enctype = 'enctype="multipart/form-data"';
  } else {
    $enctype = '';
  }

  #$baseurl = sprintf('./?page=%s&amp;id=%d',$_GET["page"],$_GET["id"]);
  if ($_GET["id"]) {
    $tabs = new WebblerTabs();
    $tabs->addTab($GLOBALS['I18N']->get("Content"),"$baseurl&amp;tab=Content");
    if (FORWARD_ALTERNATIVE_CONTENT) {
      $tabs->addTab($GLOBALS['I18N']->get("Forward"),"$baseurl&amp;tab=Forward");
    }
    $tabs->addTab($GLOBALS['I18N']->get("Format"),"$baseurl&amp;tab=Format");
    if (ALLOW_ATTACHMENTS) {
      $tabs->addTab($GLOBALS['I18N']->get("Attach"),"$baseurl&amp;tab=Attach");
    }
    $tabs->addTab($GLOBALS['I18N']->get("Scheduling"),"$baseurl&amp;tab=Scheduling");
#    if (USE_RSS) {
#      $tabs->addTab("RSS","$baseurl&amp;tab=RSS");
#    }
    $tabs->addTab($GLOBALS['I18N']->get("Criteria"),"$baseurl&amp;tab=Criteria");
    $tabs->addTab($GLOBALS['I18N']->get("Lists"),"$baseurl&amp;tab=Lists");
#    $tabs->addTab("Review and Send","$baseurl&amp;tab=Review");
    $tabs->addTab($GLOBALS['I18N']->get("Misc"),"$baseurl&amp;tab=Misc");

    if ($_GET["tab"]) {
      $tabs->setCurrent($GLOBALS['I18N']->get($_GET["tab"]));
    } else {
      $tabs->setCurrent($GLOBALS['I18N']->get("Content"));
    }
    if (defined("WARN_SAVECHANGES")) {
      $tabs->addLinkCode(' onClick="return savechanges();" ');
    }
    print $tabs->display();
  }

  ?>
  <p></p>
  <script language="Javascript">
  // some debugging stuff to see what happens
  function checkForm() {
    return true;
    for (var i=0;i<document.sendmessageform.elements.length;i++) {
      alert(document.sendmessageform.elements[i].name+" "+document.sendmessageform.elements[i].value);
    }
    return true;
  }

  // detection of unsaved changes,
  var browser = navigator.appName.substring ( 0, 9 );
  var changed = 0; function haschanged() {changed = 1; }
  function savechanges() { if (changed) { if (confirm("<?php echo str_replace('"','&quot',reverse_htmlentities($GLOBALS['I18N']->get("unsavedchanges")))?>")) return true; else return false; return false;}}
  //'
  var event_number = 0;if (browser=="Microsoft") {  document.onkeydown=haschanged;  document.onchange=haschanged;} else if (browser=="Netscape") {  document.captureEvents(Event.KEYDOWN);  document.captureEvents(Event.CHANGE); document.onkeydown=haschanged;document.onchange=haschanged;}
  function submitform() { document.sendmessageform.submit() }
  </script>
  <?php
  print formStart($enctype . ' name="sendmessageform"');
  #print '<form method="post" enctype="multipart/form-data" name="sendmessageform" onSubmit="return checkForm()">';
  print '<input type=hidden name="workaround_fck_bug" value="1">';

  if ($_GET["page"] == "preparemessage")
    print Help("preparemessage",$GLOBALS['I18N']->get("whatisprepare"));

  if (!defined("IN_WEBBLER")) {
    if (!$from && is_object($GLOBALS["admin_auth"]) && $GLOBALS['require_login']) {
      $adminemail = $GLOBALS["admin_auth"]->adminEmail($_SESSION["logindetails"]["id"]);
      if ($adminemail && USE_ADMIN_DETAILS_FOR_MESSAGES) {
        $from = $GLOBALS["admin_auth"]->adminName($_SESSION["logindetails"]["id"]).' '.$adminemail;
      } else {
        $from = getConfig("message_from_name") . ' '.getConfig("message_from_address");
      }
    }
  }

  $formatting_content = '<table>';
  
  #0013076: different content when forwarding 'to a friend'
  //  value="'.htmlentities($subject,ENT_QUOTES,'UTF-8').'" size=40></td></tr> --> previous code in line 1032
  //  value="'.htmlentities($from,ENT_QUOTES,'UTF-8').'" size=40></td></tr> --> previous code in line 1038

  $tmp = '<table>';
  $maincontent = $tmp;
  $forwardcontent = $tmp;

  $scheduling_content = '<table>';
// custom code - start
  $utf8_subject = $subject;
  $utf8_from = $from;
  if (strcasecmp($GLOBALS['strCharSet'], 'utf-8') <> 0 && function_exists('iconv')) {
     $utf8_subject = iconv($GLOBALS['strCharSet'],'UTF-8',$utf8_subject);
     $utf8_from = iconv($GLOBALS['strCharSet'],'UTF-8',$utf8_from);
  }

  $maincontent .= '
  <tr><td>'.Help("subject").' '.$GLOBALS['I18N']->get("Subject").':</td>
    <td><input type=text name="msgsubject"
    value="'.htmlentities($utf8_subject,ENT_QUOTES,'UTF-8').'" size=40></td></tr>
  <tr>
    <td colspan=2>
    </td></tr>
  <tr><td>'.Help("from").' '.$GLOBALS['I18N']->get("fromline").':</td>
    <td><input type=text name=from
   value="'.htmlentities($utf8_from,ENT_QUOTES,'UTF-8').'" size=40></td></tr>
  <tr><td colspan=2>

  </td></tr>';

// custom code - end
  #0013076: different content when forwarding 'to a friend'
  $forwardcontent .= $GLOBALS['I18N']->get("When a user forwards to a friend," .
  " the friend will receive this message instead of the one on the content tab.").
  '<tr><td>'.Help("subject").' '.$GLOBALS['I18N']->get("Subject").':</td>
    <td><input type=text name="forwardsubject"
    value="'.htmlentities($forwardsubject,ENT_QUOTES,'UTF-8').'" size=40></td></tr>
  <tr>
    <td colspan=2>
    </td></tr>
  <td colspan=2>

  </td></tr>';

  $scheduling_content .= '
  <tr><td>'.Help("embargo").' '.$GLOBALS['I18N']->get("embargoeduntil").':</td>
    <td>'.$embargo->showInput("embargo","",$_POST["embargo"]).'</td></tr>
  </td></tr>';

  if (USE_REPETITION) {
    $repeatinterval = $_POST["repeatinterval"];

    $scheduling_content .= '
    <tr><td>'.Help("repetition").' '.$GLOBALS['I18N']->get("repeatevery").':</td><td>
    <select name="repeatinterval">
    <option value="0"';
      if ($repeatinterval == 0) { $scheduling_content .= " SELECTED"; }
      $scheduling_content .= '>-- '.$GLOBALS['I18N']->get("norepetition").'</option>
      <option value="60"';
      if ($repeatinterval == 60) { $scheduling_content .= " SELECTED"; }
      $scheduling_content .= '>'.$GLOBALS['I18N']->get("hour").'</option>
      <option value="1440"';
      if ($repeatinterval == 1440) { $scheduling_content .= " SELECTED"; }
      $scheduling_content .= '>'.$GLOBALS['I18N']->get("day").'</option>
      <option value="10080"';
      if ($repeatinterval == 10080) { $scheduling_content .= " SELECTED"; }
      $scheduling_content .= '>'.$GLOBALS['I18N']->get("week").'</option>
      </select>

    </td></tr>
    </td></tr>
    <tr><td>  '.$GLOBALS['I18N']->get("repeatuntil").':</td><td>'.$repeatuntil->showInput("repeatuntil","",$_POST["repeatuntil"]).'</td></tr>
    </td></tr>';
  }

/*
  $formatting_content .= '
    <tr><td colspan=2>'.Help("format").' '.$GLOBALS['I18N']->get("format").': <b>'.$GLOBALS['I18N']->get("autodetect").'</b>
    <input type=radio name="htmlformatted" value="auto" ';
    $formatting_content .= !isset($htmlformatted) || $htmlformatted == "auto"?"checked":"";
    $formatting_content .= '>
  <b>'.$GLOBALS['I18N']->get("html").'</b> <input type=radio name="htmlformatted" value="1" ';
    $formatting_content .= $htmlformatted == "1" ?"checked":"";
    $formatting_content .= '>
  <b>'.$GLOBALS['I18N']->get("text").'</b> <input type=radio name="htmlformatted" value="0" ';
    $formatting_content .= $htmlformatted == "0" ?"checked":"";
    $formatting_content .= '></td></tr>';
*/
  $formatting_content .= '<input type=hidden name="htmlformatted" value="auto">';

  $formatting_content .= '
    <tr><td colspan=2>'.Help("sendformat").' '.$GLOBALS['I18N']->get("sendas").':
  '.$GLOBALS['I18N']->get("html").' <input type=radio name="sendformat" value="HTML" ';
    $formatting_content .= $_POST["sendformat"]=="HTML"?"checked":"";
    $formatting_content .= '>
  '.$GLOBALS['I18N']->get("text").' <input type=radio name="sendformat" value="text" ';
    $formatting_content .= $_POST["sendformat"]=="text"?"checked":"";
    $formatting_content .= '>
  ';

  if (USE_PDF) {
    $formatting_content .= $GLOBALS['I18N']->get("pdf").' <input type=radio name="sendformat" value="PDF" ';
    $formatting_content .= $_POST["sendformat"]=="PDF"?"checked":"";
    $formatting_content .= '>';
  }

//  0009687: Confusing use of the word "Both", indicating one email with both text and html and not two emails
//  $formatting_content .= $GLOBALS['I18N']->get("textandhtml").' <input type=radio name="sendformat" value="text and HTML" ';
//  $formatting_content .= $_POST["sendformat"]=="text and HTML" || !isset($_POST["sendformat"]) ?"checked":"";
//  $formatting_content .= '>';

  if (USE_PDF) {
    $formatting_content .= $GLOBALS['I18N']->get("textandpdf").' <input type=radio name="sendformat" value="text and PDF" ';
    $formatting_content .= $_POST["sendformat"]=="text and PDF" ?"checked":"";
    $formatting_content .= ' >';
  }
  $formatting_content .= '</td></tr>';

  $req = Sql_Query("select id,title from {$tables["template"]} order by listorder");
  if (Sql_affected_Rows()) {
    $formatting_content .= '<tr><td>'.Help("usetemplate").' '.$GLOBALS['I18N']->get("usetemplate").': </td>
      <td><select name="template"><option value=0>-- '.$GLOBALS['I18N']->get("selectone").'</option>';
    $req = Sql_Query("select id,title from {$tables["template"]} order by listorder");
    while ($row = Sql_Fetch_Array($req)) {
      $formatting_content .= sprintf('<option value="%d" %s>%s</option>',$row["id"], $row["id"]==$_POST["template"]?'SELECTED':'',$row["title"]);
    }
    $formatting_content .= '</select></td></tr>';
  }

  if (ENABLE_RSS) {
    $rss_content .= '<tr><td colspan=2>'.$GLOBALS['I18N']->get("rssintro").'
    </td></tr>';
    $rss_content .= '<tr><td colspan=2><input type=radio name="rsstemplate" value="none">'.$GLOBALS['I18N']->get("none").' ';
    foreach ($rssfrequencies as $key => $val) {
      $rss_content .= sprintf('<input type=radio name="rsstemplate" value="%s" %s>%s ',$key,$_POST["rsstemplate"] == $key ? "checked":"",$val);
    }
    $rss_content .= '</td></tr>';
  }

  #0013076: different content when forwarding 'to a friend'
  $tmp = '<tr><td colspan=2>'.Help("message").' '.$GLOBALS['I18N']->get("message").'. </td></tr>

  <tr><td colspan=2>';
  $maincontent .= $tmp; 
  $forwardcontent .= $tmp;

  if ($usefck) {
    $oFCKeditor = new FCKeditor('message') ;
    $oFCKeditor->BasePath = './FCKeditor/';
    //$oFCKeditor->ToolbarSet = 'Accessibility' ;
    $oFCKeditor->ToolbarSet = 'Default' ;
//    $oFCKeditor->Value = stripslashes($_POST["message"]);
    $oFCKeditor->Value = $_POST["message"];
    $w = getConfig("fckeditor_width");
    $h = getConfig("fckeditor_height");
    if ($_SESSION["fckeditor_height"]) {
      $h = sprintf('%d',$_SESSION["fckeditor_height"]);
    }

    # version 1.4
#    $maincontent .= $oFCKeditor->ReturnFCKeditor( 'message', $w.'px', $h.'px' ) ;

    # for version 2.0
    if ($h < 400) {
      $h = 400;
    }
    $oFCKeditor->Height = $h;
    $oFCKeditor->Width = $w;
    $maincontent .= $oFCKeditor->CreateHtml() ;
    $maincontent .= '</td></tr>';

    $maincontent .= '<script language="Javascript" type="text/javascript">
    function expand() {
      document.sendmessageform.expand.value = 1;
      document.sendmessageform.save.value = 1
      document.sendmessageform.submit();
    }
    </script>';

    $maincontent .= '<tr><td colspan=2 align=right><a href="javascript:expand();" class="button">'.$GLOBALS['I18N']->get("expand").'</a></td></tr>';

  } elseif ($useTinyMCE) {

  $tinyMCE_path = TINYMCEPATH;
  $tinyMCE_lang = TINYMCELANG;
  $tinyMCE_theme = TINYMCETHEME;
  $tinyMCE_opts = TINYMCEOPTS;

  $maincontent .= "<script language='javascript' type='text/javascript' src='{$tinyMCE_path}'></script>\n"
        ."<script language='javascript' type='text/javascript'>\n"
        ."   tinyMCE.init({\n"
        ."      mode : 'exact',\n"
        ."    elements : 'message',\n"
        ."    language : '{$tinyMCE_lang}',\n"
        ."    theme : '{$tinyMCE_theme}'\n"
        ."    {$tinyMCE_opts}\n"
        ."   });\n"
        ."</script>\n"
        ."<textarea name='message' id='message' cols='65' rows='20'>{$_POST['message']}</textarea>";
        
  } else {
    $maincontent    .= '<textarea name=message cols=65 rows=20>'.htmlspecialchars($_POST["message"]).'</textarea>';
  }

  #0013076: different content when forwarding 'to a friend'
  $forwardcontent .= '<textarea name=forwardmessage cols=65 rows=20>'.htmlspecialchars($forwardmessage).'</textarea>';

  #0013076: different content when forwarding 'to a friend'
  $tmp = '
  </td></tr>
  ';
  $maincontent .= $tmp;
  $forwardcontent .= $tmp;

  if (USE_MANUAL_TEXT_PART) {
  $maincontent .= '<tr><td colspan=2>
    '.$GLOBALS['I18N']->get("plaintextversion").'
  </td></tr>
  <tr><td colspan=2>
    <textarea name=textmessage cols=65 rows=20>'.$_POST["textmessage"].'</textarea>
  </td></tr>';
  }

  #0013076: different content when forwarding 'to a friend'
  $maincontent .= '<tr><td colspan=2>'.$GLOBALS['I18N']->get("messagefooter").'. <br/>
    '.$GLOBALS['I18N']->get("messagefooterexplanation").'<br/>'.
    $GLOBALS['I18N']->get("use [FORWARD] to add a personalised URL to forward the message to someone else.").
  '.</td></tr>
  <tr><td colspan=2><textarea name=footer cols=65 rows=5>'.$footer.'</textarea></td></tr>
  </table>';
  $forwardcontent .= '<tr><td colspan=2>'.$GLOBALS['I18N']->get("forwardfooter").'. <br/>
    '.$GLOBALS['I18N']->get("messageforwardfooterexplanation").'<br/>'.
  '.</td></tr>
  <tr><td colspan=2><textarea name=forwardfooter cols=65 rows=5>'.$forwardfooter.'</textarea></td></tr>
  </table>';

  if (ALLOW_ATTACHMENTS) {
    // If we have a message id saved, we want to query the attachments that are associated with this
    // message and display that (and allow deletion of!)

    $att_content = '<table><tr><td colspan=2>'.Help("attachments").' '.$GLOBALS['I18N']->get("addattachments").' </td></tr>';
    $att_content .= '<tr><td colspan=2>
      '.$GLOBALS['I18N']->get("uploadlimits").':<br/>
      '.$GLOBALS['I18N']->get("maxtotaldata").': '.ini_get("post_max_size").'<br/>
      '.$GLOBALS['I18N']->get("maxfileupload").': '.ini_get("upload_max_filesize").'</td></tr>';

    if ($id) {
      $result = Sql_Query(sprintf("Select Att.id, Att.filename, Att.remotefile, Att.mimetype, Att.description, Att.size, MsgAtt.id linkid".
                        " from %s Att, %s MsgAtt where Att.id = MsgAtt.attachmentid and MsgAtt.messageid = %d",
        $tables["attachment"],
        $tables["message_attachment"],
        $id));


      $tabletext = "";
      $ls = new WebblerListing($GLOBALS['I18N']->get('currentattachments'));

      while ($row = Sql_fetch_array($result)) {
  #      $tabletext .= "<tr><td>".$row["remotefile"]."</td><td>".$row["description"]."&nbsp;</td><td>".$row["size"]."</td>";
        $ls->addElement($row["id"]);
        $ls->addColumn($row["id"],$GLOBALS['I18N']->get('filename'),$row["remotefile"]);
        $ls->addColumn($row["id"],$GLOBALS['I18N']->get('desc'),$row["description"]);
        $ls->addColumn($row["id"],$GLOBALS['I18N']->get('size'),$row["size"]);
        $phys_file = $GLOBALS["attachment_repository"]."/".$row["filename"];
        if (is_file($phys_file) && filesize($phys_file)) {
          $ls->addColumn($row["id"],$GLOBALS['I18N']->get('file'),$GLOBALS["img_tick"]);
        } else {
          $ls->addColumn($row["id"],$GLOBALS['I18N']->get('file'),$GLOBALS["img_cross"]);
        }
        $ls->addColumn($row["id"],$GLOBALS['I18N']->get('del'),sprintf('<input type=checkbox name="deleteattachments[]" value="%s">',$row["linkid"]));

        // Probably need to check security rights here...
  #      $tabletext .= "<td><input type=checkbox name=\"deleteattachments[]\" value=\"".$row["linkid"]."\"></td>";
  #      $tabletext .= "</tr>\n";
      }
      $ls->addButton($GLOBALS['I18N']->get('delchecked'),"javascript:document.sendmessageform.submit()");
      $att_content .= '<tr><td colspan=2>'.$ls->display().'</td></tr>';

  #    if ($tabletext) {
  #      print "<tr><td colspan=2><table border=1><tr><td>Filename</td><td>Description</td><td>Size</td><td>&nbsp;</td></tr>\n";
  #      print "$tabletext";
  #      print "<tr><td colspan=4 align=\"center\"><input type=submit name=deleteatt value=\"Delete Checked\"></td></tr>";
  #      print "</table></td></tr>\n";
  #    }
    }
    for ($att_cnt = 1;$att_cnt <= NUMATTACHMENTS;$att_cnt++) {
      $att_content .=sprintf ('<tr><td>%s</td><td><input type=file name="attachment%d">&nbsp;&nbsp;<input type=submit name="save" value="%s"></td></tr>',$GLOBALS['I18N']->get('newattachment'),$att_cnt,$GLOBALS['I18N']->get('addandsave'));
      if (FILESYSTEM_ATTACHMENTS) {
        $att_content .= sprintf('<tr><td><b>%s</b> %s:</td><td><input type=text name="localattachment%d" size="50"></td></tr>',$GLOBALS['I18N']->get('or'),$GLOBALS['I18N']->get('pathtofile'),$att_cnt,$att_cnt);
      }
      $att_content .= sprintf ('<tr><td colspan=2>%s:</td></tr>
        <tr><td colspan=2><textarea name="attachment%d_description" cols=65 rows=3 wrap="virtual"></textarea></td></tr>',$GLOBALS['I18N']->get('attachmentdescription'),$att_cnt);
    }
    $att_content .= '</table>';
    # $shader = new WebblerShader("Attachments");
    # $shader->addContent($att_content);
    # $shader->initialstate = 'closed';
    # print $shader->display();
  }

  // Load the email address for the admin user so we can use that as the default value in the testtarget field
  # @@@ this only works with phplist authentication, needs to be abstracted
  if (!isset($_POST["testtarget"])) {
    $res = Sql_Query(sprintf("Select email from %s where id = %d", $tables["admin"], $_SESSION["logindetails"]["id"]));
    $admin_details = Sql_Fetch_Array($res);

    $_POST["testtarget"] = $admin_details["email"];
  }
  // if there isn't one, load the developer one, just being lazy here :-)
  if (!$_POST["testtarget"]) {
    $_POST["testtarget"] = $GLOBALS["developer_email"];
  }

  // Display the HTML for the "Send Test" button, and the input field for the email addresses
  $sendtest_content = sprintf('<hr /><table><tr><td valign="top">
    <input type=submit name=sendtest value="%s"> %s: </td>
    <td><input type=text name="testtarget" size=40 value="'.$_POST["testtarget"].'"><br />%s
    </td></tr></table><hr />',
    $GLOBALS['I18N']->get('sendtestmessage'),$GLOBALS['I18N']->get('toemailaddresses'),
    $GLOBALS['I18N']->get('sendtestexplain'));

  $criteria_content = $GLOBALS['I18N']->get('criteriaexplanation').'
  <table>
  ';

  $any = 0;
  for ($i=1;$i<=NUMCRITERIAS;$i++) {
    $criteria_content .= sprintf('<tr><td colspan=2><hr><h3>%s %d</h3></td>
    <td>%s <input type=checkbox name="use[%d]"></tr>',$GLOBALS['I18N']->get('criterion'),$i,
    $GLOBALS['I18N']->get('usethisone'),$i);
    $attributes_request = Sql_Query("select * from $tables[attribute]");
    while ($attribute = Sql_Fetch_array($attributes_request)) {
      $criteria_content .= "\n\n";
      $criteria_content .= sprintf('<input type=hidden name="attrtype[%d]" value="%s">',
        $attribute["id"],$attribute["type"]);
      switch ($attribute["type"]) {
        case "checkbox":
          $any = 1;
          $criteria_content .= sprintf ('<tr><td><input type="radio" name="criteria[%d]" value="%d">
             %s</td><td><b>%s</b></td><td><select name="attr%d%d[]">
                  <option value="0">Not checked
                  <option value="1">Checked</select></td></tr>',
                  $i,$attribute["id"],
                  $attribute["name"],$GLOBALS['I18N']->get('is'),$attribute["id"],$i);
          break;
        case "select":
        case "radio":
        case "checkboxgroup":
          $some = 0;
          $thisone = "";
          $values_request = Sql_Query("select * from $table_prefix"."listattr_".$attribute["tablename"]);
          $thisone .= sprintf ('<tr><td valign=top><input type="radio" name="criteria[%d]" value="%d"> %s</td>
                  <td valign=top><b>%s</b></td><td><select name="attr%d%d[]" size=4 multiple>',
                  $i,$attribute["id"],strip_tags($attribute["name"]),$GLOBALS['I18N']->get('is'),$attribute["id"],$i);
          while ($value = Sql_Fetch_array($values_request)) {
            $some =1;
            $thisone .= sprintf ('<option value="%d">%s',$value["id"],$value["name"]);
          }
          $thisone .= "</select></td></tr>";
          if ($some)
            $criteria_content .= $thisone;
          $any = $any || $some;
          break;
        default:
          $criteria_content .= "\n<!-- error: huh, unknown type ".$attribute["type"]." -->\n";
      }
    }
  }

  if (!$any) {
    $criteria_content = "<p>".$GLOBALS['I18N']->get('nocriteria')."</p>";
  } else {
  #  $shader = new WebblerShader("Message Criteria");
  #  $shader->addContent($criteria_content.'</table>');
  #  $shader->hide();
  #  print $shader->display();
  }

  ##############################
  # Stacked attributes, display
  ##############################

  if (STACKED_ATTRIBUTE_SELECTION) {

  /* new criteria content system */
  # list existing defined ones:
  # find out how many there are
  if ($messageid) {
    $id = $messageid;
  }

  $att_js = '
  <script language="Javascript" type="text/javascript">
    var values = Array();
    var operators = Array();
    var value_divs = Array();
    var value_default = Array();
  ';
  if (sizeof($used_attributes)) {
    $already_used = ' and id not in ('.join(',',$used_attributes).')';
  } else {
    $already_used = "";
  }
  $att_drop = '';
  $attreq = Sql_Query(sprintf('select * from %s where type in ("select","radio","date","checkboxgroup","checkbox") %s',$tables["attribute"],$already_used));
  while ($att = Sql_Fetch_array($attreq)) {
    $att_drop .= sprintf('<option value="%d" %s>%s</option>',
      $att["id"],"",$att["name"]);
    $num = Sql_Affected_Rows();
    switch ($att["type"]) {
      case "select":case "radio":case "checkboxgroup":
        $att_js .= sprintf('value_divs[%d] = "criteria_values_select";'."\n",$att["id"]);
        $att_js .= sprintf('value_default[%d] = "";'."\n",$att["id"]);
        $value_req = Sql_Query(sprintf('select * from %s order by listorder,name',
          $GLOBALS["table_prefix"]."listattr_".$att["tablename"]));
        $num = Sql_Num_Rows($value_req);
        $att_js .= sprintf('values[%d] = new Array(%d);'."\n",$att["id"],$num+1);
        #$att_js .= sprintf('values[%d][0] =  new Option("[choose]","0",false,true);'."\n",$att["id"]);
        $c = 0;
        while ($value = Sql_Fetch_Array($value_req)) {
          $att_js .= sprintf('values[%d][%d] =  new Option("%s","%d",false,false);'."\n",$att["id"],
            $c,$value["name"],$value["id"]);
          $c++;
        }
        $att_js .= sprintf('operators[%d] = new Array(2);'."\n",$att["id"]);
        $att_js .= sprintf('operators[%d][0] =  new Option("%s","is",false,true);'."\n",$att["id"],$GLOBALS['I18N']->get('is'));
        $att_js .= sprintf('operators[%d][1] =  new Option("%s","isnot",false,true);'."\n",$att["id"],$GLOBALS['I18N']->get('isnot'));
        break;
      case "checkbox":
        $att_js .= sprintf('value_divs[%d] = "criteria_values_select";'."\n",$att["id"]);
        $att_js .= sprintf('value_default[%d] = "";'."\n",$att["id"]);
        $att_js .= sprintf('values[%d] = new Array(%d);'."\n",$att["id"],2);
        $att_js .= sprintf('values[%d][0] =  new Option("%s",0,false,true);'."\n",$att["id"],$GLOBALS['I18N']->get('unchecked'));
        $att_js .= sprintf('values[%d][1] =  new Option("%s",1,false,true);'."\n",$att["id"],$GLOBALS['I18N']->get('checked'));
        $att_js .= sprintf('operators[%d] = new Array(2);'."\n",$att["id"]);
        $att_js .= sprintf('operators[%d][0] =  new Option("%s","is",false,true);'."\n",$att["id"],$GLOBALS['I18N']->get('is'));
        $att_js .= sprintf('operators[%d][1] =  new Option("%s","isnot",false,true);'."\n",$att["id"],$GLOBALS['I18N']->get('isnot'));
        break;
      case "date":
        $att_js .= sprintf('value_divs[%d] = "criteria_values_text";'."\n",$att["id"]);
        $att_js .= sprintf('value_default[%d] = "%s";'."\n",$att["id"],$GLOBALS['I18N']->get('dd-mm-yyyy'));
        $att_js .= sprintf('values[%d] = new Array(%d);'."\n",$att["id"],1);
        $att_js .= sprintf('values[%d][%d] =  new Option("%s","%d",false,false);'."\n",$att["id"],$c,
          "Date","dd-mm-yyyy"); # just to avoid javascript errors, not actually used
        $att_js .= sprintf('operators[%d] = new Array(4);'."\n",$att["id"]);
        $att_js .= sprintf('operators[%d][0] =  new Option("%s","is",false,true);'."\n",$att["id"],$GLOBALS['I18N']->get('is'));
        $att_js .= sprintf('operators[%d][1] =  new Option("%s","isnot",false,true);'."\n",$att["id"],$GLOBALS['I18N']->get('isnot'));
        $att_js .= sprintf('operators[%d][2] =  new Option("%s","isbefore",false,true);'."\n",$att["id"],$GLOBALS['I18N']->get('isbefore'));
        $att_js .= sprintf('operators[%d][3] =  new Option("%s","isafter",false,true);'."\n",$att["id"],$GLOBALS['I18N']->get('isafter'));
    }
  }
  $att_js .= '

  var browser = navigator.appName.substring ( 0, 9 );
  var warned = browser != "Microsoft";

  function findEl(name) {
    var div;
    if (document.getElementById){
      div = document.getElementById(name);
    } else if (document.all){
      div = document.all[name];
    }
    return div;
  }

  function changeDropDowns() {
    var choice = document.sendmessageform.criteria_attribute.options[document.sendmessageform.criteria_attribute.selectedIndex].value;
    if (choice == "")
      return;
    if (!warned) {
      alert("'.$GLOBALS['I18N']->get('buggywithie').'");
      warned = 1;
    }
    var value_el_select = findEl("criteria_values_select");
    var value_el_text = findEl("criteria_values_text");
    for (i=0;i<value_el_select.length;) {
      value_el_select.options[i] = null;
    }
    for (i=0;i<values[choice].length;i++) {
      value_el_select.options[i] = values[choice][i];
    }
    value_el_select.selectedIndex = 0;
    value_el_text.value = value_default[choice];

    for (i=0;i<document.sendmessageform.criteria_operator.length;) {
      document.sendmessageform.criteria_operator.options[i] = null;
    }
    for (i=0;i<operators[choice].length;i++) {
      document.sendmessageform.criteria_operator.options[i] = operators[choice][i];
    }
    document.sendmessageform.criteria_operator.selectedIndex = 0;
    var div1 = findEl("criteria_values_select");
    var div2 = findEl("criteria_values_text");
    var div3 = findEl(value_divs[choice]);
    div1.style.visibility = "hidden";
    div2.style.visibility = "hidden";
    div3.style.visibility = "visible";

  }
  </script>

  ';

  $att_drop = '<select name="criteria_attribute" onChange="changeDropDowns()" class="criteria_element" >';
  $att_drop .= '<option value="">['.$GLOBALS['I18N']->get('selectattribute').']</option>';
  $att_names = '';# to remember them later
  $attreq = Sql_Query(sprintf('select * from %s where type in ("select","radio","date","checkboxgroup","checkbox") %s',$tables["attribute"],$already_used));
  while ($att = Sql_Fetch_array($attreq)) {
    $att_drop .= sprintf('<option value="%d" %s>%s</option>',
      $att["id"],"",substr(stripslashes($att["name"]),0,30).' ('.$GLOBALS['I18N']->get($att["type"]).')');
    $att_names .= sprintf('<input type=hidden name="attribute_names[%d]" value="%s">',$att["id"],stripslashes($att["name"]));
  }
  $att_drop .= '</select>'.$att_names;

  $operator_drop = '
    <select name="criteria_operator" class="criteria_element" >
    <option value="is">'.$GLOBALS['I18N']->get('is').'</option>
    <option value="isnot">'.$GLOBALS['I18N']->get('isnot').'</option>
    <option value="isbefore">'.$GLOBALS['I18N']->get('isbefore').'</option>
    <option value="isafter">'.$GLOBALS['I18N']->get('isafter').'</option>
  </select>
  ';

  $values_drop = '
  <style type="text/css">
  #criteria_values_select {
    visibility : hidden;
    background-color: #ffffff;
  }
  #criteria_values_select > option {
    background-color: #ffffff;
  }
  #criteria_values_text {
    visibility : hidden;
  }
  span.values_span {
    vertical-align: top;
    display: block;
  }
  input.criteria_element {
    vertical-align: top;
  }
  select.criteria_element {
    vertical-align: top;
  }

  </style>';
  $values_drop .= '<span id="values_span" class="values_span">';
  $values_drop .= '<input class="criteria_element" name="criteria_values[]" id="criteria_values_text" size=15 type=text>';
#  $values_drop .= '</span>';
#  $values_drop .= '<span id="values_select">';
  $values_drop .= '<select class="criteria_element" name="criteria_values[]" id="criteria_values_select" multiple size=10></select>';
  $values_drop .= '</span>';

  $existing_overall_operator = $messagedata['criteria_overall_operator'] == "any" ? "any":"all";
  $criteria_overall_operator =
    sprintf('%s <input type="radio" name="criteria_match" value="all" %s>
      %s <input type="radio" name="criteria_match" value="any" %s>',
      $GLOBALS['I18N']->get('matchallrules'),
      $existing_overall_operator == "all"? "checked":"",
      $GLOBALS['I18N']->get('matchanyrules'),
      $existing_overall_operator == "any"? "checked":"");

  $criteria_styles = '
  <style type="text/css">

  div.criteria_container {
    /*border: 1px solid black;
    background-color: #ffeeee;*/
    width: 100%;
    z-index: 8;
  }
  span.criteria_element {
    vertical-align: top;
    display: inline;
  }
  </style>';



  $criteria_content = $criteria_overall_operator.$existing_criteria.$criteria_styles.$att_js.
  '<div class="criteria_container">'.
  '<span class="criteria_element">'.$att_drop.'</span>'.
  '<span class="criteria_element">'.$operator_drop.'</span>'.
  '<span class="criteria_element">'.$values_drop.'</span>'.
  '<span class="criteria_element"><input type=submit name="save" value="'.$GLOBALS['I18N']->get('addcriterion').'"></span>';
  '</div>';
  } // end of if (STACKED_ATTRIBUTE_SELECTION)

  ##############################
  # Stacked attributes, display end
  ##############################

  # notification of progress of message sending
  # defaulting to admin_details['email'] gives the wrong impression that this is the
  # value in the database, so it's better to leave that empty instead
  $notify_start = isset($messagedata['notify_start'])?$messagedata['notify_start']:'';#$admin_details['email'];
  $notify_end = isset($messagedata['notify_end'])?$messagedata['notify_end']:'';#$admin_details['email'];

  $notification_content = sprintf('
    <table>
    <tr valign="top"><td>%s<br/>%s</td><td><input type=text name="notify_start" value="%s" size="35"></td></tr>
    <tr valign="top"><td>%s<br/>%s</td><td><input type=text name="notify_end" value="%s" size="35"></td></tr>
    </table>',
    $GLOBALS['I18N']->get('email to alert when sending of this message starts'),
    $GLOBALS['I18N']->get('separate multiple with a comma'),$notify_start,
    $GLOBALS['I18N']->get('email to alert when sending of this message has finished'),
    $GLOBALS['I18N']->get('separate multiple with a comma'),$notify_end);
  $show_lists = 0;
  switch ($_GET["tab"]) {
    case "Attach": print $att_content; break;
    case "Criteria": print $criteria_content; break;
    case "Format": print $formatting_content;break;
    case "Scheduling": print $scheduling_content;
    case "RSS": print $rss_content;break;
    case "Lists": $show_lists = 1;break;
    case "Review": print $review_content; break;
    case "Misc": print $notification_content; break;
    case "Forward": print $forwardcontent; break;
    default:
      print $maincontent;
      break;
  }
}
print $sendtest_content;

if (!$_POST["status"]) {
  $savecaption = $GLOBALS['I18N']->get('saveasdraft');
} else {
  $savecaption = $GLOBALS['I18N']->get('savechanges');#"Save &quot;".$_POST["status"]."&quot; message edits";

}
print "<hr><table><tr><td><input type=submit name=\"save\" value=\"$savecaption\"></td></tr></table>\n<hr>\n";
print "<input type=hidden name=id value=$id>\n";
print "<input type=hidden name=status value=\"".$_POST["status"]."\">\n";
print '<input type=hidden name=expand value="0">';

?>
