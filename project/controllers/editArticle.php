<?php
  require_once 'models/articles.php';

  if(empty($_SESSION['mail'])){
      header("Location: article");
      exit();
  }

  $art = Article::getById(REQ_TYPE_ID);

  if (!empty($_POST)) {
    $name     = (empty($_POST['name']))? $art->name : $_POST['name'];
    $brand    = (empty($_POST['brand']))? $art->brand : $_POST['brand'];
    $picture  = (empty($_POST['picture']))? $art->picture : $_POST['picture'];
    $price    = (empty($_POST['price']))? $art->price : $_POST['price'];
    $comment  = (empty($_POST['comment']))? $art->comment : $_POST['comment'];

    Article::modify($_POST['id'], $name, $brand, $picture, $price , $comment);
    header("Location: ".ROOT_PATH."editArticle/".REQ_TYPE_ID);
    exit();
  }



  include 'views/editArticle.php';
 ?>
