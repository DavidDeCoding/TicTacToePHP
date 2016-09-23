<?php
	
	

	function createUser($username, $email) {
		if(checkAvailability($username)) {
			$query = "INSERT INTO user_data SET username='$username', email='$email'";
			mysql_query($query) or die("Error: " . mysql_error());
			return true;
		}
		
		else {
			return false;
		}
	}

	function checkAvailability($username) {
		$query = "SELECT * FROM user_data WHERE username='$username'";
		$result = mysql_query($query);
		$row = mysql_fetch_array($result);
		if($row['username'] == $username) {
			return false;
		}
		else {
			return true;
		}
	}
	
	
	
?>
	
