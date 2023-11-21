<?php defined('BASEPATH') or exit('No direct script access allowed');

class User_dashboard extends CI_Controller {


    public function __construct() {
        parent::__construct();

        if($session_id == NULL ) {
            redirect('registration/sign_out');
        }

        // loading model
        $this->load->model('ads');
        $this->load->model("settings");
        $this->load->model('Pb_function', 'pb');
        $this->load->model('All_cata', 'cata');
        $this->load->model('common_model');
        $this->load->model('Write_setting_model', 'wsm');
        $this->load->model('auth_model');

    }



    public function my_profile(){

        #-------------------------------------
        # website setting data     
        $data['setting']                = $this->db->get('app_settings')->row();
        $data['meta']                   = json_decode($this->settings->get_previous_settings('settings', 5));
        $data['social_link']            = json_decode($this->settings->get_previous_settings('settings', 111));
        $data['social_page']            = json_decode($this->settings->get_previous_settings('settings', 6));
        // getting ads

        $data['default_theme'] = $this->wsm->theme_data();
        $data['lan'] = $this->wsm->lan_data();
        $default_theme = $data['default_theme'];

        $data['ln'] = $this->common_model->latest_news();
        $data['bn'] = $this->common_model->breaking_news();
        $data['mr'] = $this->common_model->most_read_dbse();
        $data['pull'] = $this->common_model->pulling();

        $data['ads']            = $this->ads->SelectAds();
        
        $data['main_menu']      = $this->settings->main_menu();
        $data['cat_menus']          = $this->settings->footer_menu();
        $data['footer_menu']    = $this->settings->menu_position_3();

        $this->load->view('themes/' . $default_theme . '/header', $data);
        $this->load->view("themes/" . $default_theme . "/breaking");
        $this->load->view('themes/' . $default_theme . '/menu');
        $this->load->view('themes/' . $default_theme . '/__user_profile');
        $this->load->view('themes/' . $default_theme . '/footer');
    
    }



}