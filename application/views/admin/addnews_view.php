
<script src="https://cdn.tiny.cloud/1/pcfnbjq94m6pp670gmh9jvz4bvvk3f2mhxycp7y6nxuvml7n/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<h4 class="tag"> تحكم في الأخبار </h4>
<div class="col-lg-12 col-md-12 col-sm-12 btnss">
    <a href="<?php echo base_url().'arthouseadmin/addnews'; ?>" class="btn btn-primary add">
        <span class="fa fa-plus"></span> أضف خبر</a>
</div>
        <?php 
    $atrr = array(
    'class' => 'col-lg-10 col-md-10 col-sm-12 addData'
    );
    if($this->uri->segment(2) == 'edit' OR $this->uri->segment(2) == 'editnewsCheck'){
        $check='arthouseadmin/editnewsCheck/'.$this->uri->segment(3);
    }else{
        $check='arthouseadmin/addnewsCheck/';
    }
    echo form_open_multipart(base_url().$check,$atrr);
    ?>
        <?php echo validation_errors('<div class="alert alert-danger alert-dismissible fade show" role="alert">',
    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button></div>'); ?>
<h3>صفحة الخبر</h3>
<?php
        $title = array(
        'type'=>'text',
        'autocomplete'=>'off',
        'class'=>'form-control',
        'name'=>'title',
        'placeholder'=>'العنوان'
        );
        if($this->uri->segment(2) == 'edit' OR $this->uri->segment(2) == 'editnewsCheck'){
        $title['value']=$i_title;
        }
            echo form_input($title);
        ?>
<input type="file" class="form-control" name="userfile" size="20" />
<textarea name="editor1" id="editor1"><?php
        if($this->uri->segment(2) == 'edit' OR $this->uri->segment(2) == 'editnewsCheck'){
                echo str_replace('../vendor',base_url().'vendor',$i_content);
                }
    ?></textarea>
<textarea name="keywords" placeholder="keyword1,keyword2,keyword3"><?php
        if($this->uri->segment(2) == 'edit' OR $this->uri->segment(2) == 'editnewsCheck'){
                echo $i_keywords;
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
        'value'=>'اضافة'
        );
        if($this->uri->segment(2) == 'edit' OR $this->uri->segment(2) == 'editnewsCheck'){
            $go['value']='تعديل';
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