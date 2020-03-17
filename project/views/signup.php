<?php ob_start() ?>
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
