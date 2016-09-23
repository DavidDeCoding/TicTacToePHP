<?php
	include("lib/php/DB_CONNECT_SCRIPT.php");
	include("lib/php/PLAYGAME_SCRIPT.php");
	include("lib/php/MAKE_GAME_SCRIPT.php");
	
	session_start();
	$game_id = $_SESSION["game_id"];
	
	$id = $_SESSION["id"];
	
	$tile = $_GET["tile"];
	
	$player = getPlayer($game_id, $id);
	
	$turn = getTurn($game_id);
	
	$completeData = getTileData($game_id);
	
	$id1 = $completeData["player1_id"];
	$id2 = $completeData["player2_id"];
	
	
	
		if($turn == $player) {
		
			if(setTileData($player, $tile, $game_id)) {
			
				
						
				if(!gameWin($game_id, $player)){
					
					if(!checkDraw($game_id)) {
							
						setTurn($game_id);
							
						$turn = getTurn($game_id);
							
						echo "player". $turn . "turn.";
					}
						
					else {
					
						setResult($game_id, -1);
						destroyGame($id1, $id2);
						
						setResult($game_id, $player);
						increScore($id);
						destroyGame($id1, $id2);	
						
					}
				}
				else {
						
					setResult($game_id, $player);
					increScore($id);
					destroyGame($id1, $id2);	
				}
			}
		
		else {
		
		echo "Choose another tile.";
		}
		
	}	
	else {
			
		echo "not your turn";
	}
	
	
?>	