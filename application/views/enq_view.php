        <?php 
    $atrr = array(
    'class' => 'col-lg-7 col-md-7 col-sm-12 addData'
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
<h4 class="col-lg-12 col-md-12 col-sm-12">Messege Us</h4>
<h6 class="apply-cv">Your Name</h6><br />
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
<h6 class="apply-cv">E-Mail</h6><br />
<?php
        $keywords = array(
        'type'=>'email',
        'autocomplete'=>'off',
        'class'=>'form-control',
        'name'=>'keywords',
        'placeholder'=>'E-Mail'
        );
            echo form_input($keywords);
        ?><br />
<h6 class="apply-cv">Attachments</h6><br />
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