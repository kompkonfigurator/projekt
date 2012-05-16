<?php
require_once dirname(__FILE__).'/accesscheck.php';

if (!$_SESSION['logindetails']['superuser']) {
  print $GLOBALS['I18N']->get('Sorry, this page can only be used by super admins');
  return;
}

if ($_POST['unsubscribe']) {
  $emails = explode("\n",$_POST['unsubscribe']);
  $count = 0;
  $unsubbed = 0;
  foreach ($emails as $email) {
    $email = trim($email);
    $count++;
    Sql_Query(sprintf('update %s set confirmed = 0 where email = "%s"',$GLOBALS['tables']['user'],$email));
    $unsubbed += Sql_Affected_Rows();
  }
  printf($GLOBALS['I18N']->get('All done, %d emails processed, %d emails marked unconfirmed<br/>'),$count,$unsubbed);
  return;
}
?>

<form method=post action="">
<h1><?php echo $GLOBALS['I18N']->get('Mass unconfirm email addresses')?></h1>
<p><?php echo $GLOBALS['I18N']->get('Paste the emails to mark unconfirmed in this box, and click continue')?></p>
<input type=submit name="go" value="<?php echo $GLOBALS['I18N']->get('Continue')?>"><br/>
<textarea name="unsubscribe" rows=30 cols=40></textarea>
</form>
