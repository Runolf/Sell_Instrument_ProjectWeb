<?php
  ob_start();
?>

<form class="form-group jumbotron" method="post" action="<?=ROOT_PATH.'editArticle'?>">

  <div class="form-group">
    <label for="brand">Brand</label>
    <input type="text" class="form-control" id="brand" name="brand" placeholder="enter the brand of your product" value="<?= $art->brand?>"> <br/>
  </div>

  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="enter the name of your product" value="<?= $art->name?>"> <br/>
  </div>

  <div class="form-group">
    <label for="price">Price</label>
    <input type="number" class="form-control" id="price" name="price" placeholder="enter the price of your product" value="<?= $art->price?>"> <br/>
  </div>

  <div class="form-group">
    <label for="comment">Comment</label>
    <input type="text" class="form-control comment" id="comment" name="comment" placeholder="explain what your product is" value="<?= $art->comment?>"><br/>
  </div>

  <div class="form-group">
    <label for="picture">Enter here the picture of your picture</label>
    <input type="file" class="form-control" id="picture" name="picture"> <br/>
  </div>

  <input type="hidden" id="id" name="id" value="<?= $art->id?>" >

  <button type="submit" class="btn btn-primary btn-lg" id="button" name="button">Modify</button>
</form>

<?php
  $title = "edit that article: " . $art->name;
  $content = ob_get_clean();
  include 'includes/template.php';
?>
