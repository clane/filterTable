<?php

$pageTitle = "Search Term Record Creation Results";

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

	$query =  "INSERT INTO $presetSearchTermsTable (";
	$query .= $colNamesString . ')';
	$query .=  ' VALUES (';
	$query .= $colValuesString . ')';

	if ($result = mysqli_query($dblink, $query)) {
        echo '<p>A new record has been created</p>';
    } else {
        echo '<p class="error">The attempt to add a new record has failed</p>';
	} 


} else {

	foreach ($emptyColNames as &$emptyColName) {
		echo '<p class="error">Error: The entry for column ' . '"'. $emptyColName . '"' . ' is empty</p>';
	}

}

echo '<p><a href="searchTermEntryForm.html">Back to Record Entry Form</a></p>'; 
echo '<p><a href="searchTerms.html">Search Terms Home</a></p>';

include 'bottom.php';


?>
