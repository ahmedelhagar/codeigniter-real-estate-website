<div class="container-fluid px-0 float-right page-banner">
  <h3><?php echo $langArray['contact_us']; ?></h3>
  <span><?php echo $langArray['home']; ?> / <?php echo $langArray['contact_us']; ?></span>
</div>
      <!--End News-->
      <div class="col-lg-12 col-md-12 col-sm-12 gallery px-0">
          <div class="col-lg-12 col-md-12 col-sm-12 dets map">
          <p class="text-center" style="font-weight:bold;"><?php echo $langArray['contact_text1']; ?></p>
          <p class="text-center" style="font-weight:bold;"><?php echo $langArray['contact_text2']; ?></p>
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
<?php
        $content = array(
        'autocomplete'=>'off',
        'class'=>'form-control',
        'name'=>'content',
        'placeholder'=>'Write Here, What do you need?'
        );
            echo form_textarea($content);
        ?>
<?php
        $go = array(
        'type'=>'submit',
        'autocomplete'=>'off',
        'class'=>'btn btn-warning addd',
        'name'=>'apply',
        'value'=>'Send'
        );
            echo form_input($go);
        ?>
</div>
<div class="col-lg-6 col-md-6 col-sm-12 float-right">
<img src="<?php echo base_url('vendor/images/contact.jpg'); ?>" class="center-img contact-img" alt="">
<?php
        $title = array(
        'type'=>'text',
        'autocomplete'=>'off',
        'class'=>'form-control',
        'name'=>'title',
        'placeholder'=>'Your Name'
        );
            echo form_input($title);
        ?>
<?php
        $keywords = array(
        'type'=>'email',
        'autocomplete'=>'off',
        'class'=>'form-control',
        'name'=>'keywords',
        'placeholder'=>'E-Mail'
        );
            echo form_input($keywords);
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
                  <p>Address: <?php echo $settings['c_add']; ?></p>
                  <p style="width: 56%;margin: auto;"><span class="float-right">Telephone: <?php echo $settings['telephone']; ?></span><span class="float-left">E-Mail: <?php echo $settings['email']; ?></span></p>
                </div>
              </div>
              <iframe src="<?php echo $settings['address']; ?>" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>
      </div>