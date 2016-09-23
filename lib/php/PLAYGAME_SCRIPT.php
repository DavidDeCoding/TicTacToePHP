<?php
	function setTileData($player, $tile, $game_id) {
		if(isTileSettable($game_id, $tile)) {
			$query = "UPDATE game_data SET Tile_" . $tile . "='$player' WHERE game_id='$game_id' AND game_result=0";
			mysql_query($query) or die("Error while setting tile.");
			return true;
		}
		else {
			return false;
		}
	}
	
	function getTileData($game_id) {
		
		$query = "SELECT * FROM game_data WHERE game_id='$game_id'";
		$result = mysql_query($query) or die("Error while getting tile data.");
		$row = mysql_fetch_array($result);
		return $row;
	}
	
	function getTurn($game_id) {
		$query = "SELECT turn FROM game_data WHERE game_id='$game_id' AND game_result=0";
		$result = mysql_query($query) or die("Error: ".mysql_error());
		$row = mysql_fetch_array($result);
		
		return $row[0];
	}
	
	function setTurn($game_id) {
		if(getTurn($game_id) == "1") {
			$query = "UPDATE game_data SET turn=2 WHERE game_id='$game_id' AND game_result=0";
			
		}
		else {
			$query = "UPDATE game_data SET turn=1 WHERE game_id='$game_id' AND game_result=0";
			
		}
		mysql_query($query) or die("Error: ".mysql_error());
	}
	
	function getPlayer($game_id, $id) {
		$row = getTileData($game_id);
		
		
		
		if($id == (int)$row["player1_id"]) {
			
			return "1";
		}
		else {
			return "2";
		}
	}
	
	function isTileSettable($game_id, $tile) {
		
		
		$row = getTileData($game_id);
		$tilePlayer = "Tile_". $tile;
		if($row[$tilePlayer] == 0) {
			return true;
		}
		else {
			return false;
		}
	}
	
	function checkDraw($game_id) {
		$row = getTileData($game_id);
		
		$tiles = array();
		
		for($i=1; $i<10; $i++) {
			array_push($tiles, $row["Tile_".$i]);
		}
		
		
		for($i=0; $i<count($tiles); $i++) {
			
			if($tiles[$i] == 0) {
				return false;
			}
		}
		setResult($game_id, -1);
		return true;
	}
	
	
	function gameWin($game_id) {
		$tile_data = getTileData($game_id);
		$tile1 = $tile_data["Tile_1"];
		$tile2 = $tile_data["Tile_2"];
		$tile3 = $tile_data["Tile_3"];
		$tile4 = $tile_data["Tile_4"];
		$tile5 = $tile_data["Tile_5"];
		$tile6 = $tile_data["Tile_6"];
		$tile7 = $tile_data["Tile_7"];
		$tile8 = $tile_data["Tile_8"];
		$tile9 = $tile_data["Tile_9"];
		
		if($tile1 == $tile2 && $tile2 == $tile3 && $tile3 !== "0")
		  {
			
			return true;
		  } 
		 
		else if($tile4 == $tile5 && $tile5 == $tile6 && $tile6 !== "0")
		  {
			
			return true;
		  } 
		else if($tile7 == $tile8 && $tile8 == $tile9 && $tile9 !== "0")
		  {
			return true;
		  }
		else if($tile1 == $tile5 && $tile5 == $tile9 && $tile9 !== "0")
		  {
			return true;
		  }
		else if($tile1 == $tile4 && $tile4 == $tile7 && $tile7 !== "0")
		  {
			return true;
		  }
		else if($tile2 == $tile5 && $tile5 == $tile8 && $tile8 !== "0")
		  {
			return true;
		  }
		else if($tile3 == $tile6 && $tile6 == $tile9 && $tile9 !== "0")
		  {
			return true;
		  }
		else if($tile1 == $tile5 && $tile5 == $tile9 && $tile9 !== "0")
		  {
			return true;
		  }
		else if($tile3 == $tile5 && $tile5 == $tile7 && $tile7 !== "0")
		{
			return true;
		}
		else {
			return false;
		}
		
	}
		
	
	function setResult($game_id, $result) {
		$query = "UPDATE game_data SET game_result='$result' WHERE game_id='$game_id' AND game_result=0";
		mysql_query($query) or die("Error: ".mysql_error());
	}
	
	function getResult($game_id) {
		$query = "SELECT game_result FROM game_data WHERE game_id='$game_id'";
		$result = mysql_query($query) or die("Error: ".mysql_error());
		
		$row = mysql_fetch_array($result);
		return $row[0];
	}
		
	
	function increScore($id) {
		$query = "SELECT * FROM user_data WHERE user_id='$id'";
		$result = mysql_query($query) or die("Error: ".mysql_error());
	
		$row = mysql_fetch_array($result);
		$score = $row["Score"];
		
		$score++;
		
		$query = "UPDATE user_data SET Score='$score' WHERE user_id='$id'";
		mysql_query($query) or die("Error: ".mysql_error());
	
	}
	
?>