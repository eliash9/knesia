<?php defined('BASEPATH') or exit('No direct script access allowed');

class General_user extends CI_Controller {

    public function __construct() {
        
        parent::__construct();
        $session_id = $this->session->userdata('session_id'); 
        $user_type = $this->session->userdata('user_type'); 
        if($session_id == NULL ) {
         redirect('admin/Sign_out');
        }
        
        if(($user_type != 4) && ($user_type != 3) ) {
         redirect('admin/Sign_out');
        }
        $this->load->model("admin/User_model", 'um');
    }


    public function user_list() {

      $user_type = $this->session->userdata('user_type'); 
            $data['query'] = $this->db->Select("*")
            ->from('user_info')
            ->where('user_type',5)
            ->where('status',1)
            ->get()
            ->result_array();
        $this->load->view('admin/includes/__header',$data);
        $this->load->view('admin/reporter/__general_user_list');
        $this->load->view('admin/includes/__footer');

    }

    # user delete 
    #-----------------------------------
    public function delete_user($id) {
        $this->db->where('id',$id)->delete('user_info');
        $this->session->set_flashdata('message','Delete Successfully');
        redirect("admin/general_user/user_list");
    }


}