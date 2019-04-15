<?php

include 'dbVars.php';
$category = $_GET['category'];
$table = 'presetSearchTerms';
$query = "SELECT searchTerm FROM $table WHERE category = \"$category\"";
$result = $dblink->query($query);
$dbdata = array();

//Fetch into associative array
while ( $row = $result->fetch_assoc())  {
		$dbdata[] = $row;
}

//Print array in JSON format
echo json_encode($dbdata);


?>


