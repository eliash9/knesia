<?php defined('BASEPATH') or exit('No direct script access allowed');

class Page_controller extends CI_Controller {



    public function __construct() {
        parent::__construct();
        $session_id = $this->session->userdata('session_id'); 
        $user_type = $this->session->userdata('user_type'); 

        if($session_id == NULL ) {
            redirect('admin/sign_out');
        }
        if(($user_type!=3) AND ($user_type!=4) AND ($user_type!=2)) {
            redirect('admin/sign_out');
        }
        $this->load->model('admin/page_model');

    }


    #----------------------------
    #  Pages list
    #----------------------------    
    public function Pages() {

        $data['page_info'] = $this->page_model->page_list();
        $this->load->view('admin/includes/__header',$data);
        $this->load->view('admin/pages/view_page_list');
        $this->load->view('admin/includes/__footer');     
    }


    #----------------------------
    #  Create New Page
    #---------------------------- 
    public function Create_new_page() {

        $this->load->view('admin/includes/__header');
        $this->load->view('admin/pages/view_create_new_page');
        $this->load->view('admin/includes/__footer'); 

    }

    #----------------------------
    #  Get youtube id for url
    #---------------------------- 
    public function get_youtube_id_from_url($url) {
        if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[\w\-?&!#=,;]+/[\w\-?&!#=/,;]+/|(?:v|e(?:mbed)?)/|[\w\-?&!#=,;]*[?&]v=)|youtu\.be/)([\w-]{11})(?:[^\w-]|\Z)%i', $url, $match)) {
        return $match['1']; 
        }else{
            return $url;
        }
    }

    #------------------------------------
    #   Save Page
    #------------------------------------    
    public function save_page() {

        // get picture data
        if (@$_FILES['image']['name']){
            $config['upload_path']   = './uploads/page_img/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['overwrite']     = false;
            $config['max_size']      = 1024;
            $config['remove_spaces'] = true;
            $config['max_filename']   = 10;
            $config['file_ext_tolower'] = true;
          
          $this->load->library('upload', $config);
          $this->upload->initialize($config);

          if (!$this->upload->do_upload('image')){
              $this->session->set_flashdata('error','File format not allowed!');
              redirect("admin/page_controller/create_new_page");
          } else {
            $data = $this->upload->data();
            $image = $config['upload_path'].$data['file_name'];
          }
        } else {
          $image = "";
        }


        // Checking that slug is formatted or not
        if($this->input->post('slug')!=NULL){
            $page_slug = $this->input->post('slug',TRUE);
        }else{
            $title =  explode(' ',$this->input->post('title',TRUE));
            $page_slug = @$title[0].' '.@$title[1];
        }

        $space_exist = preg_match('/\s/', $page_slug);
        if ($space_exist > 0) {
            $slug = str_replace(' ', '-', $page_slug);
        }
        else{
            $slug = $page_slug;
        }
        
        $data = array(
            'title'         => $this->input->post('title',TRUE),
            'page_slug'     => $slug,
            'description'   => $this->input->post('details_news',TRUE),
            'image_id'      => $image,
            'video_url'     => $this->get_youtube_id_from_url($this->input->post('videos',TRUE)),
            'publishar_id'  => $this->session->userdata('id'),
            'seo_keyword'   => trim($this->input->post('meta_keyword',TRUE)),
            'seo_description' => trim($this->input->post('meta_description',TRUE)),
            'publish_date'  => date("Y-m-d h:m:s")
        );

        $this->db->insert('pages',$data);
        $this->session->set_flashdata('message', display('page_add_msg'));
        redirect("admin/page_controller/create_new_page");
    }


    public function Edit_page($id) {
        $data['page'] = $this->page_model->page_by_id($id);


        $this->load->view('admin/includes/__header',$data);
        $this->load->view('admin/pages/view_edit_page');
        $this->load->view('admin/includes/__footer'); 
    }


    public function Update_page() {

        $id = $this->input->post('id');
        if (@$_FILES['image']['name']!=NULL){
            
            $config['upload_path']   = './uploads/page_img/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['overwrite']     = false;
            $config['max_size']      = 1024;
            $config['remove_spaces'] = true;
            $config['max_filename']   = 10;
            $config['file_ext_tolower'] = true;
          
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('image')){
                $this->session->set_flashdata('exception','File format not allowed!');
                redirect("admin/page_controller/create_new_page/".$id);
            } else {
                $data = $this->upload->data();
                $image = $config['upload_path'].$data['file_name'];
            }

        } else {
            $image = $this->input->post('pic',TRUE);
        }

        // Checking that slug is formatted or not
        if($this->input->post('slug')!=NULL){
            $page_slug = $this->input->post('slug',TRUE);
        }else{
            $title =  explode(' ',$this->input->post('title',TRUE));
            $page_slug = @$title[0].' '.@$title[1];
        }


       
        $data = array(
            'title'         => $this->input->post('title',TRUE),
            'page_slug'     => $page_slug,
            'description'   => htmlspecialchars_decode($this->input->post('details_news',TRUE)),
            'image_id'      => $image,
            'video_url'     => $this->input->post('videos',TRUE),
            'publishar_id'  => $this->session->userdata('id'),
            'seo_keyword'   => trim($this->input->post('meta_keyword',TRUE)),
            'seo_description' => trim($this->input->post('meta_description',TRUE)),
            'publish_date' => date("Y-m-d h:m:s")
        );
        
        $this->db->where('page_id',$id)->update('pages',$data);
        $this->session->set_flashdata('message', display('update_message'));
        redirect("admin/page_controller/pages");

    }

    public function Delete_page($id){
        $this->db->where('page_id',$id)->delete('pages');
        $this->session->set_flashdata('message', display('delete_message'));
        redirect("admin/page_controller/pages");
    }



    public function unpublishd($id){
        $this->db->set('status',0)->where('page_id',$id)->update('pages');
        $this->session->set_flashdata('message', display('delete_message'));
        redirect("admin/page_controller/pages");
    }

    public function publishd($id){
        $this->db->set('status',1)->where('page_id',$id)->update('pages');
        $this->session->set_flashdata('message', display('delete_message'));
        redirect("admin/page_controller/pages");
    }


}
