<?php

//echo "<pre>"; print_r($_POST) ;  echo "</pre>";

echo $_POST['id'];
echo $_POST['description'];
echo $_POST['title'];
echo $_POST['status'];
echo $_POST['priority'];

$description =  $_POST['description'];
include 'dbVars.php';
$query =  "INSERT INTO $table (`id`, `description`, `title`, `status`, `priority`) VALUES (NULL, '$description', 'test', 'test', 5)";
$result = $dblink->query($query);
echo $result;

?>


