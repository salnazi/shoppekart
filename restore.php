
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
        Database
        <small>Restore Database</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="controller.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Restore Database </a></li>
        <li class="active"></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Restore Database</h3>
			  &nbsp;&nbsp;&nbsp; <span style='color:red;'>Warning: If you restore. Your old data will be replaced/deleted from your existing database<span>
            </div>

			<div class="login-box-body" style='width:100%;' >

<table id="example1" class="table table-bordered table-hover" style='color:black;'>

<tbody>
<form action='restore.php' method='POST'>
<tr><td>Restore File</td><td><select name='filepath'  class="btn btn-primary btn-block btn-flat" style='width:200px;'>
<?php
$dir = "sqlbackup/";

// Open a directory, and read its contents
if (is_dir($dir)){
  if ($dh = opendir($dir)){
    while (($file = readdir($dh)) !== false){
		if($file != "." && $file != "..") {
		?>

<option value="<?php echo $file; ?>"><?php echo $file; ?></option>

	  <?php
    }
	}
    closedir($dh);
  }
}
?>
</select>

</td></tr>
<tr><td></td><td><input type="submit" name="restore" id="submit" value="Restore" style ="width:100px;font-weight:bold;" class="btn btn-primary btn-block btn-flat" onClick="return confirm('Are you sure you want to Restore?')" ></td></tr>
</table>
</form>
<?php  
	if($_POST['restore'] == "Restore")
	{
			$host ="localhost";
			$user ="root";
			$pass = "";
			$dbname ="a2zdb";
			$emailId = "salnazi@gmail.com";  

			$rootPath = "sqlbackup/";  
			$filePath = trim($rootPath . $_POST['filepath']); 

		
			$R7A57EE9784174AEB2EE17E61022830B2 = system("mysql --user=$user --password=$pass --host=$host $dbname < $filePath",$success);       
			$fileSize = filesize($filePath);    
			switch ($fileSize) 
			{    
				case ($fileSize>=1048576): 
					$fileSize = round($fileSize/1048576) . " MB"; 
				break;    
				case ($fileSize>=1024): 
					$fileSize = round($fileSize/1024) . " KB"; 
				break;    
				default: $fileSize = $fileSize . " bytes"; 
				break;    
			}  
			$message = "The database restore has been run.\n\n";     
			$message .= "Size of the restore: " . $fileSize . "\n\n";  
			$message .= "Server time of the restore: " . date(" F d h:ia") . "\n\n";  
			$message .= "Error: " . $success . "\n\n"; 
			if($success == "0") 
			{  
					$message .= "Restore is Completed!";  
					echo "  <div class='callout callout-info'>
					<p style='font-size:18px;font-weight:bold;color:white;'>Restore is Success.</p></div>";
					echo "<meta http-equiv='refresh' content='1'>";
			}   
			if($success == "1") 
			{   
				$message .= "Restore Failed...!!!";  
				echo " <div class='callout callout-danger'>
								<p style='font-size:18px;font-weight:bold;color:white;'>Restore Failed!.</p></div>";
								echo "<meta http-equiv='refresh' content='1'>";
				
			}    
			echo "<pre>";  echo $message;  
			echo "</pre>";            
			//mail($emailId, "A2Z Database Backup Message" , $message, "From: Website <>");   

	}
	?>
	


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