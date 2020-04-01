<?php
  require 'models/users.php';

  if(empty($_SESSION['mail'])){
      header("Location: article");
      exit();
  }


  if(!empty($_POST)){

    $mail = (empty($_POST['mail']))?$_SESSION['mail'] : $_POST['mail'];
    $pseudo = (empty($_POST['pseudo']))?$_SESSION['pseudo'] : $_POST['pseudo'];
    $city = (empty($_POST['city']))?$_SESSION['city'] : $_POST['city'];
    $street = (empty($_POST['street']))?$_SESSION['street'] : $_POST['street'];
    $number = (empty($_POST['number']))?$_SESSION['number'] : $_POST['number'];

    if (empty($_POST['password'])) {
      $pswd = "coucou";
    }else{
        if ($_POST['password'] == $_POST['password_test']) {
            $pswd = $_POST['password'];
        }else{
          $errorMessage = "les passwords sont differents!";
        }
    }


    User::modify($_SESSION['userId'] , $mail , $pseudo , $pswd ,$city, $street, $number);
    header('Location: article');
  }
  include 'views/account.php';
 ?>
