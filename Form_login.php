<?php
	session_start();
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>User login</title>
</head>
<body>
	<h1>Welcome to the login form of the 2nd Project of WebProgramming!<br></h1>
	<form>
		<fieldset>
			<label>
				Email : <input type="Email" name="email" placeholder="Your email" /><br>
			</label>
			<label>
				Password : <input type="password" name="password" placeholder="Your password" /><br>
			</label>
		</fieldset>
		<input type="submit" name="submit">
	</form>
</body>
</html>