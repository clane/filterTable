
<?php
$pageTitle = "Search Term Record Update Results";
include 'dbVars.php';
include 'top.php';

foreach ($_GET as $param_name => $param_val) {

		$column = $param_name;
		$value = $param_val;

	if($column == 'id'){
		$id = $value;
		echo '<p>Search term update succeeded!</p>';
		echo '<a href="./manageSearchTermRecord.php?id=' . $id . '">Back to search term record ' . $id . '</a>'; 
	} else {
		$query = "UPDATE $presetSearchTermsTable SET $column = '$value' WHERE id = $id";

		if (!$result = mysqli_query($dblink, $query)) {
			echo '<p class="error">Query failed!</p>';
		}

	} 
}


include 'bottom.php';


?>
