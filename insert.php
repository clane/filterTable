<?php
$pageTitle = "Record Creation Results";

$description =  $_POST['description'];
$title =  $_POST['title'];
$status =  $_POST['status'];
$priority =  $_POST['priority'];

include 'dbVars.php';
include 'top.php';
$id = 'NULL';
$query =  "INSERT INTO $table (id, description, title, status, priority) VALUES ('".$id."', '".$description."','".$title."','".$status."','".$priority."')";

// Perform a query, check for error
if (mysqli_query($dblink, $query))
  {
  echo("Query Succeeded: " . $query);
  } else {
  		echo("<p>Query Failed: " . $query . "</p>");
  		echo("<p>Error description: " . mysqli_error($dblink) . "</p>");

}

echo '<a style="display:block; font-size:3rem; margin:20px;" href="http://www.chrislane.info/examples/filterTable/">Back to form</a>'; 

include 'bottom.php';


?>
