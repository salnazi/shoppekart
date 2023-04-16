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
        <small>Profit Paid Out</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="controller.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Profit Paid Out Report </a></li>
        <li class="active"></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Profit Paid Out Report</h3>
            </div>

			<div class="login-box-body" style='width:100%;' >

<table id="example2" class="table table-bordered table-hover">
<thead>
<tr>
	<th  style='color: #B40431;'>DATE</th>
	<th style='color: #B40431;'>DETAILS</th>
	<th style='color: #B40431;'>AMOUNT</th>

</tr>
</thead>
<tbody>

<?php
	//$connection = db_connect();
	$Expenses = "SELECT * FROM $snProfit";
	$snExpenses = mysqli_query($connection,$Expenses);
	while($r = mysqli_fetch_object($snExpenses))
	{
		$sExpenses[] = $r;
	}

	foreach($sExpenses as $Exp)
	{
	echo '<tr>
			  <td>'.$Exp->date.'</td>
			  <td>'.$Exp->details.'</td>
			  <td>'.$Exp->amt.'</td>
			  
		 </tr>';
	}
	
?>

</tbody>
<tfoot>
<tr>
<?php
	$totInvestment = "SELECT SUM(amt) FROM $snProfit";
	$totsnInvest = mysqli_query($connection,$totInvestment);
	//$sInvest = array();
	while($rtot = mysqli_fetch_object($totsnInvest))
	{
		$totsInvest = $rtot;
	}
	foreach($totsInvest as $totAmt)
	{
		
		echo "<tr><td></td><td style='text-align:right;color: #B40431;font-weight:bold;'>TOTAL PAID OUT</td><td style='text-align:left;color: #B40431;font-weight:bold;'>".$totAmt."</td></tr>";
	}
?>
</tr>
</tfoot>
</table>


 
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