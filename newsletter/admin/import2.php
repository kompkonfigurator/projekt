<?php

require_once dirname(__FILE__).'/accesscheck.php';
if (!ALLOW_IMPORT) {
  print '<p>'.$GLOBALS['I18N']->get('import is not available').'</p>';
  return;
}

require 'commonlib/pages/importcsv.php';

?>
