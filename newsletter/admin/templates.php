<?php
require_once dirname(__FILE__).'/accesscheck.php';

if (isset($_GET['delete'])) {
  # delete the index in delete
  $delete = sprintf('%d',$_GET['delete']);
  print $GLOBALS['I18N']->get('Deleting')." $delete ...\n";
  $result = Sql_query("delete from ".$tables["template"]." where id = $delete");
  $result = Sql_query("delete from ".$tables["templateimage"]." where template = $delete");
  print "... ".$GLOBALS['I18N']->get('Done')."<br /><hr /><br />\n";
}
if (isset($_POST['defaulttemplate'])) {
  saveConfig('defaultmessagetemplate',sprintf('%d',$_POST['defaulttemplate']));
}

?>

<script language="Javascript" src="js/jslib.js" type="text/javascript"></script>


<?php

$req = Sql_Query("select * from {$tables["template"]} order by listorder");
if (!Sql_Affected_Rows())
  print '<p class="error">'.$GLOBALS['I18N']->get("No template have been defined").'</p>';

$defaulttemplate = getConfig('defaultmessagetemplate');
print formStart('name="templates"');
$ls = new WebblerListing($GLOBALS['I18N']->get("Existing templates"));
while ($row = Sql_fetch_Array($req)) {
  $element = $row['title'];
  $ls->addElement($element,PageUrl2('template&id='.$row['id']));
  $ls->addColumn($element,$GLOBALS['I18N']->get('ID'),$row['id']);
  $ls->addColumn($element,$GLOBALS['I18N']->get('delete'),
    sprintf('<a href="javascript:deleteRec(\'%s\');">%s</a>',PageUrl2("templates","","delete=".$row["id"]),$GLOBALS['I18N']->get('delete')));
#  $imgcount = Sql_Fetch_Row_query(sprintf('select count(*) from %s where template = %d',
#    $GLOBALS['tables']['templateimage'],$row['id']));
#  $ls->addColumn($element,$GLOBALS['I18N']->get('# imgs'),$imgcount[0]);
  $ls->addColumn($element,$GLOBALS['I18N']->get('View'),PageLink2("viewtemplate",$GLOBALS['I18N']->get('View'),"id=".$row["id"]));
  $ls->addColumn($element,$GLOBALS['I18N']->get('Default'),sprintf('<input type=radio name="defaulttemplate" value="%d" %s onChange="document.templates.submit();">',
    $row['id'],$row['id'] == $defaulttemplate ? 'checked':''));

}
print $ls->display();

print '</form>';

print "<p>".PageLink2("template",$GLOBALS['I18N']->get('Add new Template'))."</p>";
?>
