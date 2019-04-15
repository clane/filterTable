<?php

include 'dbVars.php';

$table = 'presetSearchTerms';
$query = "SELECT * FROM $table";
$result = $dblink->query($query);
$dbdata = array();

//Fetch into associative array
while ( $row = $result->fetch_assoc())  {
		$dbdata[] = $row;
}

//Print array in JSON format
echo json_encode($dbdata);


?>


