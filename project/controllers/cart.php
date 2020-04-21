<?php
  require_once 'models/users.php';

  User::addToCart(REQ_TYPE_ID, $_SESSION["userId"]);

  include 'views/cart.php';
 ?>
