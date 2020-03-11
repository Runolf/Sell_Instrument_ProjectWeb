<?php
    require 'models/articles.php';

    $article = Article::getById(REQ_TYPE_ID);

    include 'views/article.php';
 ?>
