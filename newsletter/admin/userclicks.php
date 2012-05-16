<?php

# click stats listing users
require_once dirname(__FILE__).'/accesscheck.php';

if (isset($_GET['msgid'])) {
  $msgid = sprintf('%d',$_GET['msgid']);
} else {
  $msgid = 0;
}
if (isset($_GET['linkid'])) {
  $linkid = sprintf('%d',$_GET['linkid']);
} else {
  $linkid = 0;
}
if (isset($_GET['userid'])) {
  $userid = sprintf('%d',$_GET['userid']);
} else {
  $userid = 0;
}

if (!$msgid && !$linkid && !$userid) {
  print $GLOBALS['I18N']->get('Invalid Request');
  return;
}

$access = accessLevel('userclicks');
switch ($access) {
  case 'owner':
  case 'all':
    $subselect = '';
    break;
  case 'none':
  default:
    print $GLOBALS['I18N']->get('You do not have access to this page');
    return;
    break;
}


$ls = new WebblerListing($GLOBALS['I18N']->get('User Click Statistics'));

if ($linkid) {
  $urldata = Sql_Fetch_Array_Query(sprintf('select url from %s where linkid = %d',
    $GLOBALS['tables']['linktrack'],$linkid));
}
if ($msgid) {
  $messagedata = Sql_Fetch_Array_query("SELECT * FROM {$tables['message']} where id = $msgid $subselect");
}
if ($userid) {
  $userdata = Sql_Fetch_Array_query("SELECT * FROM {$tables['user']} where id = $userid $subselect");
}

if ($linkid && $msgid) {
  print '<h1>'.$GLOBALS['I18N']->get('User Click Details for a URL in a message');
  print ' ' .PageLink2('uclicks&amp;id='.$linkid,$urldata['url']);
  print '</h1>';
  print '<table>
  <tr><td>'.$GLOBALS['I18N']->get('Subject').'<td><td>'.PageLink2('mclicks&amp;id='.$msgid,$messagedata['subject']).'</td></tr>
  <tr><td>'.$GLOBALS['I18N']->get('Entered').'<td><td>'.$messagedata['entered'].'</td></tr>
  <tr><td>'.$GLOBALS['I18N']->get('Sent').'<td><td>'.$messagedata['sent'].'</td></tr>
  </table><hr/>';
  $req = Sql_Query(sprintf('select user.email,user.id as userid,firstclick,date_format(latestclick,
    "%%e %%b %%Y %%H:%%i") as latestclick,sum(clicked) as numclicks from %s as linktrack, %s as user where linktrack.userid = user.id 
    and linktrack.url = "%s" and linktrack.messageid = %d
    and linktrack.clicked group by linktrack.userid',$GLOBALS['tables']['linktrack'],$GLOBALS['tables']['user'],$urldata['url'],$msgid));
} elseif ($userid && $msgid) {
  print '<h1>'.$GLOBALS['I18N']->get('User Click Details for a message').'</h1>';
  print $GLOBALS['I18N']->get('User').' '.PageLink2('user&id='.$userid,$userdata['email']);
  print '</h1>';
  print '<table>
  <tr><td>'.$GLOBALS['I18N']->get('Subject').'<td><td>'.PageLink2('mclicks&amp;id='.$msgid,$messagedata['subject']).'</td></tr>
  <tr><td>'.$GLOBALS['I18N']->get('Entered').'<td><td>'.$messagedata['entered'].'</td></tr>
  <tr><td>'.$GLOBALS['I18N']->get('Sent').'<td><td>'.$messagedata['sent'].'</td></tr>
  </table><hr/>';
  $req = Sql_Query(sprintf('select user.email,user.id as userid,firstclick,date_format(latestclick,
    "%%e %%b %%Y %%H:%%i") as latestclick,sum(clicked) as numclicks,messageid,linkid,url from %s as linktrack, %s as user where linktrack.userid = user.id 
    and linktrack.userid = %d and linktrack.messageid = %s and linktrack.clicked group by linktrack.url',$GLOBALS['tables']['linktrack'],$GLOBALS['tables']['user'],
    $userid,$msgid));
} elseif ($linkid) {
  print '<h1>'.$GLOBALS['I18N']->get('User Click Details for a URL').' <b>'.$urldata['url'].'</b></h1>';
  $req = Sql_Query(sprintf('select user.email, user.id as userid,firstclick,date_format(latestclick,
    "%%e %%b %%Y %%H:%%i") as latestclick,sum(clicked) as numclicks from %s as linktrack, %s as user where linktrack.userid = user.id 
    and linktrack.url = "%s" and linktrack.clicked group by linktrack.userid',$GLOBALS['tables']['linktrack'],$GLOBALS['tables']['user'],
    $urldata['url']));
} elseif ($msgid) {
  print '<h1>'.$GLOBALS['I18N']->get('User Click Details for a Message').'</h1>';
  print '<table>
  <tr><td>'.$GLOBALS['I18N']->get('Subject').'<td><td>'.$messagedata['subject'].'</td></tr>
  <tr><td>'.$GLOBALS['I18N']->get('Entered').'<td><td>'.$messagedata['entered'].'</td></tr>
  <tr><td>'.$GLOBALS['I18N']->get('Sent').'<td><td>'.$messagedata['sent'].'</td></tr>
  </table><hr/>';
  $req = Sql_Query(sprintf('select user.email,user.id as userid,firstclick,date_format(latestclick,
    "%%e %%b %%Y %%H:%%i") as latestclick,sum(clicked) as numclicks from %s as linktrack, %s as user where linktrack.userid = user.id 
    and linktrack.messageid = %d and linktrack.clicked group by linktrack.userid',$GLOBALS['tables']['linktrack'],$GLOBALS['tables']['user'],
    $msgid));
} elseif ($userid) {
  print '<h1>'.$GLOBALS['I18N']->get('User Click Details').'</h1>';
  $req = Sql_Query(sprintf('select user.email,user.id as userid,firstclick,date_format(latestclick,
    "%%e %%b %%Y %%H:%%i") as latestclick,sum(clicked) as numclicks,messageid,linkid,url from %s as linktrack, %s as user where linktrack.userid = user.id 
    and linktrack.userid = %d and linktrack.clicked group by linktrack.url',$GLOBALS['tables']['linktrack'],$GLOBALS['tables']['user'],
    $userid));
}

#ob_end_flush();
#flush();
  
$summary = array();
while ($row = Sql_Fetch_Array($req)) {
#  print $row['email'] . "<br/>";
  if (!$userid) {
    $element = $row['email'];
    $ls->addElement($element,PageUrl2('userhistory&id='.$row['userid']));
  } else {
    $element = $row['url'];
    $ls->addElement($element,PageUrl2('uclicks&id='.$row['linkid']));
    $ls->addColumn($element,$GLOBALS['I18N']->get('message'),PageLink2('mclicks&id='.$row['messageid'],$row['messageid']));
  }
#  $element = sprintf('<a href="%s" target="_blank" class="url" title="%s">%s</a>',$row['url'],$row['url'],substr(str_replace('http://','',$row['url']),0,50));
#  $total = Sql_Verbose_Query(sprintf('select count(*) as total from %s where messageid = %d and url = "%s"',
#    $GLOBALS['tables']['linktrack'],$id,$row['url']));
#  $totalsent = Sql_Fetch_Array_Query(sprintf('select count(*) as total from %s where url = "%s"',
#    $GLOBALS['tables']['linktrack'],$urldata['url']));
  $ls->addColumn($element,$GLOBALS['I18N']->get('firstclick'),formatDateTime($row['firstclick'],1));
  $ls->addColumn($element,$GLOBALS['I18N']->get('latestclick'),$row['latestclick']);
  $ls->addColumn($element,$GLOBALS['I18N']->get('clicks'),$row['numclicks']);
#  $ls->addColumn($element,$GLOBALS['I18N']->get('sent'),$total['total']);
#  $perc = sprintf('%0.2f',($row['numclicks'] / $totalsent['total'] * 100));
#  $ls->addColumn($element,$GLOBALS['I18N']->get('clickrate'),$perc.'%');
  $summary['totalclicks'] += $row['numclicks'];
}
$ls->addElement('total');
$ls->addColumn('total',$GLOBALS['I18N']->get('clicks'),$summary['totalclicks']);
print $ls->display();
?>