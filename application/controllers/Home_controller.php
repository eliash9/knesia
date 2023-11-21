<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Home_controller extends CI_Controller {

    public function __construct() {

        parent::__construct();

        $this->load->model('ads');
        $this->load->model("settings");
        $this->load->model('home_model', 'hm');
        $this->load->model('Pb_function', 'pb');
        $this->load->model('All_cata', 'cata');
        $this->load->model('Common_model', 'cm');
        $this->load->model('Write_setting_model', 'wsm');

    }


    /***************************************
     * To veiw all home page Data
     ***************************************/

    public function index() {

        $data = $this->hm->home_data();
            
        #---------------------
        # website setting data        
        $data['home_page_positions'] = $this->wsm->home_category_position();


        $data['setting']                = $this->db->get('app_settings')->row();
        $data['meta']                   = json_decode($this->settings->get_previous_settings('settings', 5));
        $data['social_link']            = json_decode($this->settings->get_previous_settings('settings', 111));
        $data['social_page']            = json_decode($this->settings->get_previous_settings('settings', 6));
        
        $data['default_theme'] = $this->wsm->theme_data();
        $data['lan'] = $this->wsm->lan_data();
        $default_theme = $data['default_theme'];


        $data['ln'] = $this->cm->latest_news();
        $data['bn'] = $this->cm->breaking_news();
        $data['mr'] = $this->cm->most_read_dbse();
        $data['pull'] = $this->cm->pulling();

       
        $data['ads']            = $this->ads->SelectAds();
        $data['Editor']         = $this->hm->home_data('Editor-Choice');

        $data['main_menu']      = $this->settings->main_menu();
        $data['cat_menus']      = $this->settings->footer_menu();
        $data['footer_menu']    = $this->settings->menu_position_3();


        $this->load->view('themes/' . $default_theme . '/header', $data);
        $this->load->view('themes/' . $default_theme . '/breaking');
        $this->load->view('themes/' . $default_theme . '/menu');
        $this->load->view('themes/' . $default_theme . '/home_view');
        $this->load->view('themes/' . $default_theme . '/footer');

        $this->output->cache(30); 
       
    }



    /* ************************************************
    *  Saving Polling Data
    * ************************************************ */

    public function save($question_id=NULL,$vote=NULL) {
        
        $id = $question_id;
        $fill = $vote;
        if ($this->session->userdata('pulled') != 1) {
            $query = $this->db->query("SELECT $fill as vote FROM pulling WHERE id=$id");
            $row = $query->row_array();
            $data_arr = array(
                $fill => $row['vote'] + 1
            );
            $this->db->where('id', $id);
            $this->db->update('pulling', $data_arr);
            $session_data = array(
                'pulled' => 1
            );
            $this->session->set_userdata($session_data);
            echo 1; exit;
        } else {
            echo 0; exit;
        }
    }


    /********************************************
         * Viewing Result Of vote
    *********************************************/
    public function result() {
        
        $data['setting']                = $this->db->get('app_settings')->row();
        $data['meta']                   = json_decode($this->settings->get_previous_settings('settings', 5));
        $data['social_link']            = json_decode($this->settings->get_previous_settings('settings', 111));
        $data['social_page']            = json_decode($this->settings->get_previous_settings('settings', 6));
        
        $data['default_theme'] = $this->wsm->theme_data();
        $data['lan'] = $this->wsm->lan_data();
        $default_theme = $data['default_theme'];


        $data['bn'] = $this->cm->breaking_news();
        $data['mr'] = $this->cm->most_read_dbse();
        $data['ln'] = $this->cm->latest_news();


        $data['Editor'] = $this->hm->home_data('Editor-Choice');
        $data['ads'] = $this->ads->SelectAds();
        $data['main_menu']      = $this->settings->main_menu();
        $data['cat_menus']      = $this->settings->footer_menu();
        $data['footer_menu']    = $this->settings->menu_position_3();
        
        $this->load->view('themes/' . $default_theme . '/header',$data);
        $this->load->view('themes/' . $default_theme . '/breaking');
        $this->load->view('themes/' . $default_theme . '/menu');
        $this->load->view('themes/' . $default_theme . '/voting_result');
        $this->load->view('themes/' . $default_theme . '/footer');
    }


}

