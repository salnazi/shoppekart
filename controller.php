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
  <aside class="main-sidebar" >

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" >

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
        Dashboard
        <small>Home</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Controller</a></li>
        <li class="active"></li>
      </ol>
    </section>
	<?php 	include ("balance-sheet-dashboard.php"); ?>
    <!-- Main content -->
    <section class="content">
      <div class="row">


<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3 style='text-align:left;font-size:24px;'><?php echo number_format(abs($bsInvestmet),2); ?></h3>

          <p style='font-size:22px;text-align:left;'>Investment</p>
            </div>
            <div class="icon">
              <i class="fa  fa-ellipsis-v"></i>
            </div>
           
            </a>
          </div>
        </div>


        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
          <h3 style='text-align:left;font-size:24px;'><?php echo number_format(abs($bsPurchase),2); ?></h3>

           <p style='font-size:22px;text-align:left;'>Purchase</p>
            </div>
            <div class="icon">
              <i class="fa  fa-ellipsis-v"></i>
            </div>
     
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
                <h3 style='text-align:left;font-size:24px;'><?php echo number_format(abs($bsSales),2); ?></h3>
         <p style='font-size:22px;text-align:left;'>Sales (Incl. Profit)</p>
            </div>
            <div class="icon">
              <i class="fa  fa-ellipsis-v"></i>
            </div>
       
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
                 <h3 style='text-align:left;font-size:24px;'><?php echo number_format(abs($bsStock),2); ?></h3>

             <p style='font-size:22px;text-align:left;'>Physical Stock</p>
            </div>
            <div class="icon">
              <i class="fa  fa-ellipsis-v"></i>
            </div>
            
            </a>
          </div>
        </div>
        <!-- ./col -->


   
       
<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3 style='text-align:left;font-size:24px;'><?php echo number_format(abs($bsExpenses),2); ?></h3>

              <p style='font-size:22px;text-align:left;'>Expenses</p>
            </div>
            <div class="icon">
              <i class="fa  fa-ellipsis-v"></i>
            </div>
           
            </a>
          </div>
        </div>


        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
                <h3 style='text-align:left;font-size:24px;'><?php echo $netProfit; ?></h3>

              <p style='font-size:22px;text-align:left;'>Net Profit</p>
            </div>
            <div class="icon">
              <i class="fa  fa-ellipsis-v"></i>
            </div>
     
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
                <h3 style='text-align:left;font-size:24px;'><?php echo number_format(abs($totSalesProfit),2); ?></h3>

            <p style='font-size:22px;text-align:left;'>Sales Profit</p>
            </div>
            <div class="icon">
              <i class="fa  fa-ellipsis-v"></i>
            </div>
       
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
                <h3 style='text-align:left;font-size:24px;'><?php echo number_format(abs($bsSoldValue),2); ?></h3>

       <p style='font-size:22px;text-align:left;'>Stock Sold</p>
            </div>
            <div class="icon">
              <i class="fa  fa-ellipsis-v"></i>
            </div>
            
            </a>
          </div>
        </div>
        <!-- ./col -->
   





   
       
<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
                 <h3 style='text-align:left;font-size:24px;'><?php echo $CashInHand; ?></h3>

              <p style='font-size:22px;text-align:left;'>Cash In Hand</p>
            </div>
            <div class="icon">
              <i class="fa  fa-ellipsis-v"></i>
            </div>
           
            </a>
          </div>
        </div>


        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
                 <h3 style='text-align:left;font-size:24px;'><?php echo number_format(abs($bsProfit),2); ?></h3>

           <p style='font-size:22px;text-align:left;'>Profit Paid Out</p>
            </div>
            <div class="icon">
              <i class="fa  fa-ellipsis-v"></i>
            </div>
     
            </a>
          </div>
        </div>






  
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
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