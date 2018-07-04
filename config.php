<?php
function getdb(){
$servername = "10.115.1.56";
$username = "pms";
$password = "pms@321";
$db = "rna_alarm_p_assam";
 
try {
   
    $conn = mysqli_connect($servername, $username, $password, $db);
     //echo "Connected successfully"; 
    }
catch(exception $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
    return $conn;
}
?>
