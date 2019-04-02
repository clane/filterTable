
<?php
$pageTitle = "Record Deletion Results";

$id =  $_GET['id'];

include 'dbVars.php';
include 'top.php';
$query =  "DELETE FROM $table WHERE id = $id";

// Perform a query, check for error
if (mysqli_query($dblink, $query) && $id)
  {
  		echo("<p>Query Succeeded</p>");
  } else {
  		echo("<p>ERROR: Query Failed</p>");
}

echo '<a href="http://www.chrislane.info/examples/filterTable/">Back to table</a>'; 

include 'bottom.php';


?>
