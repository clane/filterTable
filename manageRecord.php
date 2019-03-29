<?php

$pageTitle = "Manage Record";

include 'dbVars.php';
include 'top.php';

$query =  "SELECT * FROM $table";


/* Select queries return a resultset */
if ($result = mysqli_query($dblink, $query)) {
    printf("Select returned %d rows.\n", mysqli_num_rows($result));

	while ($row = mysqli_fetch_row($result)) {
		printf("%s\n", $row[0]);
		printf("%s\n", $row[1]);
		printf("%s\n", $row[2]);
		printf("%s\n", $row[3]);
		printf("%s\n", $row[4]);
     }

    /* free result set */
    mysqli_free_result($result);

}  else {
  		echo("<p>Query Failed: " . $query . "</p>");
  		echo("<p>Error description: " . mysqli_error($dblink) . "</p>");
}

include 'bottom.php';

?>
