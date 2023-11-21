<?php defined('BASEPATH') or exit('No direct script access allowed');

class User_profile extends CI_Controller {


    public function __construct() {

        parent::__construct();
        $session_id = $this->session->userdata('session_id'); 
        if($session_id == NULL ) {
            redirect('registration/index');
        }
    }



    public function index() {

        $id = $this->session->userdata('id');
        $data['user_info'] = $this->db->select('*')->from('user_info')->where('id',$id)->where('user_type',5)->get()->row(); 
      

        $this->load->view('users/includes/__header',$data);
        $this->load->view('users/__profile');
        $this->load->view('users/includes/__footer');

    }



    #-----------------------------------------
        # To update user photo
    #-----------------------------------------    
    public function user_photo() {

            if (@$_FILES['user_photo']['name']) {
                $config['upload_path']   = './uploads/user/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['overwrite']     = false;
                $config['max_size']      = 1024;
                $config['remove_spaces'] = true;
                $config['max_filename']   = 10;
                $config['file_ext_tolower'] = true;

                $this->upload->initialize($config);

                if (!$this->upload->do_upload('user_photo'))
                {
                   $error = $this->upload->display_errors();
                   $this->session->set_flashdata('exception',$error);
                   redirect("users/user_profile");
                } else {
                
                 $data = $this->upload->data();
                 $image = $config['upload_path'].$data['file_name'];

                }

                } else {
                    $image = $this->input->post('user_pic',TRUE);
                }

            $post_by = $this->session->userdata('id');
            $data_arr = array(
                'photo' => $image
            );
            $this->db->where('id', $post_by);
            $this->db->update('user_info', $data_arr);
        
        redirect("users/user_profile");
    }


    #user_info_update;
    public function update_user_info() {

        $postData = array(
            'name'          => $this->input->post('name',TRUE),
            'pen_name'      => $this->input->post('pen_name',TRUE),
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

        $this->session->set_flashdata('message',display('update_message'));
        redirect('users/user_profile');
    }


    public function change_password(){

        $this->load->view('users/includes/__header');
        $this->load->view('users/__password_change_view');
        $this->load->view('users/includes/__footer');
    }


    #------------------------
    public function save_change(){


        $this->form_validation->set_rules('new_password', 'New Password', 'trim|required|xss_clean');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|xss_clean');
        
        if($this->form_validation->run() == FALSE){

            $this->load->view('users/includes/__header');
            $this->load->view('users/__password_change_view');
            $this->load->view('users/includes/__footer');

        }else{

            $new_password = $this->input->post('new_password',TRUE);
            $confirm_password = $this->input->post('confirm_password',TRUE);
            
            if($new_password==$confirm_password){

                $password =  md5($new_password);

                $id = $this->session->userdata('id');

                $this->db->set('password',$password)->where('id',$id)->update('user_info');
                
                $this->session->set_flashdata('message','Password Change successfully');
                
                redirect('users/user_profile/change_password');
            } else {
                $this->session->set_flashdata('exception','Confirm Password Does not match');
                redirect('users/user_profile/change_password');
            }
        }
    }


    public function log_out(){

        $post_by = $this->session->userdata('id');
            $time_stmp = date("Y-m-d h:i:s");
            $data_arr = array(
                'logout_time' => $time_stmp
            );
        $this->db->where('id', $post_by);
        $this->db->update('user_info', $data_arr);
        $this->session->sess_destroy();
        redirect(base_url());
    }



}

