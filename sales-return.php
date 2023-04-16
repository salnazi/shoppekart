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
        <small>Sales Return</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="controller.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Sales Return </a></li>
        <li class="active"></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Sales Return</h3>
            </div>

			<div class="login-box-body" style='width:100%;' >
<form action='sales-return.php' method='POST' name='form1'>
<?php

	echo "<table>";


	//$connection = db_connect();
	$Query = "SELECT * FROM $snSales";
	$gData = mysqli_query($connection,$Query);
	while($r = mysqli_fetch_object($gData))
	{
		$sInvest[] = $r;
	}
?>
<tr><td style ='width:200px;font-weight:bold;'>Invoice No.</td><td><select id="invNo" name="invNo" style ='width:100px;font-weight:bold;'>
	<option value="">--</option>
<?php
	foreach ($sInvest as $ListData)
	{
	$invNo = $ListData->invNo;
	if($ListData->randid != "0")
	echo "<option value=".$invNo.">".$invNo."</option>";

	}
	

		echo "<tr ><td style ='width:200px;font-weight:bold;'>Returned Date *</td><td style='color:#036086;font-weight:bold;'>";
	echo '<input type="text" name="date" style ="width:100px;" id="datepicker" required>';
	echo "</td></tr>";
?>
</select>
	</td></tr>


<tr><td style ='width:200px;font-weight:bold;'>Returned From</td><td><select id="soldTo" name="soldTo" style ='width:100px;font-weight:bold;-webkit-appearance: none;-moz-appearance:none;border:none;background:none;'>

<?php
	foreach ($sInvest as $ListData)
	{
	$invNo = $ListData->invNo;
	$soldTo = $ListData->soldTo;
	echo "<option value=".$soldTo." class=".$invNo.">".$soldTo."</option>";
	}
	
?>
</select>
	</td></tr>
	<tr><td style ='width:200px;font-weight:bold;'>Item Code</td><td><select id="itemCode" name="itemCode" style ='width:100px;font-weight:bold;-webkit-appearance: none;-moz-appearance:none;border:none;background:none;'>

<?php
	

	foreach ($sInvest as $ListData)
	{
	$invNo = $ListData->invNo;
	$ListD = $ListData->itemCode;
	
	echo "<option value=".$ListD." class=".$invNo.">".$ListD."</option>";

	
	}
?>

	</select>
	</td></tr>
	<tr><td style ='width:200px;font-weight:bold;'>Item Description</td><td><select id="itemDesc" name="itemDesc" style='width:500px; -webkit-appearance: none;-moz-appearance:none;border:none;background:none;'>
<?php
	foreach ($sInvest as $ListeData)
	{

	$invNo = $ListeData->invNo;
	$ListDes = $ListeData->itemDesc;
	
	echo "<option value=".$ListDes." class=".$invNo.">".$ListDes."</option>";
	
	
	}

	
?>
</select></td></tr>

<tr><td style ='width:200px;font-weight:bold;'>Sold Qty</td><td><select id="rQty" name="rQty" style='width:50px; -webkit-appearance: none;-moz-appearance:none;border:none;'>
<?php
	foreach ($sInvest as $ListeData)
	{
	$invNo = $ListeData->invNo;
	$oQty = $ListeData->Qty;
	
	echo "<option value=".$oQty." class=".$invNo.">".$oQty."</option>";

	}

?>
</select></td></tr>



<?php

	echo "<tr><td style ='width:200px;font-weight:bold;' >Returned Qty *</td><td>";
?>
	<input type="text" name="Qty" id="Qty" style ="width:100px;" onKeyup="addTotal();" required autocomplete="off"> 
<?php

	//echo " <span style='font-weight:bold;color:#0550a5;'>Available Qty : " .$rQty . " </span></td></tr>";
	//echo "<tr><td style ='width:200px;font-weight:bold;'>Sold Unit Price *</td><td>";
?>

<tr><td >Sold Unit Price</td><td><select id="unitPrice" name="unitPrice" style='width:150px; -webkit-appearance: none;-moz-appearance:none;border:none;' >
<?php
	foreach ($sInvest as $ListeData)
	{
	$invNo = $ListeData->invNo;
	$unitPrice = $ListeData->unitPrice;
	
	echo "<option value=".$unitPrice." class=".$invNo.">".number_format(abs($unitPrice),2)."</option>";

	}

?>
</select>
</td></tr>


<?php
	echo "</td></tr>";
	echo "<tr><td style ='width:200px;font-weight:bold;color:#B40431;'>Amount Returned *</td><td>";
	echo '<input type="text" name="totalAmt" id="totalAmt" style =" -webkit-appearance: none;-moz-appearance:none;border:none;width:100px;font-color:red;font-weight:bold;background:none;"  >';
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



	
	if($_POST['save'] == "SAVE")
	{
		
			$QueryS = "SELECT * FROM $snGrandSales WHERE stItemCode='$snitemCode'";
			$SData = mysqli_query($connection,$QueryS);
			while($row = mysqli_fetch_object($SData))
			{
				$SalesTotal = $row->stAmt;
				$SalesQty = $row->stQty;
			}
			
			$Query = "SELECT * FROM $snSales WHERE invNo='$sninvNo'";
			$Data = mysqli_query($connection,$Query);
			while($r = mysqli_fetch_object($Data))
			{
				$SQty = $r->Qty - $_POST['Qty'];
				$STotal = $r->GsalesAmt - $snGsalesAmt;
			}

			
			$Qry = "SELECT * FROM $snPurchase WHERE itemCode='$snitemCode'";
			$SDat = mysqli_query($connection,$Qry);
			while($r = mysqli_fetch_object($SDat))
			{
				$UnitCost = $r->cost;
			}

			
			

			$NewSalesQty = $SalesQty - $_POST['Qty'];
			$NewSalesAmt = $SalesTotal - $snGsalesAmt;
			
			$NewAmt = abs($UnitCost * $NewSalesQty);
			$ProfitCalc =  abs($NewSalesAmt - $NewAmt);

			if($_POST['rQty'] < $_POST['Qty'])
			{
				echo " <div class='callout callout-danger'><p style='font-size:18px;font-weight:bold;color:white;'>Please check your returned Qty</p></div>";
				echo "<meta http-equiv='refresh' content='1'>";
							
			}
			else
			{
				$Query = "UPDATE $snSales SET Qty='$SQty',GsalesAmt='$STotal' WHERE invNo ='".$sninvNo."'";

				$QueryR = "UPDATE $snGrandSales SET stQty='$NewSalesQty',stAmt='$NewSalesAmt',stProfit='$ProfitCalc' WHERE stItemCode='$snitemCode'";

				$QueryS = "INSERT INTO $snSalesReturn (date,invNo,returnFrom,itemCode,itemDesc,Qty,totPrice,randid) VALUES ('$snDate','$sninvNo','$snsoldTo','$snitemCode','$snitemDesc','$snQty','$snGsalesAmt','$snRandid')";

				$uGetData = mysqli_query($connection,$Query); 
				$uGetDataS = mysqli_query($connection,$QueryS); 
				$uGetDataR = mysqli_query($connection,$QueryR); 

				if($uGetData && $uGetDataS && $uGetDataR)
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


				$chkQty = "SELECT * FROM $snPurchase where itemCode = '".$_POST['itemCode']."'";
				$chkQry = mysqli_query($connection,$chkQty);
				while($ro = mysqli_fetch_object($chkQry))
				{
					$remainQty = $ro->rQty + $_POST['Qty'];
					$newTotal = $ro->cost * $remainQty;
					$InsTotal = $newTotal;

					$uQuery = "UPDATE $snPurchase SET rQty='$remainQty',rtotPrice='$InsTotal' WHERE itemCode ='".$snitemCode."'";

					$GetData = mysqli_query($connection,$uQuery); 

								
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
	$("#itemCode").chained("#invNo");
    $("#itemDesc").chained("#invNo");
  	$("#rQty").chained("#invNo");
	$("#Qty").chained("#invNo");
	$("#rCost").chained("#invNo");
	$("#rTotPrice").chained("#invNo");
	$("#RandId").chained("#invNo");
$("#invNo").chained("#invNo");
$("#soldTo").chained("#invNo");
$("#uProfit").chained("#invNo");
$("#uCost").chained("#invNo");
$("#unitPrice").chained("#invNo");
$("#GsalesAmt").chained("#invNo");
$("#sProfit").chained("#invNo");
  });
  </script>