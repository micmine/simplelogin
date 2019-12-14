<?php
require "util/restrict/OnlyGet.php";
?>
<h1>Register</h1>
<form class="login" action="util/session/Register.php" method="post">
  <input type="text" name="username" placeholder="username"><br>
  <input type="password" name="password" placeholder="password"><br>
  <button type="submit">Register</button><br>
</form>
<a href="index.php">Login here</a>