<?php
error_reporting(0);
session_start();
ob_start();
?>
<?php include("head.php"); 
include("autoload.php"); ?>
<style type='text/css'>
tr:nth-child(odd) {
    background:  #f9fafc ;
	color:black;
}
td{
	padding:5px;
	color:black;
}
</style>
<body onload="window.print();">
<div class="wrapper">
  <!-- Main content -->
  <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i><img src='dist/img/small-logo.png' style='height:40px;width:40px;'></i>   <?php 
		$connection = db_connect();
	  $sql = mysqli_query($connection, "SELECT * FROM $sncompinfo");
	  while($ro = mysqli_fetch_object($sql))
	  {
		echo nl2br($ro->compname);
	  }
	  ?>
            <small class="pull-right">	
			<img src='dist/img/InvoiceLogo.jpg' style='height:40px;width:120px;'>
 </small>
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
        <div class="col-sm-4 invoice-col">
          Customer
          <address>

            <strong style='color:black;'><?php echo nl2br($_POST['toad']); ?></strong><br>
           
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Invoice : <?php $newInv = $_POST['invoiceNO'] + 1; echo $newInv; ?></b>

		  <?php
		  if($_POST['submit'] == "Print Preview")
			{
				$newNo = $newInv  ;
				$QueU = "UPDATE invoice SET billno = ".$newNo." WHERE id='1'";
				$taU = mysqli_query($connection,$QueU);
			}
		?>
     <Br>
		  <b>Date : <?php echo $_POST['date']; ?></b><br>
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
			  <th style='text-align:right;'>Qty</th>
			  <th style='text-align:right;'>Rate</th>
              <th style='text-align:right;'>Subtotal</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td><?php echo strtoupper($_POST['itemCode']); ?></td>
              <td><?php echo $_POST['itemDesc']; ?></td>
			  <td style='text-align:right;'><?php echo $_POST['Qty']; ?></td>
              <td style='text-align:right;'><?php echo $_POST['unitPrice']; ?></td>
			  <td style='text-align:right;'><?php echo number_format($_POST['totalAmt'],2) ?></td>
            </tr>
			<?php if(!empty(strtoupper($_POST['itemCode1']))) { ?>
            <tr>
              <td><?php echo strtoupper($_POST['itemCode1']); ?></td>
              <td><?php echo $_POST['itemDesc1']; ?></td>
			  <td style='text-align:right;'><?php echo $_POST['Qty1']; ?></td>
              <td style='text-align:right;'><?php echo $_POST['unitPrice1']; ?></td>
			  <td style='text-align:right;'><?php  echo number_format($_POST['totalAmt1'],2) ?></td>
            </tr>
			<?php } ?>
			<?php if(!empty(strtoupper($_POST['itemCode2']))) { ?>
<tr>
              <td><?php echo strtoupper($_POST['itemCode2']); ?></td>
              <td><?php echo $_POST['itemDesc2']; ?></td>
			  <td style='text-align:right;'><?php echo $_POST['Qty2']; ?></td>
              <td style='text-align:right;'><?php echo $_POST['unitPrice2']; ?></td>
			  <td style='text-align:right;'><?php  echo number_format($_POST['totalAmt2'],2) ?></td>
            </tr>
			<?php } ?>
			<?php if(!empty(strtoupper($_POST['itemCode3']))) { ?>
			<tr>
              <td><?php echo strtoupper($_POST['itemCode3']); ?></td>
              <td><?php echo $_POST['itemDesc3']; ?></td>
			  <td style='text-align:right;'><?php echo $_POST['Qty3']; ?></td>
              <td style='text-align:right;'><?php echo $_POST['unitPrice3']; ?></td>
			  <td style='text-align:right;'><?php  echo number_format($_POST['totalAmt3'],2) ?></td>
            </tr>
			<?php } ?>
			<?php if(!empty(strtoupper($_POST['itemCode4']))) { ?>
			<tr>
              <td><?php echo strtoupper($_POST['itemCode4']); ?></td>
              <td><?php echo $_POST['itemDesc4']; ?></td>
			  <td style='text-align:right;'><?php echo $_POST['Qty4']; ?></td>
              <td style='text-align:right;'><?php echo $_POST['unitPrice4']; ?></td>
			  <td style='text-align:right;'><?php  echo number_format($_POST['totalAmt4'],2) ?></td>
            </tr>
			<?php } ?>
			<?php if(!empty(strtoupper($_POST['itemCode5']))) { ?>
			<tr>
              <td><?php echo strtoupper($_POST['itemCode5']); ?></td>
              <td><?php echo $_POST['itemDesc5']; ?></td>
			  <td style='text-align:right;'><?php echo $_POST['Qty5']; ?></td>
              <td style='text-align:right;'><?php echo $_POST['unitPrice5']; ?></td>
			  <td style='text-align:right;'><?php  echo number_format($_POST['totalAmt5'],2) ?></td>
            </tr>
			<?php } ?>
			<?php if(!empty(strtoupper($_POST['itemCode6']))) { ?>
			<tr>
              <td><?php echo strtoupper($_POST['itemCode6']); ?></td>
              <td><?php echo $_POST['itemDesc6']; ?></td>
			  <td style='text-align:right;'><?php echo $_POST['Qty6']; ?></td>
              <td style='text-align:right;'><?php echo $_POST['unitPrice6']; ?></td>
			  <td style='text-align:right;'><?php echo number_format($_POST['totalAmt6'],2); ?></td>
            </tr>
<?php } ?>
		
				<tr>
               <td></td><td></td><td></td><td style='text-align:right;'> Discount Rs .:</td>
                <td style='text-align:right;'><?php echo "-" . number_format($_POST['discount'],2); ?></td>
              </tr>
			<?php $grandTotal = $_POST['grandTotal'] - $_POST['discount']; ?>
			<tr>
               <td></td><td></td><td></td><td style='text-align:right;'> Grand Total Rs.:</td>
                <td style='text-align:right;'><?php echo number_format($grandTotal,2); ?></td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
	  <center>Thank you for shopping and visit again.</center>
        <!-- accepted payments column -->
        <div class="col-xs-6">
		
          <p class="lead">Note:</p>
         

          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            The goods sold cannot be taken back or exchanged. E&O.E accepted.
          </p>

		  
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
         
<p style='text-align:right;'>for A2Z Marketing</p>
          <div class="table-responsive">
    
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
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
