<?php ob_start() ?>
<br>
<dl class="row">
  <dt class="col-sm-2">brand: </dt>
  <dd class="col-sm-10"><?=$article->brand; ?></dd>
  <dt class="col-sm-2">price: </dt>
  <dd class="col-sm-10"><?=$article->price; ?></dd>
</dl>

<?php
  $title = $article->name;
  $content = ob_get_clean();
  include 'includes/template.php';
 ?>
