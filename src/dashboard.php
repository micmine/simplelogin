<?
require "util/Header.php";
require "util/restrict/OnlyGet.php";
require "util/db/UserDatabase.php";
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
    echo "<a href=\"util/session/Logout.php\">Logout</a>";
    echo "<br>";
    ?>
  </body>
</html>
