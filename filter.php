<?php

include 'dbVars.php';
include 'top.php';

$title = "";
$columns = '*';
$select = "SELECT * FROM $table";
$where = "WHERE";
$query = $select + $where;

$colsToSearch = [];
$searchStrings = [];

foreach($_GET as $key => $value){
	if($key && $value) {
		array_push($colsToSearch, $key);
		array_push($searchStrings, $value);
	} else {
		echo "<p class=\"error\">Error: There is an error with the entry for $key</p>";
	}  
}

for ($x = 0; $x < sizeOf(colsToSearch); $x++) {
    echo "The number is: $x <br>";
} 


include 'bottom.php';


?>


