<?php
  require 'models/articles.php';

  $articles = Articles::getAll(); // accès aux methodes static. pas de -> ou de .
  include 'views/articles.php';

 ?>
