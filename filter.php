<?php

	include 'dbVars.php';
	$columns = '*';

	$colToFilter = $_GET['colToFilter'];
	$searchString = $_GET['searchString'];

    $regEx = "'" . aa . "'";

	$colToFilter = 'description';

	$query = "SELECT $columns FROM $table WHERE $colToFilter REGEXP $regEx";
   
	echo $query;
 
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

