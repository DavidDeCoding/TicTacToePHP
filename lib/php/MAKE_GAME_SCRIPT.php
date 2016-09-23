<?php
	function makeGame($player1, $player2) {
		
		$query = "INSERT INTO game_data SET player1_id='$player1', player2_id='$player2'";
		mysql_query($query) or die("Error: ". mysql_error());
		
		$query = "UPDATE user_data SET is_playing=1 WHERE user_id='$player1' OR user_id='$player2'";
		mysql_query($query) or die("Error: ".mysql_error());
		
		$query = "SELECT game_id FROM game_data WHERE player1_id='$player1' AND player2_id='$player2' AND game_result=0";
		$result = mysql_query($query) or die("Error: ".mysql_error());
		
		$row = mysql_fetch_array($result);
		
		return $row[0];
		
	}
	
	function getGame($game_id) {
		
		$query = "SELECT * FROM game_data WHERE game_id='$game_id'";
		$result = mysql_query($query) or die("Error: ".mysql_error());
		
		$row = mysql_fetch_array($result);
		
		return $row;
	}
	
	function destroyGame($player1, $player2=null) {
		$query = "UPDATE user_data SET is_playing=0 WHERE user_id='$player1' OR user_id='$player2'";
		mysql_query($query) or die("Error: ".mysql_error());
	}
	
?>