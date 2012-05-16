<?php
#error_reporting(E_ALL);
require_once dirname(__FILE__).'/accesscheck.php';
print '<script language="javascript" type="text/javascript" src="js/jslib.js"></script>';

$listid = empty($_GET['id']) ? 0 : sprintf('%d',$_GET['id']);

if (!$listid) {
  $req = Sql_Query(sprintf('select listid,userid,count(distinct userid) as numusers from %s listuser, %s umb where listuser.userid = umb.user group by listuser.listid order by listuser.listid',$GLOBALS['tables']['listuser'],$GLOBALS['tables']['user_message_bounce']));
  $ls = new WebblerListing($GLOBALS['I18N']->get('Choose a list'));
  while ($row = Sql_Fetch_Array($req)) {
    $element = $GLOBALS['I18N']->get('list').' '.$row['listid'];
    $ls->addElement($element,PageUrl2('listbounces&amp;id='.$row['listid']));
    $ls->addColumn($element,$GLOBALS['I18N']->get('name'),listName($row['listid']),PageUrl2('editlist&amp;id='.$row['listid']));
    $ls->addColumn($element,$GLOBALS['I18N']->get('# bounced'),$row['numusers']);
  }
  print $ls->display();
  return;
}

$req = Sql_Query(sprintf('select listid,userid,count(bounce) as numbounces from %s listuser, %s umb where listuser.userid = umb.user and listuser.listid = %d and date_add(time,interval 6 month) > now() group by umb.user order by listuser.listid',$GLOBALS['tables']['listuser'],$GLOBALS['tables']['user_message_bounce'],$listid));
$total = Sql_Affected_Rows();
$limit = '';
$numpp = 150;

$s = empty($_GET['s']) ? 0 : sprintf('%d',$_GET['s']);
if ($total > 500 && $_GET['type'] != 'dl') {
#  print Paging2('listbounces&id='.$listid,$total,$numpp,'Page');
  $listing = sprintf($GLOBALS['I18N']->get("Listing %s to %s"),$s,$s+$numpp);
  $limit = "limit $s,".$numpp;
  print $total. " ".$GLOBALS['I18N']->get(" Total")."</p>";
  printf ('<table border=1><tr><td colspan=4 align=center>%s</td></tr><tr><td>%s</td><td>%s</td><td>
          %s</td><td>%s</td></tr></table><p><hr>',
          $listing,
          PageLink2('listbounces&id='.$listid,"&lt;&lt;","s=0"),
          PageLink2('listbounces&id='.$listid,"&lt;",sprintf('s=%d',max(0,$s-$numpp))),
          PageLink2('listbounces&id='.$listid,"&gt;",sprintf('s=%d',min($total,$s+$numpp))),
          PageLink2('listbounces&id='.$listid,"&gt;&gt;",sprintf('s=%d',$total-$numpp)));
  $req = Sql_Query(sprintf('select listid,userid,count(bounce) as numbounces from %s listuser, %s umb where listuser.userid = umb.user and listuser.listid = %d  and date_add(time,interval 6 month) > now() group by umb.user order by listuser.listid %s',$GLOBALS['tables']['listuser'],$GLOBALS['tables']['user_message_bounce'],$listid,$limit));
}

print '<p>'.PageLink2('listbounces','Select another list');
print '&nbsp;'.PageLink2('listbounces&type=dl&&amp;id='.$listid,'Download emails');
print '</p>';
if ($_GET['type'] == 'dl') {
  ob_end_clean();
  Header("Content-type: text/plain");
  $filename = 'Bounces on '.listName($listid);
  header("Content-disposition:  attachment; filename=\"$filename\"");
}

$currentlist = 0;
$ls = new WebblerListing('');
while ($row = Sql_Fetch_Array($req)) {
  if ($currentlist != $row['listid']) {
    if ($_GET['type'] != 'dl') {
      print $ls->display();
    }
    $currentlist = $row['listid'];
    flush();
    $ls = new WebblerListing(listName($row['listid']));
  }
  $userdata = Sql_Fetch_Array_Query(sprintf('select * from %s where id = %d',
    $GLOBALS['tables']['user'],$row['userid']));
  if ($_GET['type'] == 'dl') {
    print $userdata['email']."\n";
  }

  $ls->addElement($row['userid'],PageUrl2('user&id='.$row['userid']));
  $ls->addColumn($row['userid'],$GLOBALS['I18N']->get('email'),$userdata['email']);
  $ls->addColumn($row['userid'],$GLOBALS['I18N']->get('# bounces'),$row['numbounces']);
}
if ($_GET['type'] != 'dl') {
  print $ls->display();
} else {
  exit;
}
