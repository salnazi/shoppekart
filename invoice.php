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
<script type="text/javascript">
    function addTotal()
    {
        // Capture the entered values of two input boxes
        var unitPrice = document.getElementById('unitPrice').value;
        var Qty = document.getElementById('Qty').value;

        // Add them together and display
        var sum = parseFloat(unitPrice) * parseFloat(Qty) ;
        document.getElementById('totalAmt').value = sum;
		document.getElementById('grandTotal').value = sum;
    }
	function addTotal1()
    {
        // Capture the entered values of two input boxes
        var unitPrice1 = document.getElementById('unitPrice1').value;
        var Qty1 = document.getElementById('Qty1').value;
		var gTotal1  = document.getElementById('totalAmt').value;

        // Add them together and display
        var sum = parseFloat(unitPrice1) * parseFloat(Qty1) ;
        document.getElementById('totalAmt1').value = sum;
		document.getElementById('grandTotal').value = parseFloat(gTotal1) + parseFloat(sum);
    }
	function addTotal2()
    {
        // Capture the entered values of two input boxes
        var unitPrice2 = document.getElementById('unitPrice2').value;
        var Qty2 = document.getElementById('Qty2').value;
		var gTotal  = document.getElementById('totalAmt').value;
		var gTotal1  = document.getElementById('totalAmt1').value;
	
        // Add them together and display
        var sum = parseFloat(unitPrice2) * parseFloat(Qty2) ;
        document.getElementById('totalAmt2').value = sum;
		document.getElementById('grandTotal').value =  parseFloat(gTotal) + parseFloat(gTotal1) + parseFloat(sum);
    }
		function addTotal3()
    {
        // Capture the entered values of two input boxes
        var unitPrice3 = document.getElementById('unitPrice3').value;
        var Qty3 = document.getElementById('Qty3').value;
		var gTotal  = document.getElementById('totalAmt').value;
		var gTotal1  = document.getElementById('totalAmt1').value;
		var gTotal2  = document.getElementById('totalAmt2').value;

        // Add them together and display
        var sum = parseFloat(unitPrice3) * parseFloat(Qty3) ;
        document.getElementById('totalAmt3').value = sum;
		document.getElementById('grandTotal').value =  parseFloat(gTotal) + parseFloat(gTotal1) + parseFloat(gTotal2) + parseFloat(sum);
    }
		function addTotal4()
    {
        // Capture the entered values of two input boxes
        var unitPrice4 = document.getElementById('unitPrice4').value;
        var Qty4 = document.getElementById('Qty4').value;
		var gTotal  = document.getElementById('totalAmt').value;
		var gTotal1  = document.getElementById('totalAmt1').value;
		var gTotal2  = document.getElementById('totalAmt2').value;

		var gTotal3  = document.getElementById('totalAmt3').value;

        // Add them together and display
        var sum = parseFloat(unitPrice4) * parseFloat(Qty4) ;
        document.getElementById('totalAmt4').value = sum;
		document.getElementById('grandTotal').value =  parseFloat(gTotal) + parseFloat(gTotal1) + parseFloat(gTotal2) + parseFloat(gTotal3) + parseFloat(sum);
    }
		function addTotal5()
    {
        // Capture the entered values of two input boxes
        var unitPrice5 = document.getElementById('unitPrice5').value;
        var Qty5 = document.getElementById('Qty5').value;
		var gTotal  = document.getElementById('totalAmt').value;
		var gTotal1  = document.getElementById('totalAmt1').value;
		var gTotal2  = document.getElementById('totalAmt2').value;

		var gTotal3  = document.getElementById('totalAmt3').value;

		var gTotal4  = document.getElementById('totalAmt4').value;

        // Add them together and display
        var sum = parseFloat(unitPrice5) * parseFloat(Qty5) ;
        document.getElementById('totalAmt5').value = sum;
			document.getElementById('grandTotal').value =  parseFloat(gTotal) + parseFloat(gTotal1) + parseFloat(gTotal2) + parseFloat(gTotal3) + parseFloat(gTotal4) + parseFloat(sum);
    }
		function addTotal6()
    {
        // Capture the entered values of two input boxes
        var unitPrice = document.getElementById('unitPrice6').value;
        var Qty = document.getElementById('Qty6').value;
			var gTotal  = document.getElementById('totalAmt').value;
		var gTotal1  = document.getElementById('totalAmt1').value;
		var gTotal2  = document.getElementById('totalAmt2').value;

		var gTotal3  = document.getElementById('totalAmt3').value;

		var gTotal4  = document.getElementById('totalAmt4').value;
		var gTotal5  = document.getElementById('totalAmt5').value;

        // Add them together and display
        var sum = parseFloat(unitPrice) * parseFloat(Qty) ;
        document.getElementById('totalAmt6').value = sum;
			document.getElementById('grandTotal').value =  parseFloat(gTotal) + parseFloat(gTotal1) + parseFloat(gTotal2) + parseFloat(gTotal3) + parseFloat(gTotal4) + parseFloat(gTotal5) + parseFloat(sum);
    }
</script>

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
        Invoice
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Billing</a></li>
        <li class="active">Invoice</li>
      </ol>
    </section>


    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i ><img src='dist/img/small-logo.png' style='height:40px;width:40px;'></i> <?php 

	  $sql = mysqli_query($connection, "SELECT * FROM $sncompinfo");
	  while($ro = mysqli_fetch_object($sql))
	  {
		echo $ro->compname;
	  }
	  ?>
      
            
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          
          <address>
          
            <?php 

	  $sql = mysqli_query($connection, "SELECT * FROM $sncompinfo");
	  while($ro = mysqli_fetch_object($sql))
	  {
			echo nl2br($ro->compaddress);
			if(!empty($ro->comptel)) echo "<br>Contact No. : ";
			echo nl2br($ro->comptel);
			if(!empty($ro->compemail)) echo "<br>Email : ";
			echo nl2br($ro->compemail);
			if(!empty($ro->compweb))  echo "<br> Website : ";
			echo nl2br($ro->compweb);
	  }
	  ?>
            
          </address>
        </div>
        <!-- /.col -->
		<form action="invoice-print.php" method="POST">
        <div class="col-sm-4 invoice-col">
          Customer
          <address><textarea cols=20 rows=4 name='toad'></textarea></address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <!--<b>Invoice <input type='text' name='invNo' class="form-control" style='width:100px;' required></b>-->

		<?php

		$Que = "SELECT * from invoice where id";
		$ta = mysqli_query($connection,$Que);
	
		while($ro = mysqli_fetch_object($ta))
		{
			
			echo "Invoice No. : ";
			echo $ro->billno + 1;
			echo '<input type="hidden" name="invoiceNO" style ="width:100px;" required autocomplete="off" value="'.$ro->billno.'">';
			echo "<br>";
	
		}
		?>
     <br>
		  <b>Date : <input type='text' name='date'  style='width:100px;' id='datepicker' required></b><br>
          <br>
          
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              
              <th>Item Code</th>
			  <th>Description</th>
			  <th>Qty</th>
			  <th>Rate</th>
              <th>Subtotal</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td><input type='text' class='form-control' id='itemCode' name='itemCode'' style='width:80px;height:30px;' onchange="showUser(this.value)" name='itemCode'></td>
              <td><input type='text' class='form-control' id='itemDesc'name='itemDesc' style='width:400px;height:30px;' ></td>
			  <td><input type='text' class='form-control' id='Qty' name='Qty' style='width:50px;height:30px;'  onKeyup='addTotal();'></td>
              <td><input type='text' class='form-control' id='unitPrice' name='unitPrice' style='width:60px;height:30px;'  onKeyup='addTotal();'></td>
			  <td><input type='text' class='form-control' id='totalAmt' name='totalAmt' style='width:80px;height:30px;' ></td>
            </tr>
            <tr>
			<td><input type='text' class='form-control' id='itemCode1' style='width:80px;height:30px;' onchange="showUser1(this.value)" name='itemCode1'></td>
              <td><input type='text' class='form-control' id='itemDesc1' name='itemDesc1' style='width:400px;height:30px;' ></td>
			  <td><input type='text' class='form-control' id='Qty1' name='Qty1' style='width:50px;height:30px;'  onKeyup='addTotal1();'></td>
              <td><input type='text' class='form-control' id='unitPrice1'  name='unitPrice1' style='width:60px;height:30px;'  onKeyup='addTotal1();'></td>
			  <td><input type='text' class='form-control' id='totalAmt1' name='totalAmt1' style='width:80px;height:30px;' ></td>
            </tr>

			<tr>
			<td><input type='text' class='form-control' id='itemCode2' style='width:80px;height:30px;' onchange="showUser2(this.value)" name='itemCode2'></td>
              <td><input type='text' class='form-control' id='itemDesc2' name='itemDesc2' style='width:400px;height:30px;' ></td>
			  <td><input type='text' class='form-control' id='Qty2' name='Qty2' style='width:50px;height:30px;'  onKeyup='addTotal2();'></td>
              <td><input type='text' class='form-control' id='unitPrice2'  name='unitPrice2' style='width:60px;height:30px;'  onKeyup='addTotal2();'></td>
			  <td><input type='text' class='form-control' id='totalAmt2' name='totalAmt2' style='width:80px;height:30px;' ></td>
            </tr>

			<tr>
			<td><input type='text' class='form-control' id='itemCode3' style='width:80px;height:30px;' onchange="showUser3(this.value)" name='itemCode3'></td>
              <td><input type='text' class='form-control' id='itemDesc3' name='itemDesc3' style='width:400px;height:30px;' ></td>
			  <td><input type='text' class='form-control' id='Qty3' name='Qty3' style='width:50px;height:30px;'  onKeyup='addTotal3();'></td>
              <td><input type='text' class='form-control' id='unitPrice3'  name='unitPrice3' style='width:60px;height:30px;'  onKeyup='addTotal3();'></td>
			  <td><input type='text' class='form-control' id='totalAmt3' name='totalAmt3' style='width:80px;height:30px;' ></td>
            </tr>

			<tr>
			<td><input type='text' class='form-control' id='itemCode4' style='width:80px;height:30px;' onchange="showUser4(this.value)" name='itemCode4'></td>
              <td><input type='text' class='form-control' id='itemDesc4' name='itemDesc4' style='width:400px;height:30px;' ></td>
			  <td><input type='text' class='form-control' id='Qty4' name='Qty4' style='width:50px;height:30px;'  onKeyup='addTotal4();'></td>
              <td><input type='text' class='form-control' id='unitPrice4'  name='unitPrice4' style='width:60px;height:30px;'  onKeyup='addTotal4();'></td>
			  <td><input type='text' class='form-control' id='totalAmt4' name='totalAmt4' style='width:80px;height:30px;' ></td>
            </tr>

			<tr>
			<td><input type='text' class='form-control' id='itemCode5' style='width:80px;height:30px;' onchange="showUser5(this.value)" name='itemCode5'></td>
              <td><input type='text' class='form-control' id='itemDesc5' name='itemDesc5' style='width:400px;height:30px;' ></td>
			  <td><input type='text' class='form-control' id='Qty5' name='Qty5' style='width:50px;height:30px;'  onKeyup='addTotal5();'></td>
              <td><input type='text' class='form-control' id='unitPrice5'  name='unitPrice5' style='width:60px;height:30px;'  onKeyup='addTotal5();'></td>
			  <td><input type='text' class='form-control' id='totalAmt5' name='totalAmt5' style='width:80px;height:30px;' ></td>
            </tr>

			<tr>
			<td><input type='text' class='form-control' id='itemCode6' style='width:80px;height:30px;' onchange="showUser6(this.value)" name='itemCode6'></td>
              <td><input type='text' class='form-control' id='itemDesc6' name='itemDesc6' style='width:400px;height:30px;' ></td>
			  <td><input type='text' class='form-control' id='Qty6' name='Qty6' style='width:50px;height:30px;'  onKeyup='addTotal6();'></td>
              <td><input type='text' class='form-control' id='unitPrice6'  name='unitPrice6' style='width:60px;height:30px;'  onKeyup='addTotal6();'></td>
			  <td><input type='text' class='form-control' id='totalAmt6' name='totalAmt6' style='width:80px;height:30px;' ></td>
            </tr>

            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <p class="lead">Note:</p>
         

          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            The goods sold cannot be taken back or exchanged. E&O.E accepted.
          </p>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
         

          <div class="table-responsive">
            <table class="table">
                    
              <tr>
                <th>Grand Total Rs.:</th>
                <td><input type='text' class='form-control' id='grandTotal' style='width:100px;height:30px;' name='grandTotal'></td>
              </tr>
			   <tr>
                <th>Discount Rs.:</th>
                <td><input type='text' class='form-control' id='discount' style='width:100px;height:30px;' name='discount'></td>
              </tr> 
			  <tr><td><th></th><td><small class="pull-right"> <input type='submit' name='submit'value='Print Preview'  class="btn bg-maroon margin"></small></td></tr>
			  </form>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
  
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>



      </div>
      
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