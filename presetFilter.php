<?php

include 'dbVars.php';

$colsToSearch = [];
$searchTerm = 'test';
$query = "SHOW COLUMNS FROM $table";
$where = 'WHERE ';
$result = $dblink->query($query);
$dbdata = array();
$sortColumn = $_GET['sortCol'];
$sortDirection = $_GET['sortDir'];
$searchTerms = $_GET['searchTerms'];
$orderBy = "ORDER BY $sortColumn $sortDirection";

//get the column names
while ($row = $result->fetch_assoc())  {
	$dbdata[]=$row;
	$fieldname = $row['Field'];
	if( $fieldname !== 'id') {
		array_push($colsToSearch, $fieldname); 
	}
}

for($i = 0; $i < sizeOf($searchTerms); $i++){
	//create the where clause
	for($j = 0; $j < sizeOf($colsToSearch); $j++){
		$where .= "$colsToSearch[$j] ";
		$where .= "LIKE '%" . $searchTerms[$i] . "%'"; 
		if($j < (sizeOf($colsToSearch) - 1))  {
			$where .= " OR ";
		} 
	}
}

$selectQuery = "SELECT * FROM $table $where $orderBy";

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


