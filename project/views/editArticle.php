<?php
  ob_start();
?>
<p>
  <?= $art->name ?>
</p>
<form class="form-group jumbotron" method="post" action="<?=ROOT_PATH.'editArticle'?>">

  <input type="text" class="form-control" id="brand" name="brand" placeholder="enter the brand of your product"> <br/><br/>
  <input type="text" class="form-control" id="name" name="name" placeholder="enter the name of your product"> <br/><br/>

  <input type="number" class="form-control" id="price" name="price" placeholder="enter the price of your product"> <br/><br/>
  <input type="text" class="form-control comment" id="comment" name="comment" placeholder="explain what your product is"> <br/><br/>

  <label for="picture">Enter here the picture of your picture</label>
  <input type="file" class="form-control" id="picture" name="picture"> <br/><br/>

  <input type="hidden" id="idArticle" name="id" value="<?= $manga->id?>" >

  <button type="submit" class="btn btn-primary btn-lg" id="button" name="button">Modify</button>
</form>

<?php
  $title = "edit that article";
  $content = ob_get_clean();
  include 'includes/template.php';
?>
