<?php

$pageTitle = "Manage Record";

include 'dbVars.php';
include 'top.php';

$query =  "SELECT * FROM $table";

/* Select queries return a resultset */
if ($result = mysqli_query($dblink, $query)) {

    printf("Select returned %d rows.\n", mysqli_num_rows($result));

	$fieldValues = array();

	while ($row = mysqli_fetch_row($result)) {
		foreach ($row as $value) {
			array_push($fieldValues,$value);
		}

		for ($i = 0; $i < count($fieldValues); $i++) {
		  print $fieldValues[$i];
		}

	}
    /* free result set */
    mysqli_free_result($result);

}  else {
  		echo("<p>Query Failed: " . $query . "</p>");
  		echo("<p>Error description: " . mysqli_error($dblink) . "</p>");
}

include 'bottom.php';

?>
