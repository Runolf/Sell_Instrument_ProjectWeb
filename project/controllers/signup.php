<?php
  require 'models/users.php';
  
  $users = User::getAll();

  include 'views/signup.php';
?>
