
<script src="https://cdn.tiny.cloud/1/pcfnbjq94m6pp670gmh9jvz4bvvk3f2mhxycp7y6nxuvml7n/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<h4 class="tag"> تحكم في الخدمات </h4>
<div class="col-lg-12 col-md-12 col-sm-12 btnss">
    <a href="<?php echo base_url().'arthouseadmin/addclient'; ?>" class="btn btn-primary add">
        <span class="fa fa-plus"></span> أضف خدمة</a>
</div>
        <?php 
    $atrr = array(
    'class' => 'col-lg-10 col-md-10 col-sm-12 addData'
    );
    if($this->uri->segment(2) == 'edit' OR $this->uri->segment(2) == 'editclientCheck'){
        $check='arthouseadmin/editclientCheck/'.$this->uri->segment(3);
    }else{
        $check='arthouseadmin/addclientCheck/';
    }
    echo form_open_multipart(base_url().$check,$atrr);
    ?>
        <?php echo validation_errors('<div class="alert alert-danger alert-dismissible fade show" role="alert">',
    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button></div>'); ?>
<h3>صفحة الخدمة</h3>
<?php
        $title = array(
        'type'=>'text',
        'autocomplete'=>'off',
        'class'=>'form-control',
        'name'=>'title',
        'placeholder'=>'عنوان الخدمة'
        );
        if($this->uri->segment(2) == 'edit' OR $this->uri->segment(2) == 'editclientCheck'){
        $title['value']=$i_title;
        }
            echo form_input($title);
        ?>
<input type="file" class="form-control" name="userfile" size="20" />

<textarea name="editor1" id="editor1"><?php
        if($this->uri->segment(2) == 'edit' OR $this->uri->segment(2) == 'editclientCheck'){
                echo str_replace('../vendor',base_url().'vendor',$i_content);
                }
    ?></textarea>
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
        'value'=>'Add'
        );
        if($this->uri->segment(2) == 'edit' OR $this->uri->segment(2) == 'editclientCheck'){
            $go['value']='Update';
        }
            echo form_input($go);
        ?>
<?php echo form_close(); ?>
<script>
    tinymce.init({
    selector:'#editor1',
    height:600,
    plugins: 'image code a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinymcespellchecker',
    toolbar: 'undo redo | image code a11ycheck casechange checklist code formatpainter pageembed permanentpen table',
    
    // without images_upload_url set, Upload tab won't show up
    images_upload_url: 'upload.php',
    
    // override default upload handler to simulate successful upload
    images_upload_handler: function (blobInfo, success, failure) {
        var xhr, formData;
      
        xhr = new XMLHttpRequest();
        xhr.withCredentials = false;
        xhr.open('POST', 'upload.php');
      
        xhr.onload = function() {
            var json;
        
            if (xhr.status != 200) {
                failure('HTTP Error: ' + xhr.status);
                return;
            }
        
            json = JSON.parse(xhr.responseText);
        
            if (!json || typeof json.location != 'string') {
                failure('Invalid JSON: ' + xhr.responseText);
                return;
            }
        //json.location
            success('<?php echo base_url('vendor/uploads/editor/'); ?>'+blobInfo.filename());
        };
      
        formData = new FormData();
        formData.append('file', blobInfo.blob(), blobInfo.filename());
      
        xhr.send(formData);
    },
    });
</script>