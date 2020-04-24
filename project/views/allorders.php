<?php
ob_start();
 ?>

<table border="1">
  <thead>
    <tr>
      <th>Brand and model</th>
      <th>Price</th>
      <th>Comment</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($orders as $order): ?>
    <tr>
      <td><?= $order->brand." ".$order->name ?></td>
      <td><?= $order->price ?> €</td>
      <td><?= $order->comment ?></td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>

 <?php
 $title = "all orders panel";
 $content = ob_get_clean();
 include 'includes/template.php';
  ?>
