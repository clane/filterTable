<?php

include 'dbVars.php';

$query = "SELECT * FROM $table";
$result = $dblink->query($query);

//Initialize array variable
$dbdata = array();

//Fetch into associative array
while ( $row = $result->fetch_assoc())  {
	$dbdata[]=$row;
}

//Print array in JSON format
 echo json_encode($dbdata);
 
?>


