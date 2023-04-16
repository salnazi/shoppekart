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
 // delete record
	error_reporting(0);
	$RandId = $_POST['RandId'];
	if(isset($_POST['edit_x']))
	{
		echo "I am edit";
	}
	if(isset($_POST['delete_x']))
	{
		$delQuery = "DELETE FROM $snExpenses WHERE randid='".$RandId."'";
		$Delete = db_query($delQuery);
		if($Delete)
		{
			echo "<h4 style='color:black;'> Deleted successfully.</h4>";
			
		}
		else
		{
			echo "<h4 style='color:black;'> Error. Please Try again!.</h4>";
		}
	}
 // edit record
 ?>
 </p>
              </div>
              <div class="modal-footer" style='background:#eaeced;'>
                
                <a href='reports-expenses.php' type="button" class="btn btn-ouline" style='font-weight:bold;font-size:14px;background:#045FB4;color:white;'>OK</a>
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