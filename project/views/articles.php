<?php
if(empty($_SESSION['mail'])){
  $welcome="Welcome";
}else{
  $welcome="Welcome " .$_SESSION['pseudo'];
}
ob_start();
?>

  <h2 class="text-white"><?=$welcome ?></h2>

    <div class="container_art">

    <?php foreach($articles as $article):?>

        <div class="card text-center">
          <div class="card_title">
              <?=$article->name?>
          </div>

          <div class="card_body">
              <h5 class=""><?=$article->price?></h5>
              <a href="<?=ROOT_PATH.'article/'.$article->articleId?>" class="btn_detail btn btn-primary">Voir le détail</a>
          </div>
        </div>

      <?php endforeach?>

    </div>

<?php
$title="Les articles";
$content = ob_get_clean();
include 'includes/template.php';
?>
