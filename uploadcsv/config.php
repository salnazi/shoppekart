<?php
//test site
$_Host="192.168.0.12";
$_Username="root";
$_Password="Sys0ne0ne";
$_DataBaseName="infodb";

// real site
/*
$_Host = "174.37.138.245";
$_Host = "xmlconnect.21gateway.com";
$_Username = "gatewa21_dbu";
$_Password = "mtyFV9b3zcKr";
$_DataBaseName = "gatewa21_db";
*/
$_Conn = mysql_connect($_Host, $_Username, $_Password) or die("Can't Connect Database");
$_SelectDB = mysql_select_db($_DataBaseName) or die("Can't Select Database");

$q = mysql_query("SET names utf8 collate utf8_general_ci");
$q = mysql_query("SET character_set_client = utf8");
$q = mysql_query("SET character_set_results = utf8");
$q = mysql_query("SET character_set_connection = utf8");
$q = mysql_query("SET character_set_server = utf8");
$q = mysql_query("SET CHARACTER SET 'utf8'");
// Stop Connect Database ###################################

define("_S_CL948", "MA13070791");
define("_S_CL950", "MA14065694");

function CheckSQL($pData)
{
	$strResult = $pData;
	$strResult = str_replace("\\", "\\\\", $strResult);
	$strResult = str_replace("'", "\'", $strResult);
	$strResult = str_replace("\"", "\\\"", $strResult);
	$strResult = str_replace(chr(146), "\'", $strResult);
	return ($strResult);
}

?>