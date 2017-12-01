<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Form 1</title>
</head>

<body>

<?php

if (isset($_SESSION['name'])) {
	echo "<p>Your name is " . $_SESSION['name'] . "</p>";
}

// Run at logout
session_destroy();

?>

<form action="form2.php" method="post">
	<p>Tell the truth: <input type="text" name="truth" /></p>
	<input type="hidden" name="lying" value="yes" />
	<p><input type="submit" value="Next ->" /></p>
</form>

</body>

</html>