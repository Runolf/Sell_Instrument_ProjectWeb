<?php
  require_once 'models/users.php';
  require_once 'models/articles.php';

  $arts = User::getArticles($_SESSION['userId']);
  include 'views/myArticles.php';
 ?>
