<div class="container-fluid px-0 float-right page-banner">
  <h3><?php echo $langArray['portfolio']; ?></h3>
  <span><?php echo $langArray['home']; ?> / <?php echo $langArray['portfolio']; ?></span>
</div>
      <!--End News-->
      <div class="container py-3 pros-pg">
        <div class="col-lg-12 col-md-12 col-sm-12 gallery">
          <?php if($pros2 == TRUE){foreach($pros2 as $ti22){ ?>
            <!--Item-->
            <div class="col-lg-4 col-md-4 col-sm-12 g-itm">
              <div class="getGallery" onclick="getGallery('<?php echo $ti22->id; ?>')">
                    <div class="col-lg-12 col-md-12 col-sm-12 inner-item">
                        <img src="<?php echo $ti22->keywords; ?>" alt="item">
                        <div class="inner ite" style="border-top-left-radius:20px !important;border-top-right-radius:20px !important;">
                            <h4 class="item-title-ho">
                                <span class="fa fa-external-link-alt"></span></h4>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 item-det">
                                <h4>
                                <?php echo $ti22->title; ?></h4>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Item-->
            <?php }}else{echo 'There is no thing to show';} ?>
        </div>
      </div>