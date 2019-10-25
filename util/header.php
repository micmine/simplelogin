<?php
session_start();
if (!isset($_SESSION["active"])) {
   header("Location: http://localhost/m133/login");
  die();
} else {
  header("Location: dashboard.php");
}
?>
