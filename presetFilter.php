<?php

include 'dbVars.php';

$colsToSearch = [];
$searchTerm = 'test';
$query = "SHOW COLUMNS FROM $table";
$where = 'WHERE ';
$result = $dblink->query($query);
$dbdata = array();

$sortColumn = $_GET['filter_sort_column'];
$sortDirection = $_GET['filter_sort_direction'];
$orderBy = "ORDER BY $sortColumn $sortDirection";

//<input type="checkbox" name="presetSearchTerm_0" value="test">

//get the search strings
foreach($_GET as $key => $value){
    if($key && $value) {
        if($key != 'filter_sort_column' && $key != 'filter_sort_direction'){
            array_push($colsToSearch, $key);
            array_push($searchStrings, $value);
        }
    }
}


//get the column names
while ($row = $result->fetch_assoc())  {
	$dbdata[]=$row;
	$fieldname = $row['Field'];
	if( $fieldname !== 'id') {
		array_push($colsToSearch, $fieldname); 
	}
}

//create the where clause
for($i = 0; $i < sizeOf($colsToSearch); $i++){
	$where .= "$colsToSearch[$i] ";
	$where .= "LIKE '%" . $searchTerm . "%'"; 
	if($i < (sizeOf($colsToSearch) - 1))  {
		$where .= " OR ";
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


