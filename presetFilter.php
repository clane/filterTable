<?php

include 'dbVars.php';

$columns = '*';
$select = "SELECT * FROM $table";

$colsToSearch = [];
$searchStrings = [];

$query = "SHOW COLUMNS FROM $table";

$result = $dblink->query($query);

$dbdata = array();
while ($row = $result->fetch_assoc())  {
	$dbdata[]=$row;
	$fieldname = $row['Field'];
	if( $fieldname !== 'id') {
		array_push($colsToSearch, $fieldname); 
	}

}

for($i = 0; $i < sizeOf($colsToSearch); $i++){
	echo $colsToSearch[$i]; 
}



?>


