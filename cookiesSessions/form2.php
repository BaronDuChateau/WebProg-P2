<?php
session_start();
$_SESSION['name'] = $_POST['truth'];
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Form 2</title>
</head>

<body>

<?php

// Check value of hidden field
// Equals "yes" if coming from form1
// Equals "no" if coming from form2
if ($_POST['lying'] == "yes") {
	$verity = "a lie";
}
else {
	$verity = "the truth";
}

echo "<p>You wrote " . $_POST['truth'] . ", which is " . $verity . ".";

// Check value of hidden field
if ($_POST['lying'] == "yes") {
	
?>

<!-- Self-processing form -->
<form action="form2.php" method="post">
	<p>Now, tell the truth: <input type="text" name="truth" /></p>
	<input type="hidden" name="lying" value="no" />
	<p><input type="submit" value="Go" /></p>
</form>

<?php

}

?>
</body>

</html>