<?php
  require_once 'models/users.php';
  require_once 'models/articles.php';

  if (REQ_ACTION == "add") {
    $article = Article::getById(REQ_TYPE_ID);

    User::addToCart(REQ_TYPE_ID, $_SESSION["userId"]);

    $msg = "Achat de l'article: ". $article->name." de la marque: ".$article->brand." effectué";
    include 'views/cart.php';
  }

 ?>
