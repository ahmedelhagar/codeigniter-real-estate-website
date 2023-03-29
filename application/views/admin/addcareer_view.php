
<script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>
<h4 class="tag"> Control Pages </h4>
<div class="col-lg-12 col-md-12 col-sm-12 btnss">
    <a href="<?php echo base_url().'hayatadmin/addcareer'; ?>" class="btn btn-primary add">
        <span class="fa fa-plus"></span> Add Career</a>
</div>
        <?php 
    $atrr = array(
    'class' => 'col-lg-10 col-md-10 col-sm-12 addData'
    );
    if($this->uri->segment(2) == 'edit' OR $this->uri->segment(2) == 'editcareerCheck'){
        $check='hayatadmin/editcareerCheck/'.$this->uri->segment(3);
    }else{
        $check='hayatadmin/addcareerCheck/';
    }
    echo form_open(base_url().$check,$atrr);
    ?>
        <?php echo validation_errors('<div class="alert alert-danger alert-dismissible fade show" role="alert">',
    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button></div>'); ?>
<h3>Career Page</h3>
<?php
        $title = array(
        'type'=>'text',
        'autocomplete'=>'off',
        'class'=>'form-control',
        'name'=>'title',
        'placeholder'=>'Title'
        );
        if($this->uri->segment(2) == 'edit' OR $this->uri->segment(2) == 'editcareerCheck'){
        $title['value']=$i_title;
        }
            echo form_input($title);
        ?>
<textarea name="editor1">
    <?php
        if($this->uri->segment(2) == 'edit' OR $this->uri->segment(2) == 'editcareerCheck'){
                echo $i_content;
                }
    ?>
</textarea>
<textarea name="keywords" placeholder="keyword1,keyword2,keyword3"><?php
        if($this->uri->segment(2) == 'edit' OR $this->uri->segment(2) == 'editcareerCheck'){
                echo $i_keywords;
                }
    ?></textarea>
<?php
        $go = array(
        'type'=>'submit',
        'autocomplete'=>'off',
        'class'=>'btn btn-success addd',
        'name'=>'add',
        'value'=>'Add'
        );
        if($this->uri->segment(2) == 'edit' OR $this->uri->segment(2) == 'editcareerCheck'){
            $go['value']='Update';
        }
            echo form_input($go);
        ?>
<?php echo form_close(); ?>
<script>
    CKEDITOR.replace( 'editor1' );
</script>