<?php
    require 'models/articles.php';

    if (!REQ_ACTION) {

      if (!REQ_TYPE_ID){
        $articles = Article::getAll(); // accès aux methodes static. pas de -> ou de .
        include 'views/articles.php';
      }else{
        $dude = Article::getUser(REQ_TYPE_ID);
        $article = Article::getById(REQ_TYPE_ID);
        include 'views/article.php';
      }

    }

    if (REQ_ACTION == "delete") {
      Article::delete(REQ_TYPE_ID);
      header("Location: myArticles");
    }

    if (REQ_ACTION == "buy") {
      $errorMessage = "TEST BUY";
      include 'views/cart.php';
    }
 ?>
