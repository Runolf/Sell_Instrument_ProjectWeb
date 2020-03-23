<?php
ob_start();
?>

<div class="formlogin jumbotron">
    <form class="form-group" method="post">
      <input type="email" class="form-control" id="mail" name="mail" placeholder="enter your mail"> <br/><br/>
      <input type="password" class="form-control" id="pswd" name="pswd" placeholder="your password"> <br/><br/>

      <button type="submit" class="btn btn-primary btn-lg" id="button" name="button">login</button>
    </form>
</div>

<?php
  $title = "login";
  $content = ob_get_clean();
  include 'includes/template.php';
 ?>
