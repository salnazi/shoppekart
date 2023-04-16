<?php

include ("config.php");

	//	$hotelfield = "SupplierCode,SpHotelCode,SpCountryCode,SpCityCode,SpHotelName,SpAddress,SpCountryName,SpCityName,SpState,SpTel,SpWebsite,UserCreate,ActiveFlag,Latitude,Longtitude,Zipcode,RoomNbr,HotelRemark,ShortInfo, Rating,Picture,UPDCode,CreateDt,Description,SpCompanyRegId,SpTaxId,SpIATAId";
	//$roomcatgs = "Code,SupplierCode,SpCode,SPLongName,UserCreate,ActiveFlag,NameRequired,MaxPax,MaxAdults,MinAdults,MaxChild,BedNbr,CotNbr";
	$roomcatgs = "SupplierCode,SpCode,SpLongName,MealTypeCode,IncBFAdult,IncBFChild,CreateDt,UserCreate,UBranchCode,LastUpdate,UserUpdate";

	//Open the file.
	$fileHandle = fopen("mealtypevanilla.csv", "r");

	//count rows
	$fp = file('mealtypevanilla.csv');
	$fcount = count($fp);
	$Code = "";
	$SupplierCode = "MA1608000001";
	$todaydate = date("Y-m-d");
	$CreateDt = date("Y-m-d", strtotime($todaydate));

	while (($f = fgetcsv($fileHandle, 0, ",")) !== FALSE) 
			{

	$ChkDup = mysql_query("SELECT * FROM CL970_tempmealtypes WHERE SpLongName='$f[2]'");
	$num_rows = mysql_num_rows($ChkDup);
	if ($num_rows > 0) 
	{
		echo "<br> ( " . $i . " )" . $SpHotelCode . '<span style="color:red">: - is already in our database. Skipped.....!</span>'."<br>";
	}
	else
	{
		
		//$StrSql = "INSERT INTO CL920_temphotels ($hotelfield) VALUES ('$SupplierCode','$f[2]','$f[3]','$f[4]','$f[5]','$f[6]','$f[7]','$f[8]','$f[9]','$f[10]','$f[11]','SYSTEM','Y','$f[14]','$f[15]','$f[16]','$f[17]','$f[18]','$f[19]','$f[20]','$f[21]','$f[22]','$CreateDt','$f[24]','$f[25]','$f[26]','$f[27]')";
		$StrSql = "INSERT INTO CL970_tempmealtypes ($roomcatgs) VALUES ('$f[0]','$SupplierCode','$f[2]','$f[3]','$f[4]','$f[5]','$CreateDt','$f[7]','$f[8]','$CreateDt','$f[10]')";
		
		echo "<br>";
		$Query = mysql_query($StrSql);
		if($Query)
		echo "<br><span style='color:green'> Hotel Code : ". $f[2] . " - City/Country : " . $f[8] . " - " . $f[7] . " --- added to the database. Success.....!</span> " . "<br>";

	}



			}

?>		
		

