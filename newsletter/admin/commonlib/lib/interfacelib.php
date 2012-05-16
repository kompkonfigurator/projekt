<?php
require_once dirname(__FILE__).'/accesscheck.php';

# interface functions

class WebblerListing {
  var $title;
  var $help;
  var $elements = array();
  var $columns = array();
  var $sortby = array();
  var $sort = 0;
  var $buttons = array();
  var $initialstate = "block";
  var $duplicatebuttons = array();
  var $buttonduplicate = 0;

  function WebblerListing($title,$help = "") {
    $this->title = $title;
    $this->help = $help;
  }

  function addElement($name,$url = "",$colsize="") {
    if (!isset($this->elements[$name])) {
      $this->elements[$name] = array(
        "name" => $name,
        "url" => $url,
        "colsize" => $colsize,
        "columns" => array(),
        "rows" => array(),
      );
    }
  }

  function deleteElement($name) {
    unset($this->elements[$name]);
  }
  function addSort() {
    $this->sort = 1;
  }

  function addColumn($name,$column_name,$value,$url="",$align="") {
    if (!isset($name))
      return;
    $this->columns[$column_name] = $column_name;
        $this->sortby[$column_name] = $column_name;
    # @@@ should make this a callable function
    $this->elements[$name]["columns"]["$column_name"] = array(
      "value" => $value,
      "url" => $url,
      "align"=> $align,
    );
  }

  function renameColumn($oldname,$newname) {
    $this->columns[$oldname] = $newname;
  }

  function removeGetParam($remove) {
    $res = "";
    foreach ($_GET as $key => $val) {
      if ($key != $remove) {
        $res .= "$key=".urlencode($val)."&amp;";
      }
    }
    return $res;
  }

  function addRow($name,$row_name,$value,$url="",$align="") {
    if (!isset($name))
      return;
    $this->elements[$name]["rows"]["$row_name"] = array(
      "name" => $row_name,
      "value" => $value,
      "url" => $url,
      "align"=> $align,
    );
  }

  function addInput ($name,$value) {
    $this->addElement($name);
    $this->addColumn($name,"value",
      sprintf('<input type=text name="%s" value="%s" size=40 class="listinginput">',
      strtolower($name),$value));
  }

  function addButton($name,$url) {
    $this->buttons[$name] = $url;
  }

  function duplicateButton($name,$rows) {
    $this->duplicatebuttons[$name] = array(
      "button" => $name,
      "rows" => $rows,
      "rowcount" => 1
    );
    $this->buttonduplicate = 1;
  }

  function listingStart() {
    return '<table cellpadding="0" cellspacing="0" border="0" width="100%">';
  }

  function listingHeader() {
    $tophelp = '';
    if (!sizeof($this->columns)) {
      $tophelp = $this->help;
    }
    $html = '<tr valign="top">';
    $html .= sprintf('<td><a name="%s"></a><div class="listinghdname">%s%s</div></td>',strtolower($this->title),$tophelp,$this->title);
    $c = 1;
    foreach ($this->columns as $column => $columnname) {
      if ($c == sizeof($this->columns)) {
        $html .= sprintf('<td><div class="listinghdelement">%s%s</div></td>',$columnname,$this->help);
      } else {
        if ($this->sortby[$columnname] && $this->sort) {
          $display = sprintf('<a href="./?%s&amp;sortby=%s">%s</a>',$this->removeGetParam("sortby"),urlencode($columnname),$columnname);
        } else {
          $display = $columnname;
        }
        $html .= sprintf('<td><div class="listinghdelement">%s</div></td>',$display);
      }
      $c++;

    }
  #  $html .= sprintf('<td align="right"><span class="listinghdelementright">%s</span></td>',$lastelement);
    $html .= '</tr>';
    return $html;
  }

  function listingElement($element) {
    if ($element["colsize"])
      $width = 'width='.$element["colsize"];
    else
      $width = "";
    $html = '<tr valign="middle">';
    if ($element["url"]) {
      $html .= sprintf('<td valign="top" %s class="listingname"><span class="listingname"><a href="%s" class="listingname">%s</a></span></td>',$width,$element["url"],$element["name"]);
    } else {
      $html .= sprintf('<td valign="top" %s class="listingname"><span class="listingname">%s</span></td>',$width,$element["name"]);
    }
    foreach ($this->columns as $column) {
      if (isset($element["columns"][$column]) && $element["columns"][$column]["value"]) {
        $value = $element["columns"][$column]["value"];
      } else {
        $value = $column;
      }
      if (isset($element["columns"][$column]) && $element["columns"][$column]["align"]) {
        $align = $element["columns"][$column]["align"];
      } else {
        $align = '';
      }
      if (isset($element["columns"][$column]) && $element["columns"][$column]["url"]) {
        $html .= sprintf('<td valign="top" class="listingelement%s"><span class="listingelement%s"><a href="%s" class="listingelement">%s</a></span></td>',$align,$align,$element["columns"][$column]["url"],$value);
      } elseif (isset($element["columns"][$column])) {
        $html .= sprintf('<td valign="top" class="listingelement%s"><span class="listingelement%s">%s</span></td>',$align,$align,$element["columns"][$column]["value"]);
      } else {
        $html .= sprintf('<td valign="top" class="listingelement%s"><span class="listingelement%s">%s</span></td>',$align,$align,'');
      }
    }
    $html .= '</tr>';
    foreach ($element["rows"] as $row) {
      if ($row["value"]) {
        $value = $row["value"];
      } else {
        $value = "";
      }
      if ($element["rows"][$row]["align"]) {
        $align = $element["rows"][$row]["align"];
      } else {
        $align = 'left';
      }
      if ($element["rows"][$row]["url"]) {
        $html .= sprintf('<tr><td valign="top" class="listingrowname">
          <span class="listingrowname"><a href="%s" class="listinghdname">%s</a></span>
          </td><td valign="top" class="listingelement%s" colspan=%d>
          <span class="listingelement%s">%s</span>
          </td></tr>',$row["url"],$row["name"],$align,sizeof($this->columns),$align,$value);
      } else {
        $html .= sprintf('<tr><td valign="top" class="listingrowname">
          <span class="listingrowname">%s</span>
          </td><td valign="top" class="listingelement%s" colspan=%d>
          <span class="listingelement%s">%s</span>
          </td></tr>',$row["name"],$align,sizeof($this->columns),$align,$value);
      }
    }
    $html .= sprintf('<!--greenline start-->
      <tr valign="middle">
      <td colspan="%d" bgcolor="#CCCC99"><img height=1 alt="" src="images/transparent.png" width=1 border=0></td></td>
      </tr>
      <!--greenline end-->
    ',sizeof($this->columns)+2);
#    $this->duplicatebuttons[$name] = array(
#      "button" => $name,
#      "rows" => $rows,
#      "rowcount" => 0
#    );
    $this->buttonduplicate = 1;
    if ($this->buttonduplicate) {
      $buttons = '';
      foreach ($this->duplicatebuttons as $key => $val) {
        $this->duplicatebuttons[$key]['rowcount']++;
        if ($val['rowcount'] >= $val['rows']) {
          if ($this->buttons[$val['button']]) {
            $buttons .= sprintf('<a class="button" href="%s">%s</a>',$this->buttons[$val['button']],strtoupper($val['button']));
          }
          $this->duplicatebuttons[$key]['rowcount'] = 1;
        }
      }
      if ($buttons) {
          $html .= sprintf('
        <tr><td colspan="2">&nbsp;</td></tr>
        <tr><td colspan="%d" align="right">%s</td></tr>
        <tr><td colspan="2">&nbsp;</td></tr>
        ',sizeof($this->columns)+2,$buttons);
      }
    }

    return $html;
  }

  function listingEnd() {
    $html = '';$buttons = "";
    if (sizeof($this->buttons)) {
      foreach ($this->buttons as $button => $url) {
        $buttons .= sprintf('<a class="button" href="%s">%s</a>',$url,strtoupper($button));
      }
      $html .= sprintf('
    <tr><td colspan="2">&nbsp;</td></tr>
    <tr><td colspan="%d" align="right">%s</td></tr>
    <tr><td colspan="2">&nbsp;</td></tr>
    ',sizeof($this->columns)+2,$buttons);
    }
    $html .= '</table>';
    return $html;
  }

  function index() {
    return "<a name=top>Index:</a><br />";
  }

  function cmp($a,$b) {
    $sortcol = urldecode($_GET["sortby"]);
    if (!is_array($a) || !is_array($b)) return 0;
    $val1 = strip_tags($a["columns"][$sortcol]["value"]);
    $val2 = strip_tags($b["columns"][$sortcol]["value"]);
    if ($val1 == $val2) return 0;
    return $val1 < $val2 ? -1 : 1;
  }

  function collapse() {
    $this->initialstate = "none";
  }

  function display($add_index = 0) {
    $html = "";
    if (!sizeof($this->elements))
      return "";
#   if ($add_index)
#     $html = $this->index();

    $html .= $this->listingStart();
    $html .= $this->listingHeader();
#    global $float_menu;
#    $float_menu .= "<a style=\"display: block;\" href=\"#".htmlspecialchars($this->title)."\">$this->title</a>";
    if ($this->sort) {
      usort($this->elements,array("WebblerListing","cmp"));
    }
    foreach ($this->elements as $element) {
      $html .= $this->listingElement($element);
    }
    $html .= $this->listingEnd();

    $shader = new WebblerShader($this->title);
    $shader->addContent($html);
    $shader->display = $this->initialstate;
    $html = $shader->shaderStart();
    $html .= $shader->header();
    $html .= $shader->dividerRow();
    $html .= $shader->contentDiv();
    $html .= $shader->footer();
    return $html;
  }
}

class topBar {
  var $type = '';

  function topBar($type) {
    $this->type = $type;
  }

  function display($lid,$bid) {
    if ($this->type == "admin") {
      return $this->adminBar($lid,$bid);
    } else {
      return $this->defaultBar();
    }
  }

  function defaultBar() {
    return '';
  }

  function adminBar($lid,$bid) {
    global $config;
    $uri = "http://".$config["websiteurl"].'/?lid='.$lid.'&validate=1';
    if ($config["validator"] && in_array($_SESSION["me"]["loginname"],$config["validator_users"])) {
      $validate = sprintf ('<li><a href="http://%s/check?uri=%s" target="_validate" title="use this link to validate this page" target="_validate">validate</a></li>',
      $config["validator"],urlencode($uri));
    } else {
      $validate = '';
    }
    return '
<STYLE TYPE="text/css">
body {margin: 0; padding: 0 0 0 0}

#adminnavcontainer {margin: 0 0 0 0; padding: 0; background-color: #DEDEB6; position: absolute; top: 0px; left:0px}

div.adminwebblerid { float: right; margin: 3px 5px 0 0;
padding: 0;
font: 11px arial, sans-serif;
font-weight: bold;
color: #C2C283
}

#adminnavcontainer div {padding: 15px 0 0 0;}
ul {margin: 0 0 0 0; padding: 10px 0 0 0 ;}
#adminnavlist
{
padding: 3px 0 3px 0;
margin-left: 0;
border-bottom: 2px solid #CCCC99;
font: 11px arial, sans-serif;
}

#adminnavlist li
{
list-style: none;
margin: 0;
display: inline;
}

#adminnavlist li a
{
padding: 3px 0.5em;
margin-left: 3px;
border: 1px solid #CCCC99;
border-bottom: none;
background: #FFCC66;
text-decoration: none;
}

#adminnavlist li a:link,
#adminnavlist li a:visited { color: #000; }

#adminnavlist li a:hover
{
color: #000;
background: #CCCC99;
border-color: #CCCC99;
}

</style>

<script language="Javascript" type="text/javascript" src="/codelib/js/cookielib.js"></script>
<script language="Javascript" type="text/javascript">
var expDays = 3;
var exp = new Date();
exp.setTime(exp.getTime() + (expDays*24*60*60*1000));

function hideadminbar() {
  if (document.getElementById) {
    var el = document.getElementById(\'adminnavcontainer\');
    el.style.visibility="hidden";
  } else {
    alert("To hide the bar, you need to logout");
  }
}
function closeadminbar() {
  if (document.getElementById) {
    var el = document.getElementById(\'adminnavcontainer\');
    document.getElementById(\'adminnavcontainer\').style.visibility="hidden";
    SetCookie("webbleradminbar","closed",exp);
  } else {
    alert("To hide the bar, you need to logout");
  }
}
</script>

<div id="adminnavcontainer">
<div class="adminwebblerid">[webbler admin bar]</div>
<div></div>
<ul id="adminnavlist">
<li>&nbsp;</li>
<li><a href="'.$config["uploader_dir"]."/?page=edit&b=$bid&id=$lid".'" title="use this link to edit this page">edit page</a></li>
<li><a href="'.$config["uploader_dir"].'/?page=list&id='.$bid.'" title="use this link to edit this branch">branch</a></li>
<li><a href="'.$config["uploader_dir"].'/?page=sitemap" title="use this link to view the sitemap">sitemap</a></li>
<li><a href="'.$config["uploader_dir"].'/" title="use this link to go to the webbler admin homepage">webbler home</a></li>
'.$validate.'
<li><a href="'.$config["uploader_dir"]."/?page=logout&return=".urlencode("lid=$lid").'" title="use this link to logout of the webbler">logout</a></li>
<li><a href="javascript:hideadminbar();" title="use this link to hide this admin bar on this page">hide bar</a></li>
<li><a href="javascript:closeadminbar();" title="use this link to hide the admin bar for this session">close bar</a></li>
<li>&nbsp;TEMPLATE:&nbsp; <b>'.getLeafTemplate($lid).'</b></li>
</ul>

</div>
<script language="Javascript" type="text/javascript">
var state = GetCookie("webbleradminbar");
if (state == "closed") {
  hideadminbar();
}

</script>
';
  }
}

class WebblerTabs {
  var $tabs = array();
  var $current = "";
  var $linkcode = "";

  function addTab($name,$url = "") {
    $this->tabs[$name] = $url;
  }

  function setCurrent($name) {
    $this->current = strtolower($name);
  }

  function addLinkCode($code) {
    $this->linkcode = $code;
  }

  function display() {
    $html = '<style type=text/css media=screen>@import url( styles/tabs.css );</style>';
    $html .= '<div id="webblertabs">';
    $html .= '<ul>';
    reset($this->tabs);
    foreach ($this->tabs as $tab => $url) {
      if (strtolower($tab) == $this->current) {
        $html .= '<li id=current>';
      } else {
        $html .= '<li>';
      }
      $html .= sprintf('<a href="%s" %s>%s</a>',$url,$this->linkcode,$tab);
      $html .= '</li>';
    }
    $html .= '</ul>';
    $html .= '</div>';
#    $html .= '<span class="faderight">&nbsp;</span>';
    $html .= '<br clear="all" />';
    return $html;
 }
}

class WebblerShader {
  var $name = "Untitled";
  var $content = "";
  var $num = 0;
  var $isfirst = 0;
  var $display = "block";
  var $initialstate = "open";

  function WebblerShader($name) {
    $this->name = $name;
    if (!isset($GLOBALS["shadercount"])) {
      $GLOBALS["shadercount"] = 0;
      $this->isfirst = 1;
    }
    $this->num = $GLOBALS["shadercount"];
    $GLOBALS["shadercount"]++;
  }

  function addContent($content) {
    $this->content = $content;
  }

  function hide() {
    $this->display = 'none';
  }

  function show() {
    $this->display = 'block';
  }

  function shaderJavascript() {
    if ($_SERVER["QUERY_STRING"]) {
      $cookie = "WS?".$_SERVER["QUERY_STRING"];
    } else {
      $cookie = "WS";
    }
    if (!isset($_COOKIE[$cookie])) {
      $_COOKIE[$cookie] = '';
    }

    return '
  <script language="Javascript" type="text/javascript">

  <!--
  var states = Array("'.join('","',split(",",$_COOKIE[$cookie])).'");
  var cookieloaded = 0;
  var expireDate = new Date;
  expireDate.setDate(expireDate.getDate()+365);

  function cookieVal(cookieName) {
    var thisCookie = document.cookie.split("; ")
    for (var i = 0; i < thisCookie.length; i++) {
      if (cookieName == thisCookie[i].split("=")[0]) {
        return thisCookie[i].split("=")[1];
      }
    }
    return 0;
  }

  function saveStates() {
    document.cookie = "WS"+escape(this.location.search)+"="+states+";expires=" + expireDate.toGMTString();
  }

  var agt = navigator.userAgent.toLowerCase();
  var is_major = parseInt(navigator.appVersion);
  var is_nav = ((agt.indexOf(\'mozilla\') != -1) && (agt.indexOf(\'spoofer\') == -1) && (agt.indexOf(\'compatible\') == -1) && (agt.indexOf(\'opera\') == -1) && (agt.indexOf(\'webtv\') == -1));
  var is_nav4up = (is_nav && (is_major >= 4));
  var is_ie = (agt.indexOf("msie") != -1);
  var is_ie3  = (is_ie && (is_major < 4));
  var is_ie4  = (is_ie && (is_major == 4) && (agt.indexOf("msie 5") == -1) && (agt.indexOf("msie 6") == -1));
  var is_ie4up = (is_ie && (is_major >= 4));
  var is_ie5up  = (is_ie  && !is_ie3 && !is_ie4);
  var is_mac = (agt.indexOf("mac") != -1);
  var is_gecko = (agt.indexOf("gecko") != -1);
  var view;

  function getItem (id) {
    if (is_ie4) {
      view = eval(id);
    }
    if (is_ie5up || is_gecko) {
      view = document.getElementById(id);
    }
    return view;
  }

  function shade(id) {
    if(is_ie4up || is_gecko) {

      var shaderDiv = getItem(\'shader\'+id);
      var shaderSpan = getItem(\'shaderspan\'+id);
      var shaderImg = getItem(\'shaderimg\'+id);
      var footerTitle = getItem(\'title\'+id);
      if(shaderDiv.style.display == \'block\') {
        states[id] = "closed";
        shaderDiv.style.display = \'none\';
        shaderSpan.innerHTML = \'<span class="shadersmall">'.$GLOBALS['I18N']->get('open').'&nbsp;</span><img src="images/shaderdown.gif" height="9" width="9" border="0">\';
        footerTitle.style.visibility = \'visible\';
        if (shaderImg)
          shaderImg.src = \'images/expand.gif\';
      } else {
        states[id] = "open";
        shaderDiv.style.display = \'block\';
        footerTitle.style.visibility = \'hidden\';
        shaderSpan.innerHTML = \'<span class="shadersmall">'.$GLOBALS['I18N']->get('close').'&nbsp;</span><img src="images/shaderup.gif" height="9" width="9" border="0">\';
        if (shaderImg)
          shaderImg.src = \'images/collapse.gif\';
      }
    }
    saveStates();
  }

  function getPref(number) {
    if (states[number] == "open") {
      return "block";
    } else if (states[number] == "closed") {
      return "none";
    }
    return "";
  }

  function start_div(number, default_status) {
    if (is_ie4up || is_gecko) {
      var pref = getPref(number);
      if (pref) {
        default_status = pref;
      }

      document.writeln("<div id=\'shader" + number + "\' name=\'shader" + number + "\' class=\'shader\' style=\'display: " + default_status + ";\'>");
    }
  }


  function end_div(number, default_status) {
    if (is_ie4up || is_gecko) {
      document.writeln("</div>");
    }
  }
  var title_text = "";
  var span_text = "";
  var title_class = "";

  function open_span(number, default_status) {
    if (is_ie4up || is_gecko) {
      var pref = getPref(number);
      if (pref) {
        default_status = pref;
      }
      if(default_status == \'block\') {
        span_text = \'<span class="shadersmall">'.$GLOBALS['I18N']->get('close').'&nbsp;</span><img src="images/shaderup.gif" height="9" width="9" border="0">\';
      } else {
        span_text = \'<span class="shadersmall">'.$GLOBALS['I18N']->get('open').'&nbsp;</span><img src="images/shaderdown.gif" height="9" width="9" border="0">\';
      }
      document.writeln("<a href=\'javascript: shade(" + number + ");\'><span id=\'shaderspan" + number + "\' class=\'shadersmalltext\'>" + span_text + "</span></a>");
    }
  }

  function title_span(number,default_status,title) {
    if (is_ie4up || is_gecko) {
      var pref = getPref(number);
      if (pref) {
        default_status = pref;
      }
      if(default_status == \'none\') {
        title_text = \'<img src="images/expand.gif" height="9" width="9" border="0">  \'+title;
        title_class = "shaderfootertextvisible";
      } else {
        title_text = \'<img src="images/collapse.gif" height="9" width="9" border="0">   \'+title;
        title_class = "shaderfootertexthidden";
      }
      document.writeln("<a href=\'javascript: shade(" + number + ");\'><span id=\'title" + number + "\' class=\'"+title_class+"\'>" + title_text + "</span></a>");
    }
  }
//-->
</script>
    ';
  }

  function header() {
    $html = sprintf('
<table width="98%%" align="center" cellpadding="0" cellspacing="0" border="0">');
    return $html;
  }

  function shadeIcon() {
    return sprintf('
<a href="javascript:shade(%d);" style="text-decoration:none;">&nbsp;<img id="shaderimg%d" src="images/collapse.gif" height="9" width="9" border="0">
    ',$this->num,$this->num);
  }

  function titleBar() {
    return sprintf('
  <tr>
      <td colspan="4" class="shaderheader">%s
          <span class="shaderheadertext">&nbsp;%s</span>
         </a>
    </td>
  </tr>',$this->shadeIcon(),$this->name);
  }

  function dividerRow() {
    return '
  <tr>
      <td colspan="4" class="shaderdivider"><img src="images/transparent.png" height="1" border="0" width="1"></td>
  </tr>
    ';
  }

  function footer() {
    $html = sprintf('

  <tr>
    <td class="shaderborder"><img src="images/transparent.png" height="1" border="0" width="1"></td>
    <td class="shaderfooter"><script language="javascript">title_span(%d,\'%s\',\'%s\');</script>&nbsp;</td>
    <td class="shaderfooterright"><script language="javascript">open_span(%d,\'%s\');</script>&nbsp;</td>
    <td class="shaderborder"><img src="images/transparent.png" height="1" border="0" width="1"></td>
  </tr>
'.$this->dividerRow().'
</table><br/><br/>
    ',$this->num,$this->display,addslashes($this->name),$this->num,$this->display);
    return $html;
  }

  function contentDiv() {
    $html = sprintf('
  <tr>
      <td class="shaderdivider"><img src="images/transparent.png" height="1" border="0" width="1"></td>
      <td colspan=2>
      <script language="javascript">start_div(%d,\'%s\')</script>',$this->num,$this->display);
    $html .= $this->content;

    $html .= '
    <script language="javascript">end_div();</script>
    </td>

    <td class="shaderdivider"><img src="images/transparent.png" height="1" border="0" width="1"></td>
  </tr>';
    return $html;
  }

  function shaderStart() {
    if (!isset($GLOBALS["shaderJSset"])) {
      $html = $this->shaderJavascript();
      $GLOBALS["shaderJSset"] = 1;
    } else {
      $html = "";
    }
    return $html;
  }

  function display() {
    $html = $this->shaderStart();
    $html .= $this->header();
    $html .= $this->titleBar();
    $html .= $this->dividerRow();
    $html .= $this->contentDiv();
    $html .= $this->footer();
    return $html;
  }

}

?>
