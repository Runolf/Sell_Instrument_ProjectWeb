<?php
    require 'models/users.php';

    if(!empty($_POST)){
      if (!empty($_POST['mail']) && !empty($_POST['pswd']) && !empty($_POST['pseudo']) && !empty($_POST['city']) && !empty($_POST['street']) && !empty($_POST['nbr'])) {
        if($_POST['pswd'] != $_POST['verify_pswd']){
          echo "les passwords sont differents!";
        }
        else{
          User::post($_POST['mail'], $_POST['pswd'], $_POST['pseudo'], $_POST['city'], $_POST['street'], $_POST['nbr']);
          header('Location: article');
        }
      }
      else{
        echo "tu as oublié un champ";
      }
    }

    include 'views/signup.php';
 ?>
