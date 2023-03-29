      <!--News-->
          <div class="news">News</div>
      <marquee class="news-bar" dir="ltr" onmouseover="this.stop();" onmouseout="this.start();">
          <?php if($news == TRUE){foreach($news as $ti2){ ?>
          <a href="<?php echo base_url().'page/'.$ti2->id; ?>"><?php echo $ti2->title; ?></a> - 
          <?php }} ?>
        </marquee>
      <!--End News-->
      <h4 class="col-lg-12 col-md-12 col-sm-12">Projects Pictures</h4>
      <div class="col-lg-3 col-md-3 col-sm-12 cates">
          <div class="col-lg-12 col-md-12 col-sm-12 widget cates">
              <h6>Categories</h6>
              <ul>
                  <?php if($cats == TRUE){foreach($cats as $ti2){ ?>
                  <li><a href="<?php echo base_url().'pages/cat/'.$ti2->id; ?>"><?php echo $ti2->title; ?></a></li>
                  <?php }} ?>
              </ul>
          </div>
      </div>

      <div class="col-lg-9 col-md-9 col-sm-12 gallery">
          <?php if($pics == TRUE){foreach($pics as $ti){ ?>
          <!--Item-->
          <div class="col-lg-3 col-md-3 col-sm-12 g-item">
            <a href="<?php echo base_url().'page/'.$ti->id; ?>">
                  <div class="col-lg-12 col-md-12 col-sm-12 inner-item">
                      <img src="<?php echo $ti->file; ?>" alt="item">
                      <div class="inner ite">
                          <h4 class="item-title">
                              <span class="fa fa-eye"></span></h4>
                      </div>
                  </div>
              </a>
          </div>
          <!--End Item-->
          <?php }} ?>
          <!-- Pagination -->
      <ul class="pagination justify-content-center pager"><?php echo $pager; ?></ul>
      </div>