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
        Salary
        <small>Salary Information</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="controller.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Salary Information</a></li>
        <li class="active"></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Salary Information</h3>
			  
			    <form action='salary-information.php' method='POST' name='form'><br>
				<?php
						
				echo "Select Year : <select name='SortByYear'  class='btn btn-primary' >";
				echo "<option value='2014'>2014</option>";
					echo "<option value='2015'>2015</option>";
				echo "<option value='2016'>2016</option>";
				echo "</select>";
				
							?>
		  <input type='submit' name='GetData' value='Get List' class="btn btn-primary" style='width:80px;'/>

			  </form>
            </div>
    <!-- /.box-header -->
            <div class="box-body">

<table id="example2" class="table table-bordered table-hover">
<thead>
<tr>

<?php
// get_fieldname
echo "<th>No</th>";
echo "<th>Comp ID</th>";
echo "<th>EmpName</th>";
echo "<th>EmpID</th>";
echo "<th>Salary</th>";
echo "<th>NetSalary</th>";
echo "<th>SalaryAdj</th>";
echo "<th>GrossPay</th>";
echo "<th>BSBC</th>";
echo "<th>BHFC</th>";
echo "<th>Pension</th>";
echo "<th>Medical</th>";
echo "<th>Unemployment</th>";
echo "<th>STSB</th>";
echo "<th>HousingFund</th>";
echo "<th>TaxableIncome</th>";
echo "<th>IncomeTax</th>";
echo "<th>TotalDetection</th>";
echo "<th>Others</th>";
echo "<th>SalaryIssuedCity</th>";
echo "<th>IssedYear</th>";
echo "<th>SecretKey</th>";

?>

</tr>
</thead>
<tbody>




<?php
$sessUser = $_SESSION['Username'];
if($_POST['GetData'] == "Get List")
{
	$SYear = $_POST['SortByYear'];
	$Qry = "WHERE salYear = '$SYear' AND CompID = '$sessUser'";
}	
else
{
	$Qry = "WHERE CompID = '$sessUser'";
}
$empSal = "SELECT * FROM $snempsalary $Qry";
$empSalGet = db_select($empSal);
	foreach($empSalGet as $row)
	{

	echo "<tr>";
		foreach($row as $data)
		echo "<td>$data</td>";
	echo "</tr>";
	}


	
?>


</tbody>
<tfoot>
<tr>

<?php
// get_fieldname
echo "<th>No</th>";
echo "<th>Comp ID</th>";
echo "<th>EmpName</th>";
echo "<th>EmpID</th>";
echo "<th>Salary</th>";
echo "<th>NetSalary</th>";
echo "<th>SalaryAdj</th>";
echo "<th>GrossPay</th>";
echo "<th>BSBC</th>";
echo "<th>BHFC</th>";
echo "<th>Pension</th>";
echo "<th>Medical</th>";
echo "<th>Unemployment</th>";
echo "<th>STSB</th>";
echo "<th>HousingFund</th>";
echo "<th>TaxableIncome</th>";
echo "<th>IncomeTax</th>";
echo "<th>TotalDetection</th>";
echo "<th>Others</th>";
echo "<th>SalaryIssuedCity</th>";
echo "<th>IssedYear</th>";
echo "<th>SecretKey</th>";
?>


</tr>
</tfoot>
</table>

  </div>


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

?>