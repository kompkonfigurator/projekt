<?php

ob_end_clean();
## blacklist an email from commandline

if (!function_exists('cl_output')) {
function cl_output($message) {
  @ob_end_clean();
  print strip_tags($message) . "\n";
  $infostring = '';
  ob_start();
} 
}

$email = $cline['e'];
$uid = $cline['u'];

if (!empty($uid) && empty($email)) {
  $emailreq = Sql_Fetch_Row_Query(sprintf('select email from %s where uniqid = "%s"',$GLOBALS['tables']['user'],$uid));
  $email = $emailreq[0];
}

if (empty($email)) {
  cl_output('No email'); exit;
}

if (isBlackListed($email)) {
  cl_output('Already blacklisted');
  exit;
}

addEmailToBlackList($email,'blacklisted due to spam complaints');

cl_output($email. ' blacklisted');
exit;
