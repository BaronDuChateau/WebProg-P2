<?php

function db_connect($servername, $username, $password, $dbname) {
	try {
	    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    echo "Connected successfully\n";
	    return $conn;
	}
	catch(PDOException $e) {
	    echo "Connection failed: " . $e­->getMessage();
	}
}

function user_update_other($conn, $firstname, $lastname, $email, $password) {
	try {
		$sql = $conn->prepare("UPDATE user SET Firstname = '$firstname', Lastname = '$lastname', Password = '$password' WHERE Email = '$email'");
		sql->execute();
		echo "Database updated"; 
	}
	catch(PDOException $e)
	{
		echo "Error: " .$e->getMessage();
	}
}
function user_add($conn, $firstname, $lastname, $email, $password) {
	try {
		$sql = $conn->prepare("INSERT INTO user (user_id, firstname, lastname, email, password) VALUES (null, '$firstname', '$lastname', '$email', '$password')");
	    $sql->execute();
	    echo "New record created successfully\n";
	}
	catch(PDOException $e)
	    {
	    echo "Error: " . $e->getMessage();
	}
}

function user_auth($conn, $email, $pass) {
	try {
	    // Check that user exists
		$test = $conn->prepare("SELECT user_id FROM user WHERE Email = '$email'"); 
	    $test->execute();
	    $users = $test->fetchAll();
		// If user exists, fetch password salt and hash
	    if (count($users) > 0) {
	    	$id = $users[0][0]; // UserID will be the only field in the only record
	    	
			$auth = $conn->prepare("SELECT Password FROM user WHERE user_id = '$id'");
	    	$auth->execute();
	    	$data = $auth->fetchAll();
	    	if ($data[0][0] == $pass) {
	    		$give = $conn->prepare("SELECT Password FROM user WHERE user_id = '$id'");
	    		$give->execute();
	    		$data = $give->fetchAll();
	    		return $data;
	    	}
	 		else {
	 			return null;
	 		}
	    }
	    else {
	    	return null;
	    }
	}
	catch (PDOException $e) {
	    echo "Error: " . $e->getMessage();
	}
}

function user_get($conn, $id) {
	try {
	    $sql = $conn->prepare("SELECT UserID, Username FROM UserInfo WHERE UserID = '$id'"); 
	    $sql->execute();
	    $sql->setFetchMode(PDO::FETCH_ASSOC);
	    $result = $sql->fetchAll();
	    return $result;
	}
	catch (PDOException $e) {
	    echo "Error: " . $e->getMessage();
	}
}

?>