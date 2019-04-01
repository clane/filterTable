
<?php
$pageTitle = "Record Update Results";
include 'dbVars.php';
include 'top.php';

foreach ($_GET as $param_name => $param_val) {

		$column = $param_name;
		$value = $param_val;

	if($column == 'id'){
		$id = $value;
		echo '<p>Update succeeded!</p>';
		echo '<a href="./manageRecord.php?id=' . $id . '">Back to form</a>'; 
	} else {
		$query = "UPDATE $table SET $column = '$value' WHERE id = $id";

		if (!$result = mysqli_query($dblink, $query)) {
			echo '<p>Query failed!</p>';
		}

	} 
}


include 'bottom.php';


?>
