<?php
require "../db/UserDatabase.php";
require "../restrict/OnlyPost.php";
require "../validate/UserInput.php";

$username = trim($_POST["username"]);
$password = trim($_POST["password"]);

// validate input
if (validateUsername($username)) {
  // invalid input
  header("Location: ../../index.php?info=1");
  die();
}
if (validatePassword($password)) {
  // invalid input
  header("Location: ../../index.php?info=1");
  die();
}

add($username, $password);
header("Location: ../../index.php");
?>
