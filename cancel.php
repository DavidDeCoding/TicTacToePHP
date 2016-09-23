<?php
	include("lib/php/DB_CONNECT_SCRIPT.php");
	include("lib/php/CANCEL_GAME_SCRIPT.php");
	include("lib/php/MAKE_GAME_SCRIPT.php");
	include("lib/php/PLAYGAME_SCRIPT.php");
	
	session_start();
	
	$game_id = $_SESSION["game_id"];
	$player_id = $_SESSION["id"];
	
	$game_data = getGame($game_id);
	
	if($player_id == $game_data["player1_id"]) {
		cancel($game_id, 1);
		$id = $game_data["player2_id"];
		increScore($id);
	}
	else {
		cancel($game_id, 2);
		$id = $game_data["player1_id"];
		increScore($id);
	}
	
	
	
?>