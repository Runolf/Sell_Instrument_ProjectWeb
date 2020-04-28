<?php
  require 'models/articles.php';

  if(empty($_SESSION['mail'])){
      header("Location: article");
      exit();
  }



  if (!empty($_POST)) {
    if (!empty($_POST['name']) && !empty($_POST['brand']) && !empty($_POST['price']) && !empty($_POST['comment']) && !empty($_FILES['picture']) ) {

      $file = $_FILES['picture'];

      //print_r($file);
      //var_dump($file);


      $fileName = $_FILES['picture']['name'];
      $fileTmpName = $_FILES['picture']['tmp_name'];
      $fileSize = $_FILES['picture']['size'];
      $fileError = $_FILES['picture']['error'];
      $fileType = $_FILES['picture']['type'];

      $fileExt = explode('.', $fileName);
      $fileActualExt = strtolower(end($fileExt));

      $allowed = array('jpg', 'jpeg', 'png');

        if (in_array($fileActualExt, $allowed)) {
          if ($fileError === 0) {
            if ($fileSize < 1000000) {
              $fileNameNew = uniqid('', true).".".$fileActualExt;
              $fileDestination = 'img/'.$fileNameNew;

              move_uploaded_file($fileTmpName, $fileDestination);

            }
            else {
                $errorMessage = "too big";
            }
          }
          else {
            $errorMessage = "there was an error";
          }
        }
        else {
          $errorMessage = "you cannot upload this type of file";
        }
      }

      Article::post( $_SESSION['userId'] ,$_POST['name'], $_POST['brand'], $fileNameNew , $_POST['price'], $_POST['comment']);
      header("Location: myArticles");

    }


  include 'views/sell.php';
 ?>
