<?php

$dbuser = "u07580529";
$dbpass = "PwdDBIs07580529";
$dbhost = "localhost";
$dbname = "std_db07580529";
// mysqli_query("SET NAMES UTF8");
$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
	or die("Unable to connect to MySQL or database");
//echo "connected";
mysqli_set_charset($connect, "utf8");
?>
