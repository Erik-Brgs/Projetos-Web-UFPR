<?php
  session_start();

  if (isset($_SESSION["id"]) && isset($_SESSION["username"]) && isset($_SESSION["email"])) {
    $login = true;
    $user_id = $_SESSION["id"];
    $user_name = $_SESSION["username"];
    $user_email = $_SESSION["email"];
  }
  else{
    $login = false;
  }

?>
