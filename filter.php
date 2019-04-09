<?php

include 'dbVars.php';

$columns = '*';
$select = "SELECT * FROM $table";

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
	if($i == 0){
		$where .= 'WHERE ';
	}
	$where .= " $colsToSearch[$i] LIKE '%" . $searchStrings[$i] . "%'";
	if($i < (sizeOf($colsToSearch)) - 1){
		$where .= " AND ";
	}
} 

$query = $select . ' ' . $where . ' ' . $orderBy;

$result = $dblink->query($query);

$dbdata = array();
while ($row = $result->fetch_assoc())  {
	$dbdata[]=$row;
}

echo json_encode($dbdata);



?>


