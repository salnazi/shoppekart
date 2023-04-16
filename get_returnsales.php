 <?php  
//	error_reporting(0);
    include("autoload.php");
    $connection = db_connect();
	foreach($_GET as $item)
	{
		echo $chkItemInv = strtoupper($item);
	}
		 
	//database query
	$sql = mysqli_query($connection,"select * from $snSales WHERE invNo='$chkItemInv' ");
	  
	$rows = array();
	while($r = mysqli_fetch_object($sql)) 
	{
	
	  echo $r->randid;
	}
	  


 ?>  