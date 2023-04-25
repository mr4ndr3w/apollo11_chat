<?php
  $site = "CompanyDev &rarrow; Padding Oracle";
  require "header.php";
  if ((isset($_POST['username']) and isset($_POST['uname']) and isset($_POST['password']) and isset($_POST['password_again']))){
    if (strpos($_POST['username'], ':') ==TRUE ) {
        $error ="Can't create user: user contains ':'";
    } elseif ($_POST['password'] === $_POST['password_again']) {
        if (User::check($_POST['username'], $lnk) and User::register($_POST['username'], $_POST['password'], $_POST['uname'], $lnk)){
        setcookie("auth", User::createcookie($_POST['username'], $_POST['password']));
        header( 'Location: user/index.php' ) ;
        die();
      } else {
        $error = "Can't create user";
      }
    }else {
      $error = "Passwords don't match";
    }
  }
?>

