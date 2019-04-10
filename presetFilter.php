<?php

include 'dbVars.php';

$colsToSearch = [];
$searchTerm = 'aaaaaa';
$query = "SHOW COLUMNS FROM $table";
$where = 'WHERE ';
$result = $dblink->query($query);
$dbdata = array();

while ($row = $result->fetch_assoc())  {
	$dbdata[]=$row;
	$fieldname = $row['Field'];
	if( $fieldname !== 'id') {
		array_push($colsToSearch, $fieldname); 
	}
}

for($i = 0; $i < sizeOf($colsToSearch); $i++){
	$where .= "$colsToSearch[$i]=\"$searchTerm\"";
	if($i < (sizeOf($colsToSearch) - 1))  {
		$where .= " OR ";
	} 
}

$selectQuery = "SELECT * FROM $table $where";

$selectResult = $dblink->query($selectQuery);

//Initialize array variable
$dbdata = array();

//Fetch into associative array
while ( $row = $selectResult->fetch_assoc())  {
		$dbdata[]=$row;
}

//Print array in JSON format
 echo json_encode($dbdata);


?>


