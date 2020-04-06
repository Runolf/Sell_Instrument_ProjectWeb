<?php
ob_start();
?>

<p>
  see all clients:
  <a href="<?=ROOT_PATH?>allclient">HERE</a>
</p>

<?php
$title = "administration panel";
$content = ob_get_clean();
include 'includes/template.php';
 ?>
