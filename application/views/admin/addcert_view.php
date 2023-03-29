
<script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>
<h4 class="tag"> Control Pages </h4>
<div class="col-lg-12 col-md-12 col-sm-12 btnss">
    <a href="<?php echo base_url().'hayatadmin/addoriginalpage'; ?>" class="btn btn-primary add">
        <span class="fa fa-plus"></span> Add Certificate</a>
</div>
        <?php 
    $atrr = array(
    'class' => 'col-lg-10 col-md-10 col-sm-12 addData'
    );
    if($this->uri->segment(2) == 'edit' OR $this->uri->segment(2) == 'editcertCheck'){
        $check='hayatadmin/editcertCheck/'.$this->uri->segment(3);
    }else{
        $check='hayatadmin/addcertCheck/';
    }
    echo form_open(base_url().$check,$atrr);
    ?>
        <?php echo validation_errors('<div class="alert alert-danger alert-dismissible fade show" role="alert">',
    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button></div>'); ?>
<h3>Certificate Page</h3>
<?php
        $title = array(
        'type'=>'text',
        'autocomplete'=>'off',
        'class'=>'form-control',
        'name'=>'title',
        'placeholder'=>'Title'
        );
        if($this->uri->segment(2) == 'edit' OR $this->uri->segment(2) == 'editcertCheck'){
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
        'placeholder'=>'Image Width : 300 X Height : 300'
        );
        if($this->uri->segment(2) == 'edit' OR $this->uri->segment(2) == 'editcertCheck'){
        $file['value']=$i_file;
        }
            echo form_input($file);
        ?>
<textarea name="editor1">
    <?php
        if($this->uri->segment(2) == 'edit' OR $this->uri->segment(2) == 'editcertCheck'){
                echo $i_content;
                }
    ?>
</textarea>
<?php
        $go = array(
        'type'=>'submit',
        'autocomplete'=>'off',
        'class'=>'btn btn-success addd',
        'name'=>'add',
        'value'=>'Add'
        );
        if($this->uri->segment(2) == 'edit' OR $this->uri->segment(2) == 'editcertCheck'){
            $go['value']='Update';
        }
            echo form_input($go);
        ?>
<?php echo form_close(); ?>
<script>
    CKEDITOR.replace( 'editor1' );
</script>