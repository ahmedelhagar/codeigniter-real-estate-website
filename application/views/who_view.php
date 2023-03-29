<div class="container-fluid px-0 float-right page-banner">
  <h3><?php echo $langArray['who_are_us']; ?></h3>
  <span><?php echo $langArray['home']; ?> / <?php echo $langArray['who_are_us']; ?></span>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 float-left py-4">
  <div class="container">
    <div class="col-lg-7 col-md-7 col-sm-12 float-<?php echo $langArray['float']; ?> text-<?php echo $langArray['float']; ?> who-con">
    <h3><?php echo $langArray['who_are_us']; ?></h3>
      <?php echo $settings['welcome']; ?>
    </div>
    <div class="col-lg-5 col-md-5 col-sm-12 float-<?php echo $langArray['float']; ?> who-img-pg">
      <img src="<?php echo base_url('vendor/images/whopage.png'); ?>">
    </div>
  </div>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 float-left py-4">

  <div class="col-lg-4 col-md-4 col-sm-12 float-left py-2 px-2 text-center">
    <div class="col-lg-12 col-md-12 col-sm-12 float-left text-center who-more">
      <span class="fa fa-eye"></span>
      <h4><?php echo $langArray['our_vision']; ?></h4>
      <?php echo $settings['vision']; ?>
    </div>
  </div>
  <div class="col-lg-4 col-md-4 col-sm-12 float-left py-2 px-2 text-center">
    <div class="col-lg-12 col-md-12 col-sm-12 float-left text-center who-more-m">
      <span class="fa fa-paper-plane"></span>
      <h4><?php echo $langArray['our_vision']; ?></h4>
      <?php echo $settings['mission']; ?>
    </div>
  </div>
  <div class="col-lg-4 col-md-4 col-sm-12 float-left py-2 px-2 text-center">
    <div class="col-lg-12 col-md-12 col-sm-12 float-left text-center who-more">
      <span class="fa fa-bullseye"></span>
      <h4><?php echo $langArray['our_goals']; ?></h4>
      <?php echo $settings['goals']; ?>
    </div>
  </div>

</div>