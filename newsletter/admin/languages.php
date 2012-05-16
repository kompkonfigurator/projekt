<?php
require_once dirname(__FILE__).'/accesscheck.php';
/*

Languages, countries, and the charsets typically used for them
http://www.w3.org/International/O-charset-lang.html

*/

$LANGUAGES = array(
"nl"=> array("Dutch ","iso-8859-1"," iso-8859-1, windows-1252 "),
"de" => array("Deutsch ","iso-8859-1","iso-8859-1, windows-1252 "),
"en" => array("English ","iso-8859-1","iso-8859-1, windows-1252 "),
"es"=>array("espa&ntilde;ol","iso-8859-1","iso-8859-1, windows-1252"),
#"fa" => array('Persian','utf-8','utf-8'),
"fr"=>array("fran&ccedil;ais ","iso-8859-1","iso-8859-1, windows-1252 "),
"pl"=>array("Polish ","iso-8859-2","iso-8859-2"),
"pt-br"=>array("portugu&ecirc;s ","iso-8859-1","iso-8859-1, windows-1252"),
"zh-tw" => array("Traditional Chinese","utf-8","utf-8"),
);

## pick up languages from the lan directory
$landir = dirname(__FILE__).'/lan/';
$d = opendir($landir);
while ($lancode = readdir($d)) {
#  print "<br/>".$dir;
  if (!in_array($landir,array_keys($LANGUAGES)) && is_dir($landir.'/'.$lancode) && is_file($landir.'/'.$lancode.'/language_info')) {
    $lan_info = file_get_contents($landir.'/'.$lancode.'/language_info');
    $lines = explode("\n",$lan_info);
    $lan = array();
    foreach ($lines as $line) {
      if (preg_match('/(\w+)=([\w -]+)/',$line,$regs)) {
        $lan[$regs[1]] = $regs[2];
      }
    }
    if (!empty($lan['name']) && !empty($lan['charset'])) {
      $LANGUAGES[$lancode] = array($lan['name'],$lan['charset'],$lan['charset']);
    }
    
#    print '<br/>'.$landir.'/'.$lancode;
  }
}
ksort($LANGUAGES);
#var_dump($LANGUAGES);

if (!empty($GLOBALS["SessionTableName"])) {
  require_once dirname(__FILE__).'/sessionlib.php';
}
@session_start();

if (isset($_POST['setlanguage']) && $_POST['setlanguage'] && is_array($LANGUAGES[$_POST['setlanguage']])) {
  $_SESSION['adminlanguage'] = array(
    "info" => $_POST['setlanguage'],
    "iso" => $_POST['setlanguage'],
    "charset" => $LANGUAGES[$_POST['setlanguage']][1],
  );
}

if (!isset($_SESSION['adminlanguage']) || !is_array($_SESSION['adminlanguage'])) {
  if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
    $accept_lan = explode(',',$_SERVER['HTTP_ACCEPT_LANGUAGE']);
  } else {
    $accept_lan = array('en'); # @@@ maybe make configurable?
  }
  $detectlan = '';
  foreach ($accept_lan as $lan) {
    if (!$detectlan) {
      if (preg_match('/^([\w-]+)/',$lan,$regs)) {
        $code = $regs[1];
        if (isset($LANGUAGES[$code])) {
          $detectlan = $code;
        } elseif (ereg('-',$code)) {
          list($language,$country) = explode('-',$code);
          if (isset($LANGUAGES[$language])) {
            $detectlan = $language;
          }
        }
      }
    }
  }
  if (!$detectlan) {
    $detectlan = 'en';
  }

  $_SESSION['adminlanguage'] = array(
    "info" => $detectlan,
    "iso" => $detectlan,
    "charset" => $LANGUAGES[$detectlan][1],
  );
}

## this interferes with the frontend if an admin is logged in. 
## better split the frontend and backend charSets at some point
#if (!isset($GLOBALS['strCharSet'])) {
  $GLOBALS['strCharSet'] = $_SESSION['adminlanguage']['charset'];
#

#print '<h1>'. $GLOBALS['strCharSet'].'</h1>';

# internationalisation (I18N)
class phplist_I18N {
  var $defaultlanguage = 'en';
  var $language = 'en';
  var $basedir = '';

  function phplist_I18N() {
    $this->basedir = dirname(__FILE__).'/lan/';
    if (isset($_SESSION['adminlanguage']) && is_dir($this->basedir.$_SESSION['adminlanguage']['iso'])) {
      $this->language = $_SESSION['adminlanguage']['iso'];
    } else {
      print "Not set or found: ".$_SESSION['adminlanguage'];
      exit;
    }
  }

  function formatText($text) {
    # we've decided to spell phplist all lowercase
    $text = str_replace('PHPlist','phplist',$text);

    if (isset($GLOBALS["developer_email"])) {
      return '<font color=#A704FF>'.str_replace("\n","",$text).'</font>';
#       return 'TE'.$text.'XT';
    }
    return str_replace("\n","",$text);
  }

  function missingText($text) {
    if (isset($GLOBALS["developer_email"])) {
      if (isset($_GET['page'])) {
        $page = $_GET["page"];
      } else {
        $page = 'main page';
      }

      $msg = '

      Undefined text reference in page '.$page.'

      '.$text;

      #sendMail($GLOBALS["developer_email"],"phplist dev, missing text",$msg);
      $line = "'".$text."' => '".$text."',";
      $this->appendText('/tmp/'.$page.'.php',$line);

      return '<font color=#FF1717>'.$text.'</font>';#MISSING TEXT
    }
    return $text;
  }

  function appendText($file,$text) {
    if (is_file($file)) {
      $fp = @fopen ($file,"a");
    } else {
      $fp = @fopen($file,"w");
    }

    if ($fp) {
      fwrite($fp,$text."\n");
      fclose($fp);
    }
  }

  function get($text) {
    if (isset($_GET["page"]))
      $page = basename($_GET["page"]);
    else
      $page = "home";
    
    if (trim($text) == "") return "";
    if (strip_tags($text) == "") return $text;
    if (is_file($this->basedir.$this->language.'/'.$page.'.php')) {
      @include $this->basedir.$this->language.'/'.$page.'.php';
    } elseif (!isset($GLOBALS['developer_email'])) {
      @include $this->basedir.$this->defaultlanguage.'/'.$page.'.php';
    }
    if (isset($lan) && is_array($lan) && isset($lan[$text])) {
      return $this->formatText($lan[$text]);
    }
    if (isset($lan) && is_array($lan) && isset($lan[strtolower($text)])) {
      return $this->formatText($lan[strtolower($text)]);
    }
    if (isset($lan) && is_array($lan) && isset($lan[strtoupper($text)])) {
      return $this->formatText($lan[strtoupper($text)]);
    }
    if (is_file($this->basedir.$this->language.'/common.php')) {
      @include $this->basedir.$this->language.'/common.php';
    } elseif (!isset($GLOBALS['developer_email'])) {
      @include $this->basedir.$this->defaultlanguage.'/common.php';
    }
    if (is_array($lan) && isset($lan[$text])) {
      return $this->formatText($lan[$text]);
    }
    if (is_array($lan) && isset($lan[strtolower($text)])) {
      return $this->formatText($lan[strtolower($text)]);
    }
    if (is_array($lan) && isset($lan[strtoupper($text)])) {
      return $this->formatText($lan[strtoupper($text)]);
    }

    if (is_file($this->basedir.$this->language.'/frontend.php')) {
      @include $this->basedir.$this->language.'/frontend.php';
    } elseif (!isset($GLOBALS['developer_email'])) {
      @include $this->basedir.$this->defaultlanguage.'/frontend.php';
    }
    if (is_array($lan) && isset($lan[$text])) {
      return $this->formatText($lan[$text]);
    }
    if (is_array($lan) && isset($lan[strtolower($text)])) {
      return $this->formatText($lan[strtolower($text)]);
    }
    if (is_array($lan) && isset($lan[strtoupper($text)])) {
      return $this->formatText($lan[strtoupper($text)]);
    }
  
    # spelling mistake, retry with old spelling
    if ($text == 'over threshold, user marked unconfirmed') {
      return $this->get('over treshold, user marked unconfirmed');
    }
    return $this->missingText($text);
  }
}

$I18N = new phplist_I18N();
