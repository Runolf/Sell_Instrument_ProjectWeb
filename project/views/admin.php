<?php
  ob_start();
?>
<script type="text/javascript" src="../public/js/charts.js"></script>

<div class="list-group">
  <a href="<?=ROOT_PATH?>allclient" class="list-group-item list-group-item-action list-group-item-secondary">all clients</a>
  <a href="<?=ROOT_PATH?>allorders" class="list-group-item list-group-item-action list-group-item-secondary">all orders</a>
</div>

  <br />

  <div class="row">
    <div class="col-6" id="div_charts"></div>
  </div>

<?php
  $title = "administration panel";
  $content = ob_get_clean();
  include 'includes/template.php';
?>
