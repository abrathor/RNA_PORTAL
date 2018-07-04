<?php
$servername = "10.114.8.182";
$username = "root";
$password = "tiger";
$dbname = "rna_alarm_p_assam";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT BSCNAME, BCFNAME, New_Bcf_Name, BCFNUMBER, BTSNAME, BTSNUMBER, ALARM_NUMBER, TEXT1,
        text2, SUPPLEMENTARY_INFO, USER_ADDITIONAL_INFO, ACTUALALARMTIME, ACTUALCANCELTIME,
        APPALARMTIME, APPCANCELTIME, TOTALTIME, OUTAGEDURATION, RNA_AVAIL, cell_type, city,
        Category, CONSEC_NBR, cat, remark, tkt_nbr, domain
        FROM final_celloutage_report_temp" ;
		
		
// $sql = "SELECT cell_type, cnt FROM cell_list";
$result = $conn->query($sql);
echo "<table table border='1'>

<tr>
<th>BSCNAME</th>
<th>BCFNAME</th>
<th>New_Bcf_Name</th>
<th>BCFNUMBER</th>
<th>BTSNAME</th>
<th>BTSNUMBER</th>
<th>ALARM_NUMBER</th>
<th>TEXT1</th>
<th>text2</th>
<th>SUPPLEMENTARY_INFO</th>
<th>USER_ADDITIONAL_INFO</th>
<th>ACTUALALARMTIME</th>
<th>ACTUALCANCELTIME</th>
<th>APPALARMTIME</th>
<th>APPCANCELTIME</th>
<th>TOTALTIME</th>
<th>OUTAGEDURATION</th>
<th>RNA_AVAIL</th>
<th>cell_type</th>
<th>city</th>
<th>Category</th>
<th>CONSEC_NBR</th>
<th>cat</th>
<th>remark</th>
<th>tkt_nbr</th>
<th>domain</th>
</tr>";
if ($result->num_rows > 0) 
{
   
    while($row = $result->fetch_assoc()) 
	{
	 echo "<tr>";
 echo "<td>" . $row['BSCNAME'] . "</td>";
  echo "<td>" . $row['BCFNAME'] . "</td>";
   echo "<td>" . $row['New_Bcf_Name'] . "</td>";
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
  echo "<td>" . $row['RNA_AVAIL'] . "</td>";
   echo "<td>" . $row['cell_type'] . "</td>";
  echo "<td>" . $row['city'] . "</td>";
   echo "<td>" . $row['Category'] . "</td>";
  echo "<td>" . $row['CONSEC_NBR'] . "</td>";
   echo "<td>" . $row['cat'] . "</td>";
  echo "<td>" . $row['remark'] . "</td>";
   echo "<td>" . $row['tkt_nbr'] . "</td>";
  echo "<td>" . $row['domain'] . "</td>";

  echo "</tr>";
       // echo " <br> CELL: ". $row["cell_type"]. " " . $row["cnt"] . "<br>";
    }
} 
else 
{
    echo "0 results";
}

echo "</table>";

$conn->close();
?>