<?php
error_reporting(0);
session_start();
ob_start();
include("global_config.php");
if($_SESSION['Username'] == _USERNAME && $_SESSION['Password'] == _PASSWORD)
{
?>
<?php include("head.php"); ?>

<script type="text/javascript">
    function addTotal()
    {
        // Capture the entered values of two input boxes
        var unitPrice = document.getElementById('unitPrice').value;
        var Qty = document.getElementById('Qty').value;


        // Add them together and display
        var sum = parseFloat(unitPrice) * parseFloat(Qty) ;
        document.getElementById('totalAmt').value = sum;

    }
	function chkQty()
	{
		var chkQty = document.getElementById('rQty').value;
		var Qty = document.getElementById('Qty').value;

		if($Qty < $chkQty)
		{
			var QtyMsg = document.getElementById('Qty').value;
			document.getElementById('chQty').value = QtyMsg;

		}
	}
</script>
<style type='text/css'>
tr:nth-child(odd) {
    background: #F2F2F2;
}
td{
	padding:5px;
}
</style>
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

<?php include ("left_head.php"); ?>
   <?php include("top_nav.php"); ?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <?php include("side_panel_header.php"); ?>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <?php include("side_menu_list.php"); ?>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Account
        <small>Sales </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="controller.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Sales </a></li>
        <li class="active"></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Sales </h3>
            </div>

			<div class="login-box-body" style='width:100%;' >
<form action='sales.php' method='POST' name='form1'>
<?php

	echo "<table>";
	echo "<tr ><td style ='width:200px;font-weight:bold;'>Date *</td><td style='color:#036086;font-weight:bold;'>";
	echo '<input type="text" name="date" style ="width:100px;" id="datepicker" autocomplete="off" required>';
	echo "</td></tr>";
	echo "<tr><td style ='width:200px;font-weight:bold;'>Invoice No. *</td><td>";
	//echo '<input type="text" name="invNo" style ="width:100px;" required autocomplete="off">';
	
	
		$Que = "SELECT * from $snSales where id";
		$ta = mysqli_query($connection,$Que);
	
		while($ro = mysqli_fetch_object($ta))
		{
			
			//echo "Invoice No. : ";
			echo $ro->billno + 1;
			echo '<input type="hidden" name="invNo" style ="width:100px;" required autocomplete="off" value="'.$ro->billno.'">';
			
	
		}
	echo "</td></tr>";
		
	echo "<tr><td style ='width:200px;font-weight:bold;'>Customer Name</td><td>";
	echo '<input type="text" name="soldTo" style ="max-width:auto;" >';
	echo "</td></tr>";

?>
	<tr><td style ='width:200px;font-weight:bold;'>Item Code</td><td><select id="itemCode" name="itemCode" style ='width:100px;font-weight:bold;' >
	<option value="">--</option>
<?php
	//$connection = db_connect();
	$Query = "SELECT * FROM $snPurchase";
	$gData = mysqli_query($connection,$Query);
	
	while($r = mysqli_fetch_object($gData))
	{
		$sInvest[] = $r;
	}

	
	foreach ($sInvest as $ListData)
	{
	$ListD = $ListData->itemCode;
	echo "<option value=".$ListD.">".$ListD."</option>";

	
	}
?>

	</select>
	</td></tr>
	<tr><td style ='width:200px;font-weight:bold;'>Item Description</td><td><select id="itemDesc" name="itemDesc" style='width:500px; -webkit-appearance: none;-moz-appearance:none;border:none;background:none;'>
<?php
	foreach ($sInvest as $ListeData)
	{

	$ListD = $ListeData->itemCode;
	$ListDes = $ListeData->itemDesc;
	
	echo "<option value='".$ListDes."' class=".$ListD.">".$ListDes."</option>";
	
	
	}

	
?>
</select></td></tr>

<tr><td style ='width:200px;font-weight:bold;'>Available Qty</td><td><select id="remainQty" name="remainQty" style='width:50px; -webkit-appearance: none;-moz-appearance:none;border:none;'>
<?php
	foreach ($sInvest as $ListeData)
	{
	$ListD = $ListeData->itemCode;
	$remainQty = $ListeData->rQty;
	
	echo "<option value=".$remainQty." class=".$ListD.">".$remainQty."</option>";

	}

?>
</select></td></tr>

<select id="rCost" name="rCost" style='width:50px;display:none;'>
<?php
	foreach ($sInvest as $ListeData)
	{
	$ListD = $ListeData->itemCode;
	$rCost = $ListeData->cost;
	
	echo "<option value=".$rCost." class=".$ListD.">".$rCost."</option>";

	}

?>
</select>

<select id="rQty" name="rQty" style='width:50px;display:none;'>
<?php
	foreach ($sInvest as $ListeData)
	{
	$ListD = $ListeData->itemCode;
	$rQty = $ListeData->Qty;
	
	echo "<option value=".$rQty." class=".$ListD.">".$rQty."</option>";

	}

?>
</select>


<select id="rTotPrice" name="rTotPrice" style='width:100px;display:none;'>
<?php
	foreach ($sInvest as $ListeData)
	{
	$ListD = $ListeData->itemCode;
	$rTotPrice = $ListeData->totPrice;
	
	echo "<option value=".$rTotPrice." class=".$ListD.">".$rTotPrice."</option>";

	}

?>
</select>

<select id="remainTotPrice" name="remainTotPrice" style='width:100px;display:none;'>
<?php
	foreach ($sInvest as $ListeData)
	{
	$ListD = $ListeData->itemCode;
	$remainTotPrice = $ListeData->rtotPrice;
	
	echo "<option value=".$remainTotPrice." class=".$ListD.">".$remainTotPrice."</option>";

	}

?>
</select>

<select id="RandId" name="RandId" style='width:50px;display:none;'>
<?php
	foreach ($sInvest as $ListeData)
	{
	$ListD = $ListeData->itemCode;
	$RandId = $ListeData->randid;
	
	echo "<option value=".$RandId." class=".$ListD.">".$RandId."</option>";

	}

?>
</select>
<select id="uCost" name="uCost" style='width:50px;display:none;'>
<?php
	foreach ($sInvest as $ListeData)
	{
	$ListD = $ListeData->itemCode;
	$uCost = $ListeData->cost;
	
	echo "<option value=".$uCost." class=".$ListD.">".$uCost."</option>";

	}

?>
</select>

<?php

	echo "<tr><td style ='width:200px;font-weight:bold;'>Quantity *</td><td>";
?>
	<input type="text" name="Qty" id="Qty" style ="width:100px;" required> 
<?php

	//echo " <span style='font-weight:bold;color:#0550a5;'>Available Qty : " .$rQty . " </span></td></tr>";
	echo "<tr><td style ='width:200px;font-weight:bold;'>Unit Price *</td><td>";
?>

	<input type="text" name="unitPrice" id="unitPrice" style ="width:100px;"  onChange="addTotal();">

<?php
	echo "</td></tr>";
	echo "<tr><td style ='width:200px;font-weight:bold;color:#B40431;'>Total Sales Amount *</td><td>";
	echo '<input type="text" name="totalAmt" id="totalAmt" style ="width:100px;font-color:red;font-weight:bold;"  required>';
	echo "</td></tr>";
	echo "<tr><td style ='width:200px;font-weight:bold;'></td><td>";
?>
<input type="submit" name="save" value="SAVE" style ="width:100px;font-weight:bold;" class="btn bg-maroon margin" onClick="return confirm('Are you sure you want to Save?')" >
<?php
	echo "</td></tr>";
	echo "</table>";
?>
	</div>


</form>


<?php
	error_reporting(0);
	$snDate = $_POST['date'];
	$sninvNo = $_POST['invNo'];
	$snsoldTo = $_POST['soldTo'];
	$snitemCode = $_POST['itemCode'];
	$snitemDesc = trim($_POST['itemDesc']);
	$snQty = $_POST['Qty'];

	$snunitPrice = $_POST['unitPrice'];
	$snGsalesAmt = $_POST['unitPrice'] * $_POST['Qty'];
	$snRandid = time(). date("ymd");

	 $uRandID = $_POST['RandId'];

	 $rTotPrice = $_POST['rTotPrice'] ;
	 $sgCost = $_POST['Qty'] * $_POST['rCost']  ;
	 $sCost =  abs($_POST['totalAmt'] - $sgCost);
	 $TotVal = $rTotPrice - $rCost; 

	 $remainQty =  $_POST['remainQty'] - $_POST['Qty'];
		
	 $snProfit =  $_POST['unitPrice'] - $_POST['rCost'];

	 $uProfit = abs($sCost / $_POST['Qty']);
	 $uCost = $_POST['uCost'];


	
	if($_POST['save'] == "SAVE")
	{
				
		$QCheck = "SELECT * FROM $snSales";
		$SCheck = mysqli_query($connection,$QCheck);
		while($rowChk = mysqli_fetch_array($SCheck))
		{
			if($rowChk['invNo'] == $sninvNo)
			{
				echo " <div class='callout callout-danger'> 
						<p style='font-size:18px;font-weight:bold;color:white;'>Invoice No. already exists!.</p></div>";
				echo "<meta http-equiv='refresh' content='1'>";
				exit;
						
			}
		}
		$QueryS = "SELECT * FROM $snGrandSales WHERE stItemCode='$snitemCode'";
		$SData = mysqli_query($connection,$QueryS);
		while($row = mysqli_fetch_object($SData))
		{
			$SalesQty =$row->stQty;
			$SalesTotal = $row->stAmt;
		}
		
	
		
		$Qry = "SELECT * FROM $snPurchase WHERE itemCode='$snitemCode'";
		$SDat = mysqli_query($connection,$Qry);
		while($r = mysqli_fetch_object($SDat))
		{
			$UnitCost = $r->cost;
		}

		$NewSalesQty = $SalesQty + $_POST['Qty'];

		$NewSalesAmt = $SalesTotal + $snGsalesAmt;

		$NewAmt = abs($UnitCost * $NewSalesQty);
		$ProfitCalc =  abs($NewSalesAmt - $NewAmt);

		$chkQty = "SELECT * FROM $snPurchase where itemCode = '".$_POST['itemCode']."'";
		$chkQry = mysqli_query($connection,$chkQty);
		while($ro = mysqli_fetch_object($chkQry))
		{
		
			if($ro->rQty < $_POST['Qty'])
			{
				echo " <div class='callout callout-danger'> 
				<p style='font-size:18px;font-weight:bold;color:white;'>No Sufficient Quantity!.</p></div>";
				echo "<meta http-equiv='refresh' content='1'>";
				break;
			}
			
			else
			{
			
				$newTotal = $_POST['rCost'] * $_POST['Qty'];
				$InsTotal = $ro->rtotPrice - $newTotal;

				$SrQry = "UPDATE $snGrandSales SET stQty='$NewSalesQty',stAmt='$NewSalesAmt',stProfit='$ProfitCalc' WHERE stItemCode='$snitemCode'";
									
				$Query = "INSERT INTO $snSales (date,invNo,soldTo,itemCode,itemDesc,Qty,unitPrice,GsalesAmt,sProfit,randid) VALUES ('$snDate','$sninvNo','$snsoldTo','$snitemCode','$snitemDesc','$snQty','$snunitPrice','$snGsalesAmt','0','$snRandid')";
					
				$uQuery = "UPDATE $snPurchase SET rQty='$remainQty',rtotPrice='$InsTotal' WHERE itemCode ='$snitemCode'";

				$GetData = mysqli_query($connection,$Query);
				$uGetData = mysqli_query($connection,$uQuery); 
				$uGetQry = mysqli_query($connection,$SrQry); 

				if($GetData && $uGetData && $uGetQry)
				{
					echo " <div class='callout callout-info'> 
					<p style='font-size:18px;font-weight:bold;color:white;'>Saved.</p></div>";
					echo "<meta http-equiv='refresh' content='1'>";
					
				}
				else
				{
					echo " <div class='callout callout-danger'>
						<p style='font-size:18px;font-weight:bold;color:white;'>Error. Please try again!</p></div>";
					echo "<meta http-equiv='refresh' content='1'>";
					
				}
			}
		}
	}



?>

	 
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <?php include("footer.php"); ?>
  </footer>

  <!-- Control Sidebar -->
 <?php //include("aside_menu.php"); ?>

  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<?php include("js_footer.php"); ?>
</body>
</html>
<?php

}
else
{
	
	header("../../index.php");
}
?>


  <script src="jquery.chained.js?v=1.0.0" type="text/javascript" charset="utf-8"></script>
  <script src="jquery.chained.remote.js?v=1.0.0" type="text/javascript" charset="utf-8"></script>
  <script type="text/javascript" charset="utf-8">
  $(function() {

    /* For jquery.chained.js */
    $("#itemDesc").chained("#itemCode");
  	$("#remainQty").chained("#itemCode");
	$("#rCost").chained("#itemCode");
	$("#rTotPrice").chained("#itemCode");
	$("#RandId").chained("#itemCode");
	$("#uCost").chained("#itemCode");
  	$("#rQty").chained("#itemCode");
	$("#remainTotPrice").chained("#itemCode");

  });
  </script>
