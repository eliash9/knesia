<?php defined('BASEPATH') or exit('No direct script access allowed');

class Article_controller extends CI_Controller {

 
    public function __construct() {
        parent::__construct();
        // loading model
        $this->load->model('Ads');
        $this->load->model('Pb_function', 'pb');
        $this->load->model('settings');
        $this->load->model('Article_model', 'article_model');
        $this->load->model('Page_model', 'ps');
        $this->load->model('Home_model', 'hm');
        $this->load->model('common_model');
        $this->load->model('Write_setting_model', 'wsm');
        $this->load->model('comments_model');
    }



    #-----------------------------------    
    #    Geting news details
    #-----------------------------------  
    public function details() {

        $curr_page = $this->uri->segment(1);
        $data = $this->article_model->article_select($this->uri->segment(3));

        # website setting data        
        $data['setting']                = $this->db->get('app_settings')->row();
        $data['meta']                   = json_decode($this->settings->get_previous_settings('settings', 5));
        $data['social_link']            = json_decode($this->settings->get_previous_settings('settings', 111));
        $data['social_page']            = json_decode($this->settings->get_previous_settings('settings', 6));


        $data['lan'] = $this->wsm->lan_data();
        $data['default_theme'] = $this->wsm->theme_data();
        $default_theme = $data['default_theme'];

        $data['mr'] = $this->common_model->most_read_dbse();
        $data['ln'] = $this->common_model->latest_news();
        $data['bn'] = $this->common_model->breaking_news();


        $data['Editor']         = $this->hm->home_data('Editor-Choice');
        $data['sn']             = $this->hm->home_data($curr_page);
        $data['total_comments'] = $this->comments_model->total_comments($this->uri->segment(3));
        $data["comments"]       = $this->comments_model->view_data_comments($this->uri->segment(3));


        $data['ads']            = $this->Ads->SelectAds();

        $data['main_menu']      = $this->settings->main_menu();
        $data['cat_menus']          = $this->settings->footer_menu();
        $data['footer_menu']    = $this->settings->menu_position_3();
        
        $this->load->view('themes/' . $default_theme . '/header', $data);
        $this->load->view('themes/' . $default_theme . '/breaking');
        $this->load->view('themes/' . $default_theme . '/menu');
        $this->load->view('themes/' . $default_theme . '/article_view');
        $this->load->view('themes/' . $default_theme . '/footer');        
        $this->output->cache(30);

    }
    
}

?>