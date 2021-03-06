<?php ob_start() ?>

<br>
<img class="img_detail" src="../img/<?= $article->picture; ?>" alt="an image">

<dl class="row">

  <dt class="col-sm-2">seller: </dt>
  <dd class="col-sm-10"><?= $dude->pseudo; ?></dd>
  <dt class="col-sm-2">price: </dt>
  <dd class="col-sm-10"><?=$article->price; ?></dd>
  <dt class="col-sm-2">Description: </dt>
  <dd class="col-sm-10"><?=$article->comment; ?></dd>
  <dt class="col-sm-2">contact: </dt>
  <dd class="col-sm-10"><?= $dude->email; ?></dd>
  <?php if (!empty($_SESSION['mail']) && $_SESSION['RoleId'] != 1):  ?>

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
  $title = $article->brand." ". $article->name;
  $content = ob_get_clean();
  include 'includes/template.php';
 ?>
