
<?php
$pageTitle = "Record Deletion Results";

$id =  $_GET['id'];

include 'dbVars.php';
include 'top.php';
$query =  "DELETE FROM $table WHERE id = $id";

// Perform a query, check for error
if (mysqli_query($dblink, $query) && $id)
  {
  		echo("<p>Record id $id has been deleted</p>");
  } else {
  		echo("<p class="/error/">ERROR: Query Failed</p>");
}

echo '<a href="index">Home</a>'; 


include 'bottom.php';


?>
