<?php
  require_once 'models/articles.php';

  $art = Article::getById(REQ_TYPE_ID);

  include 'views/editArticle.php';
 ?>
