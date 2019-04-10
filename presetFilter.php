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
//$searchTermsString = $_GET['searchTerms'];
$searchTermsString = 'test,aaa,bb';
$searchTermsArray = explode(",",$searchTermsString);
$orderBy = "ORDER BY $sortColumn $sortDirection";

//get the column names
while ($row = $result->fetch_assoc())  {
	$dbdata[]=$row;
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
}

//$selectQuery = "SELECT * FROM $table $where $orderBy";
$selectQuery = "SELECT * FROM $table $where";

echo $selectQuery;

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


