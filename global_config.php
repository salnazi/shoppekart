<?php
error_reporting(0);
session_start();
ob_start();

define ("_USERNAME" , $_SESSION['Username']);
define("_PASSWORD" , $_SESSION['Password']);
define("_ACCESS" , $_SESSION['Access']);
define("_BASE_PATH", "https://localhost/GreenKart");
define("_DIR", "");
define ("_SKIN", "skin-blue");
include("autoload.php");
include("config.php");

if($_SESSION['Username'] == "")
{
	header("index.php");
	session_destroy();
}
ob_end_flush();
?>