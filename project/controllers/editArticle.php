<?php
  require_once 'models/articles.php';

  if(empty($_SESSION['mail'])){
      header("Location: article");
      exit();
  }

  $art = Article::getById(REQ_TYPE_ID);

  if (!empty($_POST)) {


    if (!empty($_FILES['picture'])) {

      $file = $_FILES['picture'];

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
    else {
      $fileNameNew = $art->picture;
    }



    $name     = (empty($_POST['name']))? $art->name : $_POST['name'];
    $brand    = (empty($_POST['brand']))? $art->brand : $_POST['brand'];
    $price    = (empty($_POST['price']))? $art->price : $_POST['price'];
    $comment  = (empty($_POST['comment']))? $art->comment : $_POST['comment'];

    Article::modify($_POST['id'], $name, $brand, $fileNameNew, $price , $comment);
    header("Location: ".ROOT_PATH."editArticle/".REQ_TYPE_ID);
    exit();
  }



  include 'views/editArticle.php';
 ?>
