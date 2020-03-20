<?php
    require 'models/users.php';
    include 'views/signup.php';

    if(!empty($_POST)){
      if (!empty($_POST['mail']) && !empty($_POST['pswd']) && !empty($_POST['pseudo']) && !empty($_POST['city']) && !empty($_POST['steet']) && !empty($_POST['number']) && !empty($_POST['confirm_password'])) {
        if($_POST['pswd'] != $_POST['confirm_password']){
            echo "les pswd ne sont pas identiques";
        }else{
          User::post();
        }

      }else{
        echo "tu as oublié un champ";
      }
    }

 ?>
