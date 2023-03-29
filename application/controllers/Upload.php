<?php

class Upload extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper(array('form', 'url'));
            $this->load->model('main_model');
        }

        public function index()
        {
                if($this->main_model->is_logged_in()){
                $this->load->view('admin/uploader_view', array('error' => ' ' ));
                }else{
                    redirect(base_url());
                }
        }

        public function do_upload()
        {
            if($this->main_model->is_logged_in()){
                $config['upload_path']          = './vendor/uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 999999;
                $config['max_width']            = 999999;
                $config['max_height']           = 999999;
                $config['encrypt_name']           = TRUE;

                $this->load->library('upload', $config);
                
                
                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('admin/uploader_view', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
                    if($this->input->post('width') > 0 && $this->input->post('height') > 0){
                    /// resize
                $config['image_library'] = 'gd2';
                $config['source_image'] = $data['upload_data']['full_path'];
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
                $config['width']         = (int) $this->input->post('width');
                $config['height']       = (int) $this->input->post('height');
                $data['width'] = (int) $this->input->post('width');
                $data['height'] = (int) $this->input->post('height');
                $this->load->library('image_lib', $config);

                $this->image_lib->resize();
                    }
                        $this->load->view('admin/upsuccess_view', $data);
                }
                }else{
                    redirect(base_url());
                }
        }
}
?>