<html>

	<head>
		<title>Profile</title>
		
		<script type="text/javascript" src="lib/js/members.js"></script>
		<script type="text/javascript" src="lib/js/challenges.js"></script>
		<script type="text/javascript" src="lib/js/logout.js"></script>
		<link rel="stylesheet" type="text/css" href="lib/css/styles.css"/>
		<script type="text/javascript">
			function getMembers() {
				getMembersOnline();
				setTimeout(getMembers, 5000);
			}
			
			function getChallenges() {
				getChallegesFromServer();
				setTimeout(getChallenges, 1000);
			}
			
			function getEverything() {
				getMembers();
				getChallenges();
			}
			
			window.onload = getEverything;
			
			function rejectChallenge() {
				rejectGame();
			}
			
			function logout() {
				logoutProfile();
				window.location.href = "default.php";
			}
			
		</script>
	</head>
	
	<body> A DAVID DE PRODUCTION
		<?php
			include("lib/php/PROFILE_SCRIPT.php");
			include("lib/php/DB_CONNECT_SCRIPT.php");
			session_start();
			if(!isset($_SESSION["id"])) { echo "Seesion not set."; }
			else {
			$id = $_SESSION["id"];
			$profile_info = getProfile($id);
			$username = $profile_info[1];
			$email = $profile_info[2];
			$score = $profile_info[3];
		}
		?>
		
		<div id="content">
			<div id="profile"><p id="content">
				<span class="info">Username :</span> <?php
					echo $username;
				?><br/>
				<span class="info">Email :</span> <?php
					echo $email;
				?><br/>
				<span class="info">Score :</span> <?php
					echo $score;
				?><br/>
			</p></div>
			<div id="membersheader">Challenge them :</div>
			<div id="membersonline">
				
			</div>
			<div id="challengesheader">Challenges :</div>
			<div id="challenges">
			</div>
			<div id="logout"><a href="javascript:logout()">LOGOUT</a></div>
		</div>




















</html>