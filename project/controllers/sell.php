<?php
  require 'models/users.php';

  if(empty($_SESSION['mail'])){
      header("Location: article");
      exit();
  }

  include 'views/sell.php';
 ?>
