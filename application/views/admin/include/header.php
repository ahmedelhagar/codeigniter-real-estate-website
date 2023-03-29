<!DOCTYPE html>
<html lang="ar">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
    <link rel="shortcut icon" href="../capture_N3V_icon.ico" type="image/x-icon">
  <title><?php echo $title; ?></title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url(); ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- font aweasome -->
  <link href="<?php echo base_url(); ?>vendor/fontaweasome/css/all.css" rel="stylesheet">
  <!-- Slick Slider CSS -->
  <link href="<?php echo base_url(); ?>vendor/css/slick-theme.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>vendor/css/slick.css" rel="stylesheet">
  <!-- Style CSS -->
<?php $this->load->view('ar_style_view'); ?>
    
</head>

<body>
<div id="load"></div>
    <span class="fa fa-bars admin-toggler"></span>
    <div class="col-lg-3 col-md-3 col-sm-12 admin-menu2">
    </div>
  <!-- Navigation -->
    <div class="col-lg-3 col-md-3 col-sm-12 admin-menu">
        <h6><a href="<?php echo base_url().'arthouseadmin/'; ?>"><span class="fa fa-gamepad"></span> لوحة تحكم الموقع</a>
        <span class="fa fa-times admin-toggler2"></span>
        </h6>
        <ul>
            <div class="subber">
                <span class="fa fa-folder-open"></span>
                التحكم في الموقع</div>
            <li class="a-menu">
                <a href="<?php echo base_url().'arthouseadmin/arthousepages'; ?>">
                <span class="fa fa-file"></span>
                الصفحات
                </a>
            </li>
            <li class="a-menu">
                <a href="<?php echo base_url().'arthouseadmin/news'; ?>">
                <span class="fa fa-pen"></span>
                الأخبار
                </a>
            </li>
            <li class="a-menu">
                <a href="<?php echo base_url().'arthouseadmin/pic'; ?>">
                <span class="fa fa-border-none"></span>
                صور المشاريع
                </a>
            </li>
            <li class="a-menu">
                <a href="<?php echo base_url().'arthouseadmin/projects'; ?>">
                <span class="fa fa-list"></span>
                المشاريع
                </a>
            </li>
            <!--
            <li class="a-menu">
                <a href="<?php //echo base_url().'arthouseadmin/career'; ?>">
                <span class="fa fa-user-tie"></span>
                Careers
                    <div class="aler"><?php
                        /*$num = $this->main_model->getByDataw('items','(state = 13)','count');
                        if($num == ''){$num=0;}
                        echo $num;*/
                        ?></div>
                </a>
            </li>
            <li class="a-menu">
                <a href="<?php //echo base_url().'arthouseadmin/supplies'; ?>">
                <span class="fa fa-layer-group"></span>
                Supplies
                    <div class="aler"><?php
                        /*$num2 = $this->main_model->getByDataw('items','(state = 14)','count');
                        if($num2 == ''){$num2=0;}
                        echo $num2;*/
                        ?></div>
                </a>
            </li>-->
            <li class="a-menu">
                <a href="<?php echo base_url().'arthouseadmin/arthouseenq'; ?>">
                <span class="fa fa-envelope"></span>
                التواصلات
                    <div class="aler"><?php
                        $num3 = $this->main_model->getByDataw('items','(state = 15)','count');
                        if($num3 == ''){$num3=0;}
                        echo $num3;
                        ?></div>
                </a>
            </li>
            <!--<li class="a-menu">
                <a href="<?php //echo base_url().'arthouseadmin/certificates'; ?>">
                <span class="fa fa-trophy"></span>
                Certificates
                </a>
            </li>-->
            <li class="a-menu">
                <a href="<?php echo base_url().'arthouseadmin/client'; ?>">
                <span class="fa fa-award"></span>
                الخدمات
                </a>
            </li>
            <!--<li class="a-menu">
                <a href="<?php //echo base_url().'arthouseadmin/chart'; ?>">
                <span class="fa fa-chart-bar"></span>
                Chart
                </a>
            </li>-->
            <div class="subber">
                <span class="fa fa-lock"></span>
                الإعدادات</div>
            <li class="a-menu">
                <a href="<?php echo base_url().'arthouseadmin/admins'; ?>">
                <span class="fa fa-users"></span>
                المديرين
                </a>
            </li>
            <li class="a-menu">
                <a href="<?php echo base_url().'arthouseadmin/arthousesettings/'; ?>">
                <span class="fa fa-cog"></span>
                إعدادات الموقع
                </a>
            </li>
            <li class="a-menu">
                <a href="<?php echo base_url().'logout'; ?>">
                <span class="fa fa-sign-out-alt"></span>
                خروج
                </a>
            </li>
        </ul>
    </div>
  <!-- End Navigation -->
    
  <!-- Page Content -->
  <div class="col-lg-9 col-md-9 col-sm-12 content admin-c">