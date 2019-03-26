<?php

//echo "<pre>"; print_r($_POST) ;  echo "</pre>";

echo $_POST['id'];
echo $_POST['description'];
echo $_POST['title'];
echo $_POST['status'];
echo $_POST['priority'];

$description =  $_POST['description'];
$title =  $_POST['title'];
$status =  $_POST['status'];
$priority =  $_POST['priority'];

include 'dbVars.php';
$query =  "INSERT INTO $table (`id`, `description`, `title`, `status`, `priority`) VALUES (NULL, '$description', '$title', '$status', $priority)";
$result = $dblink->query($query);
echo $result;

?>


