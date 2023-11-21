<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $session_id = $this->session->userdata('session_id'); 
        if($session_id == NULL ) {
         redirect('admin/sign_out');
        }
    }


    public function index() {
        
        $post_by = $this->session->userdata('id');

        $header['user_info'] = $this->db->where('id',$post_by)->get('user_info')->row();

        $this->load->view('admin/includes/__header',$header);
        $this->load->view('admin/__profile');
        $this->load->view('admin/includes/__footer');


    }



    #user_info_update;
    public function update_user_info() {


        $postData = array(
            'name'          => $this->input->post('name',TRUE),
            'pen_name'      => $this->input->post('pen_name',TRUE),
            'email'         => $this->input->post('email',TRUE),
            'mobile'        => $this->input->post('mobile',TRUE),
            'sex'           => $this->input->post('sex',TRUE),
            'blood'         => $this->input->post('blood',TRUE),
            'birth_date'    => $this->input->post('birth_date',TRUE),
            'address_one'   => $this->input->post('address_one',TRUE),
            'address_two'   => $this->input->post('address_two',TRUE),
            'city'          => $this->input->post('city',TRUE),
            'state'         => $this->input->post('state',TRUE),
            'country'       => $this->input->post('country',TRUE),
            'status'        => 1,
        );
        
        $post_by = $this->session->userdata('id');
        $this->db->where('id', $post_by);
        $rv = $this->db->update('user_info', $postData);

        $this->session->set_flashdata('message', display('update_message'));
        redirect('admin/profile');
        
    }



    public function change_password(){
        $this->load->view('admin/includes/__header');
        $this->load->view('admin/__change_password');
        $this->load->view('admin/includes/__footer');
    }



    #------------------------
    public function save_change(){

        $this->form_validation->set_rules('new_password', 'New Password', 'trim|required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required');
        
        if($this->form_validation->run() == FALSE){
            $this->load->view('admin/includes/__header');
            $this->load->view('admin/__change_password');
            $this->load->view('admin/includes/__footer');
        }else{
            $new_password = $this->input->post('new_password',TRUE);
            $confirm_password = $this->input->post('confirm_password',TRUE);
            if($new_password==$confirm_password){
                $password =  md5($new_password);
                $id = $this->session->userdata('id');
                $this->db->set('password',$password)->where('id',$id)->update('user_info');
                

                $this->session->set_flashdata('message','Change successfully');
                redirect('admin/profile/change_password');
            }else{
                $this->session->set_flashdata('exception','Confirm Password Does not match');
                redirect('admin/profile/change_password');
            }
        }
    }

}
