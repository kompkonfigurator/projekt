<?php
# view template
require_once dirname(__FILE__).'/accesscheck.php';

if (!empty($_GET["pi"]) && defined("IN_WEBBLER")) {
  $more = '&pi='.$_GET["pi"];
} else {
  $more = '';
}
$id = '';
if (isset($_GET['id'])) $id = sprintf('%d',$_GET['id']);

if (empty($_GET["embed"])) {
  print '<iframe src="?page=viewtemplate&embed=yes&omitall=yes&id='.$id.$more.'"
    scrolling="auto" width=100% height=450 margin=0 frameborder=0>
  </iframe>';
  print '<p>'.PageLink2("template&id=".$id,$GLOBALS['I18N']->get('BackEditTemp')).'</p>';
} else {
  ob_end_clean();
//BUGFIX 15292 - by tipichris - mantis.phplist.com/view.php?id=15292
 // print previewTemplate($id,$_SESSION["logindetails"]["id"],nl2br($GLOBALS['I18N']->get('TempSample')));
 print previewTemplate($id,$_SESSION["logindetails"]["id"],$GLOBALS['I18N']->get('TempSample'));
//END BUGFIX
}

?>
