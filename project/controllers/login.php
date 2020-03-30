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
        $_SESSION['userId'] = $user->useId;
        $_SESSION['mail']   = $user->email;
        $_SESSION['pseudo'] = $user->pseudo;
        $_SESSION['city']   = $user->city;
        $_SESSION['street'] = $user->street;
        $_SESSION['number'] = $user->number;
        $_SESSION['rating'] = $user->rating;
        $_SESSION['RoleId'] = $user->RoleId;

        header("Location: article");
        exit();
      }else{
        $errorMessage = "ce mail/login n existe pas";
      }
    }
  }

  include 'views/login.php';
?>
