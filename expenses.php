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
        <small>Expenses </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="controller.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Expenses </a></li>
        <li class="active"></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Expenses </h3>
            </div>

			<div class="login-box-body" style='width:100%;' >
			<form action='expenses.php' method='POST'>
<?php
		
		echo "<table>";
		
				echo "<tr ><td style ='width:200px;font-weight:bold;'>Date</td><td style='color:#036086;font-weight:bold;'>";
echo '<input type="text" name="date" style ="width:100px;" id="datepicker">';
				echo "</td></tr>";
				echo "<tr><td style ='width:200px;font-weight:bold;'>Details</td><td>";
echo '<input type="text" name="details" style ="max-width:auto;">';
				echo "</td></tr>";
				echo "<tr><td style ='width:200px;font-weight:bold;'>Amount</td><td>";
echo '<input type="text" name="amount" style ="width:100px;">';
				echo "</td></tr>";
				
		echo "<tr><td style ='width:200px;font-weight:bold;'></td><td>";
?> 
<input type="submit" name="save" value="SAVE" style ="width:100px;font-weight:bold;" class="btn bg-maroon margin" onClick="return confirm('Are you sure you want to Save?')">
<?php
				echo "</td></tr>";
		echo "</table>";
?>
  </div>
</form>

<?php
 error_reporting(0);
 $snDate = $_POST['date'];
 $snDetails = $_POST['details'];
 $snAmount = $_POST['amount'];
 $snRandid = time(). date("ymd");

if($_POST['save'] == "SAVE")
{
	if(!empty($_POST['details']) && !empty($_POST['amount']))
	{
		
		$Query = "INSERT INTO $snExpenses (date,details,amt,randid) VALUES ('$snDate','$snDetails','$snAmount','$snRandid')";
		$GetData = mysqli_query($connection,$Query);
		if($GetData)
		{
			echo "  <div class='callout callout-info'>
			<p style='font-size:18px;font-weight:bold;color:white;'>Saved.</p></div>";
			echo "<meta http-equiv='refresh' content='1'>";
		}
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