<?php
    require 'models/users.php';

    if(!empty($_POST)){
      if (!empty($_POST['mail']) && !empty($_POST['pswd']) && !empty($_POST['pseudo']) && !empty($_POST['city']) && !empty($_POST['steet']) && !empty($_POST['nbr'])) {
          User::post();

      }else{
        echo "tu as oublié un champ";
      }
    }

    include 'views/signup.php';
 ?>
