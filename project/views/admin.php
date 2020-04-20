<?php
  ob_start();
?>
<script type="text/javascript" src="../public/js/charts.js"></script>
  <p>
    see all clients:
    <a href="<?=ROOT_PATH?>allclient">HERE</a>
  </p>

  <br />

  <div class="row">
    <div class="col-6" id="div_charts"></div>
  </div>

<?php
  $title = "administration panel";
  $content = ob_get_clean();
  include 'includes/template.php';
?>
