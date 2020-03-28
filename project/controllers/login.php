<?php
  require 'models/users.php';
  $users = User::getAll();

  if(!empty($_SESSION['mail'])){
      header("Location: article");
      exit();
  }

  if(!empty($_POST)){
    if(!empty($_POST['mail']) && !empty($_POST['pswd'])){

      $user = User::isUserExists($_POST['mail']);

      if(!empty($user)){
        $_SESSION['mail'] = $user->$email;
        $_SESSION['pswd'] = $user->$pswd;
        header("Location: article");
      }else{
        $errorMessage = "ce mail/login n existe pas";
      }
    }
  }

  include 'views/login.php';
?>
