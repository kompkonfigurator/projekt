<?php

# click stats per url
require_once dirname(__FILE__).'/accesscheck.php';

if (isset($_GET['id'])) {
  $id = sprintf('%d',$_GET['id']);
} else {
  $id = 0;
}

$access = accessLevel('uclicks');
switch ($access) {
  case 'owner':
    $select_tables = $GLOBALS['tables']['linktrack']. ' as linktrack, '.$GLOBALS['tables']['message'].' as message';
    $owner_and = ' and message.id = linktrack.messageid and message.owner = '.$_SESSION['logindetails']['id'];
    break;
  case 'all':
    $select_tables = $GLOBALS['tables']['linktrack']. ' as linktrack ';
    $owner_and = '';
    break;
    break;
  case 'none':
  default:
    print $GLOBALS['I18N']->get('You do not have access to this page');
    return;
    break;
}

if (!$id) {
  print $GLOBALS['I18N']->get('Select URL to view');
  $req = Sql_Query(sprintf('select distinct url, linkid, sum(clicked) as numclicks from %s
    where clicked %s group by url order by numclicks desc limit 50',
    $select_tables,$owner_and));
  $ls = new WebblerListing($GLOBALS['I18N']->get('Available URLs'));
  while ($row = Sql_Fetch_Array($req)) {
    $ls->addElement($row['url'],PageURL2('uclicks&amp;id='.$row['linkid']));
    $ls->addColumn($row['url'],$GLOBALS['I18N']->get('clicks'),$row['numclicks']);
  }
  print $ls->display();
  return;
}

$ls = new WebblerListing($GLOBALS['I18N']->get('URL Click Statistics'));

$urldata = Sql_Fetch_Array_Query(sprintf('select url from %s where linkid = %d',
  $GLOBALS['tables']['linktrack'],$id));
print '<h1>'.$GLOBALS['I18N']->get('Click Details for a URL').' <b>'.$urldata['url'].'</b></h1>';

$req = Sql_Query(sprintf('select messageid,min(firstclick) as firstclick,date_format(max(latestclick),
  "%%e %%b %%Y %%H:%%i") as latestclick,sum(clicked) as numclicks from %s where url = "%s" and clicked group by messageid
  ',$GLOBALS['tables']['linktrack'],$urldata['url']));
$summary = array();
while ($row = Sql_Fetch_Array($req)) {
  $msgsubj = Sql_Fetch_Row_query(sprintf('select subject from %s where id = %d',$GLOBALS['tables']['message'],$row['messageid']));
  $element = $GLOBALS['I18N']->get('msg').' '.$row['messageid'].': '.substr($msgsubj[0],0,25);
#  $element = sprintf('<a href="%s" target="_blank" class="url" title="%s">%s</a>',$row['url'],$row['url'],substr(str_replace('http://','',$row['url']),0,50));
#  $total = Sql_Verbose_Query(sprintf('select count(*) as total from %s where messageid = %d and url = "%s"',
#    $GLOBALS['tables']['linktrack'],$id,$row['url']));
  $totalsent = Sql_Fetch_Array_Query(sprintf('select count(*) as total from %s where url = "%s"',
    $GLOBALS['tables']['linktrack'],$urldata['url']));
  if (CLICKTRACK_SHOWDETAIL) {
    $uniqueclicks = Sql_Fetch_Array_Query(sprintf('select count(distinct userid) as users from %s
      where messageid = %d and url = "%s" and clicked',
      $GLOBALS['tables']['linktrack'],$row['messageid'],$urldata['url']));
  }
  $ls->addElement($element,PageUrl2('mclicks&id='.$row['messageid']));
  $ls->addColumn($element,$GLOBALS['I18N']->get('firstclick'),formatDateTime($row['firstclick'],1));
  $ls->addColumn($element,$GLOBALS['I18N']->get('latestclick'),$row['latestclick']);
  $ls->addColumn($element,$GLOBALS['I18N']->get('clicks'),$row['numclicks']);
#  $ls->addColumn($element,$GLOBALS['I18N']->get('sent'),$total['total']);
  $perc = sprintf('%0.2f',($row['numclicks'] / $totalsent['total'] * 100));
  $ls->addColumn($element,$GLOBALS['I18N']->get('clickrate'),$perc.'%');
  if (CLICKTRACK_SHOWDETAIL) {
    $ls->addColumn($element,$GLOBALS['I18N']->get('unique clicks'),$uniqueclicks['users']);
    $perc = sprintf('%0.2f',($uniqueclicks['users'] / $totalsent['total'] * 100));
    $ls->addColumn($element,$GLOBALS['I18N']->get('unique clickrate'),$perc.'%');
    $summary['uniqueclicks'] += $uniqueclicks['users'];
  }
  $ls->addColumn($element,$GLOBALS['I18N']->get('who'),PageLink2('userclicks&amp;msgid='.$row['messageid'].'&amp;linkid='.$id,$GLOBALS['I18N']->get('view users')));
  $summary['totalclicks'] += $row['numclicks'];
}
$ls->addElement('total');
$ls->addColumn('total',$GLOBALS['I18N']->get('clicks'),$summary['totalclicks']);
if (CLICKTRACK_SHOWDETAIL) {
  $ls->addColumn('total',$GLOBALS['I18N']->get('unique clicks'),$summary['uniqueclicks']);
}
print $ls->display();
?>