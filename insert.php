
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

// Perform a query, check for error
if (mysqli_query($dblink, $query) && $description && $title && $status && $priority)
  {
  echo("<p>Query Succeeded</p>");
  } else {
  		echo("<p>ERROR: Query Failed</p>");
}

echo '<a style="display:block; font-size:3rem; margin:20px;" href="http://www.chrislane.info/examples/filterTable/">Back to form</a>'; 

include 'bottom.php';


?>
