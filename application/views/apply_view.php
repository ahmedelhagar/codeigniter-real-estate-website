        <?php 
    $atrr = array(
    'class' => 'col-lg-7 col-md-7 col-sm-12 addData'
    );
if(is_numeric($this->uri->segment(2))){
        $check='applyCheck/'.$this->uri->segment(2);
}else{
    $check='#';
}
    echo form_open_multipart(base_url().$check,$atrr);
    ?>
        <?php echo validation_errors('<div class="alert alert-danger alert-dismissible fade show" role="alert">',
    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button></div>');
if($this->uri->segment(2) == 'done' && !isset($job) && !isset($error['error'])){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">'.'Applied Successfully'.'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button></div>
    <meta http-equiv = "refresh" content = "3; url = '.base_url().'" />
    ';
}
?>
<h4 class="col-lg-12 col-md-12 col-sm-12">Apply Page</h4>
<?php 
if(isset($error['error'])){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'.$error['error'].'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button></div>';
  }
if(isset($job) && $job == TRUE){
    ?>
<h6>Apply For : <a href="<?php echo base_url().'page/'.$job[0]->id; ?>"><?php echo $job[0]->title; ?></a></h6>
<?php
}elseif($this->uri->segment(2) == 'done'){}else{
    redirect(base_url());
}
?>

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
<h6 class="apply-cv">CV / Porfolio</h6><br />
<?php
        $file = array(
        'type'=>'file',
        'autocomplete'=>'off',
        'name'=>'userfile',
        );
            echo form_input($file);
        ?><br />
<code>Available : .pdf , .docx , .rar , .zip And MAX SIZE 50 MB</code><br />
<h6 class="apply-cv">Extra Text</h6><br />
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
        'class'=>'btn btn-success addd',
        'name'=>'apply',
        'value'=>'Apply'
        );
            echo form_input($go);
        ?>
<?php echo form_close(); ?>