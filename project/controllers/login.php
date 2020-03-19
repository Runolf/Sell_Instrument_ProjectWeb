<?php
  require 'models/users.php';

  $users = User::getAll();

  if(!empty($_SESSION['mail'])){
      header("Location: welcome");
      exit();
  }

  if(!empty($_POST)){
    if(!empty($_POST['mail']) && !empty($_POST['pswd'])){
      $_SESSION['mail'] = $_POST['mail'];
      $_SESSION['pswd'] = $_POST['pswd'];
      header("Location: welcome");
    }
  }
  
  include 'views/login.php';
?>
