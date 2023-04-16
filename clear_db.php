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
        <small>Truncate Database</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="controller.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Truncate Database </a></li>
        <li class="active"></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Truncate Database</h3>
            </div>

			<div class="login-box-body" style='width:100%;' >

<table id="example1" class="table table-bordered table-hover" style='color:black;'>

<tbody>

<form action="clear_db_delete.php" method="POST">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" name='dUsername' required style='width:200px;' autocomplete="off">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>

      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name='dPassword' required style='width:200px;'>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
		<br>
		 <input type="submit" class="btn btn-primary btn-block btn-flat" name='Update' value='Delete' style='width:100px;'>
      </div>
     
    </form>

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