<?php

include 'dbVars.php';

$columns = '*';
$select = "SELECT * FROM $table";

$colsToSearch = [];
$searchStrings = [];


$query = "SHOW COLUMNS FROM $table";

$result = $dblink->query($query);

$dbdata = array();
while ($row = $result->fetch_assoc())  {
	$dbdata[]=$row;

 echo $row['Field']."<br>";
}

echo json_encode($dbdata);



?>


