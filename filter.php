<?php

include 'top.php';

foreach($_GET as $key => $value){
	echo $key . " : " . $value . "<br />";
}

include 'bottom.php';


?>


