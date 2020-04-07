<?php
  ob_start();
?>

<p>Selling things</p>

<?php
  $title = "sell something";
  $content = ob_get_clean();
  include 'includes/template.php';
?>
