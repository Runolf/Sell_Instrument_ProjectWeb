<?php ob_start() ?>

<?php foreach($orders as $order):?>

  <p><?= $order->brand ?></p>

  <?php endforeach?>

<?php
  $title = "My cart";
  $content = ob_get_clean();
  include 'includes/template.php';
 ?>
