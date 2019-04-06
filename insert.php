<?php

$pageTitle = "Record Creation Results";
$description =  $_GET['description'];
$title =  $_GET['title'];
$status =  $_GET['status'];
$priority =  $_GET['priority'];

include 'dbVars.php';
include 'top.php';
$id = 'NULL';
$query =  "INSERT INTO $table (id, description, title, status, priority) VALUES ('".$id."', '".$description."','".$title."','".$status."','".$priority."')";

if (empty($description) || empty($title) || empty($status) || empty($priority)){
	echo("<p class=\"error\">Error: There one or more blank entries</p>");

	if(empty($description)){
		echo("<p class=\"error\">Error: description field</p>");
	}	

	if(empty($title)){
		echo("<p class=\"error\">Error: title field</p>");
	}	

	if(empty($status)){
		echo("<p class=\"error\">Error: status field</p>");
	}	

	if(empty($priority)){
		echo("<p class=\"error\">Error: priority field</p>");
	}	

} else {
	if (mysqli_query($dblink, $query)){
	  		echo("<p>Query Succeeded</p>");
	  } else {
			echo("<p class="/error/">ERROR: Query Failed</p>");
	}
}

echo '<p><a href="http://www.chrislane.info/examples/filterTable/">Back to Record Entry Form</a></p>'; 

include 'bottom.php';


?>
