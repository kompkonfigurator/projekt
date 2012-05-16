<?php
require_once dirname(__FILE__).'/accesscheck.php';

$spb ='<span class="menulinkleft">';
$spe = '</span>';

print $spb.PageLink2("statsoverview",$GLOBALS['I18N']->get('Overview')).$spe;
print $spb.PageLink2("uclicks",$GLOBALS['I18N']->get('View Clicks by URL')).$spe;
print $spb.PageLink2("mclicks",$GLOBALS['I18N']->get('View Clicks by Message')).$spe;
print $spb.PageLink2("mviews",$GLOBALS['I18N']->get('View Opens by Message')).$spe;
print $spb.PageLink2("domainstats",$GLOBALS['I18N']->get('Domain Statistics')).$spe;

?>
