<?php defined('BASEPATH') or exit('No direct script access allowed');

class Seo extends CI_Controller {


    public function __construct() {
        parent::__construct();

        $session_id = $this->session->userdata('session_id'); 
        if($session_id == NULL ) {
            redirect('admin/Sign_out');
        }
        
        $user_type = $this->session->userdata('user_type'); 
        if(($user_type!=3) AND ($user_type!=4) AND ($user_type!=2)) {
            redirect('admin/Sign_out');
        }
        $this->load->model('admin/view_setting_model');
        $this->load->model('admin/seo_model');
    }


    public function meta_setting(){

        $data['meta'] = json_decode($this->view_setting_model->get_previous_settings('settings', 5));

        $this->load->view('admin/includes/__header', $data);
        $this->load->view('admin/settings/__meta_setting',$data);
        $this->load->view('admin/includes/__footer');

    }


    public function meta_update() {

        $SEO_data ['id']            = 5;
        $SEO_data ['event']         = 'meta';
        $post ['meta_tag']          = $this->input->post("meta_tag",TRUE);
        $post ['meta_description']  = $this->input->post("meta_description",TRUE);
        $post ['google_analytics']  = $this->input->post("google_analytics",TRUE);
    
        $SEO_data ['details'] = json_encode($post);

        
        $check_settings_exist = $this->view_setting_model->Check_settings_exist('settings', 5);

        if ($check_settings_exist == 0) {
            $this->seo_model->save_settings('settings', $SEO_data);
            $this->session->set_flashdata('message', display('update_message'));
        } else {
            $this->seo_model->update_settings('settings', $SEO_data, 5);
            $this->session->set_flashdata('message', display('save_message'));
        }

        redirect('admin/seo/meta_setting');

    }



    public function social_sites(){

        $data['social_page'] = json_decode($this->view_setting_model->get_previous_settings('settings', 6));
   
        $this->load->view('admin/includes/__header', $data);
        $this->load->view('admin/settings/__social_page',$data);
        $this->load->view('admin/includes/__footer');


    }




    public function update_social_pages() {

        $SEO_data ['id'] = 6;
        $SEO_data ['event'] = 'social_page';

        $post ['fb'] = $this->input->post("fb",TRUE);
        $post ['tw'] = $this->input->post("tw",TRUE);
        $SEO_data ['details'] = json_encode($post);

        $check_settings_exist = $this->view_setting_model->Check_settings_exist('settings', 6);

        if ($check_settings_exist == 0) {
            $this->seo_model->save_settings('settings', $SEO_data);
            $this->session->set_flashdata('message', display('save_message'));
        } else {
            $this->seo_model->update_settings('settings', $SEO_data, 6);
            $this->session->set_flashdata('message', display('update_message'));
        }

       redirect('admin/seo/social_sites');

    }





}
