 <?php  
//	error_reporting(0);
    include("autoload.php");
    $connection = db_connect();
	foreach($_GET as $item)
	{
		$chkItem = strtoupper($item);
	}
		 
	//database query
	$sql = mysqli_query($connection,"select itemCode,itemDesc from $snPurchase WHERE itemCode='$chkItem' ");
	  
	$rows = array();
	while($r = mysqli_fetch_object($sql)) 
	{
	  
	  echo $r->itemDesc;
	}
	  


 ?>  