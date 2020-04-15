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
           <form class="" action="editArticle/<?=$article->articleId ?>" method="post">
            <h5><button type="submit" class="btn btn-primary btn-lg" id="button" name="button">Edit this article</button></h5>
           </form>
       </div>
     </div>
  </div>

   <?php endforeach?>

 <?php
 $title = "articles that I sell";
 $content = ob_get_clean();
 include 'includes/template.php';
  ?>
