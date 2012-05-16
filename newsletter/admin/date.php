<?php
require_once dirname(__FILE__).'/accesscheck.php';


if (!defined("IN_WEBBLER")) {
  class date {
    var $type = "date";
    var $name = "";
    var $description = "Date";
    var $days = array();
    var $months = array();
    var $useTime = false;

    function date($name = "") {
      $this->days = array(
        $GLOBALS['I18N']->get("Sunday"),
        $GLOBALS['I18N']->get("Monday"),
        $GLOBALS['I18N']->get("Tuesday"),
        $GLOBALS['I18N']->get("Wednesday"),
        $GLOBALS['I18N']->get("Thursday"),
        $GLOBALS['I18N']->get("Friday"),
        $GLOBALS['I18N']->get("Saturday")
      );
      $this->months = array(
        "01" => $GLOBALS['I18N']->get("January"),
        "02" => $GLOBALS['I18N']->get("February"),
        "03" => $GLOBALS['I18N']->get("March"),
        "04" => $GLOBALS['I18N']->get("April"),
        "05" => $GLOBALS['I18N']->get("May"),
        "06" => $GLOBALS['I18N']->get("June"),
        "07" => $GLOBALS['I18N']->get("July"),
        "08" => $GLOBALS['I18N']->get("August"),
        "09" => $GLOBALS['I18N']->get("September"),
        "10" => $GLOBALS['I18N']->get("October"),
        "11" => $GLOBALS['I18N']->get("November"),
        "12" => $GLOBALS['I18N']->get("December")
      );
      $this->name = $name;
      $this->getDate();
      $this->getTime();
    }

    function setTime($time) {
      list($hr,$min,$sec) = explode(":",$time);
      if (!isset($_REQUEST['hour']) || !is_array($_REQUEST["hour"])) {
        $_REQUEST["hour"] = array();
      }
      if (!isset($_REQUEST['minute']) || !is_array($_REQUEST["minute"])) {
        $_REQUEST["minute"] = array();
      }
      $_REQUEST["hour"][$this->name] = $hr;
      $_REQUEST["minute"][$this->name] = $min;
    }

    function setDateTime($datetime) {
      #0000-00-00 00:00:00
      list($date,$time) = explode(" ",$datetime);
      $this->setDate($date);
      $this->setTime($time);
    }

    function setDate($date) {
      list($year,$month,$day) = explode("-",$date);
      if (!isset($_REQUEST['year']) || !is_array($_REQUEST["year"])) {
        $_REQUEST["year"] = array();
      }
      if (!isset($_REQUEST['month']) || !is_array($_REQUEST["month"])) {
        $_REQUEST["month"] = array();
      }
      if (!isset($_REQUEST['day']) || !is_array($_REQUEST["day"])) {
        $_REQUEST["day"] = array();
      }
      $_REQUEST["year"][$this->name] = $year;
      $_REQUEST["month"][$this->name] = $month;
      $_REQUEST["day"][$this->name] = $day;
    }

    function getDate($value = "") {
      if (!$value)
        $value = $this->name;
      if (!$value)
        return date("Y-m-d");
      if (isset($_REQUEST["year"]) && is_array($_REQUEST["year"]) && isset($_REQUEST["month"]) && isset($_REQUEST["day"])) {
        return sprintf("%04d-%02d-%02d",$_REQUEST["year"][$value],$_REQUEST["month"][$value],$_REQUEST["day"][$value]);
      } else {
        return date("Y-m-d");
      }
    }

    function getTime($value = "") {
      if (!$value)
        $value = $this->name;
      if (isset($_REQUEST["hour"]) && isset($_REQUEST["minute"])) {
        return sprintf("%02d:%02d",$_REQUEST["hour"][$value],$_REQUEST["minute"][$value]);
      } else {
        return date("H:i");
      }
    }

    function showInput($name,$fielddata,$value,$document_id = 0) {
      if (!$name)
        $name = $this->name;
  #    dbg("$name $fielddata $value $document_id");
      $year = substr($value,0,4);
      $month = substr($value,5,2);
      $day = substr($value,8,2);
      $hour = substr($value,11,2);
      $minute = substr($value,14,2);

      if (!$day && !$month && !$year) {
        $now = getdate(time());
        $day = $now["mday"];
        $month = $now["mon"];
        $year = $now["year"];
      }
      $html = sprintf('<input type=hidden name="%s" value="1">',$name);

      $html .= "<!-- $day / $month / $year -->".'<select name="day['.$name.']">';
      for ($i=1;$i<32;$i++) {
        $sel = "";
        if ($i == $day)
          $sel = "selected";
        $html .= sprintf('<option value="%d" %s>%s',$i,$sel,$i);
      }
      $html .= '</select><select name="month['.$name.']">';
      reset($this->months);
      while (list($key,$val) = each ($this->months)) {
        $sel = "";
        if ($key == $month)
          $sel = "selected";
        $html .= sprintf('<option value="%s" %s>%s',$key,$sel,$val);
      }
      if (DATE_START_YEAR) {
        $start = DATE_START_YEAR;
      } else {
        $start = $year - 3;
      }
      if (DATE_END_YEAR) {
        $end = DATE_END_YEAR;
      } else {
        $end = $year + 10;
      }

      $html .= '</select><select name="year['.$name.']">';
      for ($i=$start;$i<=$end;$i++) {
        $html .= "<option ";
        if ($i == $year)
          $html .= "selected";
        $html .= ">$i";
      }
      $html .= "</select>";
      if ($this->useTime) {
        $html .= '<select name="hour['.$name.']">';
        for ($i=0;$i<=23;$i++) {
          $sel = "";
          if ($i == $hour)
            $sel = "selected";
          $html .= sprintf('<option value="%d" %s>%02d',$i,$sel,$i);
        }
        $html .= '</select>';
        $html .= '<select name="minute['.$name.']">';
        for ($i=0;$i<=59;$i+=15) {
          $sel = "";
          if ($i == $minute)
            $sel = "selected";
          $html .= sprintf('<option value="%d" %s>%02d',$i,$sel,$i);
        }
        $html .= '</select>';
      }
      return $html;
    }

    function display($parent,$data,$leaf,$branch) {
      global $config;
      return formatDate($data);
    }

    function store($itemid,$fielddata,$value,$table) {
      Sql_query(sprintf('replace into %s values("%s",%d,"%s")',$table,$fielddata["name"],$itemid,$this->getDate($value)));
    }
  }
}
?>
