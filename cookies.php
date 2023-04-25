<?php 
  if (isset($_COOKIE['auth'])){
    $user = User::getuserfromcookie($_COOKIE['auth']);
  }
?>