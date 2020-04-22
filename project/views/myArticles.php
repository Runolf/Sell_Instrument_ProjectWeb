<?php
  ob_start();
 ?>

 <?php foreach($arts as $article):?>

   <div class="">
     <div class="">
       <div class="card_title">
           <?=$article->name?>
       </div>

       <div class="">
          <h5><?= $article->articleId ?></h5>
           <h5 class=""><?=$article->price?></h5>
           <h5 class=""><?=$article->brand?></h5>
           <h5 class=""><?=$article->comment?></h5>
           <h5 class=""><?=$article->picture?></h5>
           <h5><a href="<?= ROOT_PATH.'editArticle/'.$article->articleId ?>">edit this article</a></h5>
           <h5><a href="<?= ROOT_PATH.'article/'.$article->articleId.'/delete' ?>">delete this article</a></h5>
       </div>
     </div>
  </div>

   <?php endforeach?>

 <?php
 $title = "articles that I sell";
 $content = ob_get_clean();
 include 'includes/template.php';
  ?>
