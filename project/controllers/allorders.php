<?php
require_once 'models/carts.php';

  $orders = Cart::getAllOrders();

include 'views/allorders.php';

 ?>
