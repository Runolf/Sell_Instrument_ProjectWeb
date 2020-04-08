<?php
  require 'models/articles.php';

  if(empty($_SESSION['mail'])){
      header("Location: article");
      exit();
  }


  if (!empty($_POST)) {
    if (!empty($_POST['name']) && !empty($_POST['brand']) && !empty($_POST['price']) && !empty($_POST['comment']) && !empty($_POST['picture']) ) {
      Article::post( $_SESSION['userId'] ,$_POST['name'], $_POST['brand'], $_POST['picture'], $_POST['price'], $_POST['comment']);
    }
  }


  include 'views/sell.php';
 ?>
