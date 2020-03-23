<?php
ob_start();
?>
<br/>
<form class="form-group" method="post">
  <input type="email" class="form-control" id="mail" name="mail" placeholder="enter your mail"> <br/><br/>
  <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="enter your pseudo"> <br/><br/>

  <input type="text" class="form-control" id="city" name="city" placeholder="enter your city"> <br/><br/>
  <input type="text" class="form-control" id="street" name="street" placeholder="enter your street"> <br/><br/>
  <input type="text" class="form-control" id="nbr" name="nbr" placeholder="enter your number"> <br/><br/>

  <input type="password" class="form-control" id="pswd" name="pswd" placeholder="your password"> <br/>
  

  <button type="submit" class="btn btn-primary btn-lg" id="button" name="button">sign up</button>
</form>

<?php
  $title = "sign up";
  $content = ob_get_clean();
  include 'includes/template.php';
 ?>
