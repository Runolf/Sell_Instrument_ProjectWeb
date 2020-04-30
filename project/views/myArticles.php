<?php
  ob_start();
 ?>

 <?php foreach($arts as $article):?>

     <div class="myArt_container">
       <div class="myArt_title text-center">
           <?=$article->brand." ".$article->name ?>
       </div>

       <div class="myArt_body">

           <h5 class="myArt_elem"><?=$article->price?> €</h5>
           <h5 class="myArt_elem"><?=$article->comment?></h5>
           <h5 class="myArt_edit btn"><a href="<?= ROOT_PATH.'editArticle/'.$article->articleId ?>">edit</a></h5>
           <h5 class="myArt_delete btn"><a href="<?= ROOT_PATH.'article/'.$article->articleId.'/delete' ?>">delete</a></h5>
       </div>

     </div>
     <img class="myArt_img" src="../img/<?= $article->picture; ?>" alt="an image" width="90px">
   <?php endforeach?>

 <?php
 $title = "articles that I sell";
 $content = ob_get_clean();
 include 'includes/template.php';
  ?>
