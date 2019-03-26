<?php

	include 'dbVars.php';
	$columns = '*';
	$orderBy = 'id'; 

	if ($_GET['orderby']) {
		$orderBy = $_GET['orderby']; 
	}

	$query = "SELECT $columns FROM $table ORDER BY $orderBy";
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


