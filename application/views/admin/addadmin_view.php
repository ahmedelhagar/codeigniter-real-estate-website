
<h4 class="tag"> Control Pages </h4>
<div class="col-lg-12 col-md-12 col-sm-12 btnss">
    <a href="<?php echo base_url().'arthouseadmin/addadmin'; ?>" class="btn btn-primary add">
        <span class="fa fa-plus"></span> Add Admin</a>
</div>
        <?php 
    $atrr = array(
    'class' => 'col-lg-10 col-md-10 col-sm-12 addData'
    );
    if($this->uri->segment(2) == 'edit' OR $this->uri->segment(2) == 'editadminCheck'){
        $check='arthouseadmin/editadminCheck/'.$this->uri->segment(3);
    }else{
        $check='arthouseadmin/addadminCheck/';
    }
    echo form_open(base_url().$check,$atrr);
    ?>
        <?php echo validation_errors('<div class="alert alert-danger alert-dismissible fade show" role="alert">',
    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button></div>'); ?>
<h3>Admin Page</h3>
<?php
        $title = array(
        'type'=>'text',
        'autocomplete'=>'off',
        'class'=>'form-control',
        'name'=>'username',
        'placeholder'=>'Username'
        );
        if($this->uri->segment(2) == 'edit' OR $this->uri->segment(2) == 'editadminCheck'){
        $title['value']=$i_username;
        }
            echo form_input($title);
        ?>
<?php
        $email = array(
        'type'=>'email',
        'autocomplete'=>'off',
        'class'=>'form-control',
        'name'=>'email',
        'placeholder'=>'email@domain.com'
        );
        if($this->uri->segment(2) == 'edit' OR $this->uri->segment(2) == 'editadminCheck'){
        $email['value']=$i_email;
        }
            echo form_input($email);
        ?>
<?php
        $file = array(
        'type'=>'password',
        'autocomplete'=>'off',
        'class'=>'form-control',
        'name'=>'password',
        'placeholder'=>'********'
        );
        if($this->uri->segment(2) == 'edit' OR $this->uri->segment(2) == 'editadminCheck'){
        $file['value']=$i_password;
        }
            echo form_input($file);
        ?>

<?php
        $go = array(
        'type'=>'submit',
        'autocomplete'=>'off',
        'class'=>'btn btn-success addd',
        'name'=>'add',
        'value'=>'Add'
        );
        if($this->uri->segment(2) == 'edit' OR $this->uri->segment(2) == 'editadminCheck'){
            $go['value']='Update';
        }
            echo form_input($go);
        ?>
<?php echo form_close(); ?>
