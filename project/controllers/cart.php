<?php
  require_once 'models/users.php';
  require_once 'models/articles.php';
  require_once 'models/carts.php';
  require_once 'models/sellarticles.php';

  if (REQ_ACTION == "add") {
    $article = Article::getById(REQ_TYPE_ID);

    Cart::addToCart(REQ_TYPE_ID, $_SESSION["userId"]);

    $msg = "Achat de l'article: ". $article->name." de la marque: ".$article->brand." effectué";
    header("Location: cart");
  }
  elseif (REQ_ACTION == "validate") {
    SellArticle::delete(REQ_TYPE_ID);
  }
  elseif (REQ_ACTION == "delete") {
    Cart::delete(REQ_TYPE_ID, $_SESSION["userId"]);
  }
  else {
    $soldarticle = SellArticle::getOne(8);
    if ($soldarticle->active == 1) {
      $isValide = 1;
    }
    else{
      $isValide = 0;
    }
    $orders = Cart::getCartClient($_SESSION['userId']);

  }

  include 'views/cart.php';
 ?>
