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
	echo '<p style="font-size:3rem;color:red;margin:20px">Error</p>';
}

echo '<a style="display:block; font-size:3rem; margin:20px;" href="http://www.chrislane.info/examples/filterTable/">Back to form</a>'; 

?>


