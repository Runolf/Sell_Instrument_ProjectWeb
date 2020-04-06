<?php
ob_start();
 ?>

<table border="1">
  <thead>
    <tr>
      <th>pseudo</th>
      <th>mail</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($users as $user): ?>
    <tr>
      <th><?= $user->pseudo ?></th>
      <th><?= $user->email ?></th>
      <th>delete</th>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>

 <?php
 $title = "all client panel";
 $content = ob_get_clean();
 include 'includes/template.php';
  ?>
