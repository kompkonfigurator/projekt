<?php
require_once dirname(__FILE__).'/accesscheck.php';

$subselect = '';

if (!ALLOW_IMPORT) {
  print '<p>'.$GLOBALS['I18N']->get('import is not available').'</p>';
  return;
}

print '<script language="Javascript" src="js/progressbar.js" type="text/javascript"></script>';

ignore_user_abort();
set_time_limit(500);
ob_end_flush();
?>
<p>

<?php

if (!isset($GLOBALS["tmpdir"])) {
  $GLOBALS["tmpdir"] = ini_get("upload_tmp_dir");
}
if (!is_dir($GLOBALS["tmpdir"]) || !is_writable($GLOBALS["tmpdir"])) {
  $GLOBALS["tmpdir"] = ini_get("upload_tmp_dir");
}
#if (ini_get("open_basedir")) {
if (!is_dir($GLOBALS["tmpdir"]) || !is_writable($GLOBALS["tmpdir"])) {
  Warn($GLOBALS['I18N']->get('temp_dir_not_writeable')." (".$GLOBALS["tmpdir"].")");
}

if(isset($_REQUEST['import'])) {

  $test_import = (isset($_POST["import_test"]) && $_POST["import_test"] == "yes");
 /*
  if (!is_array($_POST["lists"]) && !$test_import) {
    Fatal_Error($GLOBALS['I18N']->get('select_list'));
    return;
  }
 */
  if(empty($_FILES["import_file"])) {
    Fatal_Error($GLOBALS['I18N']->get('none_specified'));
    return;
  }
  if(!$_FILES["import_file"]) {
    Fatal_Error($GLOBALS['I18N']->get('too_large_inexistant'));
    return;
  }
  if (filesize($_FILES["import_file"]['tmp_name']) > 1000000) {
    Fatal_Error($GLOBALS['I18N']->get('too_big'));
    return;
  }
  if( !preg_match("/^[0-9A-Za-z_\.\-\/\s \(\)]+$/", $_FILES["import_file"]["name"]) ) {
    Fatal_Error($GLOBALS['I18N']->get('wrong_characters').$_FILES["import_file"]["name"]);
    return;
  }
  if (!$_POST["notify"] && !$test_import) {
    Fatal_Error($GLOBALS['I18N']->get('signup_or_notify'));
    return;
  }
  $notify = $_POST["notify"];

  if ($_FILES["import_file"] && filesize($_FILES["import_file"]['tmp_name']) > 10) {
    $newfile = $GLOBALS['tmpdir'].'/'. $_FILES['import_file']['name'].time();
    move_uploaded_file($_FILES['import_file']['tmp_name'], $newfile);
    if( !($fp = fopen ($newfile, "r"))) {
      Fatal_Error($GLOBALS['I18N']->get('unreadable')." (".$newfile.")");
      return;
     }
    $email_list = fread($fp, filesize ($newfile));
    fclose($fp);
  } elseif ($_FILES["import_file"]) {
    Fatal_Error($GLOBALS['I18N']->get('empty_file'));
    return;
  }

  // Clean up email file
  $email_list = trim($email_list);
  $email_list = str_replace("\r","\n",$email_list);
  $email_list = str_replace("\n\r","\n",$email_list);
  $email_list = str_replace("\n\n","\n",$email_list);

  if (isset($_REQUEST['import_record_delimiter'])) {
    $import_record_delimiter = $_REQUEST['import_record_delimiter'];
  } else {
    $import_record_delimiter = "\n";
  }

  // Change delimiter for new line.
  if(isset($import_record_delimiter) && $import_record_delimiter != "" && $import_record_delimiter != "\n") {
    $email_list = str_replace($import_record_delimiter,"\n",$email_list);
  };

  if (!isset($import_field_delimiter) || $import_field_delimiter == "" || $import_field_delimiter == "TAB")
    $import_field_delimiter = "\t";

  // Check file for illegal characters
  $illegal_cha = array(",", ";", ":", "#","\t");
  for($i=0; $i<count($illegal_cha); $i++) {
    if( ($illegal_cha[$i] != $import_field_delimiter) && ($illegal_cha[$i] != $import_record_delimiter) && (strpos($email_list, $illegal_cha[$i]) != false) ) {
      Fatal_Error($GLOBALS['I18N']->get('invalid_delimiter')." $import_field_delimiter, $import_record_delimiter");return;
    }
  };

  // Split file/emails into array
  $email_list = explode("\n",$email_list);

  // Parse the lines into records
  $hasinfo = 0;
  foreach ($email_list as $line) {
    $uservalues = explode($import_field_delimiter,$line);
    $email = trim(array_shift($uservalues));
    $info = join(" ",$uservalues);
    $hasinfo = $hasinfo || $info != "";
    $user_list[$email] = array (
      "info" => $info
    );
  }

  if (sizeof($email_list) > 300 && !$test_import) {
    # this is a possibly a time consuming process, so lets show a progress bar
    print '<script language="Javascript" type="text/javascript"> document.write(progressmeter); start();</script>';
    flush();
    # increase the memory to make sure we are not running out
    ini_set("memory_limit","16M");
  }

  // View test output of emails
  if($test_import) {
    print $GLOBALS['I18N']->get('test_output').':<br>'.$GLOBALS['I18N']->get('one_email_per_line').'<br>'.$GLOBALS['I18N']->get('output_ok').' <a href="javascript:history.go(-1)">'.$GLOBALS['I18N']->get('back').'</a>'.$GLOBALS['I18N']->get('resubmit').'<br><br>';
    $i = 1;
    while (list($email,$data) = each ($user_list)) {
      $email = trim($email);
      if(strlen($email) > 4) {
        print "<b>$email</b><br>";
        $html = "";
        foreach (array("info") as $item)
          if ($user_list[$email][$item])
            $html .= "$item -> ".$user_list[$email][$item]."<br>";
        if ($html) print "<blockquote>$html</blockquote>";
      };
      if($i == 50) {break;};
      $i++;
    };

  // Do import
  } else {
    $count_email_add = 0;
    $count_email_exist = 0;
    $count_list_add = 0;
    if (isset($_REQUEST['lists']) && is_array($_REQUEST['lists'])) {
      $lists = $_REQUEST['lists'];
    } else {
      $lists = array();
    }
    $num_lists = sizeof($lists);
    $todo = sizeof($user_list);
    $done = 0;
    if ($hasinfo) {
      # we need to add an info attribute if it does not exist
      $req = Sql_Query("select id from ".$tables["attribute"]." where name = \"info\"");
      if (!Sql_Affected_Rows()) {
        # it did not exist
        Sql_Query(sprintf('insert into %s (name,type,listorder,default_value,required,tablename)
         values("info","textline",0,"",0,"info")', $tables["attribute"]));
      }
    }

    # which attributes were chosen, apply to all users
    $res = Sql_Query("select * from ".$tables["attribute"]);
    $attributes = array();
    while ($row = Sql_Fetch_Array($res)) {
      $fieldname = "attribute" .$row["id"];
      $attributes[$row["id"]] = $_POST[$fieldname];
    }

    while (list($email,$data) = each ($user_list)) {
      ## a lot of spreadsheet include those annoying quotes
      $email = str_replace('"', '', $email);      
      $done++;
      if ($done % 50 ==0) {
        print "$done/$todo<br/>";
        flush();
      }
      if(strlen($email) > 4) {
        $email = addslashes($email);
        // Annoying hack => Much too time consuming. Solution => Set email in users to UNIQUE()
        $result = Sql_query("SELECT id,uniqid FROM ".$tables["user"]." WHERE email = '$email'");
        if (Sql_affected_rows()) {
          // Email exist, remember some values to add them to the lists
          $user = Sql_fetch_array($result);
          $userid = $user["id"];
          $uniqid = $user["uniqid"];
          $history_entry = $GLOBALS['I18N']->get('import_user');
          $old_data = Sql_Fetch_Array_Query(sprintf('select * from %s where id = %d',$tables["user"],$userid));
          $old_data = array_merge($old_data,getUserAttributeValues('',$userid));
          # and membership of lists
          $req = Sql_Query("select * from {$tables["listuser"]} where userid = $userid");
          while ($row = Sql_Fetch_Array($req)) {
            $old_listmembership[$row["listid"]] = listName($row["listid"]);
          }
          $count_email_exist++;
        } else {

          // Email does not exist

          // Create unique number
          mt_srand((double)microtime()*1000000);
          $randval = mt_rand();
          include_once dirname(__FILE__)."/commonlib/lib/userlib.php";
          $uniqid = getUniqid();

          $query = sprintf('INSERT INTO %s (email,entered,confirmed,uniqid,htmlemail) values("%s",now(),%d,"%s","%s")',
          $tables["user"],$email,$notify != "yes",$uniqid,isset($_POST['htmlemail']) ? '1':'0');
          $result = Sql_query($query);
          $userid = Sql_insert_id();

          $count_email_add++;
          $some = 1;
          $history_entry = $GLOBALS['I18N']->get('import_new_user');

          # add the attributes for this user
          reset($attributes);
          while (list($attr,$value) = each($attributes)) {
            if (is_array($value)) {
                $value=join(',',$value);
            }
            Sql_query(sprintf('replace into %s (attributeid,userid,value) values("%s","%s","%s")',
              $tables["user_attribute"],$attr,$userid,addslashes($value)));
          }
        }

        #add this user to the lists identified
        reset($lists);
        $addition = 0;
        $listoflists = "";
        while (list($key,$listid) = each($lists)) {
          $query = "replace INTO ".$tables["listuser"]." (userid,listid,entered) values($userid,$listid,now())";
          $result = Sql_query($query);
          # if the affected rows is 2, the user was already subscribed
          $addition = $addition || Sql_Affected_Rows() == 1;
          if (!empty($_POST['listname'][$key])) {
            $listoflists .= "  * ".$_POST['listname'][$key]."\n";
          }
        }
        if ($addition) {
          $additional_emails++;
        }

        $subscribemessage = ereg_replace('\[LISTS\]', $listoflists, getUserConfig("subscribemessage",$userid));
        if (!TEST && $notify == "yes" && $addition)
          sendMail($email, getConfig("subscribesubject"), $subscribemessage,system_messageheaders(),$envelope);
        # history stuff
        $current_data = Sql_Fetch_Array_Query(sprintf('select * from %s where id = %d',$tables["user"],$userid));
        $current_data = array_merge($current_data,getUserAttributeValues('',$userid));
        foreach ($current_data as $key => $val) {
          if (!is_numeric($key))
            if ($old_data[$key] != $val && $key != "modified") {
            $history_entry .= "$key = $val\nchanged from $old_data[$key]\n";
          }
        }
        if (!$history_entry) {
          $history_entry = "\n".$GLOBALS['I18N']->get('no_data_changed');
        }
        # check lists
        $req = Sql_Query("select * from {$tables["listuser"]} where userid = $userid");
        while ($row = Sql_Fetch_Array($req)) {
          $listmembership[$row["listid"]] = listName($row["listid"]);
        }
        $history_entry .= "\n".$GLOBALS['I18N']->get('lists_subscriptions')."\n";
        foreach ($old_listmembership as $key => $val) {
          $history_entry .= $GLOBALS['I18N']->get('was_subscribed')." $val\n";
        }
        foreach ($listmembership as $key => $val) {
          $history_entry .= $GLOBALS['I18N']->get('is_subscribed')." $val\n";
        }
        if (!sizeof($listmembership)) {
          $history_entry .= $GLOBALS['I18N']->get('not_subscribed')."\n";
        }

        addUserHistory($email,$GLOBALS['I18N']->get('import_by').adminName(),$history_entry);

      }; // end if
    }; // end while

    print '<script language="Javascript" type="text/javascript"> finish(); </script>';
    # lets be gramatically correct :-)
    $displists = ($num_lists == 1) ? $GLOBALS['I18N']->get('list'): $GLOBALS['I18N']->get('lists');
    $dispemail = ($count_email_add == 1) ? $GLOBALS['I18N']->get('new_email_was'): $GLOBALS['I18N']->get('new_emails_were');
    $dispemail2 = ($additional_emails == 1) ? $GLOBALS['I18N']->get('email_was'): $GLOBALS['I18N']->get('emails_were');

    if ($count_email_exist) {
      print "<br/>$count_email_exist ".$GLOBALS['I18N']->get('some_emails_exist');
    }
    if(!$some && !$additional_emails) {
      print "<br>".$GLOBALS['I18N']->get('all_emails_exist');
    } else {
      print "$count_email_add $dispemail ".$GLOBALS['I18N']->get('import_successful')." $num_lists $displists.<br>$additional_emails $dispemail2 ".$GLOBALS['I18N']->get('subscribed')." $displists";
    }
  }; // end else
  print '<p>'.PageLink2("import",$GLOBALS['I18N']->get('import_more_emails')).'</p>';


} else {
?>


<ul>
<?php echo FormStart(' enctype="multipart/form-data" name="import"')?>
<?php
if ($GLOBALS["require_login"] && !isSuperUser()) {
  $access = accessLevel("import1");
  switch ($access) {
    case "owner":
      $subselect = " where owner = ".$_SESSION["logindetails"]["id"];break;
    case "all":
      $subselect = "";break;
    case "none":
    default:
      $subselect = " where id = 0";break;
  }
}

$result = Sql_query("SELECT id,name FROM ".$tables["list"]."$subselect ORDER BY listorder");
$c=0;
if (Sql_Affected_Rows() == 1) {
  $row = Sql_fetch_array($result);
  printf('<input type=hidden name="listname[%d]" value="%s"><input type=hidden name="lists[%d]" value="%d">'.$GLOBALS['I18N']->get('adding_users').' <b>%s</b>',$c,stripslashes($row["name"]),$c,$row["id"],stripslashes($row["name"]));
} else {
  print '<p>'.$GLOBALS['I18N']->get('select_lists').'</p>';
  while ($row = Sql_fetch_array($result)) {
    printf('<li><input type=hidden name="listname[%d]" value="%s"><input type=checkbox name="lists[%d]" value="%d">%s',$c,stripslashes($row["name"]),$c,$row["id"],stripslashes($row["name"]));
    $some = 1;$c++;
  }

  if (!$some)
   echo $GLOBALS['I18N']->get('no_lists').PageLink2("editlist",$GLOBALS['I18N']->get('add_list'));
}

?>

</ul>

<script language="Javascript" type="text/javascript">

var fieldstocheck = new Array();
var fieldnames = new Array();
function addFieldToCheck(value,name) {
  fieldstocheck[fieldstocheck.length] = value;
  fieldnames[fieldnames.length] = name;
}

</script>
<table border="1">
<tr><td colspan=2><?php echo $GLOBALS['I18N']->get('info_emails_file'); ?></td></tr>
<tr><td><?php echo $GLOBALS['I18N']->get('emails_file'); ?></td><td><input type="file" name="import_file"></td></tr>
<tr><td><?php echo $GLOBALS['I18N']->get('field_delimiter'); ?></td><td><input type="text" name="import_field_delimiter" size=5> <?php echo $GLOBALS['I18N']->get('tab_default'); ?></td></tr>
<tr><td><?php echo $GLOBALS['I18N']->get('record_delimiter'); ?></td><td><input type="text" name="import_record_delimiter" size=5> <?php echo $GLOBALS['I18N']->get('line_break_default'); ?></td></tr>
<tr><td colspan=2><?php echo $GLOBALS['I18N']->get('info_test_output'); ?></td></tr>
<tr><td><?php echo $GLOBALS['I18N']->get('test_output'); ?></td><td><input type="checkbox" name="import_test" value="yes"></td></tr>
<tr><td colspan=2><?php echo $GLOBALS['I18N']->get('info_notification_email'); ?></td></tr>
<tr><td><?php echo $GLOBALS['I18N']->get('notification_email'); ?><input type="radio" name="notify" value="yes"></td><td><?php echo $GLOBALS['I18N']->get('confirmed_immediately'); ?><input type="radio" name="notify" value="no"></td></tr>
<?php
include_once dirname(__FILE__)."/subscribelib2.php";
print ListAllAttributes();
?>

<tr><td><input type="submit" name="import" value="<?php echo $GLOBALS['I18N']->get('import'); ?>"></td><td>&nbsp;</td></tr>
</table>
<?php } ?>

</p>
