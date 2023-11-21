<?php defined('BASEPATH') or exit('No direct script access allowed');

class Photo_list extends CI_Controller {

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
        $this->load->model('admin/common_model');

    }


    public function index($search=NULL) {

        $keyword = $this->input->get('search',TRUE);
        $header = $this->common_model->meta_key();
        
        // pagination settings
        $total_rows = $this->db->select('*')->from('photo_library')->like("picture_name",$keyword)->get()->num_rows();
        $limit = 15;
        $config["base_url"] = base_url("admin/photo_list/index");
        $config["total_rows"] = $total_rows;
        $config["per_page"] = $limit;

        $config['next_link'] = '→';
        $config['prev_link'] = '←'; 
        $config['full_tag_open'] = "<ul class='pagination justify-content-center'>";
        $config['full_tag_close'] = "</ul>"; 
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tagl_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tagl_close'] = '</li>';
        $config['first_tag_open'] = "<li class='page-item disabled'>";
        $config['first_tagl_close'] = "</a></li>";
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tagl_close'] = '</a></li>';
        $config['attributes'] = array('class' => 'page-link');

        $this->pagination->initialize($config);
        $header["links"] = $this->pagination->create_links();

        $start = $this->uri->segment(4);
        $header['query'] = $this->db->select("*")
        ->from("photo_library")
        ->like("picture_name",$keyword)
        ->limit($limit,$start)
        ->order_by('id','DESC')
        ->get()
        ->result_array();

        $this->load->view('admin/includes/__header', $header);
        $this->load->view('admin/midea/__view_photo_list');
        $this->load->view('admin/includes/__footer');

    }
    

}
