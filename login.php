<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$servername = "10.154.80.186";
$usernm = "root";
$pwd = "tiger";
$dbname = "rna_portal";
$datatable = "login_info";

// Create connection
$conn = new mysqli($servername, $usernm, $pwd, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "select * from login_info where password='$password' AND username='$username'";  
$result = mysqli_query($conn, $query); 
$rows = mysqli_fetch_assoc($result);
echo $query;

$_SESSION['login_user']=$username; // Initializing Session
header("location: profile.php"); // Redirecting To Other Page

//if ($rows == 1) 
//{
//$_SESSION['login_user']=$username; // Initializing Session
//header("location: profile.php"); // Redirecting To Other Page
//} 
//else 
//{
//$error = "Username or Password is invalid";
//}
// die("Connection failed: " . $conn->connect_error);
//mysql_close($connection); // Closing Connection
}
}
?>
