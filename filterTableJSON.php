<?php

#database vars
$dbhost = 'localhost';
$dbuser = 'clane359';
$dbpass = 'FnAlt0169';
$dbname = 'clane_BDS';
$table = 'gigs';

//Create database connection
$dblink = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

//Check connection was successful
if ($dblink->connect_errno) {
   printf("Failed to connect to database");
   exit();
}

$fieldToOrderby = 'id';
$orderByDirection = 'DESC';
//$query = "SELECT * FROM $table ORDER BY $fieldToOrderby $orderByDirection";
$query = "SELECT id FROM $table ORDER BY $fieldToOrderby $orderByDirection";
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


