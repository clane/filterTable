<?php

include 'bdsVars.php';


$fieldToOrderby = 'id';
$orderByDirection = 'DESC';
//$query = "SELECT * FROM $table ORDER BY $fieldToOrderby $orderByDirection";
$query = "SELECT id FROM $table ORDER BY $fieldToOrderby $orderByDirection";
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


