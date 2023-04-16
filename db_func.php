<?php
	function db_connect()
	{
		static $connection;

		if(!isset($connection))
		{
			//$conf = parse_ini_file("db_conf.ini");
			$conf['Host'] = 'localhost';
			$conf['Username'] = 'root';
			$conf['Password'] = '';
			$conf['Database'] = 'a2zdb';
			$connection = mysqli_connect($conf['Host'],$conf['Username'], $conf['Password'],$conf['Database']);
		}
		else
		{
			return mysqli_connect_error(); 
		}
		return $connection;
	}
	function db_query($query)
	{
		    
		$connection = db_connect();
		$result = mysqli_query($connection,$query);
		return $result;
		
	}

	function db_select($query)
	{	
		$row = array();
		$sQuery = db_query($query);
		if($sQuery === false)
		{
			return db_error();
		}
		else
		{
			while($r = mysqli_fetch_object($sQuery))
			{
				$row[] = $r;
			}
		}
		return $row;
		
	}
	
	
	function db_error() 
	{
		$connection = db_connect();
		return mysqli_error($connection);
	}


?>