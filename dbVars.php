<?php

#database vars
$dbhost = 'localhost';
$dbuser = 'clane359';
$dbpass = 'FnAlt0169';
$dbname = 'clane_BDS';
$table = 'gigs';

//Create database connection
$dblink = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

//Check connection was successful
if ($dblink->connect_errno) {
   printf("Failed to connect to database");
   exit();
}

?>


