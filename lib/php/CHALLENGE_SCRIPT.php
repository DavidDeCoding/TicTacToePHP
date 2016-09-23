<?php
	function makeGameAndGetId($user_id, $challenged_id) {
		$query = "INSERT INTO game_data SET player1_id='$user_id',player2_id='$challenged_id'";
		mysql_query($query) or die("Error: " . mysql_error());
		
		$query = "SELECT game_id FROM game_data WHERE player1_id='$user_id' AND player2_id='$challenged_id' AND game_result=0";
		$result = mysql_query($query) or die("Error: ". mysql_error());
		$row = mysql_fetch_array($result);
		return $row[0];
		
		
	}
	
	function getGameIdFromUserId($user_id) {
		$query = "SELECT game_id FROM game_data WHERE player2_id='$user_id' AND game_result=0";
		$result = mysql_query($query) or die("Error: " . mysql_error());
		
		$row = mysql_fetch_array($result);
		return $row[0];
	}
	
	
	function getChallengerIdByGameId($game_id) {
		$query = "SELECT player1_id FROM game_data WHERE game_id='$game_id'";
		$result = mysql_query($query) or die("Error: ".mysql_error());
		$row = mysql_fetch_array($result);
		return $row[0];
	}
	
	
	
	
	
	
	
	
?>