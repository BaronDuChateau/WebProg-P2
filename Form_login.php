<?php
	session_start(); // For the session variable to be used
	
	require 'db.php';
	require 'user_class.php';

	$conn = db_connect("localhost", "root", "", "Assignment2");
?>
<!DOCTYPE html>
<html>
<head>
	<title>User login</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<h1>Welcome to the login form of the 2nd Project of WebProgramming!<br></h1>
	<form method="post">
		<fieldset>
			<label>
				Email : <input type="Email" name="email" placeholder="hugo@borsier.fr" required/><br>
			</label>
			<label>
				Password : <input type="password" name="password" placeholder="12345" required /><br>
			</label>
		</fieldset>
		<input type="submit" name="submit">
	</form>
	<?php

		if(isset($_POST['email'])) {
			// We check if the email & password match something in the database
			$data = user_auth($conn, $_POST['email'], $_POST['password']); 
			// Setting the session variable
			$current_user = new User($data['Firstname'], $data['Lastname'], $data['Password'], $data['Email'], $data['user_id']);
			$_SESSION['user'] = $current_user;
		}
	?>
	<p>Not registered? Click <a href="Form_registration.php">here</a>! :)</p>
</body>
</html>