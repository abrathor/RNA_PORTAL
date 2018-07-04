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
</div>

<div class="main">
  <h2>ASM_Cell OUTAGE REPORT RAW</h2>
  <form class="form-horizontal" action="functions.php" method="post" name="upload_excel"   
                      enctype="multipart/form-data">
                  <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
                                <input type="submit" name="Export" class="btn btn-success" value="export to excel"/>
                            </div>
                   </div>                    
            </form> 
			
			 <form class="form-horizontal" action="fuction_import.php" method="post" name="upload_excel" enctype="multipart/form-data">
                    <fieldset>
 
                        <!-- Form Name -->
                        <legend>RNA</legend>
 
                        <!-- File Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="filebutton">Select File(Only comma delimated csv file)<font color="red">*</font></label>
                            <div class="col-md-4">
                                <input type="file" name="file" id="file" class="input-large">
                            </div>
                        </div>
 
                        <!-- Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="singlebutton">Import data</label>
                            <div class="col-md-4">
                                <button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Import</button>
                            </div>
                        </div>
 
                    </fieldset>
                </form>


 <div id="txtHint"> </div>

<a href='edit.php?id=" . $check . "'>Edit</a>
<?php

error_reporting(0);
$servername = "10.114.8.182";
$username = "root";
$password = "tiger";
$dbname = "rna_alarm_p_assam";
$datatable = "bcch_missing"; // MySQL table name
$results_per_page = 100; // number of results per page
 
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



//$sql_bsc = "select distinct BSCNAME from bcch_missing";
//$rs_result_bsc = $conn->query($sql_bsc);
//$rows = mysql_num_rows($rs_result_bsc);

if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
//$start_from = ($page-1) * $results_per_page;
//$sql = "SELECT * FROM ".$datatable." ORDER BY rowid ASC LIMIT $start_from, ".$results_per_page;
//$start_from = $page-1;
$sql = "SELECT * FROM ".$datatable."  where bscname = '".$page."'  ORDER BY rowid ASC";
$rs_result = $conn->query($sql);
 
echo "<table border='1' cellpadding='4'>
<tr>
    <td bgcolor='#CCCCCC'><strong>Status</strong></td>
    <td bgcolor='#CCCCCC'><strong>rowid</strong></td>
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
 echo "<form action='#' method='post'>";
 while($row = $rs_result->fetch_assoc()) {
 
            echo "<tr>";
			       echo "<td>" ."<input type='checkbox' name='check_list[".$row['rowid']."]' value=" . $row['rowid'] . ">". "</td>";
			      // echo "<td>" ."<a href='edit.php?id=" . $row['rowid'] . "'>Edit</a>". "</td>";
			       echo "<td>" . $row['rowid'] . "</td>";
                   echo "<td>" . $row['BSCNAME'] . "</td>";
                   echo "<td>" . $row['BCFNAME'] . "</td>";
                   echo "<td>" . $row['BCFNUMBER'] . "</td>";
                   echo "<td>" . $row['BTSNAME'] . "</td>";
                   echo "<td>" . $row['BTSNUMBER'] . "</td>";
				   
				    echo "<td>" . $row['ALARM_NUMBER'] . "</td>";
                   echo "<td>" . $row['TEXT1'] . "</td>";
                   echo "<td>" . $row['text2'] . "</td>";
                   echo "<td>" . $row['SUPPLEMENTARY_INFO'] . "</td>";
                   echo "<td>" . $row['USER_ADDITIONAL_INFO'] . "</td>";
                   echo "<td>" . $row['ACTUALALARMTIME'] . "</td>";
				    echo "<td>" . $row['ACTUALCANCELTIME'] . "</td>";
                   echo "<td>" . $row['APPALARMTIME'] . "</td>";
                   echo "<td>" . $row['APPCANCELTIME'] . "</td>";
  
                   echo "<td>" . $row['TOTALTIME'] . "</td>";
                   echo "<td>" . $row['OUTAGEDURATION'] . "</td>";
                   echo "<td>" . $row['notification_id'] . "</td>";
                   echo "<td>" . $row['TRX_ID'] . "</td>";
                   echo "<td>" . $row['CONSEC_NBR'] . "</td>";
  
  
  
  echo "</tr>";
}; 
echo "</form>";
if(!empty($_POST['check_list'])) 
{
    foreach($_POST['check_list'] as $check) 
	{
    echo $check; 
                         
    }
}


echo "</table>";

 ?> 
 
 
 
<?php 
$sql = "SELECT COUNT(distinct BSCNAME) AS total FROM ".$datatable;
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_pages = ceil($row["total"]); // calculate total pages with results
//$total_pages = ceil($row["total"] / $results_per_page); // calculate total pages with results
//echo "HELLO ".$total_pages;

 $array = array(); 
$sql_1 = "SELECT distinct BSCNAME FROM ".$datatable;
$result_1 = $conn->query($sql_1);
//$row_1 = $result_1->fetch_assoc();
 while($row_1 = $result_1->fetch_assoc()) 
 {
 
// echo $row_1['BSCNAME'];
 echo "<a href='index.php?page=".$row_1['BSCNAME']."'";
        if ($row_1['BSCNAME']==$page)  echo " class='curPage'";
 echo ">".$row_1['BSCNAME']."</a> ";
 
 }



//$array[] = $row_1;

 
// echo "HELLO ".$array[0]['BSCNAME'] ." <br> ";
// echo "HELLO ".$array[1]['BSCNAME'] ." <br> ";
// print_r($array);
 //echo "HELLO ".count($array)." <br> ";
  //for ($i=1; $i<=count($array) ; $i++) {  // print links for all pages
       //foreach($array as $ar)
            //echo "<a href='index.php?page=".$array[$i]['BSCNAME']."'";
            //if ($array[$i]['BSCNAME']==$page)  echo " class='curPage'";
            //echo ">".$array[$i]['BSCNAME']."</a> "; 
			
           // $val=$array[$i]['BSCNAME'];
			//echo $array[$i]['BSCNAME'];
			//echo $val;
			
			// original
			// for ($i=1; $i<=$total_pages; $i++) {  // print links for all pages
           // echo "<a href='index.php?page=".$i."'";
           // if ($i==$page)  echo " class='curPage'";
           // echo ">".$i."</a> "; 
//}; 
?> 

</div>
     
</body>
</html> 
