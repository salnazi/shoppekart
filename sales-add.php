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
        
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="controller.php"><i class="fa fa-dashboard"></i> </a></li>
        <li><a href="#">  </a></li>
        <li class="active"></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
	
         

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            

			<div class="login-box-body" style='width:100%;' >
			 <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header" style='background:#eaeced;'>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"  style='color:#d97403;font-weight:bold;'>Alert</h4>
              </div>
              <div class="modal-body" style='background:#dcdee0;'>
                <p>
<?php
	error_reporting(0);
	$snDate = $_POST['date'];
	$sninvNo = $_POST['invNo'];
	$snsoldTo = $_POST['soldTo'];
	$snitemCode = $_POST['itemCode'];
	$snitemDesc = $_POST['itemDesc'];
	$snQty = $_POST['Qty'];

	$snunitPrice = $_POST['unitPrice'];
	$snGsalesAmt = $_POST['unitPrice'] * $_POST['Qty'];
	$snRandid = time(). date("ymd");

	 $uRandID = $_POST['Randid'];
	 $rTransCharges = $_POST['rTransCharges'];
	 $rTotPrice = $_POST['rTotPrice'] ;
	 $rCost = $_POST['rCost'] * $_POST['Qty'];

	 $TotVal = $rTransCharges + $rTotPrice - $rCost; 
	 $rQty = $_POST['rQty'] - $_POST['Qty'];
	
	if($_POST['save'] == "SAVE")
	{
		if(!empty($_POST['itemCode']) && !empty($_POST['Qty']))
		{
			$connection = db_connect();
			

			$Query = "INSERT INTO $snSales (date,invNo,soldTo,itemCode,itemDesc,Qty,unitPrice,GsalesAmt,randid) VALUES ('$snDate','$sninvNo','$snsoldTo','$snitemCode','$snitemDesc','$snQty','$snunitPrice','$snGsalesAmt','$snRandid')";
				
			$uQuery = "UPDATE $snStock SET Qty='$rQty', totPrice='$TotVal' WHERE randid ='$uRandID'";

			$GetData = mysqli_query($connection,$Query);
			$uGetData = mysqli_query($connection,$uQuery);

			if($GetData)
			{
				echo "  
				<p style='font-size:18px;font-weight:bold;color:black;'>Saved successfully.</p>";
			}
		}
		else
		{
			echo " 
				<p style='font-size:18px;font-weight:bold;color:white;'>Error. Please try again!</p>";
		}
	}
?>
 </p>
              </div>
              <div class="modal-footer" style='background:#eaeced;'>
                
                <a href='sales.php' type="button" class="btn btn-ouline" style='font-weight:bold;font-size:14px;background:#045FB4;color:white;'>OK</a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
    
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