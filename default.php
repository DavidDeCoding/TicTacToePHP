<html>
	<head>
		<title>TicTacToeDev</title>
		<link rel="stylesheet" type="text/css" href="lib/css/styles.css"/>
	</head>
	<body> A DAVID DE PRODUCTION
		<div id="register">
			<form id="form1" action="" method="post">
				<label for="username">Name : </label><input type="text" name="username"/><br/>
				<label for="email">Email : </label><input type="text" name="email"/><br/>
				<input type="hidden" name="formType" value="Register"/>
				<input type="submit" value="Register me"/>
			</form>
		</div>
		<div id="login">
		<form id="form2" action="" method="post">
			<label for="username">Name : </label><input type="text" name="username"/><br/>
			<label for="email">Email : </label><input type="text" name="email"/><br/>
			<input type="hidden" name="formType" value="Login"/>
			<input type="submit" value="Login"/>
		</form>
		</div>
		<div id="feedback">
		<?php
			require("lib/php/DB_CONNECT_SCRIPT.php");
			require("lib/php/SIGNIN_SCRIPT.php");
			require("lib/php/SIGNUP_SCRIPT.php");
			if(!empty($_POST["formType"])) {
				if($_POST["formType"] == "Register") {
					$username = stripslashes(htmlspecialchars($_POST["username"]));
					$email = stripslashes(htmlspecialchars($_POST["email"]));
					$user = createUser($username, $email);
					if($user == false) {
						echo "Username already exists.";
					}
				}
				else if($_POST["formType"] == "Login") {
					$username = $_POST["username"];
					$email = $_POST["email"];
					$id = loginUser($username, $email);
					if($id == false) {
						echo "wrong username or password";
					}
					else {
						
						session_start();
						$_SESSION["id"] = $id;
						header("Location: TicTacToe2.php");
					}
				}
			}
			else {
				echo "Enter the required field.";
			}
		?>
		</div>
	</body>
</html>