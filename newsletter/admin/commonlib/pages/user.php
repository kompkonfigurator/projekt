
<script language="Javascript" src="js/jslib.js" type="text/javascript"></script>

<?php

#if (!$_GET["id"] && !$_GET["delete"]) {
#  Fatal_Error("No such user");
#  return;
#}
$id = sprintf('%d',isset($_GET["id"]) ? $_GET['id']:0);
$delete = sprintf('%d',isset($_GET['delete']) ? $_GET["delete"]:0);
$date = new Date();

$access = accessLevel("user");
switch ($access) {
  case "owner":
    $subselect = sprintf(' and %s.owner = %d',$tables["list"],$_SESSION["logindetails"]["id"]);
    $subselect_where = sprintf(' where %s.owner = %d',$tables["list"],$_SESSION["logindetails"]["id"]);break;
  case "all":
    $subselect = "";break;
  case "view":
    $subselect = "";
    if (sizeof($_POST)) {
      print Error($GLOBALS['I18N']->get('You only have privileges to view this page, not change any of the information'));
      return;
    }
    break;
  case "none":
  default:
    $subselect = " and ".$tables["list"].".id = 0";
    $subselect_where = " where ".$tables["list"].".owner = 0";break;
}
if ($access != "all") {
  $delete_message = '<br />'.$GLOBALS['I18N']->get('Delete will delete user from the list').'<br />';
} else {
  $delete_message = '<br />'.$GLOBALS['I18N']->get('Delete will delete user and all listmemberships').'<br />';
}
$usegroups = Sql_Table_exists("groups") && Sql_Table_exists('user_group');

if ($_POST["change"] && ($access == "owner"|| $access == "all")) {
  if (!verifyToken()) {
    print Error($GLOBALS['I18N']->get('No Access'));
    return;
  }
  if (!$id) {
    $id = addNewUser($_POST['email']);
    $newuser = 1;
  }
  if (!$id) {
    print $GLOBALS['I18N']->get('Error adding user, please check that the user exists');
    return;
  }
  # read the current values to compare changes
  $old_data = Sql_Fetch_Array_Query(sprintf('select * from %s where id = %d',$tables["user"],$id));
  $old_data = array_merge($old_data,getUserAttributeValues('',$id));
  # and membership of lists
  $req = Sql_Query("select * from {$tables["listuser"]} where userid = $id");
  while ($row = Sql_Fetch_Array($req)) {
    $old_listmembership[$row["listid"]] = listName($row["listid"]);
  }
  while (list ($key,$val) = each ($struct)) {
    list($a,$b) = explode(":",$val[1]);
    if (!ereg("sys",$a) && $val[1]) {
      if ($key == "password" && ENCRYPTPASSWORD) {
        if (isset($_POST[$key]))
          Sql_Query("update {$tables["user"]} set $key = \"".md5($_POST[$key])."\" where id = $id");
      } else {
        Sql_Query("update {$tables["user"]} set $key = \"".sql_escape($_POST[$key])."\" where id = $id");
       }
    }
    elseif ((!$require_login || ($require_login && isSuperUser())) && $key == "confirmed")
      Sql_Query("update {$tables["user"]} set $key = \"".sql_escape($_POST[$key])."\" where id = $id");

  }
  if (is_array($_POST['attribute']))
  while (list($key,$val) = each ($_POST['attribute'])) {
    Sql_Query(sprintf('replace into %s (userid,attributeid,value)
      values(%d,%d,"%s")',$tables["user_attribute"],$id,$key,$val));
  }
  if (is_array($_POST["dateattribute"]))
  foreach ($_POST["dateattribute"] as $attid => $attname) {
    if (isset($_POST[normalize($attname).'_novalue'])) {
      $value = "";
    } else {
      $value = $date->getDate($attname);
    }
    Sql_Query(sprintf('replace into %s (userid,attributeid,value)
      values(%d,%d,"%s")',$tables["user_attribute"],$id,$attid,$value));
  }
  if (is_array($_POST['cbattribute'])) {
    while (list($key,$val) = each ($_POST['cbattribute'])) {
      if ($_POST['attribute'][$key] == "on") {
        Sql_Query(sprintf('replace into %s (userid,attributeid,value)
          values(%d,%d,"on")',$tables["user_attribute"],$id,$key));
      } else {
        Sql_Query(sprintf('replace into %s (userid,attributeid,value)
          values(%d,%d,"")',$tables["user_attribute"],$id,$key));
      }
    }
  }

  if (is_array($_POST['cbgroup'])) {
    while (list($key,$val) = each ($_POST['cbgroup'])) {
      $field = "cbgroup".$val;
      if (is_array($_POST[$field])) {
        $newval = array();
        foreach ($_POST[$field] as $fieldval) {
          array_push($newval,sprintf('%0'.$checkboxgroup_storesize.'d',$fieldval));
         }
        $value = join(",",$newval);
      }
      else
        $value = "";
      Sql_Query(sprintf('replace into %s (userid,attributeid,value)
        values(%d,%d,"%s")',$tables["user_attribute"],$id,$val,$value));
    }
  }
  if ($usegroups) {
    Sql_Query("delete from user_group where userid = $id");
    if (is_array($_POST["groups"])) {
      foreach ($_POST["groups"] as $group) {
        Sql_Query(sprintf('insert into user_group (userid,groupid) values(%d,%d)',$id,$group));
        print "<br/>".$GLOBALS['I18N']->get('User added to group').' '.groupName($group);
      }
    }
  }
  # submitting page now saves everything, so check is not necessary
  if ($subselect == "") {
    Sql_Query("delete from {$tables["listuser"]} where userid = $id");
  } else {
    # only unsubscribe from the lists of this admin
    $req = Sql_Query("select id from {$tables["list"]} $subselect_where");
    while ($row = Sql_Fetch_Row($req)) {
      Sql_Query("delete from {$tables["listuser"]} where userid = $id and listid = $row[0]");
    }
  }
  if (is_array($_POST["subscribe"])) {
    foreach ($_POST["subscribe"] as $ind => $lst) {
      Sql_Query("insert into {$tables["listuser"]} (userid,listid) values($id,$lst)");
      print '<br/>'.sprintf($GLOBALS['I18N']->get('User added to list %s'),ListName($lst));
    }
    print "<br/>";
  }
  $history_entry = '';
  $current_data = Sql_Fetch_Array_Query(sprintf('select * from %s where id = %d',$tables["user"],$id));
  $current_data = array_merge($current_data,getUserAttributeValues('',$id));
  foreach ($current_data as $key => $val) {
    if (!is_numeric($key))
    if ($old_data[$key] != $val && $key != "modified") {
      $history_entry .= "$key = $val\nchanged from $old_data[$key]\n";
     }
  }
  if (!$history_entry) {
    $history_entry = "\nNo userdata changed";
  }
  # check lists
  $req = Sql_Query("select * from {$tables["listuser"]} where userid = $id");
  while ($row = Sql_Fetch_Array($req)) {
    $listmembership[$row["listid"]] = listName($row["listid"]);
  }
  # i'll do this once I can test it on a 4.3 server
  #if (function_exists("array_diff_assoc")) {
  if (0) {
    # it requires 4.3
    $subscribed_to = array_diff_assoc($listmembership, $old_listmembership);
    $unsubscribed_from = array_diff_assoc($old_listmembership,$listmembership);
    foreach ($subscribed_to as $key => $desc) {
      $history_entry .= "Subscribed to $desc\n";
    }
    foreach ($unsubscribed_to as $key => $desc) {
      $history_entry .= "Unsubscribed from $desc\n";
    }
  } else {
    $history_entry .= "\nList subscriptions:\n";
    foreach ($old_listmembership as $key => $val) {
      $history_entry .= "Was subscribed to: $val\n";
    }
    foreach ($listmembership as $key => $val) {
      $history_entry .= "Is now subscribed to: $val\n";
    }
    if (!sizeof($listmembership)) {
      $history_entry .= "Not subscribed to any lists\n";
    }
  }

  addUserHistory($email,"Update by ".adminName($_SESSION["logindetails"]["id"]),$history_entry);
  if ($newuser) {
    Redirect("user&id=$id");
    exit;
  }
  Info($GLOBALS['I18N']->get('Changes saved'));
}

if (isset($delete) && $delete && $access != "view") {
  # delete the index in delete
  print $GLOBALS['I18N']->get('Deleting')." $delete ..\n";
  if ($require_login && !isSuperUser()) {
    $lists = Sql_query("SELECT listid FROM {$tables["listuser"]},{$tables["list"]} where userid = ".$delete." and $tables[listuser].listid = $tables[list].id $subselect ");
    while ($lst = Sql_fetch_array($lists))
      Sql_query("delete from {$tables["listuser"]} where userid = $delete and listid = $lst[0]");
  } else {
    deleteUser($delete);
  }
  print '..'.$GLOBALS['I18N']->get('Done')."<br /><hr><br />\n";
}

$membership = "";
$subscribed = array();
if ($id) {
  $result = Sql_query("SELECT * FROM {$tables["user"]} where id = $id");
  if (!Sql_Affected_Rows()) {
    Fatal_Error($GLOBALS['I18N']->get('No such User').' '.$id);
    return;
  }
  $user = sql_fetch_array($result);
  $lists = Sql_query("SELECT listid,name FROM {$tables["listuser"]},{$tables["list"]} where userid = ".$user["id"]." and $tables[listuser].listid = $tables[list].id $subselect ");
  while ($lst = Sql_fetch_array($lists)) {
    $membership .= "<li>".PageLink2("editlist",$lst["name"],"id=".$lst["listid"]);
    array_push($subscribed,$lst["listid"]);
  }
  if (!$membership)
    $membership = $GLOBALS['I18N']->get('No Lists');
  if ($access != "view")
  printf( "<br /><hr/>%s<li><a href=\"javascript:deleteRec('%s');\">delete</a> %s\n",
    $delete_message,PageURL2("user","","delete=$id&$returnurl"),$user["email"]);
  printf('&nbsp;&nbsp;<a href="%s">%s</a>',getConfig("preferencesurl").
    '&uid='.$user["uniqid"],$GLOBALS['I18N']->get('update page'));
  printf('&nbsp;&nbsp;<a href="%s">%s</a>',getConfig("unsubscribeurl").'&uid='.$user["uniqid"],$GLOBALS['I18N']->get('unsubscribe page'));
  print '&nbsp;&nbsp;'.PageLink2("userhistory&id=$id",$GLOBALS['I18N']->get('History'));
} else {
  $user = array();
  $id = 0;
  print '<h1>'.$GLOBALS['I18N']->get('Add a new User').'</h1>';
}
  print "<p><h3>".$GLOBALS['I18N']->get('User Details')."</h3>".formStart()."<table border=1>";
  print "<input type=hidden name=list value=$list><input type=hidden name=id value=$id>";
  print "<input type=hidden name=returnpage value=$returnpage><input type=hidden name=returnoption value=$returnoption>";

  reset($struct);
  while (list ($key,$val) = each ($struct)) {
    list($a,$b) = explode(":",$val[1]);
    if ($key == "confirmed") {
      if (!$require_login || ($require_login && isSuperUser())) {
        printf('<tr><td>%s (1/0)</td><td><input type="text" name="%s" value="%s" size=5></td></tr>'."\n",$GLOBALS['I18N']->get($b),$key,$user[$key]);
      } else {
        printf('<tr><td>%s</td><td>%s</td></tr>',$b,$user[$key]);
      }
    } elseif ($key == "password" && ENCRYPTPASSWORD) {
      printf('<tr><td>%s (%s)</td><td><input type="text" name="%s" value="%s" size=30></td></tr>'."\n",$GLOBALS['I18N']->get('encrypted'),$val[1],$key,"");
    } elseif ($key == "blacklisted") {
      printf('<tr><td>%s</td><td>%s</td></tr>',$GLOBALS['I18N']->get($b),isBlackListed($user['email']));
    } else {
      if (!strpos($key,'_')) {
        if (ereg("sys",$a))
          printf('<tr><td>%s</td><td>%s</td></tr>',$GLOBALS['I18N']->get($b),$user[$key]);
        elseif ($val[1])
          printf('<tr><td>%s</td><td><input type="text" name="%s" value="%s" size=30></td></tr>'."\n",$GLOBALS['I18N']->get($val[1]),$key,$user[$key]);
      }
    }
  }
  $res = Sql_Query("select * from $tables[attribute] order by listorder");
  while ($row = Sql_fetch_array($res)) {
    $val_req = Sql_Fetch_Row_Query("select value from $tables[user_attribute] where userid = $id and attributeid = $row[id]");
    $row["value"] = $val_req[0];

    if ($row["type"] == "date") {
      printf('<input style="attributeinput" type=hidden name="dateattribute[%d]" value="%s">',$row["id"],$row["name"]);
      $novalue = trim($row["value"]) == "" ? "checked":"";
      printf('<tr><td>%s<!--%s--></td><td>%s&nbsp; Not set: <input type=checkbox name="%s_novalue" %s></td></tr>'."\n",stripslashes($row["name"]),$row["value"],$date->showInput($row["name"],"",$row["value"]),normalize(stripslashes($row["name"])),$novalue);
    } elseif ($row["type"] == "checkbox") {
      $checked = $row["value"] == "on" ?"checked":"";
      printf('<tr><td>%s</td><td><input style="attributeinput" type=hidden name="cbattribute[%d]" value="%d"><input style="attributeinput" type=checkbox name="attribute[%d]" value="on" %s></td></tr>'."\n",stripslashes($row["name"]),$row["id"],$row["id"],$row["id"],$checked);
    } elseif ($row["type"] == "checkboxgroup") {
      printf ("<tr><td valign=top>%s</td><td>%s</td></tr>\n",stripslashes($row["name"]),UserAttributeValueCbGroup($id,$row["id"]));
    } elseif ($row["type"] == "textarea") {
      printf ('<tr><td valign=top>%s</td><td><textarea name="attribute[%d]" rows="10" cols="40" wrap=virtual>%s</textarea></td></tr>',stripslashes($row["name"]),$row["id"],htmlspecialchars($row["value"]));
    } else {
    if ($row["type"] != "textline" && $row["type"] != "hidden")
      printf ("<tr><td>%s</td><td>%s</td></tr>\n",stripslashes($row["name"]),UserAttributeValueSelect($id,$row["id"]));
    else
      printf('<tr><td>%s</td><td><input style="attributeinput" type=text name="attribute[%d]" value="%s" size=30></td></tr>'."\n",$row["name"],$row["id"],htmlspecialchars($row["value"]));
    }
  }
  if ($access != "view")
  print '<tr><td colspan=2><input type=submit name=change value="'.$GLOBALS['I18N']->get('Save Changes').'"></td></tr>';
  print '</table>';

  if (isBlackListed($user["email"])) {
    print '<h3>'.$GLOBALS['I18N']->get('User is blacklisted. No emails will be sent to this user').'</h3>';
  }

  print "<h3>".$GLOBALS['I18N']->get('Mailinglist Membership').":</h3>";
  print "<table border=1><tr>";
  $req = Sql_Query("select * from {$tables["list"]} $subselect_where order by listorder,name");
  $c = 0;
  while ($row = Sql_Fetch_Array($req)) {
    if (in_array($row["id"],$subscribed)) {
      $bgcol = '#F7E7C2';
      $subs = "checked";
    } else {
      $bgcol = '#ffffff';
      $subs = "";
    }
    printf ('<td bgcolor="%s"><input type=checkbox name="subscribe[]" value="%d" %s> %s</td>',
      $bgcol,$row["id"],$subs,PageLink2("editlist",stripslashes($row["name"]),"id=".$row["id"]));
    $c++;
    if ($c % 4 == 0)
      print '</tr><tr>';
  }
  print '</tr>';

  if ($access != "view")
    print '<tr><td><input type=submit name="change" value="'.$GLOBALS['I18N']->get('Save Changes').'"></td></tr>';

  print '</table>';

  if ($usegroups) {
    print "<h3>".$GLOBALS['I18N']->get('Group Membership').":</h3>";
    print "<table border=1><tr>";
    print '<tr><td colspan=2><hr width=50%></td></tr>
  <tr><td colspan=2>'.$GLOBALS['I18N']->get('Please select the groups this user is a member of').'</td></tr>
  <tr><td colspan=2>';
    $selected_groups = array();
    if ($id) {
      $req = Sql_Query("select groupid from user_group where userid = $id");
      while ($row = Sql_Fetch_Row($req))
        array_push($selected_groups,$row[0]);
    }

    $req = Sql_Query("select * from groups");
    $c = 1;
    while ($row = Sql_Fetch_array($req)) {
      if ($row["name"] != "Everyone") {
        printf ('<i>%s</i><input type=checkbox name="groups[]" value="%d" %s>&nbsp;&nbsp;',
        $row["name"],$row["id"],in_array($row["id"],$selected_groups)?"checked":""
            );
      } else {
        printf ('<b>%s</b>&nbsp;&nbsp;<input type=hidden name="groups[]" value="%d">',
        $row["name"],$row["id"]
            );
      }
      if ($c % 5 == 0)
        print "<br>";
      $c++;
    }

    print '</td></tr>';
    if ($access != "view")
      print '<tr><td><input type=submit name="change" value="'.$GLOBALS['I18N']->get('Save Changes').'"></td></tr>';
    print '</table>';
  }

  print '</form>';
?>
