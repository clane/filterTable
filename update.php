
<?php
$pageTitle = "Record Update Results";
include 'dbVars.php';
include 'top.php';

foreach ($_POST as $param_name => $param_val) {
    echo "Param: $param_name; Value: $param_val<br />\n";
}

include 'bottom.php';


?>
