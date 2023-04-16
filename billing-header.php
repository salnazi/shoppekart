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
        <small>Company Information</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="controller.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Company Information</a></li>
        <li class="active"></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Company Information</h3>
            </div>

			<div class="login-box-body" style='width:100%;' >
			<form action='billing-header.php' method='POST'>
				<table style='padding:30px;'>
<?php

		//$connection = db_connect();
		$emp_info = "SELECT * FROM $sncompinfo where id";
		$emp = mysqli_query($connection,$emp_info);
		while($empinfo = mysqli_fetch_object($emp))
		{
			
				echo "<tr><td style ='width:200px;font-weight:bold;'>Company Name</td><td>";
				echo "<input type='text' name='compname' value ='".$empinfo->compname."'>";
				echo "</td></tr>";
				echo "<tr><td style ='width:200px;font-weight:bold;'>Address</td><td>";
				echo "<textarea type='text' name='compaddress' cols=20 rows=3 style='color:black;'>".$empinfo->compaddress."</textarea>";
				echo "</td></tr>";
				echo "<tr><td style ='width:200px;font-weight:bold;'>Email</td><td>";
				echo "<input type='text' name='compemail' value ='".$empinfo->compemail."'>";
				echo "</td></tr>";
				echo "<tr><td style ='width:200px;font-weight:bold;'>Website</td><td>";
				echo "<input type='text' name='compweb' value ='".$empinfo->compweb."'>";
				echo "</td></tr>";
				echo "<tr><td style ='width:200px;font-weight:bold;'>Telephone</td><td>";
				echo "<input type='text' name='comptel' value ='".$empinfo->comptel."'>";
				echo "</td></tr>";	
				echo "<input type='hidden' name='comprand' value ='".$empinfo->comprand."'>";
		
			
		}
		


?>
<tr><td></td><td><input type="submit" name="update" id="submit" value="Update" style ="width:100px;font-weight:bold;" class="btn btn-primary btn-block btn-flat" onClick="return confirm('Are you sure you want to Update?')" >
</td></tr>
</form>
</table>
  </div>


<?php
	error_reporting(0);
	$compname = $_POST['compname'];
	$compaddress = $_POST['compaddress'];
	$compweb = $_POST['compweb'];
	$compemail = $_POST['compemail'];
	$comptel = $_POST['comptel'];
	$comprand = $_POST['comprand'];
	if($_POST['update'] == "Update")
	{

		$Query = "UPDATE $sncompinfo SET compname='$compname',compaddress='$compaddress',compemail='$compemail',compweb='$compweb',comptel='$comptel' WHERE comprand='$comprand'";


		$GetData = mysqli_query($connection,$Query);

		if($GetData )
		{
			echo "  <div class='callout callout-info'>
			<p style='font-size:18px;font-weight:bold;color:white;'>Updated.</p></div>";
			echo "<meta http-equiv='refresh' content='1'>";
			
		}
		
		else
		{
			echo " <div class='callout callout-danger'>
				<p style='font-size:18px;font-weight:bold;color:white;'>Error. Please try again!</p></div>";
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