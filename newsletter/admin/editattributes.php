<?php
require_once dirname(__FILE__).'/accesscheck.php';

# $Id: editattributes.php,v 1.3.4.3 2007-07-16 19:18:14 basovink Exp $

$id = !empty($_GET['id']) ? sprintf('%d',$_GET['id']) : 0;
ob_end_flush();
function adminMenu() {
  global $adminlevel,$config;

  if ($adminlevel == "superuser"){
    $html .= menuLink("admins","administrators");
    $html .= menuLink("groups","groups");
    $html .= menuLink("users","users");
    $html .= menuLink("userattributes","user attributes");
    $req = Sql_Query('select * from attribute where type = "select" or type = "radio" or type = "checkboxgroup"');
    while ($row = Sql_Fetch_Array($req)) {
      $html .= menuLink("editattributes&id=".$row["id"],"&gt;&nbsp;".$row["name"]);
    }

    $html .= menuLink("branches","branch fields","option=branchfields");
    $html .= menuLink("templates","templates");
  }
  return $html;
}

if (!$id) {
  Fatal_Error($GLOBALS['I18N']->get('NoAttr')." $id");
  return;
}

if (!isset($tables["attribute"])) {
  $tables["attribute"] = "attribute";
  $tables["user_attribute"]  = "user_attribute";
}
if (!isset($table_prefix )) {
  $table_prefix = 'phplist_';
}

$res = Sql_Query("select * from $tables[attribute] where id = $id");
$data = Sql_Fetch_array($res);
$table = $table_prefix ."listattr_".$data["tablename"];
switch ($data['type']) {
  case 'checkboxgroup':
  case 'select':
  case 'radio':
    break;
  default:
    print $GLOBALS['I18N']->get('This datatype does not have editable values');
    return;
}

?>
<script language="Javascript" src="js/jslib.js" type="text/javascript"></script>

<br><?php echo PageLink2("editattributes",$GLOBALS['I18N']->get('AddNew'),"id=$id&action=new")?> <?php echo $data["name"]?>
<br><a href="javascript:deleteRec2('<?php echo $GLOBALS['I18N']->get('SureToDeleteAll');?>','<?php echo PageURL2("editattributes",$GLOBALS['I18N']->get('DelAll'),"id=$id&deleteall=yes")?>');"><?php echo $GLOBALS['I18N']->get('DelAll');?></a>
<hr><p>
<?php echo formStart()?>
<input type=hidden name="action" value="add">
<input type=hidden name="id" value="<?php echo $id?>">



<?php

if (isset($_POST["addnew"])) {
  $items = explode("\n", $_POST["itemlist"]);
  $query = sprintf('SELECT MAX(listorder) AS listorder FROM %s',$table);
  $maxitem = Sql_Fetch_Row_Query($query);
  if (!Sql_Affected_Rows() || !is_numeric($maxitem[0])) {
  $listorder = 1; # insert the listorder as it's in the textarea / start with 1
  }
  else {
  $listorder = $maxitem[0]+1; # One more than the maximun
  }
  while (list($key,$val) = each($items)) {
    $val = clean($val);
    if ($val != "") {
      $query = sprintf('INSERT into %s (name,listorder) values("%s","%s")',$table,$val,$listorder);
      $result = Sql_query($query);
    }
    $listorder++;
  }
}

if (isset($_POST["listorder"]) && is_array($_POST["listorder"])) {
  foreach ($_POST["listorder"] as $key => $val) {
    Sql_Verbose_Query("update $table set listorder = $val where id = $key");
  }
}

function giveAlternative($table,$delete,$attributeid) {
  print $GLOBALS['I18N']->get('ReplaceAllWith').formStart();
  print '<select name=replace><option value="0">-- '.$GLOBALS['I18N']->get('ReplaceWith').'</option>';
  $req = Sql_Query("select * from $table order by listorder,name");
  while ($row = Sql_Fetch_array($req))
    if ($row["id"] != $delete)
      printf('<option value="%d">%s</option>',$row["id"],$row["name"]);
  print "</select>";
  printf('<input type=hidden name="delete" value="%d">',$delete);
  printf('<input type=hidden name="id" value="%d">',$attributeid);
  printf('<input type=submit name="deleteandreplace" value="%s"></form>',$GLOBALS['I18N']->get('deleteandreplace'));
}

function deleteItem($table,$attributeid,$delete) {
  global $tables,$replace;
  # delete the index in delete
  $valreq = Sql_Fetch_Row_query("select name from $table where id = $delete");
  $val = $valreq[0];

  # check dependencies
  $dependencies = array();
  $result = Sql_query("select distinct userid from $tables[user_attribute] where
  attributeid = $attributeid and value = $delete");
  while ($row =  Sql_fetch_array($result)) {
    array_push($dependencies,$row["userid"]);
  }

  if (sizeof($dependencies) == 0)
    $result = Sql_query("delete from $table where id = $delete");
  else if ($replace) {
    $result = Sql_Query("update $tables[user_attribute] set value = $replace where value = $delete");
    $result = Sql_query("delete from $table where id = $delete");
  } else {
    print $GLOBALS["I18N"]->get("cannotdelete");
    print " <b>$val</b><br />";
    print $GLOBALS["I18N"]->get("dependentrecords").'<p></p>';

    for ($i=0;$i<sizeof($dependencies);$i++) {
      print PageLink2("user",$GLOBALS["I18N"]->get("user")." ".$dependencies[$i],"id=$dependencies[$i]")."<br />\n";
      if ($i>10) {
        print $GLOBALS['I18N']->get('TooManyToList')."
 ".sizeof($dependencies)."<br /><br />";
        giveAlternative($table,$delete,$attributeid);
        return 0;
      }
    }
    print "</p><br />";
    giveAlternative($table,$delete,$attributeid);

  }
  return 1;
}

if (isset($_GET["delete"])) {
  deleteItem($table,$id,$_GET["delete"]);
} elseif(isset($_GET["deleteall"])) {
  $count = 0;
  $errcount = 0;
  $res = Sql_Query("select id from $table");
  while ($row = Sql_Fetch_Row($res)) {
    if (deleteItem($table,$id,$row[0])) {
      $count++;
    } else {
      $errcount++;
      if ($errcount > 10) {
        print $GLOBALS['I18N']->get('TooManyErrors')."<br /><br /><br />\n";
        break;
      }
    }
  }
}

if (isset($_GET["action"]) && $_GET["action"] == "new") {

  // ??
  ?>

  <p><?php echo $GLOBALS["I18N"]->get("addnew")." ".$data["name"].', '.$GLOBALS["I18N"]->get("oneperline") ?><br />
  <textarea name="itemlist" rows=20 cols=50></textarea><br />
  <input type="Submit" name="addnew" value="<?php echo $GLOBALS["I18N"]->get("addnew")." ".$data["name"] ?>"><br />
<?php
}

$result = Sql_query("SELECT * FROM $table order by listorder,name");
$num = Sql_Affected_Rows();
if ($num < 100 && $num > 25)
  printf('<input type=submit name=action value="%s"><br />',$GLOBALS["I18N"]->get("changeorder"));

while ($row = Sql_Fetch_array($result)) {
  printf( '<a href="javascript:deleteRec(\'%s\');">'.$GLOBALS['I18N']->get('Delete').'</a> |',PageURL2("editattributes","","id=$id&delete=".$row["id"]));
  if ($num < 100)
    printf(' <input type=text name="listorder[%d]" value="%s" size=5>',$row["id"],$row["listorder"]);
  printf(' %s %s <br />', $row["name"],($row["name"] == $data["default_value"]) ? $GLOBALS['I18N']->get('Default'):"");
}
if ($num && $num < 100)
  printf('<input type=submit name=action value="%s">',$GLOBALS["I18N"]->get("changeorder"));

?>
</form>
