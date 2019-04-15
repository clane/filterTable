<?php

include 'dbVars.php';

$colsToSearch = [];
$query = "SHOW COLUMNS FROM $table";
$result = $dblink->query($query);
$dbColumnData = array();
$dbdata = array();
$searchTermsString = $_GET['searchTerms'];
$searchTermsArray = explode(",",$searchTermsString);
$selectQuery = "SELECT * FROM $table";


if(!empty($searchTermsString)){
	$where = ' WHERE ';
	//get the column names
	while ($row = $result->fetch_assoc())  {
		$dbColumnData[] = $row;
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

	$selectQuery .= " $where";
}
//END where clause 

//BEGIN order by clause
if( isset($_GET['sortCol']) &&  isset($_GET['sortCol']) ) {
	$sortColumn = $_GET['sortCol'];
	$sortDirection = $_GET['sortDir'];
	$orderBy = "ORDER BY $sortColumn $sortDirection";
}
$selectQuery .= " $orderBy";
//END order by clause

$selectResult = $dblink->query($selectQuery);

//Fetch into associative array
while ( $row = $selectResult->fetch_assoc())  {
		$dbdata[] = $row;
}

//Print array in JSON format
echo json_encode($dbdata);


?>


