<?php
	
	function loginUser($username, $email) {
		if(checkExistingUser($username, $email)) {
			$query = "UPDATE user_data SET is_logged_in=1 WHERE username='$username' AND email='$email'";
			mysql_query($query) or die("Error: " . mysql_error());
			$query = "SELECT user_id FROM user_data WHERE username='$username' AND email='$email'";
			$result = mysql_query($query) or die("Error: ".mysql_error());
			$row = mysql_fetch_array($result);
			return $row[0];
		}
		else {
			return false;
		}
	}
	
	function checkExistingUser($username, $email) {
		$query = "SELECT * FROM user_data WHERE username='$username'";
		$result = mysql_query($query) or die("Error while checking database");
		$row = mysql_fetch_array($result);
		if($row['email'] == $email) {
			return true;
		}
		else {
			return false;
		}
	}
	
	function logoutUser($id) {
		$query = "UPDATE user_data SET is_logged_in=0 WHERE user_id='$id'";
		mysql_query($query) or die("Error: " . mysql_error());
		return true;
	}
?>