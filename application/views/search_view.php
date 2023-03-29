      <!--News-->
          <div class="news">News</div>
      <marquee class="news-bar" dir="ltr" onmouseover="this.stop();" onmouseout="this.start();">
          <?php if($news == TRUE){foreach($news as $ti2){ ?>
          <a href="<?php echo base_url().'page/'.$ti2->id; ?>"><?php echo $ti2->title; ?></a> - 
          <?php }} ?>
        </marquee>
      <!--End News-->
<h4 class="col-lg-12 col-md-12 col-sm-12">Search Page</h4>
<div class="col-lg-12 col-md-12 col-sm-12 latest">
    <h4 class="tag"> Search Results </h4>
          <?php if($search == TRUE){foreach($search as $ti){ ?>
          <div class="col-lg-3 col-md-3 col-sm-12 _card">
              <div class="col-lg-12 col-md-12 col-sm-12 card">
                  <img class="card-img-top" src="<?php echo $ti->file; ?>" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title"><a href="<?php echo base_url().'page/'.$ti->id; ?>"><?php echo $ti->title; ?></a></h5>
                    <p class="card-text"><?php echo substr(strip_tags($ti->content),0,100).'...'; ?></p>
                  </div>
                </div>
          </div>
            <?php }}else{echo '<h4>There is no results to show.</h4>';} ?>
</div>