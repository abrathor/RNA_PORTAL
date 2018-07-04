<?php
include('session.php');
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
    font-family: "Lato", sans-serif;
}

.sidenav {
    height: 100%;
    width: 160px;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #000033;
    overflow-x: hidden;
    padding-top: 20px;
}

.sidenav a {
    padding: 6px 8px 6px 16px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
}

.sidenav a:hover {
    color: #f1f1f1;
}

.main {
    margin-left: 160px; /* Same as the width of the sidenav */
    font-size: 10px; /* Increased text to enable scrolling */
    padding: 0px 10px;
}

@media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
}

<!-- table -->
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
</style>


</head>
<body>

<div class="sidenav">
  <a href="#about" onclick="showUser(this.value)" value= "1">About</a>
  <a href="#services">Services</a>
  <a href="#clients">Clients</a>
  <a href="#contact">Contact</a>
   <a href="logout.php">LOGOUT</a>
</div>

<div class="main">
 <h2>ASM_Cell OUTAGE REPORT RAW &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b color="red">Welcome : <i><?php echo $login_session; ?></i></b></h2>
  <div id="txtHint"> </div>

<?php
$servername = "10.115.1.56";
$username = "pms";
$password = "pms@321";
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
if(!empty($_POST['check_list'])) 
{
    $checked_count = count($_POST['check_list']);
	echo "You have selected following ".$checked_count." option(s): <br/>";
    foreach($_POST['check_list'] as $check) 
	{
	
	// echo "'rtrim(".$check.",',')',";
      // echo "'".$check."',"; 	
	 $str .= $check . "','";  
    
                       
    }



//echo rtrim(rtrim($str,"'"),",");

	
}
}
//=====
$member_id = rtrim(rtrim($str,"'"),",");
//$member_id = $_GET['id'];  
//echo "HELLO" .$member_id;
$sql_ed = "select * from bcch_missing where rowid in('".$member_id.")";
$ed_result = $conn->query($sql_ed);
//echo "HELLO" .$sql_ed;
//echo "<form method='post'>";
echo "<form action = 'update.php' method='post'>";
echo "<input type = 'submit' value = 'submit' name = 'submit' />";

echo "<table border='1' cellpadding='4'>
<tr>
   
    <td bgcolor='#CCCCCC'><strong>Update</strong></td>
    <td bgcolor='#CCCCCC'><strong>BSCNAME</strong></td>
    <td bgcolor='#CCCCCC'><strong>BCFNAME</strong></td>
	<td bgcolor='#CCCCCC'><strong>BCFNUMBER</strong></td>
	<td bgcolor='#CCCCCC'><strong>BTSNAME</strong></td>
	<td bgcolor='#CCCCCC'><strong>BTSNUMBER</strong></td>
	
	<td bgcolor='#CCCCCC'><strong>ALARM_NUMBER</strong></td>
    <td bgcolor='#CCCCCC'><strong>TEXT1</strong></td>
    <td bgcolor='#CCCCCC'><strong>text2</strong></td>
	<td bgcolor='#CCCCCC'><strong>SUPPLEMENTARY_INFO</strong></td>
	<td bgcolor='#CCCCCC'><strong>USER_ADDITIONAL_INFO</strong></td>
	<td bgcolor='#CCCCCC'><strong>ACTUALALARMTIME</strong></td>
	<td bgcolor='#CCCCCC'><strong>ACTUALCANCELTIME</strong></td>
    <td bgcolor='#CCCCCC'><strong>APPALARMTIME</strong></td>
    <td bgcolor='#CCCCCC'><strong>APPCANCELTIME</strong></td>
	
	<td bgcolor='#CCCCCC'><strong>TOTALTIME</strong></td>
    <td bgcolor='#CCCCCC'><strong>OUTAGEDURATION</strong></td>
    <td bgcolor='#CCCCCC'><strong>notification_id</strong></td>
	<td bgcolor='#CCCCCC'><strong>TRX_ID</strong></td>
	<td bgcolor='#CCCCCC'><strong>CONSEC_NBR</strong></td>
	
</tr>";
while($row_ed = $ed_result->fetch_assoc()) 
{
 


   echo "<tr>"; 
	
      
	   echo "<td>" ."<input type='button' name='submit' value= 'Update' >". "</td>";
	 // echo "<td>" ."<input type='button' name= ".$row_ed['rowid']." value= 'submit' >". "</td>";
	   "<td>" ."<input type='text' name= 'rowid' value=" . $row_ed['rowid'] . ">". "</td>";
		echo "<td> <input type='text' value=". $row_ed['BSCNAME'] ." readonly></td>" ;
		echo  "<td> <input type='text' value=". $row_ed['BCFNAME']." readonly></td>"; 
		  echo "<td> <input type='text' value=". $row_ed['BCFNUMBER']." readonly></td>" ;
		   echo "<td> <input type='text' value=". $row_ed['BTSNAME']." readonly></td>" ;
			echo "<td> <input type='text' value=". $row_ed['BTSNUMBER']." readonly></td>";

          echo "<td> <input type='text' value=". $row_ed['ALARM_NUMBER']." readonly></td>" ;
          echo"<td> <input type='text' name= ". $row_ed['TEXT1']." value=". $row_ed['TEXT1']." ></td>" ;
          echo"<td> <input type='text' name = ". $row_ed['text2']." value=". $row_ed['text2']." ></td> ";
        echo "<td> <input type='text' value=". $row_ed['SUPPLEMENTARY_INFO']." readonly></td> ";
        echo "<td> <input type=text' value=". $row_ed['USER_ADDITIONAL_INFO']." readonly></td>" ;
        echo "<td> <input type='text' value=". $row_ed['ACTUALALARMTIME']." readonly></td> ";
        echo"<td> <input type='text' value=". $row_ed['ACTUALCANCELTIME']." readonly></td>"; 
        echo "<td> <input type='text' value=". $row_ed['APPALARMTIME']." readonly></td> ";
        echo"<td> <input type='text' value=". $row_ed['APPCANCELTIME']." readonly></td>";

         echo"<td> <input type='text' value=". $row_ed['TOTALTIME']." readonly></td>" ;
		 echo "<td> <input type='text' value=". $row_ed['OUTAGEDURATION']." readonly></td> ";
		 echo "<td> <input type='text' value=". $row_ed['notification_id']." readonly></td>" ;
		 echo "<td> <input type='text' value=". $row_ed['TRX_ID']." readonly></td> ";
		 echo "<td> <input type='text' value=". $row_ed['CONSEC_NBR']." readonly></td>" ;
					
					
					
				
			 
   echo "</tr>";
	
};	
	
echo "</table>";
 

 
echo "</form>";

  

?> 	
</div>
     
</body>
</html> 