<?php
	
	include("lib/php/DB_CONNECT_SCRIPT.php");
	include("lib/php/SIGNIN_SCRIPT.php");
	
	session_start();
	$id = $_SESSION["id"];
	
	logoutUser($id);
	
	
?>
