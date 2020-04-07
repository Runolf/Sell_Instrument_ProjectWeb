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
      <td><?= $user->pseudo ?></td>
      <td><?= $user->email ?></td>
      <td> <div class="btn btn-delete-ownstyle">Delete</div></td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>

 <?php
 $title = "all client panel";
 $content = ob_get_clean();
 include 'includes/template.php';
  ?>
