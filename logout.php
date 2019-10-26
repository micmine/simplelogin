<?
session_start();

    // if session exist -> logout
    session_unset();
    session_destroy();
    $_SESSION = array();
  
header("Location: index.php");
?>