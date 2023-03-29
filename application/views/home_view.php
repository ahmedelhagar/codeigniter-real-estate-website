      <!--Slider-->
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                  <?php
                      if($slider){$x=1;foreach($slider as $slide){
                  ?>
              <div class="carousel-item <?php if($x==1){echo 'active';} ?>">
                  <img class="d-block w-100" src="<?php echo $slide->file; ?>" alt="First slide">
                    <div class="inner"></div>
                    <h4 class="img-block"><?php echo $slide->title; ?>
                    <p><a href="<?php echo $slide->content; ?>" class="rm-slide"><?php echo $langArray['read_more']; ?></a></p>
                    </h4>
                </div>
                  <?php $x++;}}else{echo 'There`s no slides to show';} ?>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="fa fa-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="fa fa-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          <!--End Slider-->
          <div class="col-lg-12 col-md-12 col-sm-12 latest">
            <img class="who-img" src="<?php echo base_url().'vendor/images/who.png'; ?>" alt="ART HOUS">
              <div class="who">
              <h2><?php echo $langArray['who_are_we']; ?></h2>
                <?php echo $settings['welcome']; ?> 
                <div class="col-lg-12 col-md-12 col-sm-12 float-<?php echo $langArray['float']; ?> text-<?php echo $langArray['unfloat']; ?> mt-4">
                  <a href="<?php echo base_url().'pages/who'; ?>" class="view-all"><?php echo $langArray['read_more']; ?></a>
                </div>
              </div>
          </div>
      <div class="col-lg-12 col-md-12 col-sm-12 vv service-block">
        <h2><?php echo $langArray['our_services']; ?></h2>
        <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
          <?php $x=1;while($x <= 3){ ?>
          <!--Item-->
          <div class="carousel-item<?php if($x == 1){echo ' active';} ?>">
            <div class="col-lg-10 col-md-11 col-sm-12 px-3 mx-auto">
            <?php if($x == 1){ ?>
                <?php if($clients1){foreach($clients1 as $client){ ?>
                <!--Item-->
                <div class="col-lg-3 col-md-3 col-sm-12 px-2 py-2 float-left">
                  <a href="<?php echo base_url().'page/'.$client->id; ?>">
                    <div class="col-lg-12 col-md-12 col-sm-12 service-item">
                      <img src="<?php echo $client->file; ?>" alt="">
                      <h4><?php echo $client->title; ?></h4>
                      <div class="ser-desc">
                        <?php echo preg_replace('!\s+!', ' ',mb_substr(strip_tags($client->content),0,110, "utf-8")).'...'; ?>
                      </div>
                    </div>
                  </a>
                </div>
                <?php }} ?>
                <?php }elseif($x == 2){ ?>
                <?php if($clients2){foreach($clients2 as $client){ ?>
                <!--Item-->
                <div class="col-lg-3 col-md-3 col-sm-12 px-2 float-left">
                  <a href="<?php echo base_url().'page/'.$client->id; ?>">
                    <div class="col-lg-12 col-md-12 col-sm-12 service-item">
                      <img src="<?php echo $client->file; ?>" alt="">
                      <h4><?php echo $client->title; ?></h4>
                      <div class="ser-desc">
                        <?php echo preg_replace('!\s+!', ' ',mb_substr(strip_tags($client->content),0,150, "utf-8")).'...'; ?>
                      </div>
                    </div>
                  </a>
                </div>
                <?php }} ?>
                <?php }elseif($x == 3){ ?>
                <?php if($clients3){foreach($clients3 as $client){ ?>
                <!--Item-->
                <div class="col-lg-3 col-md-3 col-sm-12 px-2 float-left">
                  <a href="<?php echo base_url().'page/'.$client->id; ?>">
                    <div class="col-lg-12 col-md-12 col-sm-12 service-item">
                      <img src="<?php echo $client->file; ?>" alt="">
                      <h4><?php echo $client->title; ?></h4>
                      <div class="ser-desc">
                        <?php echo preg_replace('!\s+!', ' ',mb_substr(strip_tags($client->content),0,150, "utf-8")).'...'; ?>
                      </div>
                    </div>
                  </a>
                </div>
                <?php }} ?>
                <?php } ?>
              </div>
            </div>
            <?php $x++;} ?>

          </div>
          <ol class="carousel-indicators ci2">
            <li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators2" data-slide-to="2"></li>
          </ol>
        </div>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12 latest">
          <h2><?php echo $langArray['business_gallery']; ?></h2>
          <div class="container">
            <?php if($pros){foreach($pros as $client){ ?>
            <!--Item-->
            <div class="col-lg-3 col-md-3 col-sm-12 px-2 py-2 float-left">
                <div class="getGallery" onclick="getGallery('<?php echo $client->c_id; ?>')">
                  <div class="col-lg-12 col-md-12 col-sm-12 service-item inner-item">
                    <img src="<?php echo $client->file; ?>" alt="">
                    <div class="inner ite">
                        <div style="margin-top: 105px;color:#fff;">
                          <?php echo $client->title; ?>
                        </div>
                        <h4 class="item-title-ho"><span class="fa fa-eye"></span></h4>
                    </div>
                  </div>
                </div>
              </div>
            <?php }} ?>
            <div class="col-lg-12 col-md-12 col-sm-12 float-left my-3 py-3">
              <a href="<?php echo base_url().'pages/projects'; ?>" class="view-all"><?php echo $langArray['view_all_work']; ?></a>
            </div>
          </div>
      </div>

      <div class="col-lg-12 col-md-12 col-sm-12 latest">
          <h2><?php echo $langArray['latest_news']; ?></h2>
          <div class="container">
            <?php if($news == TRUE){foreach($news as $ti){ ?>
            <div class="col-lg-6 col-md-6 col-sm-12 latest">
              <img class="who-img2" src="<?php echo $ti->file; ?>" alt="ART HOUS">
                <div class="who2">
                <h4><a href="<?php echo base_url().'page/'.$ti->id; ?>"><?php echo $ti->title; ?></a></h4>
                <p style="color: #b0b0b0;"><?php echo $ti->date; ?></p>
                    <?php echo substr(strip_tags($ti->content),0,100).'...'; ?>
                </div>
            </div>
            <?php }}else{echo '<h4>There is no news to show.</h4>';} ?>
              
            <div class="col-lg-12 col-md-12 col-sm-12 vv">
            <a href="<?php echo base_url().'pages/events'; ?>" class="view-all">
            <?php echo $langArray['view_all_news']; ?></a>
            </div>
          </div>
      </div>
