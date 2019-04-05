<?php

include 'dbVars.php';
include 'top.php';

$title = "";
$columns = '*';
$select = "SELECT * FROM $table";
$where = "WHERE";
$query = $select . $where;

$colsToSearch = [];
$searchStrings = [];

$sortColumn = $_GET['filter_sort_column'];
$sortDirection = $_GET['filter_sort_direction'];
$orderBy = "ORDER BY $sortColumn $sortDirection";

foreach($_GET as $key => $value){
 	if($key && $value) {
		if($key != 'filter_sort_column' && $key != 'filter_sort_direction'){
			array_push($colsToSearch, $key);
			array_push($searchStrings, $value);
		}
	} 
}

for ($i = 0; $i < sizeOf($colsToSearch); $i++) {
	$where .=  " $colsToSearch[$i] =  $searchStrings[$i]"; 
	echo $where;
} 


include 'bottom.php';


?>


