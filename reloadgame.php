<?php
	include("lib/php/DB_CONNECT_SCRIPT.php");
	include("lib/php/PLAYGAME_SCRIPT.php");
	
	session_start();
	$game_id = $_SESSION["game_id"];
	
	
	$tiles = getTileData($game_id);
	
	$game_tiles = array();
	
	for($i = 1; $i < 10; $i++) {
		array_push($game_tiles, $tiles["Tile_".$i]);
	
	}
	
	$tileSym = array();
	
	for($i = 0; $i<count($game_tiles); $i++) {
		if($game_tiles[$i] == "1") {
			array_push($tileSym, "X");
			
		}
		else if($game_tiles[$i] == "2") {
			array_push($tileSym, "O");
		}
		else {
			array_push($tileSym, "   ");
		}
		
	}
	
	echo 	"<form name='game'>
				<input type='button' id='b1' class='buttonplay' onclick='buttonClicked(event)' value='$tileSym[0]'/>   
				<input type='button' id='b2' class='buttonplay' onclick='buttonClicked(event)' value='$tileSym[1]'/>   
				<input type='button' id='b3' class='buttonplay' onclick='buttonClicked(event)' value='$tileSym[2]'/>   <br/>
				<input type='button' id='b4' class='buttonplay' onclick='buttonClicked(event)' value='$tileSym[3]'/>   
				<input type='button' id='b5' class='buttonplay' onclick='buttonClicked(event)' value='$tileSym[4]'/>   
				<input type='button' id='b6' class='buttonplay' onclick='buttonClicked(event)' value='$tileSym[5]'/>   <br/>
				<input type='button' id='b7' class='buttonplay' onclick='buttonClicked(event)' value='$tileSym[6]'/>   
				<input type='button' id='b8' class='buttonplay' onclick='buttonClicked(event)' value='$tileSym[7]'/>   
				<input type='button' id='b9' class='buttonplay' onclick='buttonClicked(event)' value='$tileSym[8]'/>   <br/>
			</form>";

?>