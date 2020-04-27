<?php ob_start() ?>

  <?php if(!empty($orders)): ?>
    <div class="container_art">

    <?php foreach($orders as $order):?>

      <?= $isValide ?>
      <div class="card text-center">

        <div class="card_title">
            <?=$order->brand." ".$order->name?>
        </div>

        <div class="card_body">
            <h5>Price : <?= $order->price?> €</h5>
            <a href="<?=ROOT_PATH.'article/'.$order->articleId?>" class=" btn btn-primary">See details</a>
            <br />
            <br />
            <a href="<?=ROOT_PATH.'cart/'.$order->articleId?>/validate" class=" btn btn-primary">Validate order</a>
            <br />
           <a href="<?=ROOT_PATH.'cart/'.$order->articleId.'/delete' ?>" class="btn-delete-ownstyle btn btn-primary">Delete order</a>
        </div>

      </div>
      <?php endforeach?>

    </div>
  <?php endif ?>

<?php
  $title = "My cart";
  $content = ob_get_clean();
  include 'includes/template.php';
 ?>
