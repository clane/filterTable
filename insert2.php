<?php

$pageTitle = "Record Creation Results";

include 'dbVars.php';
include 'top.php';

$colNames = [];
$colValues = [];
$colNamesString;
$emptyColNames = [];

foreach ($_GET as $colName => $colValue) {
	if( empty($colValue) ){
		array_push($emptyColNames,$colName);
	} else {
		array_push($colNames,$colName);
		array_push($colValues,'"' . $colValue . '"');
	} 
}

$colNamesString = implode(',',$colNames); 
$colValuesString = implode(',',$colValues); 

$emptyArgsCnt = sizeOf($emptyColNames);

if($emptyArgsCnt === 0){

	$query =  "INSERT INTO $table (";
	$query .= $colNamesString . ')';
	$query .=  ' VALUES (';
	$query .= $colValuesString . ')';
	echo $query;

	if ($result = mysqli_query($dblink, $query)) {
        echo '<p>Query succeeded!</p>';
    } else {
        echo '<p class="error">Query failed!</p>';
	} 


} else {

	foreach ($emptyColNames as &$emptyColName) {
		echo '<p class="error">Error: The entry for column ' . '"'. $emptyColName . '"' . ' is empty</p>';
	}

}


include 'bottom.php';


?>
