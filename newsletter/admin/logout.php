<?php
require_once dirname(__FILE__).'/accesscheck.php';

$_SESSION["adminloggedin"] = "";
$_SESSION["logindetails"] = "";
session_destroy();
?>

