<div class="col-lg-12 col-md-12 col-sm-12 homeadmin">
    <h4 class="w-back">مرحباً بعودتك يا <?php echo $this->session->userdata('username'); ?> ... <a href="<?php echo base_url().'logout/'; ?>">Logout</a></h4>
    <div class="col-lg-6 col-md-6 col-sm-12 connt">
        <div class="col-lg-12 col-md-12 col-sm-12 c-w">
            <h1><?php
                $items = $this->db->select('ip, COUNT(ip) AS count', false)
                  ->from('visits')
                  ->group_by('ip')
                  ->get()->result();
                $num2 = (array) $items[0];
                echo $num2['count'];
                ?></h1>
            <h4>زيارات للصفحة الرئيسية</h4>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 connt">
        <div class="col-lg-12 col-md-12 col-sm-12 c-w">
            <h1><?php
                        $num = $this->main_model->getByDataw('admins','(state = 1)','count');
                        if($num == ''){$num=0;}
                        echo $num;
                        ?></h1>
            <h4>المديرين</h4>
        </div>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 connt">
        <div class="col-lg-12 col-md-12 col-sm-12 c-w">
            <h1><?php
                        $num = $this->main_model->getByDataw('items','(state = 9)','count');
                        if($num == ''){$num=0;}
                        echo $num;
                        ?></h1>
            <h4>الأخبار</h4>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 connt">
        <div class="col-lg-12 col-md-12 col-sm-12 c-w">
            <h1><?php
                        $num = $this->main_model->getByDataw('items','(state = 7)','count');
                        if($num == ''){$num=0;}
                        echo $num;
                        ?></h1>
            <h4>المشاريع</h4>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 connt">
        <div class="col-lg-12 col-md-12 col-sm-12 c-w">
            <h1><?php
                        $num = $this->main_model->getByDataw('items','(state = 8)','count');
                        if($num == ''){$num=0;}
                        echo $num;
                        ?></h1>
            <h4>صور المشاريع</h4>
        </div>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 connt">
        <div class="col-lg-12 col-md-12 col-sm-12 c-w">
            <h1><?php
                        $num = $this->main_model->getByDataw('items','(state = 15)','count');
                        if($num == ''){$num=0;}
                        echo $num;
                        ?></h1>
            <h4>رسائل التواصلات</h4>
        </div>
    </div>
</div>
