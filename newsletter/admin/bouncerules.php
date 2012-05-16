<?php

require_once dirname(__FILE__).'/accesscheck.php';

if (isset($_GET['type']) && $_GET['type'] == 'candidate') {
  $type = 'candidate';
  $url = '&type=candidate';
} else {
  $type = 'active';
}

if (isset($_POST['tagaction']) && isset($_POST['tagged']) && is_array($_POST['tagged']) && sizeof($_POST['tagged'])) {
  switch ($_POST['tagaction']) {
    case "delete":
      foreach ($_POST['tagged'] as $key => $val) {
        Sql_Query(sprintf('delete from %s where id = %d',$GLOBALS['tables']['bounceregex'],$key));
      }
      break;
    case "activate":
      foreach ($_POST['tagged'] as $key => $val) {
        Sql_Query(sprintf('update %s set status = "active" where id = %d',$GLOBALS['tables']['bounceregex'],$key));
      }
      break;
    case "deactivate":
      foreach ($_POST['tagged'] as $key => $val) {
        Sql_Query(sprintf('update %s set status = "candidate" where id = %d',$GLOBALS['tables']['bounceregex'],$key));
      }
      break;
  }
  Redirect('bouncerules'.$url);
}

if (isset($_POST['listorder']) && is_array($_POST['listorder'])) {
  foreach ($_POST['listorder'] as $ruleid => $order) {
    Sql_Query(sprintf('update %s set listorder = %d where id = %d',$GLOBALS['tables']['bounceregex'],$order,$ruleid));
  }
}

if (isset($_GET['del']) && $_GET['del']) {
  Sql_Query(sprintf('delete from %s where id = %d',$GLOBALS['tables']['bounceregex'],$_GET['del']));
  Redirect('bouncerules'.$url);
}

if (isset($_POST['newrule']) && $_POST['newrule']) {
  Sql_Query(sprintf('insert into %s (regex,action,comment,admin,status) values("%s","%s","%s",%d,"active")',
    $GLOBALS['tables']['bounceregex'],$_POST['newrule'],$_POST['action'],$_POST['comment'],$_SESSION['logindetails']['id']),1);
  $num = Sql_Affected_Rows();
  if ($num < 0) {
    print '<p>'.$GLOBALS['I18N']->get('That rule exists already').'</p>';
  } else {
    Redirect('bouncerules'.$url);
  }
}
$count = Sql_Query(sprintf('select status, count(*) as num from %s group by status',$GLOBALS['tables']['bounceregex']));
while ($row = Sql_Fetch_Array($count)) {
  printf($GLOBALS['I18N']->get('Number of %s rules: %d').'<br/>',$row['status'],$row['num']);
}

$tabs = new WebblerTabs();
$tabs->addTab($GLOBALS['I18N']->get('active'),PageUrl2('bouncerules&type=active'));
$tabs->addTab($GLOBALS['I18N']->get('candidate'),PageUrl2('bouncerules&type=candidate'));
if ($type == 'candidate') {
  $tabs->setCurrent($GLOBALS['I18N']->get('candidate'));
} else {
  $tabs->setCurrent($GLOBALS['I18N']->get('active'));
}
print $tabs->display();

$some = 1;
$req = Sql_Query(sprintf('select * from %s where status = "%s" order by listorder,regex',$GLOBALS['tables']['bounceregex'],$type));
$ls = new WebblerListing($GLOBALS['I18N']->get('Bounce Regular Expressions'));
if (!Sql_Affected_Rows()) {
  print $GLOBALS['I18N']->get('No Rules found');
  $some = 0;
} else {
  print formStart();
}

while ($row = Sql_Fetch_Array($req)) {
  $element = $GLOBALS['I18N']->get('rule').' '.$row['id'];
  $ls->addElement($element,PageUrl2('bouncerule&id='.$row['id']));
  if ($type == 'candidate') {
    # check if it matches an active rule
    $activerule = matchedBounceRule($row['regex'],1);
    if ($activerule) {
      $ls->addColumn($element,$GLOBALS['I18N']->get('match'),PageLink2('bouncerule&id='.$activerule,$GLOBALS['I18N']->get('match')));
    }
  }
  
  $ls->addColumn($element,$GLOBALS['I18N']->get('expression'),'<a name="'.$row['id'].'"></a>'.htmlspecialchars($row['regex']));
  $ls->addColumn($element,$GLOBALS['I18N']->get('action'),$GLOBALS['bounceruleactions'][$row['action']]);
#  $num = Sql_Fetch_Row_Query(sprintf('select count(*) from %s where regex = %d',$GLOBALS['tables']['bounceregex_bounce'],$row['id']));
#  $ls->addColumn($element,$GLOBALS['I18N']->get('#bncs'),$num[0]);
  $ls->addColumn($element,$GLOBALS['I18N']->get('#bncs'),$row['count']);

  $ls->addColumn($element,$GLOBALS['I18N']->get('tag'),sprintf('<input type=checkbox name="tagged[%d]" value="%d">',$row['id'],$row['listorder']));
  $ls->addColumn($element,$GLOBALS['I18N']->get('order'),sprintf('<input type=text name="listorder[%d]" value="%d" size=3>',$row['id'],$row['listorder']));
  $ls->addColumn($element,$GLOBALS['I18N']->get('del'),PageLink2('bouncerules&del='.$row['id'],$GLOBALS['I18N']->get('del')));
}
print $ls->display();
if ($some) {
  print '<p>'.$GLOBALS['I18N']->get('with tagged rules: ').' ';
  printf('<b>%s</b> <input type=checkbox name="tagaction" value="delete"><br/>',$GLOBALS['I18N']->get('delete'));
  if ($type == 'candidate') {
    printf('<b>%s</b> <input type=checkbox name="tagaction" value="activate"><br/>',$GLOBALS['I18N']->get('make active'));
  } else {
    printf('<b>%s</b> <input type=checkbox name="tagaction" value="deactivate"><br/>',$GLOBALS['I18N']->get('make inactive'));
  }
  print ' <input type=submit name="doit" value="'.$GLOBALS['I18N']->get('Save Changes').'"></p>';
  print '</form>';
}
print '<hr/>';
print '<p>'.$GLOBALS['I18N']->get('add a new rule').'</p>';
print '<form method=post>';
print '<table>';
printf('<tr><td>%s</td><td><input type=text name="newrule" size=30></td></tr>',$GLOBALS['I18N']->get('Regular Expression'));
printf('<tr><td>%s</td><td><select name="action">',$GLOBALS['I18N']->get('Action'));
foreach ($GLOBALS['bounceruleactions'] as $action => $desc) {
  printf('<option value="%s" %s>%s</option>',$action,$data['action'] == $action ? 'selected':'',$desc);
}
print '</select></td></tr>';
printf('<tr><td colspan=2>%s</td></tr><tr><td colspan=2><textarea name="comment" rows=10 cols=65></textarea></td></tr>',
  $GLOBALS['I18N']->get('Memo for this rule'));
print '<tr><td colspan=2><input type=submit name="add" value="'.$GLOBALS['I18N']->get('Add new Rule').'"></td></tr>';
print '</table></form>';
  
?>