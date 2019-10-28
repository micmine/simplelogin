<?php
include "util/UserDatabase.php";

$username = $_POST["username"];
$password = trim($_POST["password"]);

// validate input
//prontebl

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
} else {
    header("Location: index.php?info=1");
}
?>
