<?php
$servername = "10.114.8.182";
$username = "root";
$password = "tiger";
$dbname = "rna_alarm_p_assam";
$datatable = "bcch_missing_test"; // MySQL table name

 
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
 
 if(isset($_POST["Import"])){
		
		$filename=$_FILES["file"]["tmp_name"];		
 
 
		 if($_FILES["file"]["size"] > 0)
		 {
		  	$file = fopen($filename, "r");
	        while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
	         {
			

 
         $sql = "INSERT into bcch_missing_test(rowid, BSCNAME, BCFNAME, BCFNUMBER, BTSNAME, BTSNUMBER, ALARM_NUMBER, TEXT1, text2, SUPPLEMENTARY_INFO,  USER_ADDITIONAL_INFO, ACTUALALARMTIME, ACTUALCANCELTIME, APPALARMTIME, APPCANCELTIME, TOTALTIME, OUTAGEDURATION, notification_id, TRX_ID, CONSEC_NBR) 
         values ('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[4]."','".$getData[5]."','".$getData[6]."','".$getData[7]."','".$getData[8]."','".$getData[9]."','".$getData[10]."','".$getData[11]."','".$getData[12]."','".$getData[13]."','".$getData[14]."','".$getData[15]."','".$getData[16]."','".$getData[17]."','".$getData[18]."','".$getData[19]."')";
		 
                   $result = mysqli_query($conn, $sql);
				if(!isset($result))
				{
					echo "<script type=\"text/javascript\">
							alert(\"Invalid File:Please Upload CSV File.\");
							window.location = \"index.php\"
						  </script>";		
				}
				else {
					  echo "<script type=\"text/javascript\">
						alert(\"CSV File has been successfully Imported.\");
						window.location = \"index.php\"
					</script>";
				}
	         }
			
	         fclose($file);	
		 }
	}	 
 
 
 ?>

