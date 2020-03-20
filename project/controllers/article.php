<?php
    require 'models/articles.php';
    if (!REQ_TYPE_ID){
      $articles = Article::getAll(); // accès aux methodes static. pas de -> ou de .
      include 'views/articles.php';
    }else{
      $article = Article::getById(REQ_TYPE_ID);
      include 'views/article.php';
    }
 ?>
