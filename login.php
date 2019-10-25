<?php
include "util/db.php";

$username = $_POST["username"];
$password = mysqli_real_escape_string($con, $_POST["password"]);
//$hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$res = mysqli_query($con, "select password, isdeactivated from user where username = '" . $username . "';");
$data = mysqli_fetch_array($res);
//$data = $res

$hash = $data["password"];
$isdeactivated = $data["isdeactivated"];

if ($res == false) {
  echo mysqli_error($con);
  //header("Location: index.php?info=3");
}
if (!$isdeactivated) {
  // user is not deactivated
  if (password_verify($password, $hash)) {
    // password is correct
    $_SESSION["active"] = 1;
    header("Location: dashboard.php");
  } else {
    //header("Location: index.php?info=1");

  }
} else {
  header("Location: index.php?info=2");
}
?>
