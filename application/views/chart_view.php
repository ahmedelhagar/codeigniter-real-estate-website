      <!--News-->
          <div class="news">News</div>
      <marquee class="news-bar" dir="ltr" onmouseover="this.stop();" onmouseout="this.start();">
          <?php if($news == TRUE){foreach($news as $ti2){ ?>
          <a href="<?php echo base_url().'page/'.$ti2->id; ?>"><?php echo $ti2->title; ?></a> - 
          <?php }} ?>
        </marquee>
      <!--End News-->
<div class="addData mychart">
    <style type="text/css">
canvas#myChart {
    width: 100% !important;
    float: left;
}
</style>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>
<canvas id="myChart" width="400" height="400"></canvas>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [
        <?php
            if($charts == TRUE){foreach($charts as $chart){
                ?>
            '<?php echo $chart->title; ?>',
            <?php
            }}
            ?>
        ],
        datasets: [{
            label: 'Chart',
            data: [<?php
            if($charts == TRUE){foreach($charts as $chart2){
                ?>
            <?php echo $chart2->file; ?>,
            <?php
            }}
            ?>],
            backgroundColor: [
                <?php
            if($charts == TRUE){foreach($charts as $chart3){
                ?>
            '<?php echo $chart3->content; ?>',
            <?php
            }}
            ?>
            ],
            borderColor: [
                <?php
            if($charts == TRUE){foreach($charts as $chart4){
                ?>
            '<?php echo $chart4->content; ?>',
            <?php
            }}
            ?>
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
</div>