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
		/**
		* This part sets the cookie if not already set and display the last login date and time
		*/
		$date = date("F j, Y, G:i:s");
		$time = time() + (60 * 60 * 24 * 7);
		$lastlogin = '';
		if (isset($_COOKIE['lastlogin'])) {
			$lastlogin = $_COOKIE['lastlogin'];
			echo "Your last login was on : " . $_COOKIE['lastlogin'] . "<br>";
		}
		else echo "This is your first login according to your cookies! Welcome! <br>";
		setcookie('lastlogin', $date, $time);

		if(isset($_POST['email'])) {
			$data = user_auth($conn, $_POST['email'], $_POST['password']);
			//echo "<br>" . $data['Lastname'] . "<br>" . $data['Firstname'] . "<br>" . $data['Email'] . "<br>". $data['Password'] . "<br>Click <a href='Form_modifier.php'>here</a> to modify your values<br>";

			// Setting the session variable
			$current_user = new User($data['Firstname'], $data['Lastname'], $data['Password'], $data['Email'], $data['user_id']);
			$_SESSION['user'] = $current_user;
			//echo "<br>" . $_SESSION['user']->getFirstname() . "<br>" . $_SESSION['user']->getLastname() . "<br>" . $_SESSION['user']->getEmail() . "<br>". $_SESSION['user']->getPassword() . "<br>";
		}
	?>
</body>
</html>