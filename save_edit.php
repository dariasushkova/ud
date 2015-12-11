<?php
require("bd.php");
mysql_query("SET NAMES 'utf8'");
$days = $_POST['days'];
$up = "UPDATE tasks SET days='$days'";
mysql_query($up); 
?>