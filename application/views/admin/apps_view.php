<?php
              $apps = $this->main_model->getByDataw('items','(c_id = '.$this->uri->segment(3).')');
                if($apps == false){redirect(base_url().'arthouselogin/');}
              ?>
<h4 class="tag"> Applications </h4>


<div class="col-lg-10 col-md-10 col-sm-12 addData appp">
    <?php if($apps==TRUE){foreach($apps as $app){ ?>
    <div class="app-i">
        <h5>Name : <?php echo $app->title; ?></h5>
        <div class="app-c">
            <?php echo $app->content; ?>
        </div>
        <a href="<?php echo base_url().'vendor/uploads/files/'.$app->file; ?>" class="btn btn-success appbtn">Download File</a>
        <a href="#" id="<?php echo $app->id; ?>" class="delete_data d-app" style="color:#e74c3c;"><span class="fa fa-trash"></span></a>
        <?php if($app->state == 13){$wher='career';}elseif($app->state == 14){$wher='supplies';} ?>
    </div>
    <?php }} ?>
    <input type="hidden" id="wher" value="<?php echo $wher; ?>">
</div>