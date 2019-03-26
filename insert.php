<?php

	include 'dbVars.php';

		$query = "INSERT INTO `cards` (`id`, `description`, `title`, `status`, `priority`) VALUES (NULL, 'adadfa', 'tttt', 'afafga', '5')";
	 	$result = $dblink->query($query);
?>


