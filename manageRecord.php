<?php

$pageTitle = "Manage Record";

include 'dbVars.php';

$getId = $_GET['id'];;

$pageTitle = 'Manage record id: ' . $getId;

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
	echo '<form action="update.php" method="get">';
	echo '<input type="hidden" name="id" value="' . $getId . '"' . '/>'; 
	for ($i = 0; $i < count($fieldValues); $i++) {
	  echo '<div>';
	  if($fieldNames[$i] != 'id'){
		  echo '<label for="' . $fieldNames[$i] . '-input"'. '>';
		  echo $fieldNames[$i];
		  echo '</label>';
		  echo '<input type="text" ' . 'name="' . $fieldNames[$i] . '" '.  'id="' . $fieldNames[$i] . '-input"' . 'value="' . $fieldValues[$i] . '"' . '/>';
	  } 
	  echo '</div>';
	}

	echo '<div>';
	echo '<input type="submit" value="Update" />';
	echo '</div>';
	echo '</form>';

}  else {
  		echo("<p>Query Failed: " . $query . "</p>");
  		echo("<p>Error description: " . mysqli_error($dblink) . "</p>");
}

echo '<a href="index.html" id="homeButton">Back to Home</button>';

include 'bottom.php';

?>
