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
        <small>Sales Return</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="controller.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Sales Return Report </a></li>
        <li class="active"></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Sales Return Report</h3>
            </div>

			<div class="login-box-body" style='width:100%;' >

<table id="example2" class="table table-bordered table-hover" style='color:black;'>
<thead>
<tr>
	<th  style='color: #B40431;'>DATE</th>
	<th style='color: #B40431;'>INV. NO</th>
	<th style='color: #B40431;'>RTN. FROM</th>
	<th style='color: #B40431;'>CODE</th>
	<th style='color: #B40431;'>DETAILS</th>
	<th style='color: #B40431;'>QTY</th>
	<th style='color: #B40431;'>TOT. AMOUNT</th>

</tr>
</thead>
<tbody>

<?php
	//$connection = db_connect();
	$Investment = "SELECT * FROM $snSalesReturn";
	$snInvest = mysqli_query($connection,$Investment);
	//$sInvest = array();
	while($r = mysqli_fetch_object($snInvest))
	{
		$sInvest[] = $r;
	}


	foreach($sInvest as $Invest)
	{
	echo '<tr>
			  <td>'.$Invest->date.'</td>
			  <td>'.$Invest->invNo.'</td>
			  <td>'.$Invest->returnFrom.'</td>
			  <td>'.$Invest->itemCode.'</td>
			  <td>'.$Invest->itemDesc.'</td>
			  <td>'.$Invest->Qty.'</td>
			  <td>'.$Invest->totPrice.'</td>
			
		  
		 </tr>';
	}
	
?>

</tbody>
<tfoot>
<tr>
<?php
	$totInvestment = "SELECT SUM(totPrice) as ntotPrice FROM $snSalesReturn";
	$totsnInvest = mysqli_query($connection,$totInvestment);
	//$sInvest = array();
	while($rtot = mysqli_fetch_object($totsnInvest))
	{
		$totsInvest = $rtot;
	}

	

	$totAmt = $totsInvest->ntotPrice;
	
	echo "<tr><td></td><td></td><td></td><td></td><td></td><td style='text-align:right;color: #B40431;font-weight:bold;'>TOTAL AMOUNT RETURNED</td><td style='text-align:left;color: #B40431;font-weight:bold;'>".number_format(abs($totAmt),2)."</td></tr>";

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