<?php
  require 'models/users.php';

  $users = User::getAll();

  if ($_POST) {
    if ($_POST["delete"]) {
      User::delete($_POST["delete"]);

    }
  }

  include 'views/allclient.php';
 ?>
