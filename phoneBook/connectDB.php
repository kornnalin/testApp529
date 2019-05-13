<?php

$dbuser = "u07580529";
$dbpass = "PwdDBIs07580529";
$dbhost = "localhost";
$dbname = "std_db07580529";

$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
	or die("Unable to connect to MySQL or database");
//echo "connected";
?>
