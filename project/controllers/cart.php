<?php
  require_once 'models/users.php';
  require_once 'models/articles.php';
  require_once 'models/carts.php';

  if (REQ_ACTION == "add") {
    $article = Article::getById(REQ_TYPE_ID);

    Cart::addToCart(REQ_TYPE_ID, $_SESSION["userId"]);

    $msg = "Achat de l'article: ". $article->name." de la marque: ".$article->brand." effectué";

  }else {
    $orders = Cart::getCartClient($_SESSION['userId']);
  }

  include 'views/cart.php';
 ?>
