<?php ob_start() ?>

<br>

<img src="../image/<?= $article->picture; ?>" alt="an image">
<dl class="row">
  <dt class="col-sm-2">vendeur: </dt>
  <dd class="col-sm-10"><?= $dude->pseudo; ?></dd>
  <dt class="col-sm-2">brand: </dt>
  <dd class="col-sm-10"><?=$article->brand; ?></dd>
  <dt class="col-sm-2">price: </dt>
  <dd class="col-sm-10"><?=$article->price; ?></dd>
  <dt class="col-sm-2">Description: </dt>
  <dd class="col-sm-10"><?=$article->comment; ?></dd>

  <?php if (!empty($_SESSION['mail'])):  ?>

    <dt class="col-sm-2">Stars</dt>
    <dd class="col-sm-10">
      <span class="fas fa-star" data-star="1"></span>
      <span class="fas fa-star" data-star="2"></span>
      <span class="fas fa-star" data-star="3"></span>
      <span class="fas fa-star" data-star="4"></span>
      <span class="fas fa-star" data-star="5"></span>
      &nbsp; rating : <span class="rating"> - </span>
    </dd>

    <a class="btn btn-primary" href="<?= ROOT_PATH.'cart/'.$article->articleId.'/add' ?>">BUY article</a>

  <?php endif ?>

  </dl>

<?php
  $title = $article->name;
  $content = ob_get_clean();
  include 'includes/template.php';
 ?>
