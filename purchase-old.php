<?php
error_reporting(0);
session_start();
ob_start();
include("global_config.php");
if($_SESSION['Username'] == _USERNAME && $_SESSION['Password'] == _PASSWORD)
{
?>
<?php include("head.php"); ?>
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
        <small>Purchase </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="controller.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Purchase </a></li>
        <li class="active"></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Purchase </h3>
            </div>

			<div class="login-box-body" style='width:100%;' >
			<form action='purchase.php' method='POST'>
<?php
		
		echo "<table>";
		
				echo "<tr ><td style ='width:200px;font-weight:bold;'>Date</td><td style='color:#036086;font-weight:bold;'>";
echo '<input type="text" name="date" style ="width:100px;">';
				echo "</td></tr>";
				echo "<tr><td style ='width:200px;font-weight:bold;'>Invoice No.</td><td>";
echo '<input type="text" name="invNo" style ="width:100px;">';
				echo "</td></tr>";
				echo "<tr><td style ='width:200px;font-weight:bold;'>Purchased From</td><td>";
echo '<input type="text" name="purFrom" style ="width:500px;">';
				echo "</td></tr>";
				echo "<tr><td style ='width:200px;font-weight:bold;'>Item Code *</td><td>";
echo '<input type="text" name="itemCode" style ="width:100px;">';
				echo "</td></tr>";
				echo "<tr><td style ='width:200px;font-weight:bold;'>Item Description</td><td>";
echo '<input type="text" name="itemDesc" style ="width:500px;">';
				echo "</td></tr>";
				echo "<tr><td style ='width:200px;font-weight:bold;'>Quantity *</td><td>";
echo '<input type="text" name="Qty" style ="width:100px;">';
				echo "</td></tr>";
				echo "<tr><td style ='width:200px;font-weight:bold;'>Total Price</td><td>";
echo '<input type="text" name="totPrice" style ="width:100px;">';
				echo "</td></tr>";
				echo "<tr><td style ='width:200px;font-weight:bold;'>Transport Charges</td><td>";
echo '<input type="text" name="transCharges" style ="width:100px;">';
				echo "</td></tr>";
		echo "<tr><td style ='width:200px;font-weight:bold;'></td><td>";
echo '<input type="submit" name="save" value="SAVE" style ="width:100px;font-weight:bold;" class="btn btn-primary btn-block btn-flat">';
				echo "</td></tr>";
		echo "</table>";
?>
  </div>
</form>

<?php
	error_reporting(0);
	$connection = db_connect();	
	$snDate = $_POST['date'];
	$sninvNo = $_POST['invNo'];
	$snpurFrom = $_POST['purFrom'];
	$snitemCode = $_POST['itemCode'];
	$snitemDesc = $_POST['itemDesc'];
	$snQty = $_POST['Qty'];
	$sntotPrice = $_POST['totPrice']; 
	$sntransCharges = $_POST['transCharges'];
	$tPrice = $_POST['totPrice'] + $_POST['transCharges'] ;
	$snCost = $tPrice / $snQty;
	$snTotalAmt = $_POST['totPrice'] + $_POST['transCharges'];
	$snRandid = time(). date("ymd");

	if($_POST['save'] == "SAVE")
	{
		
		if(!empty($_POST['itemCode']) && !empty($_POST['Qty']))
		{
			//update purchase
			$sQuery =  "SELECT * FROM $snPurchase WHERE itemCode='$snitemCode'";
			$rCon = mysqli_query($connection, $sQuery);
			$val = mysqli_num_rows($rCon);
			if($val > 0)
			{
				while($CheckQ = mysqli_fetch_object($rCon))
				{
					$rPrice = $CheckQ->totPrice + $_POST['totPrice'];
					$rQty = $CheckQ->Qty + $_POST['Qty'];
					$rTranCharges =  $_POST['transCharges'];
					$gTotalAmt =$CheckQ->gTotalAmt + $_POST['totPrice'] + $_POST['transCharges'];
					$rCost =  $CheckQ->gTotalAmt + $_POST['transCharges'] + $_POST['totPrice'] ;
					$newQty = $_POST['Qty'] + $CheckQ->Qty;
					$nCost = $rCost / $newQty;
				}
				$upQry = "UPDATE $snPurchase SET date='$snDate', Qty='$rQty', totPrice='$rPrice', invNo='$sninvNo',purFrom='$snpurFrom',itemDesc='$snitemDesc',transCharges='$rTranCharges',gTotalAmt='$gTotalAmt',cost='$nCost' WHERE itemCode='$snitemCode'";
				$runQry = mysqli_query($connection, $upQry);
				if($runQry)
				{
					echo "  <div class='callout callout-info'>
							<p style='font-size:18px;font-weight:bold;color:black;'>Updated.</p></div>";
					
				}
				// update stock
				$sqQuery =  "SELECT * FROM $snStock WHERE itemCode='$snitemCode'";
				$rqCon = mysqli_query($connection, $sqQuery);
							
				while($Check = mysqli_fetch_object($rqCon))
				{
					$qrPrice = $Check->totPrice + $_POST['totPrice'];
					$qrQty = $Check->Qty + $_POST['Qty'];
					$qrTranCharges = $_POST['transCharges'];
					$qrCost =  $qrTranCharges + $qrPrice ;
					$qnewQty = $_POST['Qty'] + $Check->Qty;
					$qnCost = $qrCost / $qnewQty;
				}
		
				$upQry1 = "UPDATE $snStock SET date='$snDate', Qty='$qrQty', totPrice='$qrPrice', invNo='$sninvNo',purFrom='$snpurFrom',itemDesc='$snitemDesc',cost='$qnCost',transCharges='$qrTranCharges' WHERE itemCode='$snitemCode'";

				$runQry1 = mysqli_query($connection, $upQry1);
				
			}
			else
			{
				$Query = "INSERT INTO $snPurchase (date,invNo,purFrom,itemCode,itemDesc,Qty,totPrice,transCharges,gTotalAmt,cost,randid) VALUES ('$snDate','$sninvNo','$snpurFrom','$snitemCode','$snitemDesc','$snQty','$sntotPrice','$sntransCharges','$snTotalAmt','$snCost','$snRandid')";
				$Query1 = "INSERT INTO $snStock (date,invNo,purFrom,itemCode,itemDesc,Qty,totPrice,cost,transCharges,randid) VALUES ('$snDate','$sninvNo','$snpurFrom','$snitemCode','$snitemDesc','$snQty','$sntotPrice','$snCost','$sntransCharges','$snRandid')";

				$GetData = mysqli_query($connection,$Query);
				$GetData1 = mysqli_query($connection,$Query1);
				
				if($GetData)
				{
					echo "  <div class='callout callout-info'>
					<p style='font-size:18px;font-weight:bold;color:black;'>Saved.</p></div>";
				}
				
				else
				{
					echo " <div class='callout callout-danger'>
						<p style='font-size:18px;font-weight:bold;color:white;'>Error. Please try again!</p></div>";
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