<?php

include 'dbVars.php';
$columns = '*';
$orderByColumns = "id"; 
$sortDirection = 'ASC';

if($_GET['buttonName'] === 'id_descending_button') { 
$sortDirection = 'DESC';
}


$query = "SELECT $columns FROM $table ORDER BY $orderByColumns $sortDirection";
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


