<?php
	$host = "mysql10.000webhost.com";
	$username = "a4079955_dde";
	$password = "fpassworde";
	$database = "a4079955_tictac";
	$connect = mysql_connect($host, $username, $password) or die("Error while connecting to local server");
	mysql_select_db($database, $connect) or die("Error connecting to database");
?>
	