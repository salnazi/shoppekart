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
    background:  #f9fafc ;
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
        Reports
        <small>Balance Sheet</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="controller.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Balance Sheet </a></li>
        <li class="active"></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Balance Sheet</h3>
            </div>

			<div class="login-box-body" style='width:100%;' >

<table id="example1" class="table table-bordered table-hover" style='color:black;'>

<tbody>

<?php
	//$connection = db_connect();

	$snInvestment = "SELECT SUM(amt) FROM $snInvestment";
	$sInvestment = mysqli_query($connection,$snInvestment);
	while($rInv = mysqli_fetch_object($sInvestment))
	{
		$investment = $rInv;
	}

	$snPurchase = "SELECT SUM(totPrice) FROM $snPurchase";
	$sPurchase = mysqli_query($connection,$snPurchase);
	while($rPur = mysqli_fetch_object($sPurchase))
	{
		$purchase = $rPur;
	}
	

	$snSales = "SELECT SUM(GsalesAmt) FROM $snSales";
	$sSales = mysqli_query($connection,$snSales);
	while($rSal = mysqli_fetch_object($sSales))
	{
		$sales = $rSal;
	}
	
	$snSalesProfit = "SELECT SUM(stProfit) FROM $snGrandSales";
	$sSalesProfit = mysqli_query($connection,$snSalesProfit);
	while($rSalProfit = mysqli_fetch_object($sSalesProfit))
	{
		$rSalPro = $rSalProfit;
	}

	$snStock = "SELECT SUM(rtotPrice) FROM purchase";
	$sStock = mysqli_query($connection,$snStock);
	while($rStock = mysqli_fetch_object($sStock))
	{
		$stock = $rStock;
	}

	$snExpenses = "SELECT SUM(amt) FROM $snExpenses";
	$sExpenses = mysqli_query($connection,$snExpenses);
	while($rExpenses = mysqli_fetch_object($sExpenses))
	{
		$expenses = $rExpenses;
	}

	$snProfit = "SELECT SUM(amt) FROM $snProfit";
	$sProfit = mysqli_query($connection,$snProfit);
	while($rProfit = mysqli_fetch_object($sProfit))
	{
		$profit = $rProfit;
	}


	foreach($investment as $bsInvestmet)
	{
		echo "<tr><td style ='width:200px;font-weight:bold;'>Total Investment</td><td style='color:#B40431;font-weight:bold;'>".number_format(abs($bsInvestmet),2)."</td></tr>";
	}
	foreach($purchase as $bsPurchase)
	{
		echo "<tr><td style ='width:200px;font-weight:bold;'>Total Purchase</td><td style='color:#B40431;font-weight:bold;'>".number_format(abs($bsPurchase),2)."</td></tr>";
	}

	foreach($sales as $bsSales)
	{
		echo "<tr><td style ='width:200px;font-weight:bold;'>Total Sales (Incl. Profit)</td><td style='color:#B40431;font-weight:bold;'>".number_format(abs($bsSales),2)."</td></tr>";
	}

	foreach($stock as $bsStock)
	{
		echo "<tr><td style ='width:200px;font-weight:bold;'>Physical Stock</td><td style='color:#B40431;font-weight:bold;'>".number_format(abs($bsStock),2)."</td></tr>";
	}
	$bsSoldValue = $bsPurchase - $bsStock;
		echo "<tr><td style ='width:200px;font-weight:bold;'>Stock 
		Sold</td><td style='color:#B40431;font-weight:bold;'>".number_format(abs($bsSoldValue),2)."</td></tr>";

	foreach($expenses as $bsExpenses)
	{
		echo "<tr><td style ='width:200px;font-weight:bold;'>Total Expenses</td><td style='color:#B40431;font-weight:bold;'>".number_format(abs($bsExpenses),2)."</td></tr>";
	}
	foreach($profit as $bsProfit)
	{
		echo "<tr><td style ='width:200px;font-weight:bold;'>Total Profit Paid Out</td><td style='color:#B40431;font-weight:bold;'>".number_format(abs($bsProfit),2)."</td></tr>";
	}
	
	$totSales =  abs($bsSales - $bsSoldValue);
	$totSalesProfit = $totSales;

	echo "<tr><td style ='width:200px;font-weight:bold;'>Total Sales Profit</td><td style='color:#B40431;font-weight:bold;'>".number_format(abs($totSalesProfit),2)."</td></tr>";

	/*foreach($rSalPro as $SalesProfit)
	{
		echo "<tr><td style ='width:200px;font-weight:bold;'>Total Sales Profit</td><td style='color:#B40431;font-weight:bold;'>".number_format(abs($SalesProfit),2)."</td></tr>";
	}

	$netPro = $SalesProfit - $bsExpenses ;
	$netProfit = number_format(abs($netPro),2);
	echo "<tr><td style ='width:200px;font-weight:bold;'>Total Net Profit</td><td style='color:#B40431;font-weight:bold;'>".$netProfit."</td></tr>";
	*/
	$netPro = $totSalesProfit - $bsExpenses ;
	$netProfit = number_format(abs($netPro),2);
	echo "<tr><td style ='width:200px;font-weight:bold;'>Total Net Profit</td><td style='color:#B40431;font-weight:bold;'>".$netProfit."</td></tr>";


	$cash = $bsInvestmet - $bsPurchase - $bsExpenses - $bsProfit  ;
	$newCash = $cash + $bsSales;
	$CashInHand = number_format(abs($newCash),2);
	echo "<tr><td style ='width:200px;font-weight:bold;'>Cash in Hand</td><td style='color:#B40431;font-weight:bold;'>".$CashInHand."</td></tr>";
?>

</tbody>
<tfoot>
<tr>

</tr>
</tfoot>
</table>


         
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