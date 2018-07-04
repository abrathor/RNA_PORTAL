<?php
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
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];

// SQL Query To Fetch Complete Information Of User
$query = "select usrname from login_info where usrname='$user_check' ";  
$result = mysqli_query($conn, $query); 
$row = mysqli_fetch_assoc($result);

$login_session =$row['usrname'];
//if(!isset($login_session)){
//mysql_close($connection); // Closing Connection
//header('Location: index.php'); // Redirecting To Home Page
//}
?>