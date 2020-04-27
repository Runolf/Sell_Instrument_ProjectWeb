<?php
  require_once 'models/users.php';

  $arts = User::getArticles($_SESSION['userId']);
  include 'views/myArticles.php';
 ?>
