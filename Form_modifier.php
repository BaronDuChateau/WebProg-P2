<?php

?>
<!DOCTYPE html>
<html>
<head>
	<title>User modifier</title>
</head>
<body>
	<h1>Welcome to the modifier form of the 2nd Project of WebProgramming!<br></h1>
	<form>
		<fieldset>
			<label>
				New firstname : <input type="text" name="firstname" placeholder="Your firstname" /><br>
			</label>
			<label>
				New last Name : <input type="text" name="lastname" placeholder="Your lastname" /><br>
			</label>
			<label>
				New email : <input type="Email" name="email" placeholder="Your email" /><br>
			</label>
			<label>
				New password : <input type="password" name="password" placeholder="Your password" /><br>
			</label>
			<label>
				Password confirmation : <input type="password" name="password-confirm" placeholder="Your password" /><br>
			</label>
		</fieldset>
		<input type="submit" name="submit">
	</form>
	<p><a href="logout.php">Logout</a></p>
</body>
</html>