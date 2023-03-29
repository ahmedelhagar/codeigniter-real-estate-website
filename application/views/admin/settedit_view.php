
<link rel="stylesheet" href="<?php echo base_url().'vendor/colorpicker/'; ?>css/colorpicker.css" type="text/css" />
	<script type="text/javascript" src="<?php echo base_url().'vendor/colorpicker/'; ?>js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url().'vendor/colorpicker/'; ?>js/colorpicker.js"></script>
    <script type="text/javascript" src="<?php echo base_url().'vendor/colorpicker/'; ?>js/eye.js"></script>
    <script type="text/javascript" src="<?php echo base_url().'vendor/colorpicker/'; ?>js/utils.js"></script>
    <script type="text/javascript" src="<?php echo base_url().'vendor/colorpicker/'; ?>js/layout.js?ver=1.0.2"></script>
<h4 class="tag"> الإعدادات العامة </h4>
        <?php 
    $atrr = array(
    'class' => 'col-lg-10 col-md-10 col-sm-12 addData'
    );
    if($this->uri->segment(2) == 'ar_generalsettings'){
        $check='arthouseadmin/ar_settCheck/';
    }else{
        $check='arthouseadmin/settCheck/';
    }
    echo form_open(base_url().$check,$atrr);
    ?>
        <?php echo validation_errors('<div class="alert alert-danger alert-dismissible fade show" role="alert">',
    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button></div>'); ?>
<h3>صفحة الإعدادات العامة</h3>

<label class="s-label">عنوان الموقع</label>
<?php
        $title = array(
        'type'=>'text',
        'autocomplete'=>'off',
        'class'=>'form-control',
        'name'=>'title',
        'placeholder'=>'العنوان'
        );
        $title['value']=$row['title'];
            echo form_input($title);
        ?>
<label class="s-label">صورة شعار الموقع</label>
<?php
        $logo = array(
        'type'=>'text',
        'autocomplete'=>'off',
        'class'=>'form-control',
        'name'=>'logo',
        'placeholder'=>'Logo Link Width : 250 , Height : 55 '
        );
        $logo['value']=$row['logo'];
            echo form_input($logo);
        ?>
<label class="s-label">اللون الرئيسي للموقع <div class="color"></div></label>
<?php
        $color = array(
        'type'=>'text',
        'autocomplete'=>'off',
        'class'=>'form-control',
        'name'=>'color',
        'placeholder'=>'#ffffff'
        );
        $color['value']=$row['color'];
            echo form_input($color);
        ?><br/>
<p id="colorpickerHolder">
                </p><br/>
<label class="s-label">لون المرور على زر <div class="hover"></div></label>
<?php
        $hover = array(
        'type'=>'text',
        'autocomplete'=>'off',
        'class'=>'form-control',
        'name'=>'hover',
        'placeholder'=>'#ffffff'
        );
        $hover['value']=$row['hover'];
            echo form_input($hover);
        ?>
<label class="s-label">رقم الهاتف</label>
<?php
        $telephone = array(
        'type'=>'text',
        'autocomplete'=>'off',
        'class'=>'form-control',
        'name'=>'telephone',
        'placeholder'=>'الهاتف'
        );
        $telephone['value']=$row['telephone'];
            echo form_input($telephone);
        ?>
<label class="s-label">عنوان الشركة</label>
<?php
        $c_add = array(
        'type'=>'text',
        'autocomplete'=>'off',
        'class'=>'form-control',
        'name'=>'c_add',
        'placeholder'=>'عنوان الشركة'
        );
        $c_add['value']=$row['c_add'];
            echo form_input($c_add);
        ?>
<label class="s-label">حقوق الموقع</label>
<?php
        $fax = array(
        'type'=>'text',
        'autocomplete'=>'off',
        'class'=>'form-control',
        'name'=>'fax',
        'placeholder'=>'حقوق الموقع'
        );
        $fax['value']=$row['fax'];
            echo form_input($fax);
        ?>
<label class="s-label">Google Maps Link</label>
<?php
        $address = array(
        'type'=>'text',
        'autocomplete'=>'off',
        'class'=>'form-control',
        'name'=>'address',
        'placeholder'=>'Address Link'
        );
        $address['value']=$row['address'];
            echo form_input($address);
        ?>
<label class="s-label">بريد الشركة</label>
<?php
        $email = array(
        'type'=>'text',
        'autocomplete'=>'off',
        'class'=>'form-control',
        'name'=>'email',
        'placeholder'=>'E-Mail'
        );
        $email['value']=$row['email'];
            echo form_input($email);
        ?>
<label class="s-label">صفحة الشركة على facebook</label>
<?php
        $facebook = array(
        'type'=>'text',
        'autocomplete'=>'off',
        'class'=>'form-control',
        'name'=>'facebook',
        'placeholder'=>'Facebook'
        );
        $facebook['value']=$row['facebook'];
            echo form_input($facebook);
        ?>
<label class="s-label">صفحة الشركة على Twitter Page</label>
<?php
        $twitter = array(
        'type'=>'text',
        'autocomplete'=>'off',
        'class'=>'form-control',
        'name'=>'twitter',
        'placeholder'=>'Twitter'
        );
        $twitter['value']=$row['twitter'];
            echo form_input($twitter);
        ?>
<label class="s-label">صفحة الشركة على Whatsapp Page</label>
<?php
        $linkedin = array(
        'type'=>'text',
        'autocomplete'=>'off',
        'class'=>'form-control',
        'name'=>'linkedin',
        'placeholder'=>'Whatsapp'
        );
        $linkedin['value']=$row['linkedin'];
            echo form_input($linkedin);
        ?>
<label class="s-label">صفحة الشركة على Instagram Page</label>
<?php
        $youtube = array(
        'type'=>'text',
        'autocomplete'=>'off',
        'class'=>'form-control',
        'name'=>'youtube',
        'placeholder'=>'Instagram'
        );
        $youtube['value']=$row['youtube'];
            echo form_input($youtube);
        ?>
<label class="s-label">Footer Text</label>
<?php
        $f_text = array(
        'autocomplete'=>'off',
        'class'=>'form-control',
        'name'=>'f_text',
        'placeholder'=>'Footer Text'
        );
        $f_text['value']=$row['f_text'];
            echo form_textarea($f_text);
        ?>
<label class="s-label">النص الترحيبي</label>
<?php
        $welcome = array(
        'autocomplete'=>'off',
        'class'=>'form-control',
        'name'=>'welcome',
        'placeholder'=>'النص الترحيبي'
        );
        $welcome['value']=$row['welcome'];
            echo form_textarea($welcome);
        ?>
        <label class="s-label">vision Text</label>
<?php
        $vision = array(
        'autocomplete'=>'off',
        'class'=>'form-control',
        'name'=>'vision',
        'placeholder'=>'vision Text'
        );
        $vision['value']=$row['vision'];
            echo form_textarea($vision);
        ?>
                <label class="s-label">goals Text</label>
<?php
        $goals = array(
        'autocomplete'=>'off',
        'class'=>'form-control',
        'name'=>'goals',
        'placeholder'=>'goals Text'
        );
        $goals['value']=$row['goals'];
            echo form_textarea($goals);
        ?>
        <label class="s-label">Mission Text</label>
<?php
        $mission = array(
        'autocomplete'=>'off',
        'class'=>'form-control',
        'name'=>'mission',
        'placeholder'=>'mission Text'
        );
        $mission['value']=$row['mission'];
            echo form_textarea($mission);
        ?>
<label class="s-label">الكلمات الدلالية</label>
<?php
        $keywords = array(
        'autocomplete'=>'off',
        'class'=>'form-control',
        'name'=>'keywords',
        'placeholder'=>'الكلمات الدلالية'
        );
        $keywords['value']=$row['keywords'];
            echo form_textarea($keywords);
        ?>
<label class="s-label">الوصف</label>
<?php
        $description = array(
        'autocomplete'=>'off',
        'class'=>'form-control',
        'name'=>'description',
        'placeholder'=>'الوصف'
        );
        $description['value']=$row['description'];
            echo form_textarea($description);
        ?>
<?php
        $go = array(
        'type'=>'submit',
        'autocomplete'=>'off',
        'class'=>'btn btn-success addd',
        'name'=>'update'
        );
            $go['value']='تحديث';
            echo form_input($go);
        ?>
<?php echo form_close(); ?>