<?php

# initialisation stuff

# record the start time(usec) of script
$now =  gettimeofday();
$GLOBALS["pagestats"] = array();
$GLOBALS["pagestats"]["time_start"] = $now["sec"] * 1000000 + $now["usec"];
$GLOBALS["pagestats"]["number_of_queries"] = 0;

$zlib_compression = ini_get('zlib.output_compression');
# hmm older versions of PHP don't have this, but then again, upgrade php instead?
if (function_exists('ob_list_handlers')) {
  $handlers = ob_list_handlers();
} else {
  $handlers = array();
}
$gzhandler = 0;
foreach ($handlers as $handler) {
  $gzhandler = $gzhandler || $handler == 'ob_gzhandler';
}
# @@@ needs more work
$GLOBALS['compression_used'] = $zlib_compression || $gzhandler;

# make sure these are set correctly, so they cannot be injected due to the PHP Globals Problem,
# http://www.hardened-php.net/globals-problem
$GLOBALS['language_module'] = $language_module;
$GLOBALS['database_module'] = $database_module;
$GLOBALS['show_dev_errors'] = $show_dev_errors;

## @@ would be nice to move this to the config file at some point
# http://mantis.phplist.com/view.php?id=15521
## set it on the fly, although that will probably only work with Apache
$GLOBALS['scheme'] = (isset($_SERVER['HTTPS']) && (strtolower($_SERVER['HTTPS']) == 'on')) ? 'https' : 'http';

## spelling mistake in earlier version, make sure to set it correctly
if (!isset($bounce_unsubscribe_threshold) && isset($bounce_unsubscribe_treshold)) {
  $bounce_unsubscribe_threshold = $bounce_unsubscribe_treshold;
}

if (!function_exists('removexss')) {
  function removeXss($string) {
    if (is_array($string)) {
      $return = array();
      foreach ($string as $key => $val) {
        $return[removeXss($key)] = removeXss($val);
      }
      return $return;
    }
    #$string = preg_replace('/<script/im','&lt;script',$string);
    $string = htmlspecialchars($string);
    return $string;
  }
}

?>
