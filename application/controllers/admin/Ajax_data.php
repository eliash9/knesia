<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Ajax_data extends CI_Controller {

    // constructor function
    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('admin/Common_model', 'photo');
    }


    public function index() {

        $id = $this->input->post('image_name',TRUE);

        $query = $this->db->select()->from('photo_library')->like('picture_name',$id)->get()->result_array();

        foreach ($query as $row) {
            echo '<img src="'.site_url().'uploads/thumb/'.$row['actual_image_name'].'" height="100" width="100" onclick="sendValue('."'".$row['actual_image_name']."'".')" title="'.$row['picture_name'].'" />';
        }


    }



    public function image_upload() {
        
        $thime_y = $this->input->post('thime_y',TRUE);
        $thime_x = $this->input->post('thime_x',TRUE);
        $img_y = $this->input->post('img_y',TRUE);
        $img_x = $this->input->post('img_x',TRUE);
        $sizes = array($thime_x => $thime_y, $img_x => $img_y);
        
        $pst_imge = $_FILES['image']['name'];
        $image_chk = explode(".",$pst_imge);
        $extent = end($image_chk);

        if($extent=="jpg" || $extent=="png" || $extent=="jpeg" || $extent=="gif"){

            $file_location = $this->photo->do_upload($_FILES['image'], $sizes);
            $image = explode('/', $file_location[0]);

        } else{
            echo "0"; exit;
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
        
        echo "1";
        
    }

    

    public function user_info_update() {
        $post_by = $this->session->userdata('id',TRUE);
        $fill = $this->input->post('fill_name',TRUE);
        $value = $this->input->post('value',TRUE);

        $data_arr = array($fill => $value);
        $this->db->where('id', $post_by);
        $rv = $this->db->update('user_info', $data_arr);
    }


    public function UpdateUserInfo() {
        $post_by = $this->session->userdata('id');
        $this->db->where('id', $post_by);
        $rv = $this->db->update('user_info', $_POST);
        redirect('admin/profile');
    }



}
