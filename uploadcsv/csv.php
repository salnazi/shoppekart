<?php

include ("config.php");

$hotelfield = "Code,SupplierCode,SpHotelCode,SpCountryCode,SpCityCode,SpHotelName,SpAddres,SpCountryName,SpCityName,SpState,SpTel,SpWebsite,UserCreate,ActiveFlag,Latitude,Longtitude,ZipCode,RoomNbr,HotelRemark,ShortInfo,Rating,Picture,UPDCode,CreateDt,Description,SpCompanyRegId,SpTaxId,SpIATAId";

//Open the file.
$fileHandle = fopen("HotelData.csv", "r");

//count rows
$fp = file('HotelDataRTS.csv');
$fcount = count($fp);
$Code = "";
$SupplierCode = "MA09100052";
$todaydate = date("Y-m-d");
$CreateDt = date("Y-m-d", strtotime($todaydate));

	while (($f = fgetcsv($fileHandle, 0, ",")) !== FALSE) 
			{

	$ChkDup = mysql_query("SELECT * FROM CL920_temphotels WHERE SpHotelCode='$f[2]'");
	$num_rows = mysql_num_rows($ChkDup);
	if ($num_rows > 0) 
	{
		echo "<br> ( " . $i . " )" . $SpHotelCode . '<span style="color:red">: - is already in our database. Skipped.....!</span>'."<br>";
	}
	else
	{
		
	$StrSql = "INSERT INTO CL920_temphotels WHERE ($hotelfield) VALUES ('$Code','$SupplierCode','$f[2]','$f[3]','$f[4]','$f[5]','$f[6]','$f[7]','$f[8]','$f[9]','$f[10]','$f[11]','SYSTEM','Y','$f[14]','$f[15]','$f[16]','$f[17]','$f[18]','$f[19]','$f[20]','$f[21]','$f[22]','CreateDt','$f[24]','$f[25]','$f[26]','$f[27]')";
	$Query = mysql_query ($StrSql);
	
	echo "<br><span style='color:green'> Hotel Code : ". $f[2] . " - Hotel Name : " . $f[5] . " added to the database. Success.....!</span> " . "<br>";

	}



			}

?>		
		

