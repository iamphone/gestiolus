<?php
// persolizza i tuoi parametri
$title = "_TITLE_";
$hostname = "_HOST_";
$username = "_USER_";
$password = "_PASSWORD_";
$database = "_DBNAME_";

// non toccare niente qua sotto

$link = mysql_connect($hostname, $username, $password);
mysql_select_db($database);
?>
