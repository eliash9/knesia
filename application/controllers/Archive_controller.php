<?php defined('BASEPATH') or exit('No direct script access allowed');

class Archive_controller extends CI_Controller {
    #-----------------------------------
    # Construct function
    #-----------------------------------
    public function __construct() {
        parent::__construct();
        // loading model
        $this->load->model('Ads');
        $this->load->model("settings");
        $this->load->model("Archive_model","archive_model");
        $this->load->model("Home_model", "hm");
        $this->load->model('Pb_function', 'pb');
        $this->load->model('Common_model', 'cm');
        $this->load->model('Write_setting_model', 'wsm');
        $this->load->library('pagination');
    }

    
    public function archive(){

        @$archive_date = $this->input->get('date',TRUE);
        if($archive_date!=NULL){
            $newDate = date("Y-m-d", strtotime($archive_date));  
            @$keyword = $newDate;
        }else{
            @$keyword ='';            
        }


        $start = $this->uri->segment(3);
        $limit = 8;

        $config =$this->get_pagination_config($keyword);

        //pagination initialization
        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();        
        $data['archive_newses'] = $this->archive_model->get_news_by_archive_date($keyword,$limit,$start);
        $data['pages'] = $this->archive_model->get_pages_archive_date($keyword);
        #---------------------
        # website setting data        
        $data['setting']                = $this->db->get('app_settings')->row();
        $data['meta']                   = json_decode($this->settings->get_previous_settings('settings', 5));
        $data['social_link']            = json_decode($this->settings->get_previous_settings('settings', 111));
        $data['social_page']            = json_decode($this->settings->get_previous_settings('settings', 6));
        
        $data['lan'] = $this->wsm->lan_data();
        $data['default_theme'] = $this->wsm->theme_data();
        $default_theme = $data['default_theme'];
        #----------------------
        // breaking news
        $data['bn'] = $this->cm->breaking_news();
        // gettting  pulling 
        $data['pull'] = $this->cm->pulling();
        // Getting News most read
        $data['mr'] = $this->cm->most_read_dbse();
        // Getting Latest News
        $data['ln'] = $this->cm->latest_news();
        $data['ads'] = $this->Ads->SelectAds();
        //editorial gategory news get
        $data['Editor']         = $this->hm->home_data('Editor-Choice');

        $data['main_menu']      = $this->settings->main_menu();
        $data['cat_menus']          = $this->settings->footer_menu();
        $data['footer_menu']    = $this->settings->menu_position_3();
        
        $this->load->view("themes/" . $default_theme . "/header", $data);
        $this->load->view("themes/" . $default_theme . "/breaking");
        $this->load->view("themes/" . $default_theme . "/menu");
        $this->load->view("themes/" . $default_theme . "/archive_view");
        $this->load->view('themes/' . $default_theme . '/footer');
    }


    #---------------------------------    
    #   get pagination configaretion
    #--------------------------------- 
    public function get_pagination_config($arc_date) {

        $limit = 8;   
        $total_rows = $this->archive_model->count_total_news($arc_date);
        $config["base_url"] = base_url("archive_controller/archive");
        $config['suffix'] = '?'.http_build_query($_GET, '', "&");
        $config['first_url'] = $config['base_url'].$config['suffix'];

        $config["total_rows"] = $total_rows;
        $config["per_page"] = $limit;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><a class="active">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = ' </li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        return $config;

    }



}

