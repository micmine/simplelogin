<?php
include "util/UserDatabase.php";
include "util/OnlyPost.php";

$username = trim($_POST["username"]);
$password = trim($_POST["password"]);

// validate input
if (!preg_match("/[^A-Za-z0-9.]/", $username)) {
  // invalid input
  header("Location: index.php?info=2");
  die();
}
if (!preg_match("/[^A-Za-z0-9.]/", $password)) {
  // invalid input
  header("Location: index.php?info=2");
  die();
}

// read from database
$uid = verifyPasswordHash($username, $password);
if (isset($uid) && $uid != "") {
    // if session exist -> logout
    if (isset($_SESSION)) {
      session_destroy();
    }

    // start new session
    session_start();
    $_SESSION = array();

    $_SESSION["loggedin"] = true;
    $_SESSION["uid"] = $uid;
    header("Location: dashboard.php");
    die();
} else {
    // Username ore password is wrong
    header("Location: index.php?info=1");
    die();
}
?>
