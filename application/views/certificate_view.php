<!--News-->
          <div class="news">News</div>
      <marquee class="news-bar" dir="ltr" onmouseover="this.stop();" onmouseout="this.start();">
          <?php if($news == TRUE){foreach($news as $ti2){ ?>
          <a href="<?php echo base_url().'page/'.$ti2->id; ?>"><?php echo $ti2->title; ?></a> - 
          <?php }} ?>
        </marquee>
<!--End News-->
      <h4 class="col-lg-12 col-md-12 col-sm-12">Certificates</h4>
      <div class="col-lg-12 col-md-12 col-sm-12 gallery">
          <?php if($record){foreach($record as $cert){ ?>
          <!--Item-->
          <div class="col-lg-4 col-md-4 col-sm-12 g-item">
            <a href="<?php echo base_url().'page/'.$cert->id; ?>">
                  <div class="col-lg-12 col-md-12 col-sm-12 inner-item">
                      <img class="inner-img" src="<?php echo $cert->file; ?>" alt="item">
                      <div class="inner ite">
                          <h4 class="item-title">
                              <span class="fa fa-eye"></span></h4>
                      </div>
                  </div>
              </a>
          </div>
          <!--End Item-->
        <?php }}else{echo 'There is no thing to show';} ?>
      </div>