
<h4 class="tag"> Control Pages </h4>
<div class="col-lg-12 col-md-12 col-sm-12 btnss">
    <a href="<?php echo base_url().'arthouseadmin/addcategory'; ?>" class="btn btn-primary add">
        <span class="fa fa-plus"></span> Add Category</a>
</div>
        <?php 
    $atrr = array(
    'class' => 'col-lg-10 col-md-10 col-sm-12 addData'
    );
    if($this->uri->segment(2) == 'edit' OR $this->uri->segment(2) == 'editcategoryCheck'){
        $check='arthouseadmin/editcategoryCheck/'.$this->uri->segment(3);
    }else{
        $check='arthouseadmin/addcategoryCheck/';
    }
    echo form_open(base_url().$check,$atrr);
    ?>
        <?php echo validation_errors('<div class="alert alert-danger alert-dismissible fade show" role="alert">',
    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button></div>'); ?>
<h3>Category Page</h3>
<?php
        $title = array(
        'type'=>'text',
        'autocomplete'=>'off',
        'class'=>'form-control',
        'name'=>'title',
        'placeholder'=>'Category Name'
        );
        if($this->uri->segment(2) == 'edit' OR $this->uri->segment(2) == 'editcategoryCheck'){
        $title['value']=$i_title;
        }
            echo form_input($title);
        ?>
<?php
        $go = array(
        'type'=>'submit',
        'autocomplete'=>'off',
        'class'=>'btn btn-success addd',
        'name'=>'add',
        'value'=>'Add'
        );
        if($this->uri->segment(2) == 'edit' OR $this->uri->segment(2) == 'editcategoryCheck'){
            $go['value']='Update';
        }
            echo form_input($go);
        ?>
<?php echo form_close(); ?>
