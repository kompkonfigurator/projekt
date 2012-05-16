
<script language="Javascript" src="js/jslib.js" type="text/javascript"></script>
<hr><p>


<?php
require_once dirname(__FILE__).'/accesscheck.php';

print formStart();

if (isset($_POST['listorder']) && is_array($_POST['listorder'])) {
  while (list($key,$val) = each ($_POST['listorder'])) {
    Sql_Query(sprintf('update %s set listorder = %d, active = %d where id = %d',
      $tables["list"],$val,!empty($_POST['active'][$key]),$key));
  }
}

$access = accessLevel('list');
switch ($access) {
  case 'owner':
    $subselect = ' where owner = ' . $_SESSION['logindetails']['id'];
    $subselect_and = ' and owner = ' . $_SESSION['logindetails']['id'];
    break;
  case 'all':
    $subselect = '';
    $subselect_and = '';
    break;
  case 'none':
  default:
    $subselect = ' where id = 0';
    $subselect_and = ' and id = 0';
    break;
}

if (isset($_GET['delete'])) {
  $delete = sprintf('%d',$_GET['delete']);
  # delete the index in delete
  print $GLOBALS['I18N']->get('Deleting') . " $delete ..\n";
  $result = Sql_query(sprintf('delete from '.$tables['list'].' where id = %d %s',$delete,$subselect_and));
  $done = Sql_Affected_Rows();
  if ($done) {
    $result = Sql_query('delete from '.$tables['listuser']." where listid = $delete $subselect_and");
    $result = Sql_query('delete from '.$tables['listmessage']." where listid = $delete $subselect_and");
  }
  print '..' . $GLOBALS['I18N']->get('Done') . "<br /><hr /><br />\n";
}

$html = '';
$result = Sql_query("SELECT * FROM $tables[list] $subselect order by listorder");
while ($row = Sql_fetch_array($result)) {
  $count = Sql_Fetch_Row_Query("select count(*) from {$tables['listuser']} where listid = {$row["id"]} ");
  $desc = htmlspecialchars(stripslashes($row['description']));
  if ($row['rssfeed']) {
    $feed = $row['rssfeed'];
    # reformat string, so it wraps if it's very long
    $feed = ereg_replace("/","/ ",$feed);
    $feed = ereg_replace("&","& ",$feed);
    $desc = sprintf('%s: <a href="%s" target="_blank">%s</a><br /> ', $GLOBALS['I18N']->get('RSS source'), $row['rssfeed'], $feed) .
    PageLink2("viewrss&id=".$row["id"],$GLOBALS['I18N']->get('(View Items)')) . '<br />'.
    $desc;
  }
  $html .= sprintf('
    <tr>
      <td valign="top">%d</td><td valign="top"><b>%s</b><br/>%d %s</td>
      <td valign="top"><input type="text" name="listorder[%d]" value="%d" size="5"></td>
    <td valign="top">%s | %s | <a href="javascript:deleteRec(\'%s\');">%s</a></td>
    <td valign="top"><input type="checkbox" name="active[%d]" value="1" %s></td>
    <td valign="top">%s</td></tr><tr><td>&nbsp;</td>
      <td colspan="5">%s</td></tr><tr><td colspan="6"><hr width="50%%" size="4"></td>
    </tr>',
    $row["id"],
    stripslashes($row['name']),
    $count[0],
    $GLOBALS['I18N']->get('members'),
   $row['id'],
    $row['listorder'],
    PageLink2("editlist",$GLOBALS['I18N']->get('edit'),"id=".$row["id"]),
    PageLink2("members",$GLOBALS['I18N']->get('view members'),"id=".$row["id"]),
    PageURL2("list","","delete=".$row["id"]),
    $GLOBALS['I18N']->get('delete'),
   $row["id"],
    $row["active"] ? 'checked' : '',
    $GLOBALS['require_login'] ? adminName($row['owner']):$GLOBALS['I18N']->get('n/a'),
    $desc
    );
  $some = 1;
}

if (!$some) {
  echo $GLOBALS['I18N']->get('No lists available, use Add to add one');
}  else {
  echo '<table border="0">
      <tr>
        <td>'.$GLOBALS['I18N']->get('No').'</td>
        <td>'.$GLOBALS['I18N']->get('Name').'</td>
        <td>'.$GLOBALS['I18N']->get('Order').'</td>
        <td>'.$GLOBALS['I18N']->get('Functions').'</td>
        <td>'.$GLOBALS['I18N']->get('Active').'</td>
        <td>'.$GLOBALS['I18N']->get('Owner').'</td>
        <td>'.$html . '
    <tr>
        <td colspan="6" align="center">
        <input type="submit" name="update" value="'.$GLOBALS['I18N']->get('Save Changes').'"></td>
      </tr>
    </table>';
}
?>

</ul>
</form>
<p>
<?php
if ($GLOBALS['require_login'] && !isSuperUser()) {
  $numlists = Sql_Fetch_Row_query("select count(*) from {$tables['list']} where owner = " . $_SESSION['logindetails']['id']);
  if ($numlists[0] < MAXLIST) {
    print PageLink2("editlist",$GLOBALS['I18N']->get('Add a list'));
  }
} else {
  print PageLink2('editlist',$GLOBALS['I18N']->get('Add a list'));
}

?>
