<?php

  if (isset($_POST['submit'])) {
    $file = $_FILES['file'];

    //var_dump($file);
    //die();
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];
  //$fileName = $file['name'];

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

  include 'views/testfile.php';
 ?>
