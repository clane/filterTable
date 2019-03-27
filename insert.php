<?php

$description =  $_POST['description'];
$title =  $_POST['title'];
$status =  $_POST['status'];
$priority =  $_POST['priority'];

include 'dbVars.php';
$query =  "INSERT INTO $table (`id`, `description`, `title`, `status`, `priority`) VALUES (NULL, '$description', '$title', '$status', $priority)";
$result = $dblink->query($query);

echo '<a style="display:block; font-size:3rem; margin:20px 20px;" href="http://www.chrislane.info/examples/filterTable/">Back to form</a>'; 

?>


