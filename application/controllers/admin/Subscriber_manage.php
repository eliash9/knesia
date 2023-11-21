<?php defined('BASEPATH') or exit('No direct script access allowed');

class Subscriber_manage extends CI_Controller {
  
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

    }


	public function index(){

		$total_rows = $this->db->select('*')->from('subscription')->get()->num_rows();
        $limit = 15;
        $config["base_url"] = base_url("admin/subscriber_manage/index");
        $config["total_rows"] = $total_rows;
        $config["per_page"] = $limit;
        $config['full_tag_open'] = "<ul class='pagination col-xs pull-right'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        $config['attributes'] = array('class' => 'page-link');
        
        $this->pagination->initialize($config);

        $data["links"] = $this->pagination->create_links();
        $start = $this->uri->segment(4);

        $data['subscription'] = $this->db->select('*')
        ->from('subscription')
        ->limit($limit,$start)
        ->order_by('subs_id','DESC')
        ->get()
        ->result();

        $this->load->view('admin/includes/__header');
        $this->load->view('admin/subscriber_list',$data);
        $this->load->view('admin/includes/__footer');



	}

	public function delete($id){
		$this->db->where('subs_id',$id)->delete('subscription');
		$this->session->set_flashdata('message',display('delete_message'));
		redirect('admin/subscriber_manage/index');
	}

}

?>