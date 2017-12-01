<?php
	require 'db.php';
	require 'user_class.php';

	$conn = db_connect("localhost", "root", "", "Assignment2");
?>
<!DOCTYPE html>
<html>
<head>
	<title>User registration</title>
</head>
<body>
	<h1>Welcome to the registration form of the 2nd Project of WebProgramming!<br></h1>
	<h2>Already have a login? Click <a href="Form_login.php">here</a><br></h2>
	<form method="post" >
		<fieldset>
			<label>
				Firstname : <input type="text" name="firstname" placeholder="Your firstname" /><br>
			</label>
			<label>
				Last Name : <input type="text" name="lastname" placeholder="Your lastname" /><br>
			</label>
			<label>
				Email : <input type="Email" name="email" placeholder="Your email" /><br>
			</label>
			<label>
				Password : <input type="password" name="password" placeholder="Your password" /><br>
			</label>
			<label>
				Password confirmation : <input type="password" name="password-confirm" placeholder="Your password" /><br>
			</label>
		</fieldset>
		<input type="submit" name="submit">
	</form>
	<?php
		if (isset($_POST['firstname'])) {
			if ($_POST['password'] == $_POST['password-confirm']) {
				$current_user = new User($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['password']);
				echo "<br>The post firstname given is : " . $_POST['firstname'] . "<br>The post lastname is : " . $_POST['lastname'] . "<br>The post email is : " . $_POST['email'] . "<br>The post password is : " . $_POST['password'] . "<br>";

				$current_user->setFirstname($_POST['firstname']);
				$current_user->setLastname($_POST['lastname']);
				$current_user->setEmail($_POST['email']);
				$current_user->setPassword($_POST['password']);

				user_add($conn, $current_user->getFirstname(), $current_user->getLastname(), $current_user->getEmail(), $current_user->getPassword());
				echo "<br>The function firstname given is : " . $current_user->getFirstname() . "<br>The function lastname is : " . $current_user->getLastname() . "<br>The function email is : " . $current_user->getEmail() . "<br>The function password is : " . $current_user->getPassword() . "<br>";

			}
			else echo "<br>Please match your password<br>";
		}	
	?>
</body>
</html>