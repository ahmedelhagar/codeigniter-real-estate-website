<h4 class="tag"> تحكم في الشرائح </h4>
<div class="col-lg-12 col-md-12 col-sm-12 btnss">
    <a href="<?php echo base_url().'arthouseadmin/addslider'; ?>" class="btn btn-primary add">
        <span class="fa fa-plus"></span> أضف شريحة</a>
</div>
        <?php 
    $atrr = array(
    'class' => 'col-lg-10 col-md-10 col-sm-12 addData'
    );
    if($this->uri->segment(2) == 'edit' OR $this->uri->segment(2) == 'editsliderCheck'){
        $check='arthouseadmin/editsliderCheck/'.$this->uri->segment(3);
    }else{
        $check='arthouseadmin/addsliderCheck/';
    }
    echo form_open_multipart(base_url().$check,$atrr);
    ?>
        <?php echo validation_errors('<div class="alert alert-danger alert-dismissible fade show" role="alert">',
    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button></div>'); ?>
<h3>صفحة الشريحة</h3>
<?php
        $title = array(
        'type'=>'text',
        'autocomplete'=>'off',
        'class'=>'form-control',
        'name'=>'title',
        'placeholder'=>'العنوان'
        );
        if($this->uri->segment(2) == 'edit' OR $this->uri->segment(2) == 'editsliderCheck'){
        $title['value']=$i_title;
        }
            echo form_input($title);
        ?>
<?php
        $slider = array(
        'type'=>'text',
        'autocomplete'=>'off',
        'class'=>'form-control',
        'name'=>'content',
        'placeholder'=>'الرابط'
        );
        if($this->uri->segment(2) == 'edit' OR $this->uri->segment(2) == 'editsliderCheck'){
        $slider['value']=$i_slider;
        }
            echo form_input($slider);
        ?>
<input type="file" class="form-control" name="userfile" size="20" />
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
        if($this->uri->segment(2) == 'edit' OR $this->uri->segment(2) == 'editsliderCheck'){
            $go['value']='تعديل';
        }
            echo form_input($go);
        ?>
<?php echo form_close(); ?>
