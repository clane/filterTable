<?php

$pageTitle = "Manage Record";

include 'dbVars.php';
$getId = 1;

$pageTitle = 'Managing record id: ' . $getId;

$query =  "SELECT * FROM $table WHERE id = $getId";

/* Select queries return a resultset */
if ($result = mysqli_query($dblink, $query)) {


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

	include 'top.php';
	echo '<form>';
	for ($i = 0; $i < count($fieldValues); $i++) {
      echo '<div>';
	  echo '<label>';
	  echo $fieldNames[$i];
	  echo '</label>';
	  echo '<input type="text" ' . 'value="' . $fieldValues[$i] . '"' . '/>';
	  echo '</div>';
	}
	echo '</form>';

}  else {
  		echo("<p>Query Failed: " . $query . "</p>");
  		echo("<p>Error description: " . mysqli_error($dblink) . "</p>");
}

include 'bottom.php';

?>
