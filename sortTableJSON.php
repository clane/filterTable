<?php

foreach($_POST as $key => $value) {
    if (strpos($key, 'substring_')>=0) {
        // value starts with substring_
		echo $key;
		echo $value;
    }
}


?>


