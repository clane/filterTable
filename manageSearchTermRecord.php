<?php

$pageTitle = "Manage Record";

include 'dbVars.php';

$getId = $_GET['id'];;

$pageTitle = 'Manage search term record id: ' . $getId;

$query =  "SELECT * FROM $presetSearchTermsTable WHERE id = $getId";

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
    echo '<p>To update this record you can edit the fields in  the following form. To delete this record use the link at the bottom of the page.</p>';
	echo '<form action="updateSearchTermRecord.php" method="get">';
	echo '<input type="hidden" name="id" value="' . $getId . '"' . '/>'; 
	for ($i = 0; $i < count($fieldValues); $i++) {
	  echo '<div>';
	  if($fieldNames[$i] != 'id'){
		  echo '<label for="' . $fieldNames[$i] . '-input"'. '>';
		  echo $fieldNames[$i];
		  echo ':';
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

echo '<p><a href="searchTermRecordDeleteForm.php?id=' . $getId . '">Delete search term record ' . $getId . '</button></p>';

echo '<p><a href="searchTerms.html">Back to Search Term Home</button></p>';

include 'bottom.php';

?>
