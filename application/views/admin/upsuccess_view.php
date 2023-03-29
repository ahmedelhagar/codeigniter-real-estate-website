<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
    <link rel="shortcut icon" href="../capture_N3V_icon.ico" type="image/x-icon">
  <title>Uploader</title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url(); ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- font aweasome -->
  <link href="<?php echo base_url(); ?>vendor/fontaweasome/css/all.css" rel="stylesheet">
  <!-- Slick Slider CSS -->
  <link href="<?php echo base_url(); ?>vendor/css/slick-theme.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>vendor/css/slick.css" rel="stylesheet">
  <!-- Style CSS -->
  <link href="<?php echo base_url(); ?>vendor/css/style.css" rel="stylesheet">
<style type="text/css">
    body{
        text-align: center;
    }
    .uplink {
    word-break: break-all;
    width: 200px;
    padding: 10px;
    background: #fff;
    border: 2px solid #ddd;
    font-size: 12px;
    }
    .btn {
    margin: 5px auto;
    font-size: 14px;
    border-radius: 0px;
    }
</style>
</head>
<body>

<h6>Your Image was successfully uploaded!</h6>
<?php
        if(isset($width) && isset($height)){
            ?>
    <ul>
        <?php echo $width.' X '.$height; ?>
    <div class="uplink" id="tocopy2">
<?php
            $file = explode('.',$upload_data['file_name']);
    echo '<a href="'.base_url().'vendor/uploads/'.$file[0].'_thumb.'.$file[1].'" target="_blank">'.base_url().'vendor/uploads/'.$file[0].'_thumb.'.$file[1].'</a>';
    ?>
        </div>
</ul>
    <a href="<?php echo base_url().'upload/'; ?>" class="btn btn-primary"><span class="fa fa-upload"></span> Upload Another File!</a>
    <a id="tocopy2" class="btn btn-success" href="#" name="copy_pre"><span class="fa fa-copy"></span> Copy Link</a>
    
    <?php
        }
    ?>
<ul>
    <?php echo 'Original Image'; ?>
    <div class="uplink" id="tocopy">
<?php
    echo '<a href="'.base_url().'vendor/uploads/'.$upload_data['file_name'].'" target="_blank">'.base_url().'vendor/uploads/'.$upload_data['file_name'].'</a>';
    ?>
        </div>
</ul>
<a href="<?php echo base_url().'upload/'; ?>" class="btn btn-primary"><span class="fa fa-upload"></span> Upload Another File!</a>
    <a id="tocopy" class="btn btn-success" href="#" name="copy_pre"><span class="fa fa-copy"></span> Copy Link</a>
    
  <!-- Bootstrap core JavaScript -->
  <script src="<?php echo base_url(); ?>vendor/jquery/jquery.slim.min.js"></script>
  <script src="<?php echo base_url(); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url(); ?>vendor/js/home.js"></script>
  <script src="<?php echo base_url(); ?>vendor/js/slick.js"></script>
</body>
</html>