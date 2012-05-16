<?php
require_once dirname(__FILE__).'/accesscheck.php';

if (TEST)
  print $GLOBALS['I18N']->get('default login is')." admin, ".$GLOBALS['I18N']->get('with password')." phplist";

if (isset($_GET['page']) && $_GET["page"]) {
  $page = $_GET["page"];
  if (!is_file($page.".php") || $page == "logout") {
    $page = "home";
  }
} else {
  $page = "home";
}
if (!isset($GLOBALS['msg'])) $GLOBALS['msg'] = '';
?>
<font class="error"><?php echo $GLOBALS['msg']?></font>


<script language="Javascript" type="text/javascript">

if (!navigator.cookieEnabled) {
  document.writeln('<div class="error"><?php echo $GLOBALS['I18N']->get('In order to login, you need to enable cookies in your browser')?></div>');
}

</script>
<form method="post" action="">
<input type=hidden name="page" value="<?php echo $page?>">
<table width=100% border=0 cellpadding=2 cellspacing=0>

<tr><td><span class="general"><?php echo $GLOBALS['I18N']->get('name');?>:</span></td></tr>
<tr><td><input type=text name="login" value="" size=30></td></tr>

<tr><td><span class="general"><?php echo $GLOBALS['I18N']->get('password');?>:</span></td></tr>
<tr><td><input type=password name="password" value="" size=30></td></tr>

<tr><td><input type=submit name="process" value="<?php echo $GLOBALS['I18N']->get('enter');?>"></td></tr></table>
</form>


<form method="post" action="">
<input type="hidden" name="page" value="<?php echo $page?>">
<p align="center"><hr width=50% size=3>

<?php echo $GLOBALS['I18N']->get('forgot password');?>:

<?php echo $GLOBALS['I18N']->get('enter your email');?>: <input type=text name="forgotpassword" value="" size=30>


<input type=submit name="process" value="<?php echo $GLOBALS['I18N']->get('send password');?>">

</form>