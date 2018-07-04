<?php
 
$dsn = 'mysql:host=10.114.8.182;dbname=rna_alarm_p_assam';
$username = 'root';
$password = 'tiger';
$pdo = new PDO($dsn, $username, $password);
// Do we have a batch "marker" present ?
$i = !empty($_GET['pass']) ? (int) $_GET['pass'] : 0;
error_log("Processing pass $i");
// Connect to our db and query only 10 users.



$string = "SELECT BSCNAME, BCFNAME, New_Bcf_Name, BCFNUMBER, BTSNAME
        FROM final_celloutage_report_temp LIMIT $i,10" ;


$query = $pdo->prepare("$string");
$query->execute();
// This won't fill memory anymore.

$results = $query->fetchAll();
echo(results);
echo "<table table border='1'>

<tr>
<th>BSCNAME</th>
<th>BCFNAME</th>
<th>New_Bcf_Name</th>
<th>BCFNUMBER</th>
<th>BTSNAME</th>
</tr>";

if ($results->num_rows > 0) 
{
   
    while($row = $results->fetch_assoc()) 
	{
	 echo "<tr>";
 echo "<td>" . $row['BSCNAME'] . "</td>";
  echo "<td>" . $row['BCFNAME'] . "</td>";
   echo "<td>" . $row['New_Bcf_Name'] . "</td>";
  echo "<td>" . $row['BCFNUMBER'] . "</td>";
   echo "<td>" . $row['BTSNAME'] . "</td>";
   
  echo "</tr>";
      
    }
} 

else 
{
    echo "0 results";
}

// Nothing to do, we've finished.
if (!count($results)) {
  return;
}
foreach ($results as $result) {
  // Perform lengthy operation.
  sleep(1);
}
//Increment our marker.
$i++;
// Send request back to process next pass.
$redirect = $_SERVER['DOCUMENT_URI'] . '?pass=' . $i;
header("Location: $redirect");
exit();