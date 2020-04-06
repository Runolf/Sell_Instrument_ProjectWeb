<?php
ob_start();
?>

<p>
  administration
</p>

<?php
$title = "administration panel";
$content = ob_get_clean();
include 'includes/template.php';
 ?>
