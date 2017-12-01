<?php
	session_start();
	$date = date("F j, Y, G:i:s");
	$time = time() + (60 * 60 * 24 * 7);
	$lastlogin = '';
	if (isset($_COOKIE['lastlogin'])) {
		$lastlogin = $_COOKIE['lastlogin'];
		echo "Your last login was on : " . $_COOKIE['lastlogin'] . "<br>";
	}
	else echo "This is your first login according to your cookies! Welcome! <br>";
	setcookie('lastlogin', $date, $time);

	require 'db.php';
	require 'user_class.php';
	$conn = db_connect("localhost", "root", "", "Assignment2");

	function user_auth($conn, $email, $password) {
		$test = $conn->prepare("SELECT user_id FROM user WHERE Email = '$email'"); 
	    $test->execute();
	    $users = $test->fetchAll();
	    if (count($users) > 0) {
	    	$auth = $conn->prepare("SELECT Password FROM user WHERE Password = '$password'");
	   		$auth->execute();
	    	$data = $auth->fetchAll();
	    	if (count($data) > 0) {
	    		$auth2 = $conn->prepare("SELECT * FROM user WHERE Email = '$email' AND Password = '$password'");
				$auth2->execute();
				$data = $auth2->fetch();
	    		return $data;
	    	}
	    	else echo "<br>Wrong password, try again<br>";
	    	return null;
	    }
	    else echo "<br>There are no $email in the email database!<br>";
	    return null;
	}

	if(isset($_POST['email'])) {
		$data = user_auth($conn, $_POST['email'], $_POST['password']);
		echo "<br>" . $data['Lastname'] . "<br>" . $data['Firstname'] . "<br>" . $data['Email'] . "<br>". $data['Password'] . "<br>Click <a href='Form_modifier.php'>here</a> to modify your values<br>";
		$current_user = new User($data['Firstname'], $data['Lastname'], $data['Email'], $data['Password']);
		$_SESSION['user'] = $current_user;
		echo "<br>" . $_SESSION['user']->getFirstname() . "<br>" . $_SESSION['user']->getLastname() . "<br>" . $_SESSION['user']->getEmail() . "<br>". $_SESSION['user']->getPassword() . "<br>";
	}
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
				Email : <input type="Email" name="email" placeholder="hugo@borsier.fr" /><br>
			</label>
			<label>
				Password : <input type="password" name="password" placeholder="Your password" /><br>
			</label>
		</fieldset>
		<input type="submit" name="submit">
	</form>
</body>
</html>