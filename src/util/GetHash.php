<?php
require "OnlyPost.php";
require "db.php";
$password = $_POST["password"];
$hash = password_hash(mysqli_real_escape_string($con, $password), PASSWORD_DEFAULT);
echo $hash;
echo "<br>";
echo "Check: ";
echo password_verify($password, $hash);
?>
