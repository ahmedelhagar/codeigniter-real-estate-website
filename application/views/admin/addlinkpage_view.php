
<h4 class="tag"> التحكم في الصفحات </h4>
<div class="col-lg-12 col-md-12 col-sm-12 btnss">
    <a href="<?php echo base_url().'arthouseadmin/adddropdown'; ?>" class="btn btn-success add"><span class="fa fa-plus"></span> أضف قائمة منسدلة</a>
    <a href="<?php echo base_url().'arthouseadmin/addoriginalpage'; ?>" class="btn btn-primary add">
        <span class="fa fa-plus"></span> أضف صفحة عادية</a>
    <a href="<?php echo base_url().'arthouseadmin/addlinkpage'; ?>" class="btn btn-warning add"><span class="fa fa-plus"></span> أضف صفحة رابط</a>
</div>
        <?php 
    $atrr = array(
    'class' => 'col-lg-10 col-md-10 col-sm-12 addData'
    );
    if($this->uri->segment(2) == 'edit' OR $this->uri->segment(2) == 'editCheck'){
        $check='arthouseadmin/editCheck/'.$this->uri->segment(3);
    }else{
        $check='arthouseadmin/addlinkCheck/';
    }
    echo form_open(base_url().$check,$atrr);
    ?>
        <?php echo validation_errors('<div class="alert alert-danger alert-dismissible fade show" role="alert">',
    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button></div>'); ?>
<h3>Link Page</h3>
<?php
        $title = array(
        'type'=>'text',
        'autocomplete'=>'off',
        'class'=>'form-control',
        'name'=>'title',
        'placeholder'=>'Title'
        );
        if($this->uri->segment(2) == 'edit' OR $this->uri->segment(2) == 'editCheck'){
            $title['value'] = $i_title;
        }
            echo form_input($title);
        ?>
<?php
        $link = array(
        'type'=>'text',
        'autocomplete'=>'off',
        'class'=>'form-control',
        'name'=>'editor1',
        'placeholder'=>'Link'
        );
        if($this->uri->segment(2) == 'edit' OR $this->uri->segment(2) == 'editCheck'){
            $link['value'] = $i_content;
        }
            echo form_input($link);
?>

    <label>ضعها تحت:</label>
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
        if($this->uri->segment(2) == 'edit' OR $this->uri->segment(2) == 'editCheck'){
            $go['value']='تعديل';
        }
            echo form_input($go);
        ?>
<?php echo form_close(); ?>
