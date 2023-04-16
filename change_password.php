<?php
error_reporting(0);
session_start();
ob_start();
include("global_config.php");
if($_SESSION['Username'] == _USERNAME && $_SESSION['Password'] == _PASSWORD)
{
?>
<?php include("head.php"); ?>

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
        <small>Change Password</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="controller.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Change Password</a></li>
        <li class="active"></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Password Credentials</h3> &nbsp;&nbsp;&nbsp; <span style='color:red;'>Warning: Do not share your password to anyone<span>
            </div>


			<div class="login-box-body" style='width:40%;' >

    <form action="change_password.php" method="POST">
      <div class="form-group has-feedback" >
        <input type="password" class="form-control" placeholder="Enter New Password" name='NewPassword' required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Re-Type Password" name='RTypePassword' required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <input type="submit" class="btn btn-primary btn-block btn-flat" name='Update' value='Update'>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>

 <?php
	$snRand = $_SESSION['Rand'];
	if($_POST['Update'] == "Update")
	{
		if($_POST['NewPassword'] == $_POST['RTypePassword'])
		{
			$gPass = $_POST['NewPassword'];
			$uQuery = "UPDATE $snloginaccess SET snpass='$gPass' WHERE snrand='$snRand'";
			$SuUpdate = mysqli_query($connection,$uQuery);
			if($SuUpdate)
			{
				echo "  <div class='callout callout-info'>
                <p style='font-size:18px;font-weight:bold;color:black;'>Password updated successfully.</p></div>";
			}
		}
		else
		{
			echo " <div class='callout callout-danger'>
                <p style='font-size:18px;font-weight:bold;color:white;'>Password mismatch. Please try again!</p></div>";
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