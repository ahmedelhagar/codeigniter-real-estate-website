<?php
    $item = (array) $record[0];
?>
<div class="container-fluid px-0 float-right page-banner">
  <h3><?php echo $item['title']; ?></h3>
  <span><?php echo $langArray['home']; ?> / <?php 
    if($item['state'] == 9){
        echo $langArray['news'];
    }else{
        echo $langArray['services'];
    }
  ?></span>
</div>
<div class="container">
    <div class="col-lg-12 col-md-12 col-sm-12 cont">
        <div class="col-lg-12 col-md-12 col-sm-12 full-content px-0">
            <?php if($item['state'] == 8){ ?>
            <img src="<?php echo $item['content']; ?>" alt="<?php echo $item['title']; ?>" class="center-img">
            <?php }elseif($item['state'] == 2){
    echo '<meta http-equiv = "refresh" content = "0; url = '.$item['content'].'" />';
    }elseif($item['state'] == 4 OR $item['state'] == 9){
        ?>
        <img src="<?php echo str_replace('_thumb','',$item['file']); ?>" alt="<?php echo $item['title']; ?>" class="top-img">
        <?php
        echo '<div class="py-4 px-4">'.str_replace('../../vendor',base_url().'vendor',$item['content']).'</div>';
        }else{echo str_replace('../../vendor',base_url().'vendor',$item['content']);} ?>
        </div>
        <?php if($item['state'] == 7){
        ?>
            <div class="col-lg-12 col-md-12 col-sm-12 gallery">
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
                        <div class="col-lg-12 col-md-12 col-sm-12 item-det">
                        <h4>
                        <span class="fa fa-file"></span>
                        <?php echo $ti->title; ?></h4>
                </div>
                    </div>
                </a>
            </div>
            <!--End Item-->
            <?php }} ?>
        </div>
        <?php
    } ?>
    </div>
</div>
<!--
<div class="col-lg-3 col-md-3 col-sm-12 side">
    <div class="col-lg-12 col-md-12 col-sm-12 widget">
      <div class="col-lg-12 col-md-12 col-sm-12 latest">
          <h4 class="tag"> Our Clients </h4>
  <section class="center slider">
      <?php //if($clients){foreach($clients as $client){ ?>
    <a href="#">
          <div class="col-lg-12 col-md-12 col-sm-12 inner-item">
              <img src="<?php echo $client->file; ?>" class="c-img" alt="item">
              <div class="inner ite">
                  <h4 class="item-title">
                      <span class="fa fa-eye"></span></h4>
              </div>
          </div>
      </a>
      <?php //}} ?>
  </section>
          <div class="col-lg-12 col-md-12 col-sm-12 vv">
          <a href="<?php //echo base_url().'pages/clients'; ?>" class="view-all">
              <span class="fa fa-eye"></span>
              View Clients</a>
          </div>
      </div>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 widget">
        <h4 class="col-lg-12 col-md-12 col-sm-12 tag"> Contact Us </h4>
            <div class="email">
          <span class="fa fa-envelope"></span>
          <?php //echo $settings['email']; ?></div>
      <div class="telephone">
          <span class="fa fa-phone-alt"></span>
          <?php //echo $settings['telephone']; ?>
      </div>
    </div>
</div>-->