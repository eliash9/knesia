<?php defined('BASEPATH') or exit('No direct script access allowed');

class Photo_upload extends CI_Controller {

    #---------------------------------
    # Constructor Function
    public function __construct() {

        parent::__construct();
        $session_id = $this->session->userdata('session_id'); 
        $user_type = $this->session->userdata('user_type'); 

        if($session_id == NULL ) {
            redirect('admin/sign_out');
        }
        if(($user_type!=3) AND ($user_type!=4) AND ($user_type!=2) AND ($user_type!=1)) {
            redirect('admin/sign_out');
        }
        $this->load->model('admin/common_model');
  
    }
    
    #---------------------------------
    # View to upload photo
    public function index() {
        $this->load->view('admin/includes/__header');
        $this->load->view('admin/midea/__view_photo_upload');
        $this->load->view('admin/includes/__footer');

    }

    // library photo upload
    public function upload() {
        
        $thime_y = $this->input->post('thime_y',TRUE);
        $thime_x = $this->input->post('thime_x',TRUE);
        $img_y = $this->input->post('img_y',TRUE);
        $img_x = $this->input->post('img_x',TRUE);
        $sizes = array($thime_x => $thime_y, $img_x => $img_y);
        
        $pst_imge = $_FILES['image']['name'];
        $image_chk = explode(".",$pst_imge);
        $extent = end($image_chk);

        if($extent=="jpg" || $extent=="png" || $extent=="jpeg" || $extent=="gif"){

            $file_location = $this->common_model->do_upload($_FILES['image'], $sizes);
            $image = explode('/', $file_location[0]);

        } else{
            $this->session->set_flashdata('exception','This File Not allowed!');
            redirect('admin/photo_upload');
        }


        $data = array(
            'id'                => "",
            'actual_image_name' => end($image),
            'picture_name'      => $this->input->post('picture_name',TRUE),
            'title'             => $this->input->post('title',TRUE),
            'category'          => $this->input->post('category',TRUE),
            'time_stamp'        => time() + 6 * 60 * 60,
            'status'            => 0
        );

        if ($file_location[0] != ''){
            $this->db->insert('photo_library', $data);
        }
        
        $this->session->set_flashdata('message', 'Upload successful');
        redirect("admin/photo_upload");

    }



    // update library photo
    public function edit() {

        $id = $this->input->post('id');
        $data_arr = array(
            'picture_name'      => $this->input->post('picture_name',TRUE),
            'title'             => $this->input->post('title',TRUE),
            'category'          => $this->input->post('category',TRUE)
        );
        $this->db->where('id', $id);
        $this->db->update('photo_library', $data_arr);
        $this->load->view('admin/includes/close');
    }
    
    

    // user photo update
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
                   redirect("admin/Profile");

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

            $this->session->set_flashdata('message',display('update_message'));
        
            redirect("admin/profile");
    }



    public function status_edit() {
        $id = $this->uri->segment(4);
        $status = ($this->uri->segment(5) == 1) ? 0 : 1;
        $data_arr = array('status' => $status);
        $this->db->where('id', $id);
        $this->db->update('photo_library', $data_arr);
        redirect("admin/photo_list");
    }


    //delete photo
    public function delete() {

        $id = $this->uri->segment(4);
        $data = $this->db->where('id', $id)->get('photo_library')->row();
        $link1 = base_url('uploads').$data->actual_image_name;
        $link = base_url('uploads/thumb').$data->actual_image_name;
        unlink($link1);
        unlink($link);
        $this->db->where('id', $id)->delete('photo_library');
        $this->session->set_flashdata('message', display('delete_message'));
        redirect("admin/photo_list");
    }



}
