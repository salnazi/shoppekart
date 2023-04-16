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
<form action='delete-profit.php' method='POST'>
<table id="example1" class="table table-bordered table-hover">
<thead>
<tr>
	<th  style='color: #034187;'>DATE</th>
	<th style='color: #034187;'>DETAILS</th>
	<th style='color: #034187;'>AMOUNT</th>
	<th style='color: #034187;'>OPTIONS</th>
</tr>
</thead>
<tbody>

<?php
	$connection = db_connect();
	$Profit = "SELECT * FROM $snProfit";
	$snProfit = mysqli_query($connection,$Profit);
	while($r = mysqli_fetch_object($snProfit))
	{
		$sProfit[] = $r;
	}
	foreach($sProfit as $sPro)
	{
	echo '<tr>
			  <td>'.$sPro->date.'</td>
			  <td>'.$sPro->details.'</td>
			  <td>'.$sPro->amt.'</td>
			  <input type="hidden" name="RandId" value='.$sPro->randid.'>
			  <td>';
			  ?>
			  <input type="image" src="dist/img/delete.png" alt="Delete" height=23 width=27 name="delete" id="delete" value="Delete" onClick="return confirm('Are you sure you want to delete?')" >
			  <?php
			  echo '</td>
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
		
		echo "<tr><td></td><td style='text-align:right;color: #014a87;font-weight:bold;'>TOTAL EXPENSES</td><td style='text-align:left;color: #014a87;font-weight:bold;'>".$totAmt."</td><td></td></tr>";
	}
?>
</tr>
</tfoot>
</table>
</form>

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