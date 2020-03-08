<?php
  require 'models/articles.php';

  $articles = getAll();
  include 'views/articles.php';

 ?>
