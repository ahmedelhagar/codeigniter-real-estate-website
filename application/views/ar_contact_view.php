<div class="container-fluid px-0 float-right page-banner">
  <h3>اتصل بنا</h3>
  <span>الرئيسية / اتصل بنا</span>
</div>
      <!--End News-->
      <div class="col-lg-12 col-md-12 col-sm-12 gallery px-0">
          <div class="col-lg-12 col-md-12 col-sm-12 dets map">
          <p class="text-center" style="font-weight:bold;">يسعدنا تواصلكم معنا طوال أيام الأسبوع من خلال الاتصال المباشر برقم</p>
          <p class="text-center" style="font-weight:bold;">الهاتف او من خلال ملئ البيانات التالية وإرسال رسالة نصية على بريدنا الإلكتروني</p>
          <?php 
    $atrr = array(
    'class' => 'container'
    );
        $check='pages/enqCheck/';
    echo form_open_multipart(base_url().$check,$atrr);
    ?>
        <?php echo validation_errors('<div class="alert alert-danger alert-dismissible fade show" role="alert">',
    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button></div>');
if($this->uri->segment(3) == 'done'){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">'.'Sent Successfully'.'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button></div>
    <meta http-equiv = "refresh" content = "3; url = '.base_url().'" />
    ';
}
if(isset($error['error'])){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'.$error['error'].'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button></div>';
  }
?>
<div class="col-lg-6 col-md-6 col-sm-12 float-right">
<img src="<?php echo base_url('vendor/images/contact.jpg'); ?>" class="center-img contact-img" alt="">
<?php
        $title = array(
        'type'=>'text',
        'autocomplete'=>'off',
        'class'=>'form-control',
        'name'=>'title',
        'placeholder'=>'الأسم'
        );
            echo form_input($title);
        ?>
<?php
        $keywords = array(
        'type'=>'email',
        'autocomplete'=>'off',
        'class'=>'form-control',
        'name'=>'keywords',
        'placeholder'=>'البريد'
        );
            echo form_input($keywords);
        ?>
</div>
<div class="col-lg-6 col-md-6 col-sm-12 float-right">
<?php
        $content = array(
        'autocomplete'=>'off',
        'class'=>'form-control',
        'name'=>'content',
        'placeholder'=>'الرسالة'
        );
            echo form_textarea($content);
        ?>
<?php
        $go = array(
        'type'=>'submit',
        'autocomplete'=>'off',
        'class'=>'btn btn-warning addd',
        'name'=>'apply',
        'value'=>'إرسال'
        );
            echo form_input($go);
        ?>
</div>
<?php echo form_close(); ?>
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12 map" style="margin:auto !important;">
              <style>
                footer {
                    margin-top: -10px !important;
                }
              </style>
              <div class="container con-dets">
              <div class="col-lg-8 col-md-8 col-sm-12" style="margin:auto;">
                  <p>العنوان: <?php echo $settings['c_add']; ?></p>
                  <p style="width: 56%;margin: auto;"><span class="float-right">الهاتف: <?php echo $settings['telephone']; ?></span><span class="float-left">البريد: <?php echo $settings['email']; ?></span></p>
                </div>
              </div>
              <iframe src="<?php echo $settings['address']; ?>" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>
      </div>