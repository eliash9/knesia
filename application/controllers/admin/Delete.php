<?php defined('BASEPATH') or exit('No direct script access allowed');

class Delete extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $session_id = $this->session->userdata('session_id'); 
        $user_type = $this->session->userdata('user_type'); 
        if($session_id == NULL ) {
            redirect('admin/sign_out');
        }
        if(($user_type!=3) AND ($user_type!=4)) {
            redirect('admin/sign_out');
        }
        $this->load->model('admin/common_model');
    }



    #-----------------------------------------
    # To delete single news
    #-------------------------------------
    public function singal() {
        
        $header = $this->common_model->meta_key();
        $news_id = $this->uri->segment(4);
        $result = $this->common_model->pb_delete($news_id);
        $user_type = $this->session->userdata('user_type'); 
        $this->session->set_flashdata('message',display('delete_message'));
        if ($user_type == 3) {
            redirect('admin/news_list/newses');
        } else {
            redirect('admin/news_list/newses');
        }

    }
    


}

