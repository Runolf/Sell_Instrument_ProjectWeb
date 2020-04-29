<?php
  ob_start();
?>
<script type="text/javascript">

  google.charts.load('current', {'packages':['corechart']});

  google.charts.setOnLoadCallback(drawCharts);

  function drawCharts(){

    var data = google.visualization.arrayToDataTable([
      ['Client', 'nbrArticles'],
      <?php foreach($arr as $key=>$val){?>
        ['<?php echo $val['dude']?>', <?php echo $val['nbrArticles']?>],
      <?php } ?>
    ]);
    var options = {
      title: 'Number of articles by client',
      is3D: false
    };
    var chart = new google.visualization.PieChart(document.getElementById('div_charts'));
    chart.draw(data, options);
  }
</script>

<div class="list-group">
  <a href="<?=ROOT_PATH?>allclient" class="list-group-item list-group-item-action list-group-item-secondary">all clients</a>
  <a href="<?=ROOT_PATH?>allorders" class="list-group-item list-group-item-action list-group-item-secondary">all orders</a>
</div>

  <br />

  <div class="row">
    <div class="col-6" id="div_charts"></div>
  </div>

<?php
  $title = "administration panel";
  $content = ob_get_clean();
  include 'includes/template.php';
?>
