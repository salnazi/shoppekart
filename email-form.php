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
        Support
        <small>Contact Us</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="controller.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Contact Us </a></li>
        <li class="active"></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Email Form</h3>
            </div>

			<div class="login-box-body" style='width:100%;' >


<form action='email-form.php' method='POST'>
<table id="example1" class="table table-bordered table-hover">
<tr ><td valign='middle' >Enter your Email ID</td><td><input type='text' name='fromemail' class='form-control' placeholder='Enter valid email id' required></td></tr>
<tr ><td valign='middle' >Message</td><td><textarea cols=50 rows=5 name='message' class='form-control' required></textarea></td></tr>
<tr><td></td><td><input type="submit" name="send" id="submit" value="Send" style ="width:100px;font-weight:bold;" class="btn btn-primary btn-block btn-flat"  >
</td></tr>
</form>
<tbody>


</tbody>


</table>

<?php

	$to = "salnazi@gmail.com";
	$subject = "Inventory Management System v.1.0.0 - Email Form";
	$message = $_POST['message'];
	$from = $_POST['fromemail'];
	$headers = "From:" . $from;

	$sn = mail($to,$subject,$message,$headers);

	if($_POST['send'] == "Send")
	{
		if($sn)
		{
			echo "  <div class='callout callout-info'>
				<p style='font-size:18px;font-weight:bold;color:white;'>Message sent successfully. Will reply you soon.</p></div>";
			echo "<meta http-equiv='refresh' content='1'>";
				
			
		}
		else
		{
			echo " <div class='callout callout-danger'>
							<p style='font-size:18px;font-weight:bold;color:white;'>Message sent failed!. Please check your internet connection.</p></div>";
			echo "<meta http-equiv='refresh' content='1'>";
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