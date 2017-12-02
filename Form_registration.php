<?php
	/**
	* Requiring all php files we need
	*/
	require 'db.php';
	require 'user_class.php';

	/**
	* Connection to the database --> Please replace the login & password
	*/
	$conn = db_connect("localhost", "root", "", "Assignment2");
?>
<!DOCTYPE html>
<html>
<head>
	<title>User registration</title>
	<link rel="stylesheet" href="style.css">
	<meta charset="UTF-8">
</head>
<body>
	<h1>Welcome to the registration form of the 2nd Project of WebProgramming!<br></h1>
	<h2>Already have an account? Click <a href="Form_login.php">here</a><br>
		<form method="post">
			<fieldset>
				<label>
					First name : <input type="text" name="firstname" placeholder="Your firstname" required /><br>
				</label>
				<label>
					Last Name : <input type="text" name="lastname" placeholder="Your lastname" required /><br>
				</label>
				<label>
					Email : <input type="Email" name="email" placeholder="Your email" required/><br>
				</label>
				<label>
					Password : <input type="password" name="password" placeholder="Your password" required /><br>
				</label>
				<label>
					Password confirmation : <input type="password" name="password-confirm" placeholder="Your password" required/><br>
				</label>
			</fieldset>
			<input type="submit" name="submit">
		</form>
	<?php
		/**
		* We create a new entry in the database if the form is filled and the passwords match
		*/
		if (isset($_POST['firstname'])) { // Filled form checking
			if ($_POST['password'] == $_POST['password-confirm']) { // Password matching check
				if (existence_check($conn, $_POST['email']) == 1) // If the email already exists, we display an error message
				{
					echo 'Sorry, but an account with this address was already created.<br>Try again with an other mail address.<br>';
				}
				else {
					user_add($conn, $_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['password']);
					echo 'You can now <a href="Form_login.php">login</a>!';
				}
			}
			else echo "<br>Please match your password and retry<br>";
		}	
	?>
	</h2>
</body>
</html>