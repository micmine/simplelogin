<?php
include "util/header.php";
//include "util/DbHelp.php"

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Here is the side</h1>
    <?php
    //$name = selectOne("select username from user where uid = '" . $_SESSION["uid"] . "';")["username"];
    //$name = $data["username"];
    echo "<p>Hello " . $_SESSION["uid"] . "</p>";
    echo "<a href=\"logout.php\">Logout</a>";
    ?>
  </body>
</html>
