
<?php
	include 'dbVars.php';
	$columns = '*';
	$query = "SELECT $columns FROM $presetSearchTermsTable  ORDER BY id DESC";
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

