<?php

include 'dbVars.php';

$colsToSearch = [];
$query = "SHOW COLUMNS FROM $table";
$where = 'WHERE ';
$result = $dblink->query($query);
$dbdata1 = array();
$dbdata2 = array();
$sortColumn = $_GET['sortCol'];
$sortDirection = $_GET['sortDir'];
$searchTermsString = $_GET['searchTerms'];
$searchTermsArray = explode(",",$searchTermsString);
$orderBy = "ORDER BY $sortColumn $sortDirection";

//get the column names
while ($row = $result->fetch_assoc())  {
	$dbdata1[]=$row;
	$fieldname = $row['Field'];
	if( $fieldname !== 'id') {
		array_push($colsToSearch, $fieldname); 
	}
}

$numSearchTerms = sizeOf($searchTermsArray);
$numCols = sizeOf($colsToSearch);

for($i = 0; $i < $numSearchTerms; $i++){
	//create the where clause
	for($j = 0; $j < $numCols; $j++){
		$where .= "$colsToSearch[$j] ";
		$where .= "LIKE '%" . $searchTermsArray[$i] . "%'"; 
		if($j < ($numCols - 1) ) {
		  $where .= " OR ";
		}
	}
	if($i < ($numSearchTerms - 1)){
	  $where .= " OR ";
	} 
}


$selectQuery = "SELECT * FROM $table $where $orderBy";


$selectResult = $dblink->query($selectQuery);


//Fetch into associative array
while ( $row2 = $selectResult->fetch_assoc())  {
		$dbdata2[]=$row2;
}

//Print array in JSON format
echo json_encode($dbdata2);


?>


