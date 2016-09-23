<?php
	include("lib/php/DB_CONNECT_SCRIPT.php");
	include("lib/php/REJECT_SCRIPT.php");
	include("lib/php/CHALLENGE_SCRIPT.php");
	
	session_start();
	$id = $_SESSION["id"];
	$mode = $_GET["mode"];
	
	if($mode == 1) {
		$game_id = getGameIdFromUserId($id);
	
		$challenger_id = getChallengerIdByGameId($game_id);
	
		rejectGame($game_id, $id, $challenger_id);
		echo "Challenge rejected.";
	}
	
	else {
		echo "Game Rejected. Click <a href='TicTacToe2.php'>Profile</a> to get back.";
	}
?>