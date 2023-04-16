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
		
				echo "<tr ><td style ='width:200px;font-weight:bold;'>Date *</td><td style='color:#036086;font-weight:bold;'>";
echo '<input type="text" name="date" style ="width:100px;" id="datepicker" required autocomplete="off">';
				echo "</td></tr>";
				echo "<tr><td style ='width:200px;font-weight:bold;'>Invoice No.</td><td>";
echo '<input type="text" name="invNo" style ="width:100px;" required>';
				echo "</td></tr>";
				echo "<tr><td style ='width:200px;font-weight:bold;'>Supplier Name</td><td>";
echo '<input type="text" name="purFrom" style ="max-width:auto;" >';
				echo "</td></tr>";
				echo "<tr><td style ='width:200px;font-weight:bold;'>Item Code *</td><td>";
echo '<input type="text" name="itemCode" style ="width:100px;" onchange="showUser(this.value)" required>';
				echo "</td></tr>";
				echo "<tr><td style ='width:200px;font-weight:bold;' >Item Description *</td><td>";
echo '<input type="text" name="itemDesc" style ="max-width:auto;" id="itemDesc" required>';
				echo "</td></tr>";
				echo "<tr><td style ='width:200px;font-weight:bold;'>Quantity *</td><td>";
echo '<input type="text" name="Qty" style ="width:100px;" required autocomplete="off">';
				echo "</td></tr>";
				echo "<tr><td style ='width:200px;font-weight:bold;color:#B40431;'>Total Purchase</td><td>";
echo '<input type="text" name="totPrice" style ="width:100px;" required>';
				echo "</td></tr>";
			echo "<tr><td style ='width:200px;font-weight:bold;'></td><td>";
?>
<input type="submit" name="save" id="submit" value="SAVE" style ="width:100px;font-weight:bold;" class="btn bg-maroon margin" onClick="return confirm('Are you sure you want to Save?')" >
<?php
				echo "</td></tr>";
		echo "</table>";
?>
  </div>
</form>

<?php
	error_reporting(0);
	//$connection = db_connect();	
	$snDate = $_POST['date'];
	$sninvNo = $_POST['invNo'];
	$snpurFrom = $_POST['purFrom'];
	$snitemCode = strtoupper($_POST['itemCode']);
	$snitemDesc = trim($_POST['itemDesc']);
	$snQty = $_POST['Qty'];
	$sntotPrice = $_POST['totPrice']; 
	$snCost = $sntotPrice / $snQty;
	$snRandid = time(). date("ymd");

	if($_POST['save'] == "SAVE")
	{
		
		if(!empty($_POST['itemCode']) && !empty($_POST['Qty']) && !empty($_POST['date']) && !empty($_POST['itemDesc']))
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
					$nCost = $rPrice / $rQty;				
					
					$remainQty = $CheckQ->rQty + $_POST['Qty'];
					
					$GQty = $CheckQ->Qty + $_POST['Qty'];
					$GPrice = $CheckQ->totPrice + $_POST['totPrice'];
					$avg = $GPrice / $GQty;

					$InsQty = $CheckQ->rQty + $_POST['Qty'];
					$InsPrice = $avg * $InsQty;
				
					$upQry = "UPDATE $snPurchase SET date='$snDate', Qty='$rQty', totPrice='$rPrice', invNo='$sninvNo',purFrom='$snpurFrom',itemDesc='$snitemDesc',cost='$nCost',rQty='$remainQty' WHERE itemCode='$snitemCode'";

					$upQry1 = "UPDATE $snPurchase SET rtotPrice='$InsPrice' WHERE itemCode='$snitemCode'";

					$upQry2 = "INSERT INTO $snPurchaseData (date,invNo,purFrom,itemCode,itemDesc,Qty,totPrice,cost,randid) VALUES ('$snDate','$sninvNo','$snpurFrom','$snitemCode','$snitemDesc','$snQty','$sntotPrice','$snCost','$snRandid')";
					
					

					$runQry = mysqli_query($connection, $upQry);
					$runQry1 = mysqli_query($connection, $upQry1);
					$runQry2 = mysqli_query($connection, $upQry2);
				}
				if($runQry && $runQry1 && $runQry2)
				{
					echo "  <div class='callout callout-info'>
							<p style='font-size:18px;font-weight:bold;color:white;' >Saved & Updated.</p></div>";
					echo "<meta http-equiv='refresh' content='1'>";
								
				}
			}	
			else
			{
				$GQty = $CheckQ->Qty + $_POST['Qty'];
				$GPrice = $CheckQ->totPrice + $_POST['totPrice'];
				$avg = $GPrice / $GQty;

				$InsQty = $CheckQ->rQty + $_POST['Qty'];
				$InsPrice = $avg * $InsQty;

				$Query = "INSERT INTO $snPurchase (date,invNo,purFrom,itemCode,itemDesc,Qty,totPrice,cost,randid,rQty,rtotPrice) VALUES ('$snDate','$sninvNo','$snpurFrom','$snitemCode','$snitemDesc','$snQty','$sntotPrice','$snCost','$snRandid','$InsQty','$InsPrice')";
				
				$Query2 = "INSERT INTO $snPurchaseData (date,invNo,purFrom,itemCode,itemDesc,Qty,totPrice,cost,randid) VALUES ('$snDate','$sninvNo','$snpurFrom','$snitemCode','$snitemDesc','$snQty','$sntotPrice','$snCost','$snRandid')";

				$upQry3 = "INSERT INTO $snGrandSales (stItemCode,stQty,stAmt,stProfit) VALUES ('$snitemCode','0','0','0')";

				$dummy = "INSERT INTO $snSales (date,invNo,soldTo,itemCode,itemDesc,Qty,unitPrice,GsalesAmt,sProfit,randid) VALUES ('','7854asdlkasd932489234','','','','','','','','0')";

				$GetData = mysqli_query($connection,$Query);
				$GetData2 = mysqli_query($connection,$Query2);
				$GetData3 = mysqli_query($connection,$upQry3);
				$dummy = mysqli_query($connection,$dummy);
				
				if($GetData && $GetData2 && $GetData3)
				{
					echo "  <div class='callout callout-info'>
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