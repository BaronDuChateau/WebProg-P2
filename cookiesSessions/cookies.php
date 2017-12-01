<?php

$time = time() + (60 * 60 * 24 * 7);
setcookie("name", "Jujube", $time);
setcookie("job", "Programmer", $time);

echo "<pre>";
echo "CoOKie!!\n\n";
print_r($_COOKIE);
echo "</pre>";

?>
