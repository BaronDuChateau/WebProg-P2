<?php

function db_connect($servername, $username, $password, $dbname) {
	try {
	    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    return $conn;
	}
	catch(PDOException $e) {
	    echo "Connection failed: " . $e->getMessage();
	}
}
/**
* This function checks if the given email already exists in the database
*/
function existence_check($conn, $email) {
	$sql = $conn->prepare("SELECT Email FROM user WHERE Email ='$email'");
	$sql->execute();
	$user = $sql->fetchAll();
	if (count($user) > 0) return 1;
	else return 0;
}
/**
* This function permits to authentificate the user that tries to log in
*/
function user_auth($conn, $email, $password) {
	try 
	{
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
				echo "<br><h3>Welcome " . $data['Lastname'] . " " . $data['Firstname'] . "! You can modify your data <a href='Form_modifier.php'>here</a></h3>";
			    return $data;
			    }
			else echo "<br>Wrong password, try again<br>";
		   	return null;
		}
	else echo "<br>There are no $email in the email database!<br>";
	return null;
	}
	catch(PDOException $e)
	{
		echo "Error: " . $e->getMessage();
	}
}
function user_update_other($conn, $firstname, $lastname, $email, $password, $id) {
	try {
		$sql = $conn->prepare("UPDATE user SET Firstname = :firstname, Lastname = :lastname, Password = :password, Email = :email WHERE user_id = '$id'");
		$sql->bindValue(':firstname', $firstname);
        $sql->bindValue(':lastname', $lastname);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':password', $password);
		$sql->execute(); 
	}
	catch(PDOException $e)
	{
		echo "Error: " .$e->getMessage();
	}
}
/**
* Add a user to the database
*/
function user_add($conn, $firstname, $lastname, $email, $password) {
	try {
		$sql = $conn->prepare("INSERT INTO user (user_id, Firstname, Lastname, Email, Password) VALUES (null, :firstname, :lastname, :email, :password)");
        $sql->bindValue(':firstname', $firstname);
        $sql->bindValue(':lastname', $lastname);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':password', $password);
	    $sql->execute();
	}
	catch(PDOException $e)
	    {
	    echo "Error: " . $e->getMessage();
	}
}
?>