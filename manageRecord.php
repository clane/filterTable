<?php
$pageTitle = "Manage Record";

$id =  $_POST['id'];

include 'dbVars.php';
include 'top.php';
$query =  "SELECT * FROM $table where 'id' == $id";

if($id){
	$result = $dblink->query($query);
} else {
	$result = 0; 
}

if($result == 1){
	echo '<p style="font-size:3rem;margin:20px;">' . 'Success' . '</p>';
} else {
	echo '<p style="font-size:2rem;color:red;margin:20px auto;">1 or more errors have occured</p>';
}

echo '<a style="display:block; font-size:3rem; margin:20px;" href="http://www.chrislane.info/examples/filterTable/">Back to form</a>'; 

include 'bottom.php';


?>
