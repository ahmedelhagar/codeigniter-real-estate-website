
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
        $check='arthouseadmin/adddropCheck/';
    }
    echo form_open(base_url().$check,$atrr);
    ?>
        <?php echo validation_errors('<div class="alert alert-danger alert-dismissible fade show" role="alert">',
    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button></div>'); ?>
<h3>قائمة منسدلة</h3>
<?php
        $title = array(
        'type'=>'text',
        'autocomplete'=>'off',
        'class'=>'form-control',
        'name'=>'title',
        'placeholder'=>'العنوان'
        );
        if($this->uri->segment(2) == 'edit' OR $this->uri->segment(2) == 'editCheck'){
        $title['value']=$i_title;
        }
            echo form_input($title);
        ?>
<?php if($this->uri->segment(2) !== 'edit' OR $this->uri->segment(2) !== 'editCheck'){ ?>
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
<?php
    if($this->uri->segment(2) == 'edit' OR $this->uri->segment(2) == 'editCheck'){
        ?>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">عنوان الصفحة</th>
      <th scope="col">النوع</th>
      <th scope="col">تعديل</th>
      <th scope="col">حذف</th>
    </tr>
  </thead>
  <tbody>
      <?php 
      $x=1;
          if($records){foreach ($records as $row){
      ?>
    <tr>
      <th scope="row"><?php echo $x; ?></th>
        <td><a href="<?php echo $this->main_model->p_link($row->state,$row->id); ?>"><?php echo $row->title; ?></a></td>
        <td><?php 
            echo $this->main_model->state($row->state);
            ?></td>
      <td><a href="<?php echo base_url().'arthouseadmin/edit/'.$row->id; ?>"><span class="fa fa-cogs"></span></a></td>
        <td>
            <a href="#" id="<?php echo $row->id; ?>" class="delete_data" style="color:#e74c3c;"><span class="fa fa-trash"></span></a>
        <input type="hidden" id="wher" value="arthousepages">
        </td>
    </tr>
      <?php $x++;}}else{
              ?>
      <h5>لايوجد صفحات لإظهارها</h5>
      <?php
          } ?>
  </tbody>
</table>
<?php
    }
?>