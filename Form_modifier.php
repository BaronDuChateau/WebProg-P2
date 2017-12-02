<?php
	require 'user_class.php';
	session_start();
	require 'db.php';
	$conn = db_connect("localhost", "root", "", "Assignment2");
?>
<!DOCTYPE html>
<html>
<head>
	<title>User modifier</title>
</head>
<body>
	<h1>Welcome to the modifier form of the 2nd Project of WebProgramming!<br></h1>
	<form method="post">
		<fieldset>
			<label>
				New firstname : <input type="text" name="firstname" value="<?php echo $_SESSION['user']->getFirstname(); ?>" /><br>
			</label>
			<label>
				New last Name : <input type="text" name="lastname" value="<?php echo $_SESSION['user']->getLastname(); ?>" /><br>
			</label>
			<label>
				New email : <input type="email" name="email" value="<?php echo $_SESSION['user']->getEmail(); ?>" /><br>
			</label>
			<label>
				New password : <input type="password" name="password" /><br>
			</label>
			<label>
				Password confirmation : <input type="password" name="password-confirm"/><br>
			</label>
		</fieldset>
		<input type="submit" name="submit">
	</form>
	<?php
		if(isset($_POST['firstname'])) {
			if ($_POST['firstname'] != $_SESSION['user']->getFirstname()) {
					echo "Your first name was changed from " . $_SESSION['user']->getFirstname() . " to " . $_POST['firstname'] . "<br>";
					$_SESSION['user']->setFirstname($_POST['firstname']);
				}
			}
		if(isset($_POST['lastname'])) {
				if ($_POST['lastname'] != $_SESSION['user']->getLastname()) {
					echo "Your last name was changed from " . $_SESSION['user']->getLastname() . " to " . $_POST['lastname'] . "<br>";
					$_SESSION['user']->setLastname($_POST['lastname']);
				}
			}
		if(isset($_POST['email'])) {
				if ($_POST['email'] != $_SESSION['user']->getEmail()) {
					echo "Your email was changed from " . $_SESSION['user']->getEmail() . " to " . $_POST['email'] . "<br>";
					$_SESSION['user']->setEmail($_POST['email']);
				}
			}
		if(isset($_POST['password']) && isset($_POST['password-confirm'])) {
			if($_POST['password']) {
				if ($_POST['password'] == $_POST['password-confirm']) {
					if ($_POST['password'] != $_SESSION['user']->getPassword()) {
						echo "Your password was changed from " . $_SESSION['user']->getPassword() . " to " . $_POST['password'] . "<br>";
						$_SESSION['user']->setPassword($_POST['password']);
					}
				}
				else echo "<p>Sorry but your password doesn't match, try again.</p>";
			}
		}
		user_update_other($conn, $_SESSION['user']->getFirstname(), $_SESSION['user']->getLastname(), $_SESSION['user']->getEmail(), $_SESSION['user']->getPassword(), $_SESSION['user']->getId());
	?>
	<p><a href="logout.php">Logout</a></p>
</body>
</html>