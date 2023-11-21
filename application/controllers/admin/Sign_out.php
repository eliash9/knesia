<?php defined('BASEPATH') or exit('No direct script access allowed');

class Sign_out extends CI_Controller { 
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }

    public function index() {
        $post_by = $this->session->userdata('id');
        $time_stmp = date('Y-m-d H:i:s');
        $data_arr = array(
            'logout_time' => $time_stmp
        );
        $this->db->where('id', $post_by);
        $this->db->update('user_info', $data_arr);
        $this->session->sess_destroy();
        redirect("admin/login");
    }

}
