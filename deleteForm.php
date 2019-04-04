<?php

include 'dbVars.php';

$getId = $_GET['id'];;

$pageTitle = 'Delete record id: ' . $getId;

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
	echo '<h2>Are you sure you want to delete this record?</h2>';
	echo '<form action="delete.php" method="get">';
	echo '<input type="hidden" name="id" value="' . $getId . '"' . '/>'; 
	for ($i = 0; $i < count($fieldValues); $i++) {
	  if($fieldNames[$i] != 'id'){
	      echo '<div>';
	      echo '<span class="fieldNames">';
		  echo $fieldNames[$i];
	      echo ': ';
	  	  echo '</span>';
		  echo $fieldValues[$i];
	  	  echo '</div>';
	  } 
	}

	echo '<div>';
	echo '<input type="submit" value="Delete" />';
	echo '</div>';
	echo '</form>';

}  else {
  		echo("<p>Query Failed: " . $query . "</p>");
  		echo("<p>Error description: " . mysqli_error($dblink) . "</p>");
}


echo '<p><a href="manageRecord.php?id=' . $getId . '">Back' . '</a></p>';

include 'bottom.php';

?>
