<?php
ob_start();
?>

<h1>id:          <?= $_SESSION['userId']; ?></h1> <!-- ne s'affiche pas -->
<h3>Your rating: <?= $_SESSION['rating']; ?></h3>
<h2> roleId :    <?= $_SESSION['RoleId'];  ?></h2> <!-- S'affiche -->



<form class="form-group" method="post" action="<?=ROOT_PATH.'account'?>">

  <div class="form-group">
      <label for="mail">Email/login</label>
      <input type="email" class="form-control" id="mail" name="mail" value="<?=$_SESSION['mail']?>"> <br/>
  </div>

  <div class="form-group">
      <label for="mail">Pseudo</label>
      <input type="text" class="form-control" id="pseudo" name="pseudo" value="<?=$_SESSION['pseudo']?>"> <br/>
  </div>
  <div class="form-group">
      <label for="address">Address</label><br />
      <input type="text" class="form-control form_address" id="address" name="street" value="<?=$_SESSION['street']?>">
      <input type="text" class="form-control form_address" id="address" name="number" value="<?=$_SESSION['number']?>">
      <input type="text" class="form-control form_address" id="address" name="city" value="<?=$_SESSION['city']?>">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<br/>

<?php
  $title = "account";
  $content = ob_get_clean();
  include 'includes/template.php';
 ?>
