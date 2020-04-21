<?php ob_start() ?>
<br>
<img src="../image/<?= $article->picture; ?>" alt="an image">
<dl class="row">
  <dt class="col-sm-2">brand: </dt>
  <dd class="col-sm-10"><?=$article->brand; ?></dd>
  <dt class="col-sm-2">price: </dt>
  <dd class="col-sm-10"><?=$article->price; ?></dd>
  <dt class="col-sm-2">Description: </dt>
  <dd class="col-sm-10"><?=$article->comment; ?></dd>
</dl>

  <a href="<?= /*ROOT_PATH.'article/'.$article->articleId.'/buy' */
              ROOT_PATH.'cart/'.$article->articleId
  ?>">BUY</a>

<?php
  $title = $article->name;
  $content = ob_get_clean();
  include 'includes/template.php';
 ?>
