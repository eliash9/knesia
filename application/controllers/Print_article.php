<?php defined('BASEPATH') or exit('No direct script access allowed');

class Print_article extends CI_Controller {

    public function print_page() {
    	$this->load->model('Write_setting_model', 'wsm');
        $this->load->model('Article_model', 'article_model');
        $this->load->model('settings');
        $data = $this->article_model->article_select($this->uri->segment(3));
        #---------------------
        # website setting data     
        $data['setting']                = $this->db->get('app_settings')->row();
        $data['meta']                   = json_decode($this->settings->get_previous_settings('settings', 5));
        $data['social_link']            = json_decode($this->settings->get_previous_settings('settings', 111));
        $data['social_page']            = json_decode($this->settings->get_previous_settings('settings', 6));
        // getting ads
        $data['default_theme'] = $this->wsm->theme_data();
        $default_theme = $data['default_theme'];
        #----------------------            
        $this->load->view('themes/' . $default_theme . '/print_view', $data);
    }

}
