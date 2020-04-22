<?php ob_start() ?>

<div class="container_art">
<?php foreach($orders as $order):?>
  <div class="card text-center">
    <div class="card_title">
        <?=$order->brand." ".$order->name?>
    </div>
    <div class="card_body">
        <h5>Price : <?= $order->price?> €</h5>
        <a href="<?=ROOT_PATH.'article/'.$order->articleId?>" class="btn_detail btn btn-primary">Voir le détail</a>
    </div>

  </div>
  <?php endforeach?>
</div>
<?php
  $title = "My cart";
  $content = ob_get_clean();
  include 'includes/template.php';
 ?>
