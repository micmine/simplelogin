<?php
//uncoment if database u are testing database connection
//include 'util/Db.php';
include "util/OnlyGet.php";
?>
<form class="login" action="login.php" method="post">
  <input type="text" name="username" placeholder="username"><br>
  <input type="password" name="password" placeholder="password"><br>
  <button type="submit">Login</button><br>
</form>
