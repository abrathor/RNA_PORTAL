<?php 
$servername = "10.114.8.182";
$username = "root";
$password = "tiger";
$dbname = "rna_alarm_p_assam";
$datatable = "bcch_missing"; // MySQL table name

 
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST["Export"])){
		 
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=data.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('rowid', 'BSCNAME', 'BCFNAME', 'BCFNUMBER', 'BTSNAME', 'BTSNUMBER', 'ALARM_NUMBER', 'TEXT1', 'text2', 'SUPPLEMENTARY_INFO', 'USER_ADDITIONAL_INFO', 'ACTUALALARMTIME', 'ACTUALCANCELTIME', 'APPALARMTIME', 'APPCANCELTIME', 'TOTALTIME', 'OUTAGEDURATION', 'notification_id', 'TRX_ID', 'CONSEC_NBR'));  
      $query = "SELECT * from bcch_missing";  
      $result = mysqli_query($conn, $query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
 }  
?> 