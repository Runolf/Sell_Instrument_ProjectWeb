<?php
ob_start();
session_start();
if(!empty($_SESSION['mail'])){
    header("Location: index.php");
    exit();
}

if(!empty($_POST)){
  if(!empty($_POST['mail']) && !empty($_POST['pswd'])){
    $_SESSION['mail'] = $_POST['mail'];
    $_SESSION['pswd'] = $_POST['pswd'];
  }
}
?>

<form class="form-group" action="<?=ROOT_PATH?>" method="post">
  <input type="email" class="form-control" id="mail" name="mail" placeholder="enter your mail"> <br/><br/>
  <input type="password" class="form-control" id="pswd" name="pswd" placeholder="your password"> <br/><br/>

  <button type="submit" class="btn btn-primary btn-lg" id="button" name="button">SIGNUP</button>

</form>

<?php
  $title = "SIGN UP";
  $content = ob_get_clean();
  include 'includes/template.php';
 ?>
