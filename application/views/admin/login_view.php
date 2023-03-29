        <?php 
    $atrr = array(
    'class' => 'col-lg-4 col-md-4 col-sm-12 login'
    );
    echo form_open(base_url().'pages/loginCheck',$atrr);
    ?>
        <span class="fa fa-user"></span>
        <?php echo validation_errors('<div class="alert alert-danger alert-dismissible fade show" role="alert">',
    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button></div>'); ?>
    <?php if ($this->uri->segment(3) == 'wrong' && $this->uri->segment(2) == 'arthouselogin'){
              echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">Wrong Data ... Try Again<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button></div>';
          } ?>
        <?php
        $email = array(
        'type'=>'text',
        'autocomplete'=>'off',
        'class'=>'form-control',
        'name'=>'username',
        'placeholder'=>'Username'
        );
            echo form_input($email);
        ?>
        <?php
        $password = array(
        'type'=>'password',
        'autocomplete'=>'off',
        'class'=>'form-control',
        'name'=>'password',
        'placeholder'=>'**********'
        );
            echo form_input($password);
        ?>
        <?php
        $button=array(
        'type'=>'submit',
        'class'=>'btn btn-primary',
        'name'=>'login',
        'content'=>'
        <span class="fa fa-lock"></span>
        login
        '
        );
        echo form_button($button);
        ?>
    <?php echo form_close(); ?>