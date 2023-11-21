<?php defined('BASEPATH') or exit('No direct script access allowed');

class User_dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $session_id = $this->session->userdata('session_id'); 
        $user_type = $this->session->userdata('user_type'); 

        $this->load->helper('form'); 
        if($session_id == NULL && $user_type=='5' ) {
            redirect('registration/index');
        }
    }
       

    public function user_profile() {
        $id = $this->session->userdata('id');
        $data['user_info'] = $this->db->select('*')->from('user_info')->where('id',$id)->where('user_type',5)->get()->row_array();        

        $this->load->view('users/includes/__header');
        $this->load->view('users/__profile');
        $this->load->view('users/includes/__footer');
    }


}

