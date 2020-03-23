<?php
ob_start();
if(empty($_SESSION['mail'])){
  $welcome="Welcome";
}else{
  $welcome="Welcome " . $_SESSION['mail'] . " " . $_SESSION['pswd'];
}
?>

  <h2 class="text-white"><?=$welcome ?></h2>

    <div class="card-deck">

    <?php foreach($articles as $article):?>

        <div class="card text-center">
          <div class="card-header">
              <?=$article->name?>
          </div>

          <div class="card-body">
              <h5 class="card-title"><?=$article->price?></h5>
              <p class="card-text"><?=$article->comment?></p>
              <a href="<?=ROOT_PATH.'article/'.$article->articleId?>" class="btn btn-primary">Voir le détail</a>
          </div>
        </div>

      <?php endforeach?>

    </div>

<?php
$title="Les articles";
$content = ob_get_clean();
include 'includes/template.php';
?>
