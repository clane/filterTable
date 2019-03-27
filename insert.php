<?php

$description =  $_POST['description'];
$title =  $_POST['title'];
$status =  $_POST['status'];
$priority =  $_POST['priority'];

include 'dbVars.php';
$query =  "INSERT INTO $table (`id`, `description`, `title`, `status`, `priority`) VALUES (NULL, '$description', '$title', '$status', $priority)";

if($description && $title && $status && $priority){
	$result = $dblink->query($query);
} else {
	$result = 0; 
}

if($result == 1){
	echo '<p style="font-size:3rem;margin:20px;">' . 'Success' . '</p>';
} else {
	echo '<p style="font-size:2rem;color:red;margin:20px auto;">1 or more errors have occured</p>';
}
if(!$description){
	echo '<p style="font-size:2rem;color:red;margin:10px">Error: missing description</p>';
}
if(!$title){
	echo '<p style="font-size:2rem;color:red;margin:10px">Error: missing title</p>';
}
if(!$status){
	echo '<p style="font-size:2rem;color:red;margin:10px">Error: missing status</p>';
}

echo '<a style="display:block; font-size:3rem; margin:20px;" href="http://www.chrislane.info/examples/filterTable/">Back to form</a>'; 

?>


