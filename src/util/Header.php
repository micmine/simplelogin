<?php
session_start();
if (isset($_SESSION) && $_SESSION["uid"] != "") {
  // successful logged in user
} else {
  header ("Location: index.php");
  exit;
}

?>
