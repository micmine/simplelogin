<?
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

// read from database
$uid = verifyPasswordHash($username, $password);
if (isset($uid) && $uid != "") {
  if (!isExpired($_SESSION["uid"])) {
    // if session exist -> logout
    if (isset($_SESSION)) {
      session_destroy();
    }

    // start new session
    session_start();
    $_SESSION = array();

    $_SESSION["loggedin"] = true;
    $_SESSION["uid"] = $uid;
    header("Location: ../../dashboard.php");
    die();
  } else {
    // user is expired
    header("Location: ../../index.php?info=3");
    die();
  }
} else {
    // username ore password is wrong
    header("Location: ../../index.php?info=2");
    die();
}
?>
