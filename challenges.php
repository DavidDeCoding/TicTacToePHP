<?php
	include("lib/php/DB_CONNECT_SCRIPT.php");
	include("lib/php/CHALLENGE_SCRIPT.php");
	include("lib/php/PROFILE_SCRIPT.php");
	session_start();
	if(!isset($_SESSION["id"])) {
		echo "No session id";
	} else {
	
		$id = $_SESSION["id"];
		
		
		$game_id = getGameIdFromUserId($id);
		if($game_id !== null) {
			$challenger_id = getChallengerIdByGameId($game_id, $id);
			
			
			$challenger_profile = getProfile($challenger_id);
			
			echo "<div>$challenger_profile[1] challenged you : <a href=GAME.php?mode=1&challenger_id=$challenger_profile[0]&game_id=$game_id>ACCEPT</a><br/><a href=javascript:rejectChallenge()>REJECT</a></div>";
		}
	
	}
?>