      <!--News-->
          <div class="news">News</div>
      <marquee class="news-bar" dir="ltr" onmouseover="this.stop();" onmouseout="this.start();">
          <?php if($news == TRUE){foreach($news as $ti2){ ?>
          <a href="<?php echo base_url().'page/'.$ti2->id; ?>"><?php echo $ti2->title; ?></a> - 
          <?php }} ?>
        </marquee>
      <!--End News-->
<h4 class="col-lg-12 col-md-12 col-sm-12">Suppliers</h4>
<div class="container">
    <?php if(isset($careers) && $careers == TRUE){foreach($careers as $career){ ?>
    <div class="career">
        <a href="<?php echo base_url().'page/'.$career->id; ?>">
            <h4><?php echo $career->title; ?></h4>
        </a>
        <a href="<?php echo base_url().'apply/'.$career->id; ?>"><div class="apply"><span class="fa fa-file"></span> Apply</div></a>
    </div>
    <?php }}else{echo '<h3>There is no supplier jobs.</h3>';} ?>
</div>