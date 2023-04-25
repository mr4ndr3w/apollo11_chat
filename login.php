<?php
require "header.php";

  if ((isset($_POST['username']) and isset($_POST['password']))){
    if (User::login($_POST['username'], $_POST['password'], $lnk)){
      setcookie("auth", User::createcookie($_POST['username'], $_POST['password']));
      header("location: /index.php");
      die();
    } else {
      $error = "Invalid credentials";
      header("location: /index.php");
    }
  }
  ?>
