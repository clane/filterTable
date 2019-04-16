
<?php
$pageTitle = "Search Term Record Deletion Results";

$id =  $_GET['id'];

include 'dbVars.php';
include 'top.php';
$query =  "DELETE FROM $presetSearchTermsTable WHERE id = $id";

// Perform a query, check for error
if (mysqli_query($dblink, $query) && $id)
  {
  		echo("<p>Search Term Record id $id has been deleted</p>");
  } else {
  		echo("<p class="/error/">ERROR: Query Failed</p>");
}

echo '<a href="searchTerms.html">Search Terms Home</a>'; 


include 'bottom.php';


?>
