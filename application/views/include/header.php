<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>capture_N3V_icon.ico" type="image/x-icon">
  <title><?php echo $title; ?></title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url(); ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- font aweasome -->
  <link href="<?php echo base_url(); ?>vendor/fontaweasome/css/all.css" rel="stylesheet">
  <!-- Slick Slider CSS -->
  <link href="<?php echo base_url(); ?>vendor/css/slick-theme.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>vendor/css/slick.css" rel="stylesheet">
  <!-- Style CSS -->
<?php $this->load->view($langArray['lang'].'_style_view'); ?>
</head>

<body>
<header>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top fixed-top" id="menuTop">
<!-- Navigation -->
<div class="col-lg-7 col-md-7 col-sm-8 fixed-top topper" id="topper">
<?php
    if($langArray['lang'] == 'ar'){
        $dropLang = '<div class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> عربي</div><div class="dropdown-menu" aria-labelledby="dropdownMenuButton"><a class="dropdown-item" href="'.base_url('pages/lang/en').'">English</a></div>';
        $floater = $langArray['unfloat'];
    ?>
    <div class="float-<?php echo $langArray['float']; ?> lang">
          <?php echo $dropLang; ?>
        </div>
      <?php
    }
    ?>
    <div class="telephone">
        <span class="fa fa-phone-alt"></span>
        <?php echo $settings['telephone']; ?>
    </div>
    <div class="email">
        <span class="fa fa-envelope"></span>
        <?php echo $settings['email']; ?>
    </div>
    <?php 
      if($langArray['lang'] == 'en'){
        $dropLang = '<div class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> English</div><div class="dropdown-menu" aria-labelledby="dropdownMenuButton"><a class="dropdown-item" href="'.base_url('pages/lang/ar').'">عربي</a></div>';
        $floater = $langArray['float'];
        ?>
        <div class="float-<?php echo $langArray['float']; ?> lang">
          <?php echo $dropLang; ?>
        </div>
      <?php
        }
        ?>
    <div class="float-<?php echo $floater; ?> top-icos">
      <!-- Icons -->
      <a class="ic-top" href="<?php echo $settings['linkedin']; ?>">
        <i class="fab fa-whatsapp fa-lg fa-2x"> </i>
      </a>
      <a class="ic-top" href="<?php echo $settings['youtube']; ?>">
        <i class="fab fa-instagram fa-lg fa-2x"> </i>
      </a>
      <a class="ic-top" href="<?php echo $settings['facebook']; ?>">
        <i class="fab fa-facebook-f fa-lg fa-2x"> </i>
      </a>
    </div>
</div>
    <div class="container-fluid">
    <?php if($langArray['lang'] == 'en'){
      ?>
      <!-- Logo -->
      <a class="navbar-brand" href="<?php echo base_url(); ?>">
          <img class="logo" src="<?php echo $settings['logo']; ?>" alt="logo">
      </a>
      <?php
      }
      ?>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="fa fa-bars"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item <?php if($this->uri->segment(1) == ''){echo 'active';} ?>">
            <a class="nav-link" href="<?php echo base_url(); ?>"><?php echo $langArray['home']; ?>
                <?php if($this->uri->segment(1) == ''){echo '<span class="sr-only">(current)</span>';} ?>
            </a>
          </li>
            <?php if($records){foreach ($records as $row){
            if($row->state == 0 OR $row->state == 2){
            ?>
              <li class="nav-item <?php if($this->uri->segment(1) == 'aa'){echo 'active';} ?>">
                <a class="nav-link" href="<?php 
                                          if($row->state == 0){
                                              echo base_url().'page/'.$row->id;
                                          }elseif($row->state == 2){
                                              echo $row->content;
                                          }
                                          ?>">
                    <?php echo $row->title; ?>
                    <?php if($this->uri->segment(1) == 'aa'){echo '<span class="sr-only">(current)</span>';} ?>
                </a>
              </li>
            <?php }elseif($row->state == 1){
                $dropped = $this->main_model->getByDataw('items','((c_id ='.$row->id.' AND state = 0) OR (c_id ='.$row->id.' AND state = 2))');
            ?>
                    <li class="nav-item dropdown <?php if($dropped){foreach($dropped as $d_item2){
                if($this->uri->segment(2) == $d_item2->id){
                    echo 'active';
                 }
            }} ?>">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php echo $row->title; ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php if($dropped){foreach($dropped as $d_item){ ?>
                  <a class="dropdown-item <?php 
                            if($this->uri->segment(2) == $d_item->id){echo 'active';}
                            ?>" href="<?php 
                                          if($d_item->state == 0){
                                              echo base_url().'page/'.$d_item->id;
                                          }elseif($d_item->state == 2){
                                              echo $d_item->content;
                                          }
                                          ?>"><?php echo $d_item->title; ?></a>
                    <?php }} ?>
                </div>
              </li>
                <?php }}} ?>
        </ul>
      </div>
      <?php if($langArray['lang'] == 'ar'){
      ?>
      <!-- Logo -->
      <a class="navbar-brand" href="<?php echo base_url(); ?>">
          <img class="logo" src="<?php echo $settings['logo']; ?>" alt="logo">
      </a>
      <?php
      }
      ?>
    </div>
  </nav>
</header>
      <div class="col-lg-12 col-md-12 col-sm-12 search">
          <form action="<?php echo base_url().'pages/search' ?>" method="get">
              <input placeholder="Type A Word To Search For..." class="form-control search-bar" name="search" type="text">
              <button name="go">
                  <span class="fa fa-search"></span>
              </button>
          </form>
      </div>
      <!-- Page Content -->
  <div class="container-fluid content">
      <div id="toTop" class="fa fa-arrow-up"></div>