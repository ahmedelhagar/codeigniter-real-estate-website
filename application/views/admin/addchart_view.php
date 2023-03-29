
<h4 class="tag"> Control Pages </h4>
<div class="col-lg-12 col-md-12 col-sm-12 btnss">
    <a href="<?php echo base_url().'hayatadmin/addchart'; ?>" class="btn btn-primary add">
        <span class="fa fa-plus"></span> Add Month</a>
</div>
<link rel="stylesheet" href="<?php echo base_url().'vendor/colorpicker/'; ?>css/colorpicker.css" type="text/css" />
	<script type="text/javascript" src="<?php echo base_url().'vendor/colorpicker/'; ?>js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url().'vendor/colorpicker/'; ?>js/colorpicker.js"></script>
    <script type="text/javascript" src="<?php echo base_url().'vendor/colorpicker/'; ?>js/eye.js"></script>
    <script type="text/javascript" src="<?php echo base_url().'vendor/colorpicker/'; ?>js/utils.js"></script>
    <script type="text/javascript" src="<?php echo base_url().'vendor/colorpicker/'; ?>js/layout.js?ver=1.0.2"></script>
        <?php 
    $atrr = array(
    'class' => 'col-lg-10 col-md-10 col-sm-12 addData'
    );
    if($this->uri->segment(2) == 'edit' OR $this->uri->segment(2) == 'editchartCheck'){
        $check='hayatadmin/editchartCheck/'.$this->uri->segment(3);
    }else{
        $check='hayatadmin/addchartCheck/';
    }
    echo form_open(base_url().$check,$atrr);
    ?>
        <?php echo validation_errors('<div class="alert alert-danger alert-dismissible fade show" role="alert">',
    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button></div>'); ?>
<h3>Month Page</h3>
<?php
        $title = array(
        'type'=>'text',
        'autocomplete'=>'off',
        'class'=>'form-control',
        'name'=>'title',
        'placeholder'=>'Month / Year'
        );
        if($this->uri->segment(2) == 'edit' OR $this->uri->segment(2) == 'editchartCheck'){
        $title['value']=$i_title;
        }
            echo form_input($title);
        ?>
<?php
        $file = array(
        'type'=>'text',
        'autocomplete'=>'off',
        'class'=>'form-control',
        'name'=>'file',
        'placeholder'=>'Value'
        );
        if($this->uri->segment(2) == 'edit' OR $this->uri->segment(2) == 'editchartCheck'){
        $file['value']=$i_file;
        }
            echo form_input($file);
        ?>
<?php
        $content = array(
        'type'=>'text',
        'autocomplete'=>'off',
        'class'=>'form-control',
        'name'=>'content',
        'placeholder'=>'Color Like #ffffff'
        );
        if($this->uri->segment(2) == 'edit' OR $this->uri->segment(2) == 'editchartCheck'){
        $content['value']=$i_content;
        }
            echo form_input($content);
        ?>
<p id="colorpickerHolder">
                </p>
<?php
        $go = array(
        'type'=>'submit',
        'autocomplete'=>'off',
        'class'=>'btn btn-success addd',
        'name'=>'add',
        'value'=>'Add'
        );
        if($this->uri->segment(2) == 'edit' OR $this->uri->segment(2) == 'editchartCheck'){
            $go['value']='Update';
        }
            echo form_input($go);
        ?>
<?php echo form_close(); ?>
