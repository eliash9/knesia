<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('auth_model');
    }

    #------------------------------------
    # To view Login Page
    #------------------------------------
    public function index() {
        $this->load->view('admin/_login_page');
    }



    public function check_authentic() {  

        $data = array(
            'email'     => trim($this->input->post('email',TRUE)),
            'password'  => trim($this->input->post('password',TRUE))
        );

        $this->form_validation->set_rules('email', 'E-mail', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('exception','Email or Password is Missing!.');
            redirect('login');

        } else {

            $data = $this->auth_model->user_login($data);

            if($data>0){

                $update_login_time = date("Y-m-d h:i:s");
                $ip = $this->input->ip_address();
                $id = $data['id'];
                $dd = array('login_time'=>$update_login_time,'ip'=>$ip);
                
                $this->db->where('id',$id)->update('user_info',$dd);
                

                $session_data = array(
                    'id'        => $data['id'],
                    'name'      => $data['name'],
                    'nick_name' => $data['nick_name'],
                    'user_type' => $data['user_type'],
                    'email'     => $data['email'],
                    'session_id'=> session_id(),
                    'logged_in' => TRUE
                );
                

                $this->session->set_userdata($session_data);
            
                if($data['user_type'] == 4){

                    redirect("admin/news_post");

                }  else if ($data['user_type'] == 3) {

                    redirect("admin/news_post");

                } else if($data['user_type'] == 2){

                    redirect("admin/news_post");

                } else if ($data['user_type'] == 1) {
                    redirect("admin/comments_manage/index");
                } else {
                    $this->session->set_flashdata('exception',display('log_error_msg'));
                    redirect('login');
                }

            }  else {

                $this->session->set_flashdata('exception',display('log_error_msg'));
                redirect(base_url().'login');

            }
        }
    }




}

