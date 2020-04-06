<?php
ob_start();
 ?>

<table>
  <thead>
    <tr>
      <th>test</th>
      <th>test</th>
      <th>test</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($users as $user): ?>
    <tr>
      <th><?= $users->pseudo ?></th>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>

 <?php
 $title = "all client panel";
 $content = ob_get_clean();
 include 'includes/template.php';
  ?>
