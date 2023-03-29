
<h4 class="tag"> تحكم في الصور </h4>
<div class="col-lg-12 col-md-12 col-sm-12 btnss">
    <a href="<?php echo base_url().'arthouseadmin/addpic'; ?>" class="btn btn-primary add">
        <span class="fa fa-plus"></span> أضف صورة</a>
</div>
        <?php 
    $atrr = array(
    'class' => 'col-lg-10 col-md-10 col-sm-12 addData'
    );
    if($this->uri->segment(2) == 'edit' OR $this->uri->segment(2) == 'editpicCheck'){
        $check='arthouseadmin/editpicCheck/'.$this->uri->segment(3);
    }else{
        $check='arthouseadmin/addpicCheck/';
    }
    echo form_open_multipart(base_url().$check,$atrr);
    ?>
        <?php echo validation_errors('<div class="alert alert-danger alert-dismissible fade show" role="alert">',
    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button></div>'); ?>
<h3>صورة</h3>
<?php
        $title = array(
        'type'=>'text',
        'autocomplete'=>'off',
        'class'=>'form-control',
        'name'=>'title',
        'placeholder'=>'عنوان الصورة'
        );
        if($this->uri->segment(2) == 'edit' OR $this->uri->segment(2) == 'editpicCheck'){
        $title['value']=$i_title;
        }
            echo form_input($title);
        ?>
<input type="file" class="form-control" name="userfile" size="20" />

        <input type="hidden" value="0" name="keywords">

    <label>اختر مشروع الصورة:</label>
<?php
            if(isset($records) && $records == TRUE){
            foreach($records as $row){
                $drop[$row->id] = $row->title;
            }
                $drop['0']='NONE';
            }else{
                $drop=array(
                '0' => 'NONE'
                );
            }
        
        $attrs=array(
            'name' => 'c_id',
            'class' => 'form-control'
        );
        if(!isset($i_checked)){
            $i_checked = '0';
        }
        echo form_dropdown($attrs, $drop, $i_checked);
        ?>
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
        if($this->uri->segment(2) == 'edit' OR $this->uri->segment(2) == 'editpicCheck'){
            $go['value']='تعديل';
        }
            echo form_input($go);
        ?>
<?php echo form_close(); ?>
