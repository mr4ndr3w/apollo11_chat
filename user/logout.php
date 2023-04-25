<?php
  require "../classes/user.php";
  
  User::logout();
  header("Location: ../");
  die();
?>