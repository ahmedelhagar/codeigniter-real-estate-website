<?php

class Pages extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    public $langData;
    public $langDataArray;
    public function __construct() {
            parent::__construct();
            $this->load->helper('language');
            $this->load->model('main_model');
            $this->load->helper('cookie');
            if (get_cookie('lang') == NULL) {
                set_cookie(array(
                    'name' => 'lang',
                    'value' => 'ar|arabic',
                    'expire' => time() + 86500,
                ));
                $langExt = 'ar';
                $langFile = 'arabic';
            }elseif(get_cookie('lang') == 'ar|arabic' OR get_cookie('lang') == 'en|english'){
                $langExtf = explode('|',get_cookie('lang'));
                $langExt = $langExtf[0];
                $langFile = $langExtf[1];
            }
            $this->langData = $this->lang->load($langExt,$langFile);
            if($langExt == 'ar'){
                $float = 'right';
                $unfloat = 'left';
                $langOrder = '(lang = 0)';
            }else{
                $float = 'left';
                $unfloat = 'right';
                $langOrder = '(lang IS NULL)';
            }
            $this->langDataArray = array();
            $this->langDataArray['lang'] = $langExt;
            $this->langDataArray['langOrder'] = $langOrder;
            $this->langDataArray['float'] = $float;
            $this->langDataArray['unfloat'] = $unfloat;
            $this->langDataArray['home'] = $this->lang->line('home');
            $this->langDataArray['read_more'] = $this->lang->line('read_more');
            $this->langDataArray['who_are_we'] = $this->lang->line('who_are_we');
            $this->langDataArray['our_services'] = $this->lang->line('our_services');
            $this->langDataArray['business_gallery'] = $this->lang->line('business_gallery');
            $this->langDataArray['view_all_work'] = $this->lang->line('view_all_work');
            $this->langDataArray['view_all_news'] = $this->lang->line('view_all_news');
            $this->langDataArray['art_hous_home_page'] = $this->lang->line('art_hous_home_page');
            $this->langDataArray['who_are_us'] = $this->lang->line('who_are_us');
            $this->langDataArray['our_vision'] = $this->lang->line('our_vision');
            $this->langDataArray['our_mission'] = $this->lang->line('our_mission');
            $this->langDataArray['our_goals'] = $this->lang->line('our_goals');
            $this->langDataArray['important_links'] = $this->lang->line('important_links');
            $this->langDataArray['contact_us'] = $this->lang->line('contact_us');
            $this->langDataArray['services'] = $this->lang->line('services');
            $this->langDataArray['portfolio'] = $this->lang->line('portfolio');
            $this->langDataArray['news'] = $this->lang->line('news');
            $this->langDataArray['latest_news'] = $this->lang->line('latest_news');
            $this->langDataArray['contact_text1'] = $this->lang->line('contact_text1');
            $this->langDataArray['contact_text2'] = $this->lang->line('contact_text2');
            /*
                DB => 'items' table Documntation:
                state => 0 => Original Page.
            */
            $this->load->library("pagination");
        }
	public function index()
	{
        // URL :- http://localhost/arthousepro/
        $data['title']= $this->langDataArray['art_hous_home_page'];
        $data['langArray'] = $this->langDataArray;
        $data['records'] = $this->main_model->getByDataw('items','(((c_id IS NULL AND state = 0) OR state = 1 OR (state = 2 AND c_id IS NULL))) AND '.$this->langDataArray['langOrder']);
        $data['clients'] = $this->main_model->getByDataw('items','(state = 4) AND '.$this->langDataArray['langOrder'].' LIMIT 12');
        $data['clients1'] = array_slice($data['clients'],0,4);
        $data['clients2'] = array_slice($data['clients'],4,4);
        $data['clients3'] = array_slice($data['clients'],8,13);
        $data['pros'] = $this->main_model->getByDataw('items','(state = 8) AND '.$this->langDataArray['langOrder'].' LIMIT 8');
        $data['settingsquery'] = $this->main_model->getByDataw('settings',$this->langDataArray['langOrder']);
        $data['slider'] = $this->main_model->getByDataw('items','(state = 5) AND '.$this->langDataArray['langOrder']);
        $data['links'] = $this->main_model->getByDataw('items','(state = 6) AND '.$this->langDataArray['langOrder']);
        $data['news'] = $this->main_model->getByDataw('items','(state = 9) AND '.$this->langDataArray['langOrder'].' LIMIT 8');
        $data['settings'] = (array) $data['settingsquery'][0]; 
        $now = new DateTime();
        $now->setTimezone(new DateTimezone('Africa/Cairo'));
        $this->main_model->insertVisit(array(
            'ip' => $this->input->ip_address(),
            'date' => $now->format('Y/m/d') 
        ));
		$this->load->view('include/header',$data);
		$this->load->view('home_view',$data);
		$this->load->view('include/footer',$data);
    }
    public function upload(){
        // Allowed origins to upload images
$accepted_origins = array("http://localhost", "https://51.158.27.97", "https://ah.pre-wi.com");

// Images upload path
$imageFolder = "vendor/uploads/editor/";

reset($_FILES);
$temp = current($_FILES);
if(is_uploaded_file($temp['tmp_name'])){
    if(isset($_SERVER['HTTP_ORIGIN'])){
        // Same-origin requests won't set an origin. If the origin is set, it must be valid.
        if(in_array($_SERVER['HTTP_ORIGIN'], $accepted_origins)){
            header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
        }else{
            header("HTTP/1.1 403 Origin Denied");
            return;
        }
    }
  
    // Sanitize input
    if(preg_match("/([^\w\s\d\-_~,;:\[\]\(\).])|([\.]{2,})/", $temp['name'])){
        header("HTTP/1.1 400 Invalid file name.");
        return;
    }
  
    // Verify extension
    if(!in_array(strtolower(pathinfo($temp['name'], PATHINFO_EXTENSION)), array("gif", "jpg", "png"))){
        header("HTTP/1.1 400 Invalid extension.");
        return;
    }
  
    // Accept upload if there was no origin, or if it is an accepted origin
    $filetowrite = $imageFolder . $temp['name'];
    move_uploaded_file($temp['tmp_name'], $filetowrite);
  
    // Respond to the successful upload with JSON.
    echo json_encode(array('location' => '../'.$filetowrite));
} else {
    // Notify editor that the upload failed
    header("HTTP/1.1 500 Server Error");
}
    }
    public function getGallery(){
        $i_id = $this->input->post('i_id');
        $items = $this->main_model->getByDataw('items','(c_id = '.$i_id.')');
        $response = array(
            'done' => 1,
            'items' => $items
        );
        echo json_encode($response);
    }
    public function who()
	{
        // URL :- http://localhost/arthousepro/
        $data['title']='Who are us? | List Of Projects Page';
        $data['langArray'] = $this->langDataArray;
        $data['records'] = $this->main_model->getByDataw('items','((c_id IS NULL AND state = 0) OR state = 1 OR (state = 2 AND c_id IS NULL)) AND '.$this->langDataArray['langOrder']);
        $data['links'] = $this->main_model->getByDataw('items','(state = 6) AND '.$this->langDataArray['langOrder']);
        $data['settingsquery'] = $this->main_model->getByDataw('settings',$this->langDataArray['langOrder']);
        $data['settings'] = (array) $data['settingsquery'][0]; 
        $this->load->view('include/header',$data);
		$this->load->view('who_view',$data);
		$this->load->view('include/footer',$data);
    }
    public function projects()
	{
        // URL :- http://localhost/arthousepro/
        $data['title']='arthouse Group | List Of Projects Page';
        $data['langArray'] = $this->langDataArray;
        $data['records'] = $this->main_model->getByDataw('items','((c_id IS NULL AND state = 0) OR state = 1 OR (state = 2 AND c_id IS NULL)) AND '.$this->langDataArray['langOrder']);
        $data['pros'] = $this->main_model->getByDataw('items','(state = 7) AND '.$this->langDataArray['langOrder'].' LIMIT 10');
        $config = array();
 
       $config["base_url"] = base_url() . "pages/projects";
 
       $config["total_rows"] = $this->main_model->getByDataw('items','(state = 7) AND '.$this->langDataArray['langOrder'],'count');

        $config["per_page"] = 15;
 
       $config["uri_segment"] = 3;
 
       $this->pagination->initialize($config);
 
       $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
       $data["pager"] = $this->pagination->create_links();
       if($this->langDataArray['lang'] == 'ar'){
           $langPra = 0;
       }else{
           $langPra = null;
       }
        $data['pros2'] = $this->main_model->getAllData('items','id','DESC','state',7,$config["per_page"],$page,'lang',$langPra);
        $data['settingsquery'] = $this->main_model->getByDataw('settings',$this->langDataArray['langOrder']);
        $data['links'] = $this->main_model->getByDataw('items','(state = 6) AND '.$this->langDataArray['langOrder']);
        $data['news'] = $this->main_model->getByDataw('items','(state = 9) AND '.$this->langDataArray['langOrder'].' LIMIT 8');
        $data['settings'] = (array) $data['settingsquery'][0];
		$this->load->view('include/header',$data);
		$this->load->view('pros_view',$data);
		$this->load->view('include/footer',$data);
	}
    public function search()
	{
        // URL :- http://localhost/arthousepro/
        $data['title']='arthouse Group | Home Page';
        $data['records'] = $this->main_model->getByDataw('items','((c_id IS NULL AND state = 0) OR state = 1 OR (state = 2 AND c_id IS NULL))');
        $data['settingsquery'] = $this->main_model->getByDataw('settings',$langOrder);
        $data['links'] = $this->main_model->getByDataw('items','(state = 6)');
        $data['search'] = $this->main_model->item_search(strip_tags($this->input->get('search')));
        $data['news'] = $this->main_model->getByDataw('items','(state = 9) LIMIT 8');
        $data['settings'] = (array) $data['settingsquery'][0]; 
        $langExtf = explode('|',get_cookie('lang'));
        $langExt = $langExtf[0];
        if($langExt == 'ar'){
            $float = 'right';
            $unfloat = 'left';
            $langOrder = '(lang = 0)';
        }else{
            $float = 'left';
            $unfloat = 'right';
            $langOrder = '(lang IS NULL)';
        }
        $data['langArray']['lang'] = $langExt;
        $data['langArray']['float'] = $float;
        $data['langArray']['unfloat'] = $unfloat;
        $data['langArray']['home'] = $this->lang->line('home');
        $data['langArray']['read_more'] = $this->lang->line('read_more');
        $data['langArray']['who_are_we'] = $this->lang->line('who_are_we');
        $data['langArray']['our_services'] = $this->lang->line('our_services');
        $data['langArray']['business_gallery'] = $this->lang->line('business_gallery');
        $data['langArray']['view_all_work'] = $this->lang->line('view_all_work');
        $data['langArray']['view_all_news'] = $this->lang->line('view_all_news');
        $data['langArray']['art_hous_home_page'] = $this->lang->line('art_hous_home_page');
		$this->load->view('include/header',$data);
		$this->load->view('search_view',$data);
		$this->load->view('include/footer',$data);
	}
    public function contactus()
	{
        // URL :- http://localhost/arthousepro/
        $data['title']='arthouse Group | Our Address Page';
        $data['langArray'] = $this->langDataArray;
        $data['records'] = $this->main_model->getByDataw('items','((c_id IS NULL AND state = 0) OR state = 1 OR (state = 2 AND c_id IS NULL)) AND '.$this->langDataArray['langOrder']);
        $data['clients'] = $this->main_model->getByDataw('items','(state = 4) AND '.$this->langDataArray['langOrder']);
        $data['settingsquery'] = $this->main_model->getByDataw('settings',$this->langDataArray['langOrder']);
        $data['news'] = $this->main_model->getByDataw('items','(state = 9) AND '.$this->langDataArray['langOrder'].' LIMIT 8');
        $data['slider'] = $this->main_model->getByDataw('items','(state = 5) AND '.$this->langDataArray['langOrder']);
        $data['links'] = $this->main_model->getByDataw('items','(state = 6) AND '.$this->langDataArray['langOrder']);
        $data['settings'] = (array) $data['settingsquery'][0];
		$this->load->view('include/header',$data);
		$this->load->view($this->langDataArray['lang'].'_contact_view',$data);
		$this->load->view('include/footer',$data);
	}
    public function apply()
	{
        if(is_numeric($this->uri->segment(2))){
        $data['job'] = $this->main_model->getByDataw('items','((state = 10 OR state = 11) AND id = '.$this->uri->segment(2).')');
        }
        // URL :- http://localhost/arthousepro/
        $data['title']='arthouse Group | Home Page';
        $data['records'] = $this->main_model->getByDataw('items','((c_id IS NULL AND state = 0) OR state = 1 OR (state = 2 AND c_id IS NULL))');
        $data['error']=array('');
        $data['clients'] = $this->main_model->getByDataw('items','(state = 4)');
        $data['settingsquery'] = $this->main_model->getByDataw('settings',$langOrder);
        $data['slider'] = $this->main_model->getByDataw('items','(state = 5)');
        $data['links'] = $this->main_model->getByDataw('items','(state = 6)');
        $data['settings'] = (array) $data['settingsquery'][0]; 
        $langExtf = explode('|',get_cookie('lang'));
        $langExt = $langExtf[0];
        if($langExt == 'ar'){
            $float = 'right';
            $unfloat = 'left';
            $langOrder = '(lang = 0)';
        }else{
            $float = 'left';
            $unfloat = 'right';
            $langOrder = '(lang IS NULL)';
        }
        $data['langArray']['lang'] = $langExt;
        $data['langArray']['float'] = $float;
        $data['langArray']['unfloat'] = $unfloat;
        $data['langArray']['home'] = $this->lang->line('home');
        $data['langArray']['read_more'] = $this->lang->line('read_more');
        $data['langArray']['who_are_we'] = $this->lang->line('who_are_we');
        $data['langArray']['our_services'] = $this->lang->line('our_services');
        $data['langArray']['business_gallery'] = $this->lang->line('business_gallery');
        $data['langArray']['view_all_work'] = $this->lang->line('view_all_work');
        $data['langArray']['view_all_news'] = $this->lang->line('view_all_news');
        $data['langArray']['art_hous_home_page'] = $this->lang->line('art_hous_home_page');
		$this->load->view('include/header',$data);
		$this->load->view('apply_view',$data);
		$this->load->view('include/footer',$data);
	}
    public function enq()
	{
        if(is_numeric($this->uri->segment(2))){
        $data['job'] = $this->main_model->getByDataw('items','((state = 10 OR state = 11) AND id = '.$this->uri->segment(2).')');
        }
        // URL :- http://localhost/arthousepro/
        $data['title']='arthouse Group | Enquiries Page';
        $data['records'] = $this->main_model->getByDataw('items','((c_id IS NULL AND state = 0) OR state = 1 OR (state = 2 AND c_id IS NULL))');
        $data['error']=array('');
        $data['clients'] = $this->main_model->getByDataw('items','(state = 4)');
        $data['settingsquery'] = $this->main_model->getByDataw('settings',$langOrder);
        $data['slider'] = $this->main_model->getByDataw('items','(state = 5)');
        $data['links'] = $this->main_model->getByDataw('items','(state = 6)');
        $data['settings'] = (array) $data['settingsquery'][0]; 
        $langExtf = explode('|',get_cookie('lang'));
        $langExt = $langExtf[0];
        if($langExt == 'ar'){
            $float = 'right';
            $unfloat = 'left';
            $langOrder = '(lang = 0)';
        }else{
            $float = 'left';
            $unfloat = 'right';
            $langOrder = '(lang IS NULL)';
        }
        $data['langArray']['lang'] = $langExt;
        $data['langArray']['float'] = $float;
        $data['langArray']['unfloat'] = $unfloat;
        $data['langArray']['home'] = $this->lang->line('home');
        $data['langArray']['read_more'] = $this->lang->line('read_more');
        $data['langArray']['who_are_we'] = $this->lang->line('who_are_we');
        $data['langArray']['our_services'] = $this->lang->line('our_services');
        $data['langArray']['business_gallery'] = $this->lang->line('business_gallery');
        $data['langArray']['view_all_work'] = $this->lang->line('view_all_work');
        $data['langArray']['view_all_news'] = $this->lang->line('view_all_news');
        $data['langArray']['art_hous_home_page'] = $this->lang->line('art_hous_home_page');
		$this->load->view('include/header',$data);
		$this->load->view('enq_view',$data);
		$this->load->view('include/footer',$data);
	}
    public function pictures()
	{
        // URL :- http://localhost/arthousepro/pictures
        $data['title']='arthouse Group | Projects Pictures Page';
        $data['records'] = $this->main_model->getByDataw('items','((c_id IS NULL AND state = 0) OR state = 1 OR (state = 2 AND c_id IS NULL))');
        $data['clients'] = $this->main_model->getByDataw('items','(state = 4)');
        
        $config = array();
 
       $config["base_url"] = base_url() . "pages/pictures";
 
       $config["total_rows"] = $this->main_model->getByDataw('items','(state = 8)','count');

        $config["per_page"] = 16;
 
       $config["uri_segment"] = 3;
 
       $this->pagination->initialize($config);
 
       $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
       $data["pager"] = $this->pagination->create_links();
        $data['pics'] = $this->main_model->getAllData('items','id','DESC','state',8,$config["per_page"],$page);
        
        $data['cats'] = $this->main_model->getByDataw('items','(state = 16)');
        $data['pros'] = $this->main_model->getByDataw('items','(state = 7) LIMIT 10');
        $data['settingsquery'] = $this->main_model->getByDataw('settings',$langOrder);
        $data['slider'] = $this->main_model->getByDataw('items','(state = 5)');
        $data['links'] = $this->main_model->getByDataw('items','(state = 6)');
        $data['news'] = $this->main_model->getByDataw('items','(state = 9) LIMIT 8');
        $data['settings'] = (array) $data['settingsquery'][0]; 
		$this->load->view('include/header',$data);
		$this->load->view('pictures_view',$data);
		$this->load->view('include/footer',$data);
	}
    public function cat()
	{
        // URL :- http://localhost/arthousepro/pictures
        $data['title']='arthouse Group | Projects Pictures Page';
        $data['records'] = $this->main_model->getByDataw('items','((c_id IS NULL AND state = 0) OR state = 1 OR (state = 2 AND c_id IS NULL))');
        $data['clients'] = $this->main_model->getByDataw('items','(state = 4)');
        $id = $this->uri->segment(3);
        $data['pics'] = $this->main_model->getByDataw('items','(state = 8 AND keywords = '.$id.')');
        $data['cats'] = $this->main_model->getByDataw('items','(state = 16)');
        $data['pros'] = $this->main_model->getByDataw('items','(state = 7) LIMIT 10');
        $data['settingsquery'] = $this->main_model->getByDataw('settings',$langOrder);
        $data['slider'] = $this->main_model->getByDataw('items','(state = 5)');
        $data['links'] = $this->main_model->getByDataw('items','(state = 6)');
        $data['news'] = $this->main_model->getByDataw('items','(state = 9) LIMIT 8');
        $data['settings'] = (array) $data['settingsquery'][0]; 
		$this->load->view('include/header',$data);
		$this->load->view('cat_view',$data);
		$this->load->view('include/footer',$data);
	}
    public function charts()
	{
        // URL :- http://localhost/arthousepro/pictures
        $data['title']='arthouse Group | Projects Chart Page';
        $data['records'] = $this->main_model->getByDataw('items','((c_id IS NULL AND state = 0) OR state = 1 OR (state = 2 AND c_id IS NULL))');
        $data['clients'] = $this->main_model->getByDataw('items','(state = 4)');
        $data['charts'] = $this->main_model->getByDataw('items','(state = 12)');
        $data['settingsquery'] = $this->main_model->getByDataw('settings',$langOrder);
        $data['slider'] = $this->main_model->getByDataw('items','(state = 5)');
        $data['links'] = $this->main_model->getByDataw('items','(state = 6)');
        $data['news'] = $this->main_model->getByDataw('items','(state = 9) LIMIT 8');
        $data['settings'] = (array) $data['settingsquery'][0]; 
		$this->load->view('include/header',$data);
		$this->load->view('chart_view',$data);
		$this->load->view('include/footer',$data);
	}
    public function events()
	{
        // URL :- http://localhost/arthousepro/pictures
        $data['title']='arthouse Group | Projects Events Page';
        $data['langArray'] = $this->langDataArray;
        $data['records'] = $this->main_model->getByDataw('items','((c_id IS NULL AND state = 0) OR state = 1 OR (state = 2 AND c_id IS NULL)) AND '.$this->langDataArray['langOrder']);
        $data['clients'] = $this->main_model->getByDataw('items','(state = 4) AND '.$this->langDataArray['langOrder']);
        $data['news'] = $this->main_model->getByDataw('items','(state = 9) AND '.$this->langDataArray['langOrder']);
        $data['settingsquery'] = $this->main_model->getByDataw('settings',$this->langDataArray['langOrder']);
        $data['slider'] = $this->main_model->getByDataw('items','(state = 5) AND '.$this->langDataArray['langOrder']);
        $data['links'] = $this->main_model->getByDataw('items','(state = 6) AND '.$this->langDataArray['langOrder']);
        $data['settings'] = (array) $data['settingsquery'][0]; 
		$this->load->view('include/header',$data);
		$this->load->view('events_view',$data);
		$this->load->view('include/footer',$data);
	}
    public function careers()
	{
        // URL :- http://localhost/arthousepro/pictures
        $data['title']='arthouse Group | Careers Page';
        $data['records'] = $this->main_model->getByDataw('items','((c_id IS NULL AND state = 0) OR state = 1 OR (state = 2 AND c_id IS NULL))');
        $data['clients'] = $this->main_model->getByDataw('items','(state = 4)');
        $data['careers'] = $this->main_model->getByDataw('items','(state = 10)');
        $data['settingsquery'] = $this->main_model->getByDataw('settings',$langOrder);
        $data['news'] = $this->main_model->getByDataw('items','(state = 9) LIMIT 8');
        $data['slider'] = $this->main_model->getByDataw('items','(state = 5)');
        $data['links'] = $this->main_model->getByDataw('items','(state = 6)');
        $data['settings'] = (array) $data['settingsquery'][0]; 
		$this->load->view('include/header',$data);
		$this->load->view('careers_view',$data);
		$this->load->view('include/footer',$data);
	}
    public function suppliers()
	{
        // URL :- http://localhost/arthousepro/pictures
        $data['title']='arthouse Group | Suppliers Page';
        $data['records'] = $this->main_model->getByDataw('items','((c_id IS NULL AND state = 0) OR state = 1 OR (state = 2 AND c_id IS NULL))');
        $data['clients'] = $this->main_model->getByDataw('items','(state = 4)');
        $data['careers'] = $this->main_model->getByDataw('items','(state = 11)');
        $data['news'] = $this->main_model->getByDataw('items','(state = 9) LIMIT 8');
        $data['settingsquery'] = $this->main_model->getByDataw('settings',$langOrder);
        $data['slider'] = $this->main_model->getByDataw('items','(state = 5)');
        $data['links'] = $this->main_model->getByDataw('items','(state = 6)');
        $data['settings'] = (array) $data['settingsquery'][0]; 
		$this->load->view('include/header',$data);
		$this->load->view('suppliers_view',$data);
		$this->load->view('include/footer',$data);
	}
    public function certificate()
	{
        // URL :- http://localhost/arthousepro/pictures
        $data['title']='arthouse Group | Certificates Page';
        $data['records'] = $this->main_model->getByDataw('items','((c_id IS NULL AND state = 0) OR state = 1 OR (state = 2 AND c_id IS NULL))');
        $data['record'] = $this->main_model->getByDataw('items','(state = 3)');
        $data['clients'] = $this->main_model->getByDataw('items','(state = 4)');
        $data['settingsquery'] = $this->main_model->getByDataw('settings',$langOrder);
        $data['news'] = $this->main_model->getByDataw('items','(state = 9) LIMIT 10');
        $data['slider'] = $this->main_model->getByDataw('items','(state = 5)');
        $data['links'] = $this->main_model->getByDataw('items','(state = 6)');
        $data['settings'] = (array) $data['settingsquery'][0]; 
		$this->load->view('include/header',$data);
		$this->load->view('certificate_view',$data);
		$this->load->view('include/footer',$data);
	}
    public function arthouselogin()
	{
        $data['langArray'] = $this->langDataArray;
        if($this->main_model->is_logged_in()){
            // Redirect to admin
            redirect(base_url().'arthouseadmin/');
        }else{
            // URL :- http://localhost/arthousepro/pictures
        $data['title']='arthouse Group | arthouse Cpanel Login';
        $data['records'] = $this->main_model->getByDataw('items','((c_id IS NULL AND state = 0) OR state = 1 OR (state = 2 AND c_id IS NULL)) AND '.$this->langDataArray['langOrder']);
        $data['clients'] = $this->main_model->getByDataw('items','(state = 4) AND '.$this->langDataArray['langOrder']);
        $data['settingsquery'] = $this->main_model->getByDataw('settings',$this->langDataArray['langOrder']);
        $data['slider'] = $this->main_model->getByDataw('items','(state = 5) AND '.$this->langDataArray['langOrder']);
        $data['links'] = $this->main_model->getByDataw('items','(state = 6) AND '.$this->langDataArray['langOrder']);
        $data['settings'] = (array) $data['settingsquery'][0];
		$this->load->view('include/header',$data);
		$this->load->view('admin/login_view',$data);
		$this->load->view('include/footer',$data);
        }
	}
    public function applyCheck()
	{
        if(is_numeric($this->uri->segment(2))){
        $data['job'] = $this->main_model->getByDataw('items','((state = 10 OR state = 11) AND id = '.$this->uri->segment(2).')');
        }
            $data['title']='arthouse Group | arthouse Cpanel Apply Check';
            $this->form_validation->set_rules('title','Title','required');
            $this->form_validation->set_rules('content','Content','required');
            // Check if val. true
        if($this->form_validation->run() == true){
                $config['upload_path']          = './vendor/uploads/files/';
                $config['allowed_types']        = 'pdf|docx|rar|zip';
                $config['max_size']             = 50000;
                $config['max_width']            = 999999;
                $config['max_height']           = 999999;
                $config['encrypt_name']           = TRUE;

                $this->load->library('upload', $config);
                
                
                if ( ! $this->upload->do_upload('userfile'))
                {
                        $data['error'] = array('error' => $this->upload->display_errors());
                        $data['title']='arthouse Group | arthouse Cpanel Login';
                        $data['records'] = $this->main_model->getByDataw('items','((c_id IS NULL AND state = 0) OR state = 1 OR (state = 2 AND c_id IS NULL))');
                        $data['clients'] = $this->main_model->getByDataw('items','(state = 4)');
                        $data['settingsquery'] = $this->main_model->getByDataw('settings','(id = 1)');
                        $data['slider'] = $this->main_model->getByDataw('items','(state = 5)');
                        $data['links'] = $this->main_model->getByDataw('items','(state = 6)');
                        $data['settings'] = (array) $data['settingsquery'][0]; 
                        $this->load->view('include/header',$data);
                        $this->load->view('apply_view', $data);
                        $this->load->view('include/footer',$data);
                }
                else
                {
                $data['upload'] = array('upload_data' => $this->upload->data());
                    $filename = $data['upload']['upload_data']['file_name'];
                    if($data['job'][0]->state == 10){$state=13;}else{$state=14;}
                $originalPage=array(
                    'title' => strip_tags($this->input->post('title')),
                    'content' => strip_tags($this->input->post('content')),
                    'state' => $state,
                    'file' => $filename,
                    'c_id' => $data['job'][0]->id,
                    'date' => $this->main_model->dateTime('date')
                );
                $applyi = $this->main_model->insertData('items',$originalPage);
                redirect(base_url().'apply/done');
                    
                }
            }else{
                    $this->apply();
                }
	}
       public function enqCheck()
	{
            $data['title']='arthouse Group | arthouse Cpanel Apply Check';
            $this->form_validation->set_rules('title','Name','required');
            $this->form_validation->set_rules('content','Content','required');
            $this->form_validation->set_rules('keywords','E-Mail','required');
            // Check if val. true
        if($this->form_validation->run() == true){
                            $config['upload_path']          = './vendor/uploads/files/';
                $config['allowed_types']        = 'pdf|docx|rar|zip';
                $config['max_size']             = 50000;
                $config['max_width']            = 999999;
                $config['max_height']           = 999999;
                $config['encrypt_name']           = TRUE;

                $this->load->library('upload', $config);
                
                
                if ( ! $this->upload->do_upload('userfile'))
                {
                        $data['error'] = array('error' => $this->upload->display_errors());
                        $data['title']='arthouse Group | arthouse Cpanel Login';
                        $data['records'] = $this->main_model->getByDataw('items','((c_id IS NULL AND state = 0) OR state = 1 OR (state = 2 AND c_id IS NULL))');
                        $data['clients'] = $this->main_model->getByDataw('items','(state = 4)');
                        $data['settingsquery'] = $this->main_model->getByDataw('settings','(id = 1)');
                        $data['slider'] = $this->main_model->getByDataw('items','(state = 5)');
                        $data['links'] = $this->main_model->getByDataw('items','(state = 6)');
                        $data['settings'] = (array) $data['settingsquery'][0]; 
                        $this->load->view('include/header',$data);
                        $this->load->view('enq_view', $data);
                        $this->load->view('include/footer',$data);
                }
                else
                {
                $data['upload'] = array('upload_data' => $this->upload->data());
                    $filename = $data['upload']['upload_data']['file_name'];
                $originalPage=array(
                    'title' => strip_tags($this->input->post('title')),
                    'content' => strip_tags($this->input->post('content')),
                    'keywords' => strip_tags($this->input->post('keywords')),
                    'state' => 15,
                    'file' => $filename,
                    'date' => $this->main_model->dateTime('date')
                );
                $applyi = $this->main_model->insertData('items',$originalPage);
                redirect(base_url().'pages/enq/done');
                    
                }
            }else{
                    $this->enq();
                }
	}
    public function arthouseadmin()
	{
        if($this->main_model->is_logged_in()){
            $data['title']='arthouse Group | arthouse Cpanel';
            $this->load->view('admin/include/header',$data);
            $this->load->view('admin/admin_view',$data);
            $this->load->view('admin/include/footer',$data);
        }else{
            // Redirect to admin
            redirect(base_url().'arthouselogin/');
        }
	}
    public function applications()
	{
        if($this->main_model->is_logged_in()){
            $data['title']='arthouse Group | arthouse Cpanel';
            $this->load->view('admin/include/header',$data);
            $this->load->view('admin/apps_view',$data);
            $this->load->view('admin/include/footer',$data);
        }else{
            // Redirect to admin
            redirect(base_url().'arthouselogin/');
        }
	}
    public function arthouseenq()
	{
        if($this->main_model->is_logged_in()){
            $data['title']='arthouse Group | arthouse Cpanel';
            $this->load->view('admin/include/header',$data);
            $this->load->view('admin/enq_view',$data);
            $this->load->view('admin/include/footer',$data);
        }else{
            // Redirect to admin
            redirect(base_url().'arthouselogin/');
        }
	}
    public function arthousesettings()
	{
        if($this->main_model->is_logged_in()){
            $data['title']='arthouse Group | arthouse Cpanel Settings';
            $this->load->view('admin/include/header',$data);
            $this->load->view('admin/settings_view',$data);
            $this->load->view('admin/include/footer',$data);
        }else{
            // Redirect to admin
            redirect(base_url().'arthouselogin/');
        }
	}
    public function arthousepages()
	{
        if($this->main_model->is_logged_in()){
            $data['title']='arthouse Group | arthouse Cpanel Settings';
            $this->load->view('admin/include/header',$data);
            $data['records'] = $this->main_model->getByDataw('items','((c_id IS NULL AND state = 0) OR state = 1 OR (state = 2 AND c_id IS NULL))');
            $this->load->view('admin/pages_view',$data);
            $this->load->view('admin/include/footer',$data);
        }else{
            // Redirect to admin
            redirect(base_url().'arthouselogin/');
        }
	}
    public function certificatesad()
	{
        if($this->main_model->is_logged_in()){
            $data['title']='arthouse Group | arthouse Cpanel Settings';
            $this->load->view('admin/include/header',$data);
            $data['records'] = $this->main_model->getByDataw('items','(state = 3)');
            $this->load->view('admin/certificates_view',$data);
            $this->load->view('admin/include/footer',$data);
        }else{
            // Redirect to admin
            redirect(base_url().'arthouselogin/');
        }
	}
    public function addcert()
	{
        if($this->main_model->is_logged_in()){
            $data['title']='arthouse Group | arthouse Cpanel Add Certificate';
            $this->load->view('admin/include/header',$data);
            $data['records'] = $this->main_model->getByDataw('items','(state = 1)');
            $this->load->view('admin/addcert_view',$data);
            $this->load->view('admin/include/footer',$data);
        }else{
            // Redirect to admin
            redirect(base_url().'arthouselogin/');
        }
	}
    /*Start Component*/
    public function clientad()
	{
        if($this->main_model->is_logged_in()){
            $data['title']='arthouse Group | arthouse Cpanel Settings';
            $this->load->view('admin/include/header',$data);
            $data['records'] = $this->main_model->getByDataw('items','(state = 4)');
            $this->load->view('admin/clients_view',$data);
            $this->load->view('admin/include/footer',$data);
        }else{
            // Redirect to admin
            redirect(base_url().'arthouselogin/');
        }
	}
    public function addclient()
	{
        if($this->main_model->is_logged_in()){
            $data['title']='arthouse Group | arthouse Cpanel Add Certificate';
            $this->load->view('admin/include/header',$data);
            $data['records'] = $this->main_model->getByDataw('items','(state = 4)');
            $this->load->view('admin/addclient_view',$data);
            $this->load->view('admin/include/footer',$data);
        }else{
            // Redirect to admin
            redirect(base_url().'arthouselogin/');
        }
	}
    public function addclientCheck()
	{
        if($this->main_model->is_logged_in()){
            $data['title']='arthouse Group | arthouse Cpanel Add Check';
            $this->form_validation->set_rules('title','Title','required');
            $this->form_validation->set_rules('editor1','Content','required');
            // Check if val. true
        if($this->form_validation->run() == true){
            if(strip_tags($this->input->post('lang')) == 'null'){
                $lang = null;
            }else{
                $lang = 0;
            }
            $config['upload_path']          = './vendor/uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 999999;
            $config['max_width']            = 999999;
            $config['max_height']           = 999999;
            $config['encrypt_name']           = TRUE;

            $this->load->library('upload', $config);
            $this->upload->do_upload('userfile');
            $uploadData = array('upload_data' => $this->upload->data());
            $originalPage=array(
                'title' => strip_tags($this->input->post('title')),
                'content' => $this->input->post('editor1'),
                'state' => 4,
                'lang' => $lang,
                'file' => base_url().'vendor/uploads/'.$uploadData['upload_data']['file_name'],
                'date' => $this->main_model->dateTime('date')
            );
            $this->main_model->insertData('items',$originalPage);
            redirect(base_url().'arthouseadmin/client');
        }else{
            $this->addclient();
        }
        }else{
            // Redirect to admin
            redirect(base_url().'arthouselogin/');
        }
	}
    function editclientCheck(){
        if($this->main_model->is_logged_in()){
            $data['title']='arthouse Group | arthouse Cpanel Add Check';
            if(strip_tags($this->input->post('lang')) == 'null'){
                $lang = null;
            }else{
                $lang = 0;
            }
            $config['upload_path']          = './vendor/uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 999999;
            $config['max_width']            = 999999;
            $config['max_height']           = 999999;
            $config['encrypt_name']           = TRUE;

            $this->load->library('upload', $config);
            $this->upload->do_upload('userfile');
            $uploadData = array('upload_data' => $this->upload->data());
            $this->form_validation->set_rules('title','Title','required');
            $this->form_validation->set_rules('file','Image','required');
            $this->form_validation->set_rules('editor1','Content');
            // Check if val. true
        if($this->form_validation->run() == true){
            $item = array(
                'title' => strip_tags($this->input->post('title')),
                'lang' => $lang,
                'content' => $this->input->post('editor1')
            );
            if($uploadData['upload_data']['file_name'] !== ''){
                $item['file'] = base_url().'vendor/uploads/'.$uploadData['upload_data']['file_name'];
            }
            $succ = $this->main_model->update('items','id',$this->uri->segment(3),$item);
            redirect(base_url().'arthouseadmin/client');
        }  else {
                $this->edit();
            }
        }else{
        // Redirect to admin
        redirect(base_url().'arthouselogin/');
    }
    }
    /*End Component*/
        /*Start Component*/
    public function newsad()
	{
        if($this->main_model->is_logged_in()){
            $data['title']='arthouse Group | arthouse Cpanel Settings';
            $this->load->view('admin/include/header',$data);
            $data['records'] = $this->main_model->getByDataw('items','(state = 9)');
            $this->load->view('admin/news_view',$data);
            $this->load->view('admin/include/footer',$data);
        }else{
            // Redirect to admin
            redirect(base_url().'arthouselogin/');
        }
	}
    public function addnews()
	{
        if($this->main_model->is_logged_in()){
            $data['title']='arthouse Group | arthouse Cpanel Add Certificate';
            $this->load->view('admin/include/header',$data);
            $data['records'] = $this->main_model->getByDataw('items','(state = 9)');
            $this->load->view('admin/addnews_view',$data);
            $this->load->view('admin/include/footer',$data);
        }else{
            // Redirect to admin
            redirect(base_url().'arthouselogin/');
        }
	}
    public function addnewsCheck()
	{
        if($this->main_model->is_logged_in()){
            $data['title']='arthouse Group | arthouse Cpanel Add Check';
            $this->form_validation->set_rules('title','Title','required');
            $this->form_validation->set_rules('editor1','Content','required');
            // Check if val. true
        if($this->form_validation->run() == true){
            if(strip_tags($this->input->post('lang')) == 'null'){
                $lang = null;
            }else{
                $lang = 0;
            }
            $config['upload_path']          = './vendor/uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 999999;
            $config['max_width']            = 999999;
            $config['max_height']           = 999999;
            $config['encrypt_name']           = TRUE;

            $this->load->library('upload', $config);
            $this->upload->do_upload('userfile');
            $uploadData = array('upload_data' => $this->upload->data());

            $originalPage=array(
                'title' => strip_tags($this->input->post('title')),
                'content' => $this->input->post('editor1'),
                'state' => 9,
                'file' => base_url().'vendor/uploads/'.$uploadData['upload_data']['file_name'],
                'keywords' => strip_tags($this->input->post('keywords')),
                'lang' => $lang,
                'date' => $this->main_model->dateTime('date')
            );
            $this->main_model->insertData('items',$originalPage);
            redirect(base_url().'arthouseadmin/news');
        }else{
            $this->addnews();
        }
        }else{
            // Redirect to admin
            redirect(base_url().'arthouselogin/');
        }
	}
    function editnewsCheck(){
        if($this->main_model->is_logged_in()){
            $data['title']='arthouse Group | arthouse Cpanel Add Check';
            $this->form_validation->set_rules('title','Title','required');
            $this->form_validation->set_rules('editor1','Content');
            // Check if val. true
        if($this->form_validation->run() == true){
            $config['upload_path']          = './vendor/uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 999999;
            $config['max_width']            = 999999;
            $config['max_height']           = 999999;
            $config['encrypt_name']           = TRUE;

            $this->load->library('upload', $config);
            $this->upload->do_upload('userfile');
            $uploadData = array('upload_data' => $this->upload->data());
            
            $item = array(
                'title' => strip_tags($this->input->post('title')),
                'keywords' => strip_tags($this->input->post('keywords')),
                'content' => $this->input->post('editor1')
            );
            if($uploadData['upload_data']['file_name'] !== ''){
                $item['file'] = base_url().'vendor/uploads/'.$uploadData['upload_data']['file_name'];
            }
            $succ = $this->main_model->update('items','id',$this->uri->segment(3),$item);
            redirect(base_url().'arthouseadmin/news');
        }  else {
                $this->edit();
            }
        }else{
        // Redirect to admin
        redirect(base_url().'arthouselogin/');
    }
    }
    /*End Component*/
           /*Start Component*/
    public function careerad()
	{
        if($this->main_model->is_logged_in()){
            $data['title']='arthouse Group | arthouse Cpanel Settings';
            $this->load->view('admin/include/header',$data);
            $data['records'] = $this->main_model->getByDataw('items','(state = 10)');
            $this->load->view('admin/career_view',$data);
            $this->load->view('admin/include/footer',$data);
        }else{
            // Redirect to admin
            redirect(base_url().'arthouselogin/');
        }
	}
    public function addcareer()
	{
        if($this->main_model->is_logged_in()){
            $data['title']='arthouse Group | arthouse Cpanel Add Certificate';
            $this->load->view('admin/include/header',$data);
            $data['records'] = $this->main_model->getByDataw('items','(state = 10)');
            $this->load->view('admin/addcareer_view',$data);
            $this->load->view('admin/include/footer',$data);
        }else{
            // Redirect to admin
            redirect(base_url().'arthouselogin/');
        }
	}
    public function addcareerCheck()
	{
        if($this->main_model->is_logged_in()){
            $data['title']='arthouse Group | arthouse Cpanel Add Check';
            $this->form_validation->set_rules('title','Title','required');
            $this->form_validation->set_rules('editor1','Content','required');
            // Check if val. true
        if($this->form_validation->run() == true){
            $originalPage=array(
                'title' => strip_tags($this->input->post('title')),
                'content' => $this->input->post('editor1'),
                'state' => 10,
                'keywords' => strip_tags($this->input->post('keywords')),
                'date' => $this->main_model->dateTime('date')
            );
            $this->main_model->insertData('items',$originalPage);
            redirect(base_url().'arthouseadmin/career');
        }else{
            $this->addcareer();
        }
        }else{
            // Redirect to admin
            redirect(base_url().'arthouselogin/');
        }
	}
    function editcareerCheck(){
        if($this->main_model->is_logged_in()){
            $data['title']='arthouse Group | arthouse Cpanel Add Check';
            $this->form_validation->set_rules('title','Title','required');
            $this->form_validation->set_rules('editor1','Content');
            // Check if val. true
        if($this->form_validation->run() == true){
            $item = array(
                'title' => strip_tags($this->input->post('title')),
                'keywords' => strip_tags($this->input->post('keywords')),
                'content' => $this->input->post('editor1')
            );
            $succ = $this->main_model->update('items','id',$this->uri->segment(3),$item);
            redirect(base_url().'arthouseadmin/career');
        }  else {
                $this->edit();
            }
        }else{
        // Redirect to admin
        redirect(base_url().'arthouselogin/');
    }
    }
    /*End Component*/
              /*Start Component*/
    public function suppliesad()
	{
        if($this->main_model->is_logged_in()){
            $data['title']='arthouse Group | arthouse Cpanel Settings';
            $this->load->view('admin/include/header',$data);
            $data['records'] = $this->main_model->getByDataw('items','(state = 11)');
            $this->load->view('admin/supplies_view',$data);
            $this->load->view('admin/include/footer',$data);
        }else{
            // Redirect to admin
            redirect(base_url().'arthouselogin/');
        }
	}
    public function addsupplies()
	{
        if($this->main_model->is_logged_in()){
            $data['title']='arthouse Group | arthouse Cpanel Add Certificate';
            $this->load->view('admin/include/header',$data);
            $data['records'] = $this->main_model->getByDataw('items','(state = 11)');
            $this->load->view('admin/addsupplies_view',$data);
            $this->load->view('admin/include/footer',$data);
        }else{
            // Redirect to admin
            redirect(base_url().'arthouselogin/');
        }
	}
    public function addsuppliesCheck()
	{
        if($this->main_model->is_logged_in()){
            $data['title']='arthouse Group | arthouse Cpanel Add Check';
            $this->form_validation->set_rules('title','Title','required');
            $this->form_validation->set_rules('editor1','Content','required');
            // Check if val. true
        if($this->form_validation->run() == true){
            $originalPage=array(
                'title' => strip_tags($this->input->post('title')),
                'content' => $this->input->post('editor1'),
                'state' => 11,
                'keywords' => strip_tags($this->input->post('keywords')),
                'date' => $this->main_model->dateTime('date')
            );
            $this->main_model->insertData('items',$originalPage);
            redirect(base_url().'arthouseadmin/supplies');
        }else{
            $this->addsupplies();
        }
        }else{
            // Redirect to admin
            redirect(base_url().'arthouselogin/');
        }
	}
    function editsuppliesCheck(){
        if($this->main_model->is_logged_in()){
            $data['title']='arthouse Group | arthouse Cpanel Add Check';
            $this->form_validation->set_rules('title','Title','required');
            $this->form_validation->set_rules('editor1','Content');
            // Check if val. true
        if($this->form_validation->run() == true){
            $item = array(
                'title' => strip_tags($this->input->post('title')),
                'keywords' => strip_tags($this->input->post('keywords')),
                'content' => $this->input->post('editor1')
            );
            $succ = $this->main_model->update('items','id',$this->uri->segment(3),$item);
            redirect(base_url().'arthouseadmin/supplies');
        }  else {
                $this->edit();
            }
        }else{
        // Redirect to admin
        redirect(base_url().'arthouselogin/');
    }
    }
    /*End Component*/
    /*Start Component*/
    public function projectsad()
	{
        if($this->main_model->is_logged_in()){
            $data['title']='arthouse Group | arthouse Cpanel Settings';
            $this->load->view('admin/include/header',$data);
            $data['records'] = $this->main_model->getByDataw('items','(state = 7)');
            $this->load->view('admin/projects_view',$data);
            $this->load->view('admin/include/footer',$data);
        }else{
            // Redirect to admin
            redirect(base_url().'arthouselogin/');
        }
	}
    public function addprojects()
	{
        if($this->main_model->is_logged_in()){
            $data['title']='arthouse Group | arthouse Cpanel Add Certificate';
            $this->load->view('admin/include/header',$data);
            $data['records'] = $this->main_model->getByDataw('items','(state = 7)');
            $this->load->view('admin/addprojects_view',$data);
            $this->load->view('admin/include/footer',$data);
        }else{
            // Redirect to admin
            redirect(base_url().'arthouselogin/');
        }
	}
    public function addprojectsCheck()
	{
        if($this->main_model->is_logged_in()){
            $data['title']='arthouse Group | arthouse Cpanel Add Check';
            $this->form_validation->set_rules('title','Title','required');
            $this->form_validation->set_rules('file','Cost','required');
            $this->form_validation->set_rules('startdate','startdate','required');
            $this->form_validation->set_rules('enddate','enddate','required');
            $this->form_validation->set_rules('ofwork','ofwork','required');
            $this->form_validation->set_rules('editor1','Content','required');
            // Check if val. true
        if($this->form_validation->run() == true){
            if(strip_tags($this->input->post('lang')) == 'null'){
                $lang = null;
            }else{
                $lang = 0;
            }
            $config['upload_path']          = './vendor/uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 999999;
            $config['max_width']            = 999999;
            $config['max_height']           = 999999;
            $config['encrypt_name']           = TRUE;

            $this->load->library('upload', $config);
            $this->upload->do_upload('userfile');
            $uploadData = array('upload_data' => $this->upload->data());
            $originalPage=array(
                'title' => strip_tags($this->input->post('title')),
                'keywords' => base_url().'vendor/uploads/'.$uploadData['upload_data']['file_name'],
                'startdate' => strip_tags($this->input->post('startdate')),
                'lang' => $lang,
                'enddate' => strip_tags($this->input->post('enddate')),
                'ofwork' => strip_tags($this->input->post('ofwork')),
                'content' => $this->input->post('editor1'),
                'state' => 7,
                'file' => strip_tags($this->input->post('file')),
                'date' => $this->main_model->dateTime('date')
            );
            $this->main_model->insertData('items',$originalPage);
            redirect(base_url().'arthouseadmin/projects');
        }else{
            $this->addprojects();
        }
        }else{
            // Redirect to admin
            redirect(base_url().'arthouselogin/');
        }
	}
    function editprojectsCheck(){
        if($this->main_model->is_logged_in()){
            $data['title']='arthouse Group | arthouse Cpanel Add Check';
            $this->form_validation->set_rules('title','Title','required');
            $this->form_validation->set_rules('file','Cost','required');
            $this->form_validation->set_rules('startdate','startdate','required');
            $this->form_validation->set_rules('enddate','enddate','required');
            $this->form_validation->set_rules('ofwork','ofwork','required');
            $this->form_validation->set_rules('editor1','Content');
            // Check if val. true
        if($this->form_validation->run() == true){
            if(strip_tags($this->input->post('lang')) == 'null'){
                $lang = null;
            }else{
                $lang = 0;
            }
            $config['upload_path']          = './vendor/uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 999999;
            $config['max_width']            = 999999;
            $config['max_height']           = 999999;
            $config['encrypt_name']           = TRUE;

            $this->load->library('upload', $config);
            $this->upload->do_upload('userfile');
            $uploadData = array('upload_data' => $this->upload->data());
            $item = array(
                'title' => strip_tags($this->input->post('title')),
                'lang' => $lang,
                'startdate' => strip_tags($this->input->post('startdate')),
                'enddate' => strip_tags($this->input->post('enddate')),
                'ofwork' => strip_tags($this->input->post('ofwork')),
                'file' => strip_tags($this->input->post('file')),
                'content' => $this->input->post('editor1')
            );
            if($uploadData['upload_data']['file_name'] !== ''){
                $item['keywords'] = base_url().'vendor/uploads/'.$uploadData['upload_data']['file_name'];
            }
            $succ = $this->main_model->update('items','id',$this->uri->segment(3),$item);
            redirect(base_url().'arthouseadmin/projects');
        }  else {
                $this->edit();
            }
        }else{
        // Redirect to admin
        redirect(base_url().'arthouselogin/');
    }
    }
    /*End Component*/
    
            /*Start Component*/
    public function chart()
	{
        if($this->main_model->is_logged_in()){
            $data['title']='arthouse Group | arthouse Cpanel Settings';
            $this->load->view('admin/include/header',$data);
            $data['records'] = $this->main_model->getByDataw('items','(state = 12)');
            $this->load->view('admin/chart_view',$data);
            $this->load->view('admin/include/footer',$data);
        }else{
            // Redirect to admin
            redirect(base_url().'arthouselogin/');
        }
	}
    public function addchart()
	{
        if($this->main_model->is_logged_in()){
            $data['title']='arthouse Group | arthouse Cpanel Add chart';
            $this->load->view('admin/include/header',$data);
            $data['records'] = $this->main_model->getByDataw('items','(state = 12)');
            $this->load->view('admin/addchart_view',$data);
            $this->load->view('admin/include/footer',$data);
        }else{
            // Redirect to admin
            redirect(base_url().'arthouselogin/');
        }
	}
    public function addchartCheck()
	{
        if($this->main_model->is_logged_in()){
            $data['title']='arthouse Group | arthouse Cpanel Add Check';
            $this->form_validation->set_rules('title','Month','required');
            $this->form_validation->set_rules('file','Value','required');
            $this->form_validation->set_rules('content','Color','required');
            // Check if val. true
        if($this->form_validation->run() == true){
            $originalPage=array(
                'title' => strip_tags($this->input->post('title')),
                'state' => 12,
                'file' => strip_tags($this->input->post('file')),
                'content' => strip_tags($this->input->post('content')),
                'date' => $this->main_model->dateTime('date')
            );
            $this->main_model->insertData('items',$originalPage);
            redirect(base_url().'arthouseadmin/chart');
        }else{
            $this->addchart();
        }
        }else{
            // Redirect to admin
            redirect(base_url().'arthouselogin/');
        }
	}
    function editchartCheck(){
        if($this->main_model->is_logged_in()){
            $data['title']='arthouse Group | arthouse Cpanel Add Check';
            $this->form_validation->set_rules('title','Title','required');
            $this->form_validation->set_rules('file','Image','required');
            // Check if val. true
        if($this->form_validation->run() == true){
            $item = array(
                'title' => strip_tags($this->input->post('title')),
                'content' => strip_tags($this->input->post('content')),
                'file' => strip_tags($this->input->post('file'))
            );
            $succ = $this->main_model->update('items','id',$this->uri->segment(3),$item);
            redirect(base_url().'arthouseadmin/chart');
        }  else {
                $this->edit();
            }
        }else{
        // Redirect to admin
        redirect(base_url().'arthouselogin/');
    }
    }
    /*End Component*/
    
        /*Start Component*/
    public function slider()
	{
        if($this->main_model->is_logged_in()){
            $data['title']='arthouse Group | arthouse Cpanel Settings';
            $this->load->view('admin/include/header',$data);
            $data['records'] = $this->main_model->getByDataw('items','(state = 5)');
            $this->load->view('admin/slider_view',$data);
            $this->load->view('admin/include/footer',$data);
        }else{
            // Redirect to admin
            redirect(base_url().'arthouselogin/');
        }
	}
    public function addslider()
	{
        if($this->main_model->is_logged_in()){
            $data['title']='arthouse Group | arthouse Cpanel Add Slider';
            $this->load->view('admin/include/header',$data);
            $data['records'] = $this->main_model->getByDataw('items','(state = 5)');
            $this->load->view('admin/addslider_view',$data);
            $this->load->view('admin/include/footer',$data);
        }else{
            // Redirect to admin
            redirect(base_url().'arthouselogin/');
        }
	}
    public function addsliderCheck()
	{
        if($this->main_model->is_logged_in()){
            $data['title']='arthouse Group | arthouse Cpanel Add Check';
            $this->form_validation->set_rules('title','Title','required');
            // Check if val. true
        if($this->form_validation->run() == true){
            if(strip_tags($this->input->post('lang')) == 'null'){
                $lang = null;
            }else{
                $lang = 0;
            }
            $config['upload_path']          = './vendor/uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 999999;
            $config['max_width']            = 999999;
            $config['max_height']           = 999999;
            $config['encrypt_name']           = TRUE;

            $this->load->library('upload', $config);
            $this->upload->do_upload('userfile');
            $uploadData = array('upload_data' => $this->upload->data());

            $originalPage=array(
                'title' => strip_tags($this->input->post('title')),
                'state' => 5,
                'lang' => $lang,
                'file' => base_url().'vendor/uploads/'.$uploadData['upload_data']['file_name'],
                'date' => $this->main_model->dateTime('date')
            );
            $this->main_model->insertData('items',$originalPage);
            redirect(base_url().'arthouseadmin/slider');
        }else{
            $this->addslider();
        }
        }else{
            // Redirect to admin
            redirect(base_url().'arthouselogin/');
        }
	}
    function editsliderCheck(){
        if($this->main_model->is_logged_in()){
            if(strip_tags($this->input->post('lang')) == 'null'){
                $lang = null;
            }else{
                $lang = 0;
            }
            $config['upload_path']          = './vendor/uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 999999;
            $config['max_width']            = 999999;
            $config['max_height']           = 999999;
            $config['encrypt_name']           = TRUE;

            $this->load->library('upload', $config);
            $this->upload->do_upload('userfile');
            $uploadData = array('upload_data' => $this->upload->data());

            $data['title']='arthouse Group | arthouse Cpanel Add Check';
            $this->form_validation->set_rules('title','Title','required');
            $this->form_validation->set_rules('content','Slide Link','required');
            // Check if val. true
        if($this->form_validation->run() == true){
            $item = array(
                'title' => strip_tags($this->input->post('title')),
                'content' => strip_tags($this->input->post('content')),
                'lang' => $lang
            );
            if($uploadData['upload_data']['file_name'] !== ''){
                $item['file'] = base_url().'vendor/uploads/'.$uploadData['upload_data']['file_name'];
            }
            $succ = $this->main_model->update('items','id',$this->uri->segment(3),$item);
            redirect(base_url().'arthouseadmin/slider');
        }  else {
                $this->edit();
            }
        }else{
        // Redirect to admin
        redirect(base_url().'arthouselogin/');
    }
    }
    /*End Component*/
    
           /*Start Component*/
    public function category()
	{
        if($this->main_model->is_logged_in()){
            $data['title']='arthouse Group | arthouse Cpanel Settings';
            $this->load->view('admin/include/header',$data);
            $data['records'] = $this->main_model->getByDataw('items','(state = 16)');
            $this->load->view('admin/category_view',$data);
            $this->load->view('admin/include/footer',$data);
        }else{
            // Redirect to admin
            redirect(base_url().'arthouselogin/');
        }
	}
    public function addcategory()
	{
        if($this->main_model->is_logged_in()){
            $data['title']='arthouse Group | arthouse Cpanel Add category';
            $this->load->view('admin/include/header',$data);
            $data['records'] = $this->main_model->getByDataw('items','(state = 16)');
            $this->load->view('admin/addcategory_view',$data);
            $this->load->view('admin/include/footer',$data);
        }else{
            // Redirect to admin
            redirect(base_url().'arthouselogin/');
        }
	}
    public function addcategoryCheck()
	{
        if($this->main_model->is_logged_in()){
            $data['title']='arthouse Group | arthouse Cpanel Add Check';
            $this->form_validation->set_rules('title','Category','required');
            // Check if val. true
        if($this->form_validation->run() == true){
            $originalPage=array(
                'title' => strip_tags($this->input->post('title')),
                'state' => 16,
                'date' => $this->main_model->dateTime('date')
            );
            $this->main_model->insertData('items',$originalPage);
            redirect(base_url().'arthouseadmin/category');
        }else{
            $this->addcategory();
        }
        }else{
            // Redirect to admin
            redirect(base_url().'arthouselogin/');
        }
	}
    function editcategoryCheck(){
        if($this->main_model->is_logged_in()){
            $data['title']='arthouse Group | arthouse Cpanel Add Check';
            $this->form_validation->set_rules('title','Category','required');
            // Check if val. true
        if($this->form_validation->run() == true){
            $item = array(
                'title' => strip_tags($this->input->post('title'))
            );
            $succ = $this->main_model->update('items','id',$this->uri->segment(3),$item);
            redirect(base_url().'arthouseadmin/category');
        }  else {
                $this->edit();
            }
        }else{
        // Redirect to admin
        redirect(base_url().'arthouselogin/');
    }
    }
    /*End Component*/
    
            /*Start Component*/
    public function pic()
	{
        if($this->main_model->is_logged_in()){
            $data['title']='arthouse Group | arthouse Cpanel Settings';
            $this->load->view('admin/include/header',$data);
            $data['records'] = $this->main_model->getByDataw('items','(state = 8)');
            $this->load->view('admin/pic_view',$data);
            $this->load->view('admin/include/footer',$data);
        }else{
            // Redirect to admin
            redirect(base_url().'arthouselogin/');
        }
	}
    public function addpic()
	{
        if($this->main_model->is_logged_in()){
            $data['title']='arthouse Group | arthouse Cpanel Add pic';
            $this->load->view('admin/include/header',$data);
            $data['records'] = $this->main_model->getByDataw('items','(state = 7)');
            $this->load->view('admin/addpic_view',$data);
            $this->load->view('admin/include/footer',$data);
        }else{
            // Redirect to admin
            redirect(base_url().'arthouselogin/');
        }
	}
    public function addpicCheck()
	{
        if($this->main_model->is_logged_in()){
            $data['title']='arthouse Group | arthouse Cpanel Add Check';
            $this->form_validation->set_rules('title','Title','required');
            // Check if val. true
        if($this->form_validation->run() == true){
            if(strip_tags($this->input->post('lang')) == 'null'){
                $lang = null;
            }else{
                $lang = 0;
            }
            $config['upload_path']          = './vendor/uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 999999;
            $config['max_width']            = 999999;
            $config['max_height']           = 999999;
            $config['encrypt_name']           = TRUE;

            $this->load->library('upload', $config);
            $this->upload->do_upload('userfile');
            $uploadData = array('upload_data' => $this->upload->data());
            $originalPage=array(
                'title' => strip_tags($this->input->post('title')),
                'state' => 8,
                'file' => base_url().'vendor/uploads/'.$uploadData['upload_data']['file_name'],
                'c_id' => strip_tags($this->input->post('c_id')),
                'keywords' => strip_tags($this->input->post('keywords')),
                'content' => base_url().'vendor/uploads/'.$uploadData['upload_data']['file_name'],
                'date' => $this->main_model->dateTime('date')
            );
            $this->main_model->insertData('items',$originalPage);
            redirect(base_url().'arthouseadmin/pic');
        }else{
            $this->addpic();
        }
        }else{
            // Redirect to admin
            redirect(base_url().'arthouselogin/');
        }
	}
    function editpicCheck(){
        if($this->main_model->is_logged_in()){
            $data['title']='arthouse Group | arthouse Cpanel Add Check';
            $this->form_validation->set_rules('title','Title','required');
            // Check if val. true
        if($this->form_validation->run() == true){
            if(strip_tags($this->input->post('lang')) == 'null'){
                $lang = null;
            }else{
                $lang = 0;
            }
            $config['upload_path']          = './vendor/uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 999999;
            $config['max_width']            = 999999;
            $config['max_height']           = 999999;
            $config['encrypt_name']           = TRUE;

            $this->load->library('upload', $config);
            $this->upload->do_upload('userfile');
            $uploadData = array('upload_data' => $this->upload->data());
            $item = array(
                'title' => strip_tags($this->input->post('title')),
                'keywords' => strip_tags($this->input->post('keywords')),
                'c_id' => strip_tags($this->input->post('c_id'))
            );
            if($uploadData['upload_data']['file_name'] !== ''){
                $item['file'] = base_url().'vendor/uploads/'.$uploadData['upload_data']['file_name'];
                $item['content'] = base_url().'vendor/uploads/'.$uploadData['upload_data']['file_name'];
            }
            $succ = $this->main_model->update('items','id',$this->uri->segment(3),$item);
            redirect(base_url().'arthouseadmin/pic');
        }  else {
                $this->edit();
            }
        }else{
        // Redirect to admin
        redirect(base_url().'arthouselogin/');
    }
    }
    /*End Component*/
    
            /*Start Component*/
    public function flink()
	{
        if($this->main_model->is_logged_in()){
            $data['title']='arthouse Group | arthouse Cpanel Settings';
            $this->load->view('admin/include/header',$data);
            $data['records'] = $this->main_model->getByDataw('items','(state = 6)');
            $this->load->view('admin/flink_view',$data);
            $this->load->view('admin/include/footer',$data);
        }else{
            // Redirect to admin
            redirect(base_url().'arthouselogin/');
        }
	}
    public function addflink()
	{
        if($this->main_model->is_logged_in()){
            $data['title']='arthouse Group | arthouse Cpanel Add flink';
            $this->load->view('admin/include/header',$data);
            $data['records'] = $this->main_model->getByDataw('items','(state = 6)');
            $this->load->view('admin/addflink_view',$data);
            $this->load->view('admin/include/footer',$data);
        }else{
            // Redirect to admin
            redirect(base_url().'arthouselogin/');
        }
	}
    public function addflinkCheck()
	{
        if($this->main_model->is_logged_in()){
            $data['title']='arthouse Group | arthouse Cpanel Add Check';
            $this->form_validation->set_rules('title','Title','required');
            $this->form_validation->set_rules('content','Link','required');
            // Check if val. true
        if($this->form_validation->run() == true){
            if(strip_tags($this->input->post('lang')) == 'null'){
                $lang = null;
            }else{
                $lang = 0;
            }
            $originalPage=array(
                'title' => strip_tags($this->input->post('title')),
                'state' => 6,
                'lang' => $lang,
                'content' => strip_tags($this->input->post('content')),
                'date' => $this->main_model->dateTime('date')
            );
            $this->main_model->insertData('items',$originalPage);
            redirect(base_url().'arthouseadmin/flink');
        }else{
            $this->addflink();
        }
        }else{
            // Redirect to admin
            redirect(base_url().'arthouselogin/');
        }
	}
    function editflinkCheck(){
        if($this->main_model->is_logged_in()){
            $data['title']='arthouse Group | arthouse Cpanel Add Check';
            $this->form_validation->set_rules('title','Title','required');
            $this->form_validation->set_rules('content','Link','required');
            // Check if val. true
        if($this->form_validation->run() == true){
            $item = array(
                'title' => strip_tags($this->input->post('title')),
                'content' => strip_tags($this->input->post('content'))
            );
            $succ = $this->main_model->update('items','id',$this->uri->segment(3),$item);
            redirect(base_url().'arthouseadmin/flink');
        }  else {
                $this->edit();
            }
        }else{
        // Redirect to admin
        redirect(base_url().'arthouselogin/');
    }
    }
    /*End Component*/
    
        /*Start Component*/
    public function admins()
	{
        if($this->main_model->is_logged_in()){
            $data['title']='arthouse Group | arthouse Cpanel Settings';
            $this->load->view('admin/include/header',$data);
            $data['records'] = $this->main_model->getByDataw('admins','(state = 1)');
            $this->load->view('admin/admins_view',$data);
            $this->load->view('admin/include/footer',$data);
        }else{
            // Redirect to admin
            redirect(base_url().'arthouselogin/');
        }
	}
    public function addadmin()
	{
        if($this->main_model->is_logged_in()){
            $data['title']='arthouse Group | arthouse Cpanel Add Certificate';
            $this->load->view('admin/include/header',$data);
            $data['records'] = $this->main_model->getByDataw('admins','(state = 1)');
            $this->load->view('admin/addadmin_view',$data);
            $this->load->view('admin/include/footer',$data);
        }else{
            // Redirect to admin
            redirect(base_url().'arthouselogin/');
        }
	}
    public function addadminCheck()
	{
        if($this->main_model->is_logged_in()){
            $data['title']='arthouse Group | arthouse Cpanel Add Check';
            $this->form_validation->set_rules('username','Usernamr','required');
            $this->form_validation->set_rules('email','E-Mail','required');
            $this->form_validation->set_rules('password','Password','required');
            // Check if val. true
        if($this->form_validation->run() == true){
            $originalPage=array(
                'username' => strip_tags($this->input->post('username')),
                'email' => strip_tags($this->input->post('email')),
                'state' => 1,
                'password' => $this->encryption->encrypt($this->input->post('password'))
            );
            $this->main_model->insertData('admins',$originalPage);
            redirect(base_url().'arthouseadmin/admins');
        }else{
            $this->addadmin();
        }
        }else{
            // Redirect to admin
            redirect(base_url().'arthouselogin/');
        }
	}
    function editadminCheck(){
        if($this->main_model->is_logged_in()){
            $data['title']='arthouse Group | arthouse Cpanel Add Check';
            $this->form_validation->set_rules('username','Usernamr','required');
            $this->form_validation->set_rules('email','E-Mail','required');
            $this->form_validation->set_rules('password','Password','required');
            // Check if val. true
        if($this->form_validation->run() == true){
            $item = array(
                'username' => strip_tags($this->input->post('username')),
                'email' => strip_tags($this->input->post('email')),
                'password' => $this->encryption->encrypt($this->input->post('password'))
            );
            $succ = $this->main_model->update('admins','id',$this->uri->segment(3),$item);
            redirect(base_url().'arthouseadmin/admins');
        }  else {
                $this->edit();
            }
        }else{
        // Redirect to admin
        redirect(base_url().'arthouselogin/');
    }
    }
    /*End Component*/
    
    public function addoriginalpage()
	{
        if($this->main_model->is_logged_in()){
            $data['title']='arthouse Group | arthouse Cpanel Add Original Page';
            $this->load->view('admin/include/header',$data);
            $data['records'] = $this->main_model->getByDataw('items','(state = 1)');
            $this->load->view('admin/addoriginalpage_view',$data);
            $this->load->view('admin/include/footer',$data);
        }else{
            // Redirect to admin
            redirect(base_url().'arthouselogin/');
        }
	}
    public function adddropdown()
	{
        if($this->main_model->is_logged_in()){
            $data['title']='arthouse Group | arthouse Cpanel Add Dropdown Menu';
            $this->load->view('admin/include/header',$data);
            $this->load->view('admin/adddropdown_view',$data);
            $this->load->view('admin/include/footer',$data);
        }else{
            // Redirect to admin
            redirect(base_url().'arthouselogin/');
        }
	}
    public function addlinkpage()
	{
        if($this->main_model->is_logged_in()){
            $data['title']='arthouse Group | arthouse Cpanel Add Link Page';
            $this->load->view('admin/include/header',$data);
            $data['records'] = $this->main_model->getByDataw('items','(state = 1)');
            $this->load->view('admin/addlinkpage_view',$data);
            $this->load->view('admin/include/footer',$data);
        }else{
            // Redirect to admin
            redirect(base_url().'arthouselogin/');
        }
	}
    public function addCheck()
	{
        if($this->main_model->is_logged_in()){
            $data['title']='arthouse Group | arthouse Cpanel Add Check';
            $this->form_validation->set_rules('title','Title','required');
            $this->form_validation->set_rules('editor1','Content','required');
            // Check if val. true
        if($this->form_validation->run() == true){
            if(strip_tags($this->input->post('lang')) == 'null'){
                $lang = null;
            }else{
                $lang = 0;
            }
            $originalPage=array(
                'title' => strip_tags($this->input->post('title')),
                'content' => $this->input->post('editor1'),
                'state' => 0,
                'lang' => $lang,
                'date' => $this->main_model->dateTime('date')
            );
            if($this->input->post('c_id') !== '0'){
                $originalPage['c_id'] = $this->input->post('c_id');
            }
            $this->main_model->insertData('items',$originalPage);
            redirect(base_url().'arthouseadmin/arthousepages');
        }else{
            $this->addoriginalpage();
        }
        }else{
            // Redirect to admin
            redirect(base_url().'arthouselogin/');
        }
	}
    public function addcertCheck()
	{
        if($this->main_model->is_logged_in()){
            $data['title']='arthouse Group | arthouse Cpanel Add Check';
            $this->form_validation->set_rules('title','Title','required');
            $this->form_validation->set_rules('file','Image','required');
            $this->form_validation->set_rules('editor1','Content','required');
            // Check if val. true
        if($this->form_validation->run() == true){
            $originalPage=array(
                'title' => strip_tags($this->input->post('title')),
                'content' => $this->input->post('editor1'),
                'state' => 3,
                'file' => strip_tags($this->input->post('file')),
                'date' => $this->main_model->dateTime('date')
            );
            $this->main_model->insertData('items',$originalPage);
            redirect(base_url().'arthouseadmin/certificates');
        }else{
            $this->addcert();
        }
        }else{
            // Redirect to admin
            redirect(base_url().'arthouselogin/');
        }
	}
    public function addlinkCheck()
	{
        if($this->main_model->is_logged_in()){
            $data['title']='arthouse Group | arthouse Cpanel Add Check';
            $this->form_validation->set_rules('title','Title','required');
            $this->form_validation->set_rules('editor1','Content','required');
            // Check if val. true
        if($this->form_validation->run() == true){
            if(strip_tags($this->input->post('lang')) == 'null'){
                $lang = null;
            }else{
                $lang = 0;
            }
            $originalPage=array(
                'title' => strip_tags($this->input->post('title')),
                'content' => strip_tags($this->input->post('editor1')),
                'state' => 2,
                'lang' => $lang,
                'date' => $this->main_model->dateTime('date')
            );
            if($this->input->post('c_id') !== '0'){
                $originalPage['c_id'] = $this->input->post('c_id');
            }
            $this->main_model->insertData('items',$originalPage);
            redirect(base_url().'arthouseadmin/arthousepages');
        }else{
            $this->addlinkpage();
        }
        }else{
            // Redirect to admin
            redirect(base_url().'arthouselogin/');
        }
	}
    public function adddropcheck()
	{
        if($this->main_model->is_logged_in()){
            $data['title']='arthouse Group | arthouse Cpanel Add Check';
            $this->form_validation->set_rules('title','Title','required');
            // Check if val. true
        if($this->form_validation->run() == true){
            if(strip_tags($this->input->post('lang')) == 'null'){
                $lang = null;
            }else{
                $lang = 0;
            }
            $originalPage=array(
                'title' => strip_tags($this->input->post('title')),
                'content' => '',
                'state' => 1,
                'lang' => $lang,
                'date' => $this->main_model->dateTime('date')
            );
            $this->main_model->insertData('items',$originalPage);
            redirect(base_url().'arthouseadmin/arthousepages');
        }else{
            $this->adddropdown();
        }
        }else{
            // Redirect to admin
            redirect(base_url().'arthouselogin/');
        }
	}
    public function loginCheck()
	{
            if($this->main_model->is_logged_in()){
                // Redirect to profile
            redirect(base_url().'arthouseadmin/');
            }else{
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('password','Password','required');
        // Check if val. true
        if($this->form_validation->run() == true){
            $username=strip_tags($this->input->post('username'));
            $password=strip_tags($this->input->post('password'));
                $records = $this->main_model->getByData('admins','username',$username);
                if($records == TRUE){
                foreach ($records as $row){
                    $password_f = $row->password;
                    $username_f = $row->username;
                    if($password == $this->encryption->decrypt($password_f) and $username == $username_f){
                        $row_arr = (array) $row;
                        $this->session->set_userdata($row_arr);
                        redirect(base_url().'arthouseadmin/');
                    }  else {
                        redirect(base_url().'pages/arthouselogin/wrong');
                    }
                }
        }else {
                redirect(base_url().'pages/arthouselogin/wrong');
            }
            }  else {
                $this->arthouselogin();
            }
            }
        }
    function delete(){
        if($this->main_model->is_logged_in()){
            $id=$this->uri->segment(3);
            $where=$this->uri->segment(4);
            if($where == 'admins'){
            $res = $this->main_model->deleteData('admins','id',$id);
            }else{
            $res = $this->main_model->deleteData('items','id',$id);
            }
            redirect(base_url().'arthouseadmin/'.$where);
        }else{
        // Redirect to admin
        redirect(base_url().'arthouselogin/');
    }
    }
    public function ar_generalsettings(){
        if($this->main_model->is_logged_in()){
            $res = $this->main_model->getByData('settings','id',2);
            $data['row'] = (array) $res[0];
            $data['title']='arthouse Group | arthouse Cpanel Add Link Page';
            $this->load->view('admin/include/header',$data);
            $this->load->view('admin/settedit_view',$data);
            $this->load->view('admin/include/footer',$data);
            }else{
        // Redirect to admin
        redirect(base_url().'arthouselogin/');
    }
    }
    function ar_settCheck(){
        if($this->main_model->is_logged_in()){
            $data['title']='arthouse Group | arthouse Cpanel Add Check';
            $this->form_validation->set_rules('logo','Logo','required');
            $this->form_validation->set_rules('title','Title','required');
            $this->form_validation->set_rules('c_add','Company Address','required');
            $this->form_validation->set_rules('fax','Fax','required');
            $this->form_validation->set_rules('keywords','keywords','required');
            $this->form_validation->set_rules('description','description','required');
            $this->form_validation->set_rules('color','Color','required');
            $this->form_validation->set_rules('hover','Hover','required');
            $this->form_validation->set_rules('telephone','telephone','required');
            $this->form_validation->set_rules('address','address','required');
            $this->form_validation->set_rules('email','email','required');
            $this->form_validation->set_rules('facebook','facebook');
            $this->form_validation->set_rules('twitter','twitter');
            $this->form_validation->set_rules('linkedin','linkedin');
            $this->form_validation->set_rules('youtube','youtube');
            $this->form_validation->set_rules('f_text','Footer Text');
            $this->form_validation->set_rules('welcome','Welcome Text','required');
            $this->form_validation->set_rules('vision','vision Text');
            $this->form_validation->set_rules('goals','goals Text');
            $this->form_validation->set_rules('mission','mission Text');
            // Check if val. true
        if($this->form_validation->run() == true){
            $item = array(
                'logo' => strip_tags($this->input->post('logo')),
                'title' => strip_tags($this->input->post('title')),
                'c_add' => strip_tags($this->input->post('c_add')),
                'fax' => strip_tags($this->input->post('fax')),
                'color' => strip_tags($this->input->post('color')),
                'description' => strip_tags($this->input->post('description')),
                'keywords' => strip_tags($this->input->post('keywords')),
                'hover' => strip_tags($this->input->post('hover')),
                'telephone' => strip_tags($this->input->post('telephone')),
                'address' => strip_tags($this->input->post('address')),
                'email' => strip_tags($this->input->post('email')),
                'facebook' => strip_tags($this->input->post('facebook')),
                'twitter' => strip_tags($this->input->post('twitter')),
                'linkedin' => strip_tags($this->input->post('linkedin')),
                'youtube' => strip_tags($this->input->post('youtube')),
                'f_text' => strip_tags($this->input->post('f_text')),
                'welcome' => strip_tags($this->input->post('welcome')),
                'vision' => strip_tags($this->input->post('vision')),
                'goals' => strip_tags($this->input->post('goals')),
                'mission' => strip_tags($this->input->post('mission'))
            );
            $succ = $this->main_model->update('settings','id',2,$item);
            redirect(base_url().'arthouseadmin/generalsettings');
        }  else {
                $this->generalsettings();
            }
        }else{
        // Redirect to admin
        redirect(base_url().'arthouselogin/');
    }
    }
    public function generalsettings(){
        if($this->main_model->is_logged_in()){
            $res = $this->main_model->getByData('settings','id',1);
            $data['row'] = (array) $res[0];
            $data['title']='arthouse Group | arthouse Cpanel Add Link Page';
            $this->load->view('admin/include/header',$data);
            $this->load->view('admin/settedit_view',$data);
            $this->load->view('admin/include/footer',$data);
            }else{
        // Redirect to admin
        redirect(base_url().'arthouselogin/');
    }
    }
    function settCheck(){
        if($this->main_model->is_logged_in()){
            $data['title']='arthouse Group | arthouse Cpanel Add Check';
            $this->form_validation->set_rules('logo','Logo','required');
            $this->form_validation->set_rules('title','Title','required');
            $this->form_validation->set_rules('c_add','Company Address','required');
            $this->form_validation->set_rules('fax','Fax','required');
            $this->form_validation->set_rules('keywords','keywords','required');
            $this->form_validation->set_rules('description','description','required');
            $this->form_validation->set_rules('color','Color','required');
            $this->form_validation->set_rules('hover','Hover','required');
            $this->form_validation->set_rules('telephone','telephone','required');
            $this->form_validation->set_rules('address','address','required');
            $this->form_validation->set_rules('email','email','required');
            $this->form_validation->set_rules('facebook','facebook');
            $this->form_validation->set_rules('twitter','twitter');
            $this->form_validation->set_rules('linkedin','linkedin');
            $this->form_validation->set_rules('youtube','youtube');
            $this->form_validation->set_rules('f_text','Footer Text');
            $this->form_validation->set_rules('welcome','Welcome Text','required');
            $this->form_validation->set_rules('vision','vision Text');
            $this->form_validation->set_rules('goals','goals Text');
            $this->form_validation->set_rules('mission','mission Text');
            // Check if val. true
        if($this->form_validation->run() == true){
            $item = array(
                'logo' => strip_tags($this->input->post('logo')),
                'title' => strip_tags($this->input->post('title')),
                'c_add' => strip_tags($this->input->post('c_add')),
                'fax' => strip_tags($this->input->post('fax')),
                'color' => strip_tags($this->input->post('color')),
                'description' => strip_tags($this->input->post('description')),
                'keywords' => strip_tags($this->input->post('keywords')),
                'hover' => strip_tags($this->input->post('hover')),
                'telephone' => strip_tags($this->input->post('telephone')),
                'address' => strip_tags($this->input->post('address')),
                'email' => strip_tags($this->input->post('email')),
                'facebook' => strip_tags($this->input->post('facebook')),
                'twitter' => strip_tags($this->input->post('twitter')),
                'linkedin' => strip_tags($this->input->post('linkedin')),
                'youtube' => strip_tags($this->input->post('youtube')),
                'f_text' => strip_tags($this->input->post('f_text')),
                'welcome' => strip_tags($this->input->post('welcome')),
                'vision' => strip_tags($this->input->post('vision')),
                'goals' => strip_tags($this->input->post('goals')),
                'mission' => strip_tags($this->input->post('mission'))
            );
            $succ = $this->main_model->update('settings','id',1,$item);
            redirect(base_url().'arthouseadmin/generalsettings');
        }  else {
                $this->generalsettings();
            }
        }else{
        // Redirect to admin
        redirect(base_url().'arthouselogin/');
    }
    }
    function edit(){
        if($this->main_model->is_logged_in()){
            $id=$this->uri->segment(3);
            $where=$this->uri->segment(4);
            if($where == 'admins'){
            $res2 = $this->main_model->getByData('admins','id',$id);
            }else{
            $res = $this->main_model->getByData('items','id',$id);
            }
            if(isset($res) && $res){
                $row = (array) $res[0];
            }elseif(isset($res2) && $res2){
                $row2 = (array) $res2[0];
            }else{
                redirect(base_url().'arthouseadmin/');
            }
            $data['title']='arthouse Group | arthouse Cpanel Add Link Page';
            $this->load->view('admin/include/header',$data);
            if(isset($row['state']) AND $row['state'] == 0){
                $data['i_title']=$row['title'];
                $data['i_content']=$row['content'];
                $data['i_checked']=$row['c_id'];
                $data['records'] = $this->main_model->getByDataw('items','(state = 1)');
                $this->load->view('admin/addoriginalpage_view',$data);
            }elseif(isset($row['state']) AND $row['state'] == 1){
                $data['i_title']=$row['title'];
                $data['records'] = $this->main_model->getByDataw('items','((c_id ='.$id.' AND state = 0) OR (c_id ='.$id.' AND state = 2))');
            $this->load->view('admin/adddropdown_view',$data);
            }elseif(isset($row['state']) AND $row['state'] == 2){
                $data['i_title']=$row['title'];
                $data['i_content']=$row['content'];
                $data['i_checked']=$row['c_id'];
                $data['records'] = $this->main_model->getByDataw('items','(state = 1)');
            $this->load->view('admin/addlinkpage_view',$data);
            }elseif(isset($row['state']) AND $row['state'] == 3){
                $data['i_title']=$row['title'];
                $data['i_content']=$row['content'];
                $data['i_file']=$row['file'];
                $this->load->view('admin/addcert_view',$data);
            }elseif(isset($row['state']) AND $row['state'] == 4){
                $data['i_title']=$row['title'];
                $data['i_content']=$row['content'];
                $data['i_file']=$row['file'];
                $this->load->view('admin/addclient_view',$data);
            }elseif(isset($row['state']) AND $row['state'] == 5){
                $data['i_title']=$row['title'];
                $data['i_file']=$row['file'];
                $data['i_slider']=$row['content'];
                $this->load->view('admin/addslider_view',$data);
            }elseif(isset($row['state']) AND $row['state'] == 6){
                $data['i_title']=$row['title'];
                $data['i_content']=$row['content'];
                $this->load->view('admin/addflink_view',$data);
            }elseif(isset($row['state']) AND $row['state'] == 7){
                $data['i_title']=$row['title'];
                $data['i_content']=$row['content'];
                $data['i_file']=$row['file'];
                $data['i_ofwork']=$row['ofwork'];
                $data['i_enddate']=$row['enddate'];
                $data['i_keywords']=$row['keywords'];
                $data['i_startdate']=$row['startdate'];
                $this->load->view('admin/addprojects_view',$data);
            }elseif(isset($row['state']) AND $row['state'] == 8){
                $data['i_title']=$row['title'];
                $data['i_content']=$row['content'];
                $data['i_file']=$row['file'];
                $data['i_checked']=$row['c_id'];
                $data['i_checked2']=$row['keywords'];
                $data['records'] = $this->main_model->getByDataw('items','(state = 7)');
                $data['records2'] = $this->main_model->getByDataw('items','(state = 16)');
                $this->load->view('admin/addpic_view',$data);
            }elseif(isset($row['state']) AND $row['state'] == 9){
                $data['i_title']=$row['title'];
                $data['i_content']=$row['content'];
                $data['i_file']=$row['file'];
                $data['i_keywords']=$row['keywords'];
                $this->load->view('admin/addnews_view',$data);
            }elseif(isset($row['state']) AND $row['state'] == 10){
                $data['i_title']=$row['title'];
                $data['i_content']=$row['content'];
                $data['i_keywords']=$row['keywords'];
                $this->load->view('admin/addcareer_view',$data);
            }elseif(isset($row['state']) AND $row['state'] == 11){
                $data['i_title']=$row['title'];
                $data['i_content']=$row['content'];
                $data['i_keywords']=$row['keywords'];
                $this->load->view('admin/addsupplies_view',$data);
            }elseif(isset($row['state']) AND $row['state'] == 12){
                $data['i_title']=$row['title'];
                $data['i_file']=$row['file'];
                $data['i_content']=$row['content'];
                $this->load->view('admin/addchart_view',$data);
            }elseif(isset($row['state']) AND $row['state'] == 16){
                $data['i_title']=$row['title'];
                $this->load->view('admin/addcategory_view',$data);
            }elseif(isset($row2['state']) AND $row2['state'] == 1){
                $data['i_username']=$row2['username'];
                $data['i_email']=$row2['email'];
                $data['i_password']=$this->encryption->decrypt($row2['password']);
                $this->load->view('admin/addadmin_view',$data);
            }
            $this->load->view('admin/include/footer',$data);
        }else{
        // Redirect to admin
        redirect(base_url().'arthouselogin/');
    }
    }
    function editCheck(){
        if($this->main_model->is_logged_in()){
            $data['title']='arthouse Group | arthouse Cpanel Add Check';
            $this->form_validation->set_rules('title','Title','required');
            $this->form_validation->set_rules('editor1','Content');
            // Check if val. true
        if($this->form_validation->run() == true){
            $item = array(
                'title' => strip_tags($this->input->post('title')),
                'content' => $this->input->post('editor1')
            );
            if($this->input->post('c_id') !== '0'){
                $item['c_id']=$this->input->post('c_id');
            }
            $succ = $this->main_model->update('items','id',$this->uri->segment(3),$item);
            redirect(base_url().'arthouseadmin/arthousepages');
        }  else {
                $this->edit();
            }
        }else{
        // Redirect to admin
        redirect(base_url().'arthouselogin/');
    }
    }
    function editcertCheck(){
        if($this->main_model->is_logged_in()){
            $data['title']='arthouse Group | arthouse Cpanel Add Check';
            $this->form_validation->set_rules('title','Title','required');
            $this->form_validation->set_rules('file','Image','required');
            $this->form_validation->set_rules('editor1','Content');
            // Check if val. true
        if($this->form_validation->run() == true){
            $item = array(
                'title' => strip_tags($this->input->post('title')),
                'file' => strip_tags($this->input->post('file')),
                'content' => $this->input->post('editor1')
            );
            $succ = $this->main_model->update('items','id',$this->uri->segment(3),$item);
            redirect(base_url().'arthouseadmin/certificates');
        }  else {
                $this->edit();
            }
        }else{
        // Redirect to admin
        redirect(base_url().'arthouselogin/');
    }
    }
    public function lang(){
        delete_cookie('lang');
        if($this->uri->segment(3) == 'ar'){
            set_cookie(array(
                'name' => 'lang',
                'value' => 'ar|arabic',
                'expire' => time() + 86500,
            ));
        }else{
            set_cookie(array(
                'name' => 'lang',
                'value' => 'en|english',
                'expire' => time() + 86500,
            ));
        }
        redirect(base_url());
    }
    public function page(){
        $data['langArray'] = $this->langDataArray;
        $data['records'] = $this->main_model->getByDataw('items','((c_id IS NULL AND state = 0) OR state = 1 OR (state = 2 AND c_id IS NULL)) AND '.$this->langDataArray['langOrder']);
        $id = $this->uri->segment(2);
        $data['record'] = $this->main_model->getByDataw('items','(id = '.$id.') AND '.$this->langDataArray['langOrder']);
        $data['title'] = 'arthouse Group | '.$data['record'][0]->title;
        $data['clients'] = $this->main_model->getByDataw('items','(state = 4) AND '.$this->langDataArray['langOrder']);
        $data['pics'] = $this->main_model->getByDataw('items','(c_id = '.$id.') AND '.$this->langDataArray['langOrder']);
        $data['news'] = $this->main_model->getByDataw('items','(state = 9) AND '.$this->langDataArray['langOrder'].' LIMIT 10');
        $data['settingsquery'] = $this->main_model->getByDataw('settings',$this->langDataArray['langOrder']);
        $data['slider'] = $this->main_model->getByDataw('items','(state = 5) AND '.$this->langDataArray['langOrder']);
        $data['links'] = $this->main_model->getByDataw('items','(state = 6) AND '.$this->langDataArray['langOrder']);
        $data['settings'] = (array) $data['settingsquery'][0];
        $this->load->view('include/header',$data);
        $this->load->view('page_view',$data);
        $this->load->view('include/footer',$data);
    }
    public function clients(){
        $data['title'] = 'arthouse Group | arthouse Clients page';
        $data['langArray'] = $this->langDataArray;
        $data['records'] = $this->main_model->getByDataw('items','((c_id IS NULL AND state = 0) OR state = 1 OR (state = 2 AND c_id IS NULL)) AND '.$this->langDataArray['langOrder']);
        $data['record'] = $this->main_model->getByDataw('items','(state = 4) AND '.$this->langDataArray['langOrder']);
        $data['settingsquery'] = $this->main_model->getByDataw('settings',$this->langDataArray['langOrder']);
        $data['news'] = $this->main_model->getByDataw('items','(state = 9) AND '.$this->langDataArray['langOrder'].' LIMIT 8');
        $data['slider'] = $this->main_model->getByDataw('items','(state = 5) AND '.$this->langDataArray['langOrder']);
        $data['links'] = $this->main_model->getByDataw('items','(state = 6) AND '.$this->langDataArray['langOrder']);
        $data['settings'] = (array) $data['settingsquery'][0]; 
        $this->load->view('include/header',$data);
        $this->load->view('clients_view',$data);
        $this->load->view('include/footer',$data);
    }
    public function logout(){
            $this->session->sess_destroy();
            redirect(base_url());
        }
    function sitemap()
    {

        $data['records'] = $this->main_model->getByDataw('items','(state = 0 OR state = 9 OR state = 10 OR state = 11)');//select urls from DB to Array
        header("Content-Type: text/xml;charset=iso-8859-1");
        $this->load->view("sitemap",$data);
    }
}
