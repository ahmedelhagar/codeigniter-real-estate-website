<div class="container-fluid px-0 float-right page-banner">
  <h3><?php echo $langArray['services']; ?></h3>
  <span><?php echo $langArray['home']; ?> / <?php echo $langArray['services']; ?></span>
</div>
      <!--End News-->
      <div class="container py-3">
        <div class="col-lg-12 col-md-12 col-sm-12 gallery">
          <?php if($record == TRUE){foreach($record as $ti22){ ?>
            <!--Item-->
            <div class="col-lg-4 col-md-4 col-sm-12 g-itm">
              <a href="<?php echo base_url().'page/'.$ti22->id; ?>">
                    <div class="col-lg-12 col-md-12 col-sm-12 inner-item">
                        <img src="<?php echo $ti22->file; ?>" alt="item">
                        <div class="inner ite ite-ser">
                            <h4 class="item-title-ho">
                                <span class="fa fa-external-link-alt"></span></h4>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 item-det">
                                <h4>
                                <?php echo $ti22->title; ?></h4>
                                <div class="text-center" style="color:#6e6e6e;padding:0px 10px 10px 10px;"><?php echo preg_replace('!\s+!', ' ',mb_substr(strip_tags($ti22->content),0,150, "utf-8")).'...'; ?></div>
                        </div>
                    </div>
                </a>
            </div>
            <!--End Item-->
            <?php }}else{echo 'There is no thing to show';} ?>
        </div>
      </div>