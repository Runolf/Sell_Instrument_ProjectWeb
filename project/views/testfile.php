<?php
ob_start();
?>
  <form class="form-group" action="<?=ROOT_PATH.'testfile'?>" method="post" enctype="multipart/form-data">
    <input type="file" name="file">
    <button type="submit" name="submit">Submit</button>
  </form>

<?php
  $title = "testfile";
  $content = ob_get_clean();
  include 'includes/template.php';
 ?>
