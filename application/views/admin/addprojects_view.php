
<script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>
<h4 class="tag"> تحكم في المشاريع </h4>
<div class="col-lg-12 col-md-12 col-sm-12 btnss">
    <a href="<?php echo base_url().'arthouseadmin/addprojects'; ?>" class="btn btn-primary add">
        <span class="fa fa-plus"></span> أضف مشروع</a>
</div>
        <?php 
    $atrr = array(
    'class' => 'col-lg-10 col-md-10 col-sm-12 addData'
    );
    if($this->uri->segment(2) == 'edit' OR $this->uri->segment(2) == 'editprojectsCheck'){
        $check='arthouseadmin/editprojectsCheck/'.$this->uri->segment(3);
    }else{
        $check='arthouseadmin/addprojectsCheck/';
    }
    echo form_open_multipart(base_url().$check,$atrr);
    ?>
        <?php echo validation_errors('<div class="alert alert-danger alert-dismissible fade show" role="alert">',
    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button></div>'); ?>
<h3>صفحة المشروع</h3>
<?php
        $title = array(
        'type'=>'text',
        'autocomplete'=>'off',
        'class'=>'form-control',
        'name'=>'title',
        'placeholder'=>'العنوان'
        );
        if($this->uri->segment(2) == 'edit' OR $this->uri->segment(2) == 'editprojectsCheck'){
        $title['value']=$i_title;
        }
            echo form_input($title);
        ?>
<input type="file" class="form-control" name="userfile" size="20" />
<?php
        $file = array(
        'type'=>'hidden',
        'value'=>'-',
        'autocomplete'=>'off',
        'class'=>'form-control',
        'name'=>'file',
        'placeholder'=>'Cost'
        );
        if($this->uri->segment(2) == 'edit' OR $this->uri->segment(2) == 'editprojectsCheck'){
        $file['value']=$i_file;
        }
            echo form_input($file);
        ?>
<?php
        $startdate = array(
        'type'=>'hidden',
        'value'=>'-',
        'autocomplete'=>'off',
        'class'=>'form-control',
        'name'=>'startdate',
        'placeholder'=>'Start Date'
        );
        if($this->uri->segment(2) == 'edit' OR $this->uri->segment(2) == 'editclientCheck'){
        $startdate['value']=$i_startdate;
        }
            echo form_input($startdate);
        ?>
<?php
        $enddate = array(
        'type'=>'hidden',
        'value'=>'-',
        'autocomplete'=>'off',
        'class'=>'form-control',
        'name'=>'enddate',
        'placeholder'=>'End Date'
        );
        if($this->uri->segment(2) == 'edit' OR $this->uri->segment(2) == 'editclientCheck'){
        $enddate['value']=$i_enddate;
        }
            echo form_input($enddate);
        ?>
<?php
        $ofwork = array(
        'type'=>'hidden',
        'value'=>'-',
        'autocomplete'=>'off',
        'class'=>'form-control',
        'name'=>'ofwork',
        'placeholder'=>'% Of Work'
        );
        if($this->uri->segment(2) == 'edit' OR $this->uri->segment(2) == 'editclientCheck'){
        $ofwork['value']=$i_ofwork;
        }
            echo form_input($ofwork);
        ?>
<textarea name="editor1">
    <?php
        if($this->uri->segment(2) == 'edit' OR $this->uri->segment(2) == 'editprojectsCheck'){
                echo $i_content;
                }
    ?>
</textarea>
<?php if($this->uri->segment(2) !== 'edit' AND $this->uri->segment(2) !== 'editCheck'){ ?>
    <label>اللغة:</label>
<?php

                $dropLang=array(
                '0' => 'عربي',
                'null' => 'English'
                );

        $attrsLang=array(
            'name' => 'lang',
            'class' => 'form-control'
        );
        echo form_dropdown($attrsLang, $dropLang,'0');
        ?>    
<?php } ?>
<?php
        $go = array(
        'type'=>'submit',
        'autocomplete'=>'off',
        'class'=>'btn btn-success addd',
        'name'=>'add',
        'value'=>'اضافة'
        );
        if($this->uri->segment(2) == 'edit' OR $this->uri->segment(2) == 'editprojectsCheck'){
            $go['value']='تعديل';
        }
            echo form_input($go);
        ?>
<?php echo form_close(); ?>
<script>
    CKEDITOR.replace( 'editor1' );
</script>