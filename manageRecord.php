<?php

$pageTitle = "Manage Record";

include 'dbVars.php';
include 'top.php';

$query =  "SELECT * FROM $table";

/* Select queries return a resultset */
if ($result = mysqli_query($dblink, $query)) {

    echo '<p>Query returned '. mysqli_num_rows($result) . ' rows</p>';

	$fieldValues = array();
	$fieldNames = array();

	/* Get field information for all columns */
	$fieldInfo = $result->fetch_fields();

	foreach ($fieldInfo as $fieldInfoValues) {
		array_push($fieldNames,$fieldInfoValues->name);
	}

	while ($row = mysqli_fetch_row($result)) {
		foreach ($row as $value) {
			array_push($fieldValues,$value);
		}


	}
    /* free result set */
    mysqli_free_result($result);

	echo '<table>';

    /* print table headers */
	echo '<tr>';
	for ($i = 0; $i < count($fieldValues); $i++) {
	  echo '<th>';
	  echo $fieldNames[$i];
	  echo '</th>';
	}
	echo '</tr>';
	echo '<table>';

}  else {
  		echo("<p>Query Failed: " . $query . "</p>");
  		echo("<p>Error description: " . mysqli_error($dblink) . "</p>");
}

include 'bottom.php';

?>
