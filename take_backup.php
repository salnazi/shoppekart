
<?php  
$host ="localhost";
$user ="root";
$pass = "";
$dbname ="a2zdb";
$emailId = "salnazi@gmail.com";  
 
$rootPath = "sqlbackup";  
$filePath = $rootPath . "/backup-" . date("d-M-y") . ".sql";    

if ( file_exists($filePath) )   
unlink($filePath);  
$R7A57EE9784174AEB2EE17E61022830B2 = system("mysqldump --user=$user --password=$pass --host=$host $dbname > $filePath",$success);       
$fileSize = filesize($filePath);    
	switch ($fileSize) 
	{    
		case ($fileSize>=1048576): 
			$fileSize = round($fileSize/1048576) . " MB"; 
		break;    
		case ($fileSize>=1024): 
			$fileSize = round($fileSize/1024) . " KB"; break;    
		default: $fileSize = $fileSize . " bytes"; 
		break;    
	}  
	$message = "The database backup for " . $RBDDC31963757F5F11835091CBDECB7EE . " has been run.\n\n";     $message .= "Size of the backup: " . $fileSize . "\n\n";  
	$message .= "Server time of the backup: " . date(" F d h:ia") . "\n\n";  
	$message .= "Error: " . $success . "\n\n"; 
	if($success == "0") 
	{  
			$message .= "Backup is Success...!!!";  echo "<script type='text/javascript'>alert('Backup Completed'); </script>"; 
	}   
	if($success == "1") 
	{   
		$message .= "Backup Failed...!!!";  
		echo "<script type='text/javascript'>alert('Backup Failed!'); </script>"; 
	}    
	echo "<pre>";  echo $message;  
	echo "</pre>";            
	mail($emailId, "School ERP - Database Backup Message" , $message, "From: Website <>");   
	?>