
<script language="Javascript" src="js/jslib.js" type="text/javascript"></script>
<hr>

<?php
require_once dirname(__FILE__).'/accesscheck.php';

$external = $require_login && $GLOBALS["admin_auth_module"] != 'phplist_auth.inc';
$start = isset($_GET['start']) ? sprintf('%d',$_GET['start']):0;
$listid = isset($_GET['id']) ? sprintf('%d',$_GET['id']): 0;
$find = isset($_REQUEST['find']) ? $_REQUEST['find'] : '';

if (!empty($find)) {
  $remember_find = "&find=".urlencode($find);
} else {
  $remember_find = '';
}

# with external admins we simply display information
if (!$external) {
  print PageLink2("admin",$GLOBALS['I18N']->get('Add new admin'),"start=$start".$remember_find);

  if (isset($_GET["delete"]) && $_GET["delete"]) {
    # delete the index in delete
    if ($_GET['delete'] == $_SESSION['logindetails']['id']) {
      print $GLOBALS['I18N']->get('You cannot delete yourself')."\n";
    } else {
      print $GLOBALS['I18N']->get('Deleting')." $delete ..\n";
      Sql_query(sprintf('delete from %s where id = %d',$GLOBALS["tables"]["admin"],$_GET["delete"]));
      Sql_query(sprintf('delete from %s where adminid = %d',$GLOBALS["tables"]["admin_attribute"],$_GET["delete"]));
      Sql_query(sprintf('delete from %s where adminid = %d',$GLOBALS["tables"]["admin_task"],$_GET["delete"]));
      print '..'.$GLOBALS['I18N']->get('Done')."<br /><hr><br />\n";
      Redirect("admins&start=$start");
    }
  }
  
  ob_end_flush();
  
  if (isset($add)) {
    if (isset($new)) {
      $query = "insert into ".$tables["admin"]." (email,entered) values(\"$new\",now())";
      $result = Sql_query($query);
      $userid = Sql_insert_id();
      $query = "insert into ".$tables["listuser"]." (userid,listid,entered) values($userid,$id,now())";
      $result = Sql_query($query);
    }
    echo '<br><font color=red size=+2>'.$GLOBALS['I18N']->get('Admin added').'</font><br>';
  }
}
  
if ($external) {
  $admins = $GLOBALS["admin_auth"]->listAdmins();
  $total = sizeof($admins);
  $found = $total;
  $ls = new WebblerListing($GLOBALS['I18N']->get('Administrators'));
  foreach ($admins as $adminid => $adminname) {
    $ls->addElement($adminname,PageUrl2("admin",$GLOBALS['I18N']->get('Show'),"id=".$adminid));
  }
  print $ls->display();
  return;
} else {
  if (!$find)
    $result = Sql_query("SELECT count(*) FROM ".$tables["admin"]);
  else
    $result = Sql_query("SELECT count(*) FROM ".$tables["admin"]." where loginname like \"%$find%\" or email like \"%$find%\"");
  $totalres = Sql_fetch_Row($result);
  $total = $totalres[0];
}

print "<p>$total ".$GLOBALS['I18N']->get('Administrators');
print $find ? ' '.$GLOBALS['I18N']->get('found').'</p>': '</p>';
if ($total > MAX_USER_PP) {
  if (isset($start) && $start) {
    $listing = $GLOBALS['I18N']->get('Listing admin')." $start ".$GLOBALS['I18N']->get('to'). ' '. ($start + MAX_USER_PP);
    $limit = "limit $start,".MAX_USER_PP;
  } else {
    $listing = $GLOBALS['I18N']->get('Listing admin 1 to 50');
    $limit = "limit 0,50";
    $start = 0;
  }
  printf ('<table border=1><tr><td colspan=4 align=center>%s</td></tr><tr><td>%s</td><td>%s</td><td>
          %s</td><td>%s</td></tr></table><p><hr>',
          $listing,
          PageLink2("admins","&lt;&lt;","start=0"),
          PageLink2("admins","&lt;",sprintf('start=%d',max(0,$start-MAX_USER_PP))),
          PageLink2("admins","&gt;",sprintf('start=%d',min($total,$start+MAX_USER_PP))),
          PageLink2("admins","&gt;&gt;",sprintf('start=%d',$total-MAX_USER_PP)));
  if ($find)
    $result = Sql_query("SELECT id,loginname,email FROM ".$tables["admin"]." where loginname like \"%$find%\" or email like \"%$find%\" order by loginname $limit");
  else
    $result = Sql_query("SELECT id,loginname,email FROM ".$tables["admin"]." order by loginname $limit");
} else {
  if ($find)
    $result = Sql_query("select id,loginname,email from ".$tables["admin"]." where loginname like \"%$find%\" or email like \"%$find%\" order by loginname");
  else
    $result = Sql_query("select id,loginname,email from ".$tables["admin"]." order by loginname");
}

?>
<table>
<tr><td colspan=4><?php echo formStart('action=""')?><input type="hidden" name="id" value="<?php echo $listid?>">
<?php echo $GLOBALS['I18N']->get('Find an admin')?>: <input type=text name="find" value="<?php echo htmlspecialchars($find)?>" size="40"><input type="submit" value="Go">
</form></td></tr></table>
<?php
$ls = new WebblerListing($GLOBALS['I18N']->get('Administrators'));
while ($admin = Sql_fetch_array($result)) {
  $delete_url = sprintf("<a href=\"javascript:deleteRec('%s');\">del</a>",PageURL2("admins","Delete","start=$start&delete=".$admin["id"]));
  $ls->addElement($admin["loginname"],PageUrl2("admin",$GLOBALS['I18N']->get('Show'),"start=$start&id=".$admin["id"].$remember_find));
  if (!$external && $admin['id'] != $_SESSION['logindetails']['id'])
    $ls->addColumn($admin["loginname"],"del",$delete_url);
}
print $ls->display();
print '<br/><hr/>';
print PageLink2("admin",$GLOBALS['I18N']->get('Add new admin'),"start=$start".$remember_find);
print '<p>'.PageLink2("importadmin",$GLOBALS['I18N']->get('Import list of admins')).'</p>';

?>
