<?php
include "db.php";
$password = $_GET["password"];
$hash = password_hash(mysqli_real_escape_string($con, $password), PASSWORD_DEFAULT);
echo $hash;
echo "<br>";
echo password_verify($password, $hash);
?>
