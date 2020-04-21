<?php ob_start() ?>

  <p>Achat de l'article : <?= $article->name ." de la marque: ".$article->brand." effectué" ?></p>

<?php
  $title = "My cart";
  $content = ob_get_clean();
  include 'includes/template.php';
 ?>
