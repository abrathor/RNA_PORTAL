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

<style>

function edit_row(no)
{
 document.getElementById("edit_button"+no).style.display="none";
 document.getElementById("save_button"+no).style.display="block";
	
 var BSC_NAME=document.getElementById("BSCNAME"+no);
 var BCF_NAME=document.getElementById("BCFNAME"+no);
 var BCF_NBR=document.getElementById("BCFNUMBER"+no);
 var BTS_NAME=document.getElementById("BTSNAME"+no);
 var BTS_NBR=document.getElementById("BTSNUMBER"+no);
 var ALM_NBR=document.getElementById("ALARM_NUMBER"+no);
 
 var Txt_f=document.getElementById("TEXTf"+no);
 var txt_s=document.getElementById("texts"+no);
 var SP_INF=document.getElementById("SUP_INFO"+no);
 var US_INFO=document.getElementById("US_AD_INFO"+no); 
 var ACTUAL_ALM_TM=document.getElementById("ACTUALALARMTIME"+no);
 var ACTUAL_CACL_TM=document.getElementById("ACTUALCANCELTIME"+no);
 var APP_ALM_TIME=document.getElementById("APPALARMTIME"+no);
 var APP_CACL_TM=document.getElementById("APPCANCELTIME"+no);
 
 var TL_TM=document.getElementById("TOTALTIME"+no);
 var OUTG=document.getElementById("OUTAGEDURATION"+no);
 var notid=document.getElementById("not_id"+no);
 var TRXID=document.getElementById("TRX_ID"+no);
 var CONC_NBR=document.getElementById("CONSEC_NBR"+no);
 
 
	
 var BSC_NAME_data=BSC_NAME.innerHTML;
 var BCF_NAME_data=BCF_NAME.innerHTML;
 var BCF_NBR_data=BCF_NBR.innerHTML;
  var BTS_NAME_data=BTS_NAME.innerHTML;
 var BTS_NBR_data=BTS_NBR.innerHTML;
 var ALM_NBR_data=ALM_NBR.innerHTML;
 
 var Txt_f_data=Txt_f.innerHTML;
 var txt_s_data=txt_s.innerHTML;
 var SP_INF_data=SP_INF.innerHTML;
  var US_INFO_data=US_INFO.innerHTML;
 var ACTUAL_ALM_TM_data=ACTUAL_ALM_TM.innerHTML;
 var ACTUAL_CACL_TM_data=ACTUAL_CACL_TM.innerHTML;
  var APP_ALM_TIME_data=APP_ALM_TIME.innerHTML;
 var APP_CACL_TM_data=APP_CACL_TM.innerHTML;
 
  var TL_TM_data=TL_TM.innerHTML;
 var OUTG_data=OUTG.innerHTML;
 var notid_data=notid.innerHTML;
  var TRXID_data=TRXID.innerHTML;
 var CONC_NBR_data=CONC_NBR.innerHTML;

 
 BSC_NAME.innerHTML="<input type='text' id='BSCNAME"+no+"' value='"+BSC_NAME_data+"'>";
 BCF_NAME.innerHTML="<input type='text' id='BCFNAME"+no+"' value='"+BCF_NAME_data+"'>";
 BCF_NBR.innerHTML="<input type='text' id='BCFNUMBER"+no+"' value='"+BCF_NBR_data+"'>"; 
 BTS_NAME.innerHTML="<input type='text' id='BTSNAME"+no+"' value='"+BTS_NAME_data+"'>";
 BTS_NBR.innerHTML="<input type='text' id='BTSNUMBER"+no+"' value='"+BTS_NBR_data+"'>";
 ALM_NBR.innerHTML="<input type='text' id='ALARM_NUMBER"+no+"' value='"+ALM_NBR_data+"'>";
 
  Txt_f.innerHTML="<input type='text' id='TEXTf"+no+"' value='"+Txt_f_data+"'>";
 txt_s.innerHTML="<input type='text' id='texts"+no+"' value='"+txt_s_data+"'>";
 SP_INF.innerHTML="<input type='text' id='SUP_INFO"+no+"' value='"+SP_INF_data+"'>"; 
 US_INFO.innerHTML="<input type='text' id='US_AD_INFO"+no+"' value='"+US_INFO_data+"'>";
 ACTUAL_ALM_TM.innerHTML="<input type='text' id='ACTUALALARMTIME"+no+"' value='"+ACTUAL_ALM_TM_data+"'>";
 ACTUAL_CACL_TM.innerHTML="<input type='text' id='ACTUALCANCELTIME"+no+"' value='"+ACTUAL_CACL_TM_data+"'>";
  APP_ALM_TIME.innerHTML="<input type='text' id='APPALARMTIME"+no+"' value='"+APP_ALM_TIME_data+"'>";
 APP_CACL_TM.innerHTML="<input type='text' id='APPCANCELTIME"+no+"' value='"+APP_CACL_TM_data+"'>";
 
  TL_TM.innerHTML="<input type='text' id='TOTALTIME"+no+"' value='"+TL_TM_data+"'>";
 OUTG.innerHTML="<input type='text' id='OUTAGEDURATION"+no+"' value='"+OUTG_data+"'>";
 notid.innerHTML="<input type='text' id='not_id"+no+"' value='"+notid_data+"'>"; 
 TRXID.innerHTML="<input type='text' id='TRX_ID"+no+"' value='"+TRXID_data+"'>";
 CONC_NBR.innerHTML="<input type='text' id='CONSEC_NBR"+no+"' value='"+CONC_NBR_data+"'>";

 
 
 
}

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
  <div id="txtHint"> </div>
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
 
 while($row = $rs_result->fetch_assoc()) {
 
            echo "<tr id='row".$row['rowid']."'>";
			
            echo "<input type='button' id='edit_button".$row['rowid']."' value='Edit' class='edit' onclick='edit_row('".$row['rowid']."')'>";			
		    //echo "<td id='rbt".$row['rowid']."'>" ."<a href='edit.php?id=" . $row['rowid'] . "'>Edit</a>". "</td>";-->		   
		    echo "<td id='rd".$row['rowid']."> <input type='text' value=". $row['rowid'] ." readonly></td>" ;		   
		    echo "<td id='BSCNAME".$row['rowid']."> <input type='text' value=". $row['BSCNAME'] ." readonly></td>" ;
		    echo  "<td id='BCFNAME".$row['rowid']."> <input type='text' value=". $row['BCFNAME']." readonly></td>"; 
		    echo "<td id='BCFNUMBER".$row['rowid']."> <input type='text' value=". $row['BCFNUMBER']." readonly></td>" ;
		    echo "<td id='BTSNAME".$row['rowid']."> <input type='text' value=". $row['BTSNAME']." readonly></td>" ;
			echo "<td id='BTSNUMBER".$row['rowid']."> <input type='text' value=". $row['BTSNUMBER']." ></td>";

          echo "<td id='ALARM_NUMBER".$row['rowid']."> <input type='text' value=". $row['ALARM_NUMBER']." readonly></td>" ;
 echo"<td id='TEXTf".$row['rowid']."> <input type='text' value=". $row['TEXT1']." ></td>" ;
 echo"<td id='texts".$row['rowid']."> <input type='text' value=". $row['text2']." ></td> ";
 echo "<td id='SUP_INFO".$row['rowid']."> <input type='text' value=". $row['SUPPLEMENTARY_INFO']." readonly></td> ";
 echo "<td id='US_AD_INFO".$row['rowid']."> <input type=text' value=". $row['USER_ADDITIONAL_INFO']." readonly></td>" ;
 echo "<td id='ACTUALALARMTIME".$row['rowid']."> <input type='text' value=". $row['ACTUALALARMTIME']." readonly></td> ";
 echo"<td id='ACTUALCANCELTIME".$row['rowid']."> <input type='text' value=". $row['ACTUALCANCELTIME']." readonly></td>"; 
 echo "<td id='APPALARMTIME".$row['rowid']."> <input type='text' value=". $row['APPALARMTIME']." readonly></td> ";
 echo"<td id='APPCANCELTIME".$row['rowid']."> <input type='text' value=". $row['APPCANCELTIME']." readonly></td>";

echo"<td id='TOTALTIME".$row['rowid']."> <input type='text' value=". $row['TOTALTIME']." readonly></td>" ;
		echo "<td id='OUTAGEDURATION".$row['rowid']."> <input type='text' value=". $row['OUTAGEDURATION']." readonly></td> ";
		 echo "<td id='not_id".$row['rowid']."> <input type='text' value=". $row['notification_id']." readonly></td>" ;
		  echo "<td id='TRX_ID".$row['rowid']."> <input type='text' value=". $row['TRX_ID']." readonly></td> ";
		
			echo "<td id='CONSEC_NBR".$row['rowid']."> <input type='text' value=". $row['CONSEC_NBR']." readonly></td>" ;
  
  
  
  echo "</tr>";
}; 

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
 echo "<a href='index_edit.php?page=".$row_1['BSCNAME']."'";
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
