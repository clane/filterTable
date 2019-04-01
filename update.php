
<?php
$pageTitle = "Record Update Results";
include 'dbVars.php';
include 'top.php';

foreach ($_GET as $param_name => $param_val) {

		echo "Param: $param_name; Value: $param_val<br />\n";

		$column = $param_name;
		$value = $param_val;

	if($column == 'id'){
		$id = $value;
	} else {
		$query = "UPDATE $table SET $column = '$value' WHERE id = $id";
		echo '<div>' . $query . '</div>';

		if ($result = mysqli_query($dblink, $query)) {
			echo '<p>Query succeeded!</p>';
		} else {
			echo '<p>Query failed!</p>';
		}

	} 
}

include 'bottom.php';


?>
