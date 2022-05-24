<?php
require_once "pdo.php";

session_start();
if (
	isset($_POST['email'])
	&& isset($_POST['password'])
) {
	//get the typed email and password

	$typed_email = $_POST['email'];
	$typed_password = $_POST['password'];



	$sql = "SELECT * FROM users WHERE email = '$typed_email' AND password= '$typed_password'";

	//just for demonstration - delete
	echo ("<pre>\n" . $sql . "\n</pre>\n");
	$stmt = $pdo->query($sql);
	$user = $stmt->fetch(PDO::FETCH_ASSOC);
	//print_r($user);




	// this uses prepared statements so is not vulnerable to injection
	$sql = "SELECT * FROM users WHERE email = :email AND password=:password";
	$stmt = $pdo->prepare($sql);
	$stmt->execute(['email' => $_POST['email'], 'password' => $_POST['password']]);
	$user = $stmt->fetch(PDO::FETCH_ASSOC);
	print_r($user);

	if ($user) {

		$_SESSION["user"] = $user["user_id"];
		//just for demonstration - delete
		//print_r($_SESSION);
		echo session_id();
		//just for demonstration - delete
		//$myLoc = "member.php?user=$user[user_id]";
		header('Location: member.php');
	} else {
		echo "You must enter a correct email and password";
	}
}
?>


<!DOCTYPE html>
<html lang="en-GB">

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="CSS/login.css">
	<nav>
		<a href="index.php"><button type="button">Homepage</button></a>
	</nav>
	<div class="imgcontainer">
		<img src="img/login_img.png" alt="Avatar" class="avatar" width="50%">
	</div>

	<title>Login to the Members Area</title>

</head>

<body>
	<!- Should use proper semantic HTML -->
		<h2>Login</h2>
		<form method="post">
			<fieldset>

				<label for="email">Email:</label>
				<input id="email" type="text" name="email">
			</fieldset>
			<fieldset>

				<label for="password">Password: </label>
				<input id="password" type="password" name="password">
			</fieldset>

			<input id="submit" type="submit" value="Login" />
		</form>
</body>

</html>