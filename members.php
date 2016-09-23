<?php
	include("lib/php/PROFILE_SCRIPT.php");
	include("lib/php/DB_CONNECT_SCRIPT.php");
	
        session_start();
        $id = $_SESSION["id"];

	$member_online = getPeopleOnline();
	
	for($i = 0; $i<count($member_online);$i++) {
		
		$profile_info = getProfile($member_online[$i]);
		$profile_id = $profile_info[0];
                if($profile_id !== $id) {
		    $profile_name = $profile_info[1];
		
		    echo "<div><a href=GAME.php?mode=0&challenged_id=$profile_id>$profile_name</a></div>";
                }
	}
?>	