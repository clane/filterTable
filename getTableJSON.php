<?php

foreach($_POST as $key => $value) {
    if (strpos($key, 'substring_')>=0) {
        // value starts with substring_
                echo $key;
				echo ' ';
                echo $value;
    }
}

include 'dbVars.php';

if($_POST['id_descending_button'] == 'activated'){
	$columns = 'id';
	$orderByColumns = "id"; 
	$sortDirection = 'DESC';
} else {
	$columns = 'id';
	$orderByColumns = "id"; 
	$sortDirection = 'ASC';
} 

$query = "SELECT $columns FROM $table ORDER BY $orderByColumns $sortDirection";
$result = $dblink->query($query);

//Initialize array variable
$dbdata = array();

//Fetch into associative array
while ( $row = $result->fetch_assoc())  {
	$dbdata[]=$row;
}

//Print array in JSON format
 echo json_encode($dbdata);


 
?>


