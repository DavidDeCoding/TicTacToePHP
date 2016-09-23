<?php
	
	include("lib/php/DB_CONNECT_SCRIPT.php");
	include("lib/php/PLAYGAME_SCRIPT.php");
	
	session_start();
	$game_id = $_SESSION["game_id"];
	
	
	
	$result = getResult($game_id);
	
	if($result == 1) {
		echo "Player 1 Wins. Go back to profile?<a href='TicTacToe2.php'>Yes</a>";
	}
	
	else if($result == 2) {
		echo "Player 2 Wins. Go back to profile?<a href='TicTacToe2.php'>Yes</a>";
	}
	
	else if($result == -1) {
		echo "Game Draw. Go back to profile?<a href='TicTacToe2.php'>Yes</a>";
	}
	
	
	