<?php
//uncoment if database u are testing database connection
//include 'util/db/Db.php';
require "util/restrict/OnlyGet.php";
?>
<h1>Login</h1>
<form class="login" action="util/session/Login.php" method="post">
  <input type="text" name="username" placeholder="username"><br>
  <input type="password" name="password" placeholder="password"><br>
  <button type="submit">Login</button><br>
</form>

<a href="Register.php">Register here</a>
