    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <?php 
	  $connection = db_connect();
	  $sql = mysqli_query($connection, "SELECT * FROM $sncompinfo");
	  while($ro = mysqli_fetch_object($sql))
	  {
		  $min =  substr($ro->compname,0,-10);
		  echo "<span class='logo-mini'><b>".$min."</b></span>";
      
	  
		  echo "<span class='logo-lg'><b>".$ro->compname."</b></span>";
	  }
	  ?>
      
    </a>
