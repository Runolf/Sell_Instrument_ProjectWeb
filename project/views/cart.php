<?php ob_start() ?>

  <p>Achat réaliser mon frère!</p>

<?php
  $title = "My cart";
  $content = ob_get_clean();
  include 'includes/template.php';
 ?>
