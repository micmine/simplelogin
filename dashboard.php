<?php
include "util/Header.php";
include "util/OnlyGet.php";
include "util/UserDatabase.php";
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
    $name = getName($_SESSION["uid"]);
    echo "<p>Hello " . $name . "</p>";
    echo "<a href=\"logout.php\">Logout</a>";
    ?>
  </body>
</html>
