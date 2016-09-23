<?php
	
	
	
	
	
	function cancel($game_id, $player) {
		
		$query = "SELECT * FROM game_data WHERE game_id='$game_id'";
		$result = mysql_query($query) or die("Error: ".mysql_error());
		
		$row = mysql_fetch_array($result);
		
		if($player == 1) {
			$query = "UPDATE game_data SET game_result=2 WHERE game_id='$game_id' AND game_result=0";
		} else {
			$query = "UPDATE game_data SET game_result=1 WHERE game_id='$game_id' AND game_result=0";
		}
		mysql_query($query) or die("Error: ".mysql_error());
		
		$player1 = $row["player1_id"];
		$player2 = $row["player2_id"];
		
		$query = "UPDATE user_data SET is_playing=0 WHERE user_id='$player1' OR user_id='$player2'";
		mysql_query($query) or die("Error: ".mysql_error());
	}
	
	
	
		