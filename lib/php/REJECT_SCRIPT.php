<?php
	function rejectGame($game_id, $user_id, $challenger_id) {
		$query = "UPDATE game_data SET game_result=-1 WHERE game_id='$game_id'";
		mysql_query($query) or die("Error: ".mysql_error());
	
		$query = "UPDATE user_data SET is_playing=0 WHERE user_id='$user_id' OR user_id='$challenger_id'";
		mysql_query($query) or die("Error: ".mysql_error());
	}
?>