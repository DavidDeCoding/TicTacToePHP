<?php
	
	function getProfile($id) {
		$query = "SELECT * FROM user_data WHERE user_id='$id'";
		$result = mysql_query($query) or die("Error : ". mysql_error());
		$row = mysql_fetch_array($result);
		return $row;
	}
	
	function getPeopleOnline() {
		$query = "SELECT user_id FROM user_data WHERE is_logged_in=1 AND is_playing=0";
		$result = mysql_query($query) or die("Error: ". mysql_error());
		$row_array = array();
		while($row = mysql_fetch_array($result)) {
			array_push($row_array, $row[0]);
		}
		return $row_array;
	}
	
	
	
?>