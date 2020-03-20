<?php
ob_start();
?>

<form class="form-group" method="post">
  <input type="email" class="form-control" id="mail" name="mail" placeholder="enter your mail"> <br/><br/>
  <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="enter your pseudo"> <br/><br/>

  <input type="text" class="form-control" id="city" name="city" placeholder="enter your city"> <br/><br/>
  <input type="text" class="form-control" id="street" name="street" placeholder="enter your street"> <br/><br/>
  <input type="text" class="form-control" id="number" name="number" placeholder="enter your number"> <br/><br/>

  <input type="password" class="form-control" id="pswd" name="pswd" placeholder="your password"> <br/>
  <input type="password" class="form-control" id="idconfirmpassword" name="confirm_password"><br>

  <button type="submit" class="btn btn-primary btn-lg" id="button" name="button">login</button>
</form>

<?php
  $title = "signup";
  $content = ob_get_clean();
  include 'includes/template.php';
 ?>
