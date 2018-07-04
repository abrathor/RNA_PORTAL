<?php
$servername = "10.114.8.182";
$username = "root";
$password = "tiger";
$dbname = "rna_alarm_p_assam";
$datatable = "bcch_missing"; // MySQL table name

// Connect to server and select database. 
 
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//======
if(isset($_POST['submit']))
{
  $tx1=$_POST['TEXT1'];
        $tx2=$_POST['text2'];
        $uid=$_POST['rowid'];
		
		echo $tx1."--".$tx2."--".$uid;
		}
//=====

$member_id = $_GET['rowid'];  
echo "HELLO" .$member_id;
$sql_ed = "select * from bcch_missing where rowid in('".$member_id.")";
$ed_result = $conn->query($sql_ed);  
		
if(isset($_POST['submit']))
{
if(!empty($_POST['TEXT1']) or !empty($_POST['text2'])) 
{

        $tx1=$_POST['TEXT1'];
        $tx2=$_POST['text2'];
        $uid=$_POST['rowid'];
echo $tx1."--".$tx2."--".$uid;

    $sql_up = "update bcch_missing set TEXT1 = ".$tx1.",text2=".$tx2."  where rowid ='".$uid."'";
    if($conn->query($sql_up)==TRUE)
	{
	echo "<script>alert('Data updated Successfully');</script>" ;
	}
	else 
	{
    echo "Error updating record: " . $conn->error;
    }
	$conn->close();
}
}
?>