<?php defined('BASEPATH') or exit('No direct script access allowed');
	
class User_analytics extends CI_Controller{	

	public function __construct(){
		parent::__construct();

        $session_id = $this->session->userdata('session_id'); 
        $user_type = $this->session->userdata('user_type'); 
        if(($user_type != 4) && ($user_type != 3) ) {
         	redirect('admin/sign_out');
        }
        
        $this->load->model("admin/view_setting_model");

	}


	public function index(){

		$setting=$this->db->get('app_settings')->row();

		date_default_timezone_set($setting->time_zone);
	
		$f = date("Y-m-d h:i:s", strtotime("-59 second "));
		$t = date("Y-m-d h:i:s");
		
		$data['user_country'] = $this->db->select("*, COUNT(country) as total_country_user")
		->from('user_analiytics')
		->group_by('country')  
		->group_by('session')  
		->where("date_time BETWEEN '$f' AND '$t'")
		->order_by('total_country_user','DESC')
		->limit(5)
		->get()
		->result();




		$data['url'] = $this->db->select('*, COUNT(link) as total_link_user')
		->from('user_analiytics')
		->group_by('link')  
		->where("date_time BETWEEN '$f' AND '$t'")
		->order_by('total_link_user','DESC')
		->limit(7)
		->get()
		->result();

		$data['browser'] = $this->db->select('*, COUNT(browser) as total_browser_user')
		->from('user_analiytics')
		->group_by('browser')  
		->where("date_time BETWEEN '$f' AND '$t'")
		->order_by('total_browser_user','DESC')
		->limit(5)
		->get()
		->result();



		$data['total_user'] = $this->db->select("*")
		->from('user_analiytics')
		->group_by('session')  
		->where("date_time BETWEEN '$f' AND '$t'")
		->get()
		->num_rows();


		$this->load->view('admin/includes/__header', $data);
        $this->load->view('admin/analytics/view_live');
        $this->load->view('admin/includes/__footer');


	}


	public function news_based(){

			@$formdate = $this->input->get('formdate',TRUE);
	        @$todate = $this->input->get('todate',TRUE);

	        @$where="date_time BETWEEN '$formdate 00:00:00' AND '$todate 00:00:00'";  

	         $rows = $this->db->select('*')
			->from('user_analiytics')
			->group_by('link')
			->where($where)
			->get()
			->num_rows();     

	        $limit = 10;
	        // pagination settings
	        $total_rows = $rows;
	        $config["base_url"] = base_url("admin/user_analytics/news_based/");
	        $config['suffix'] = '?'.http_build_query($_GET, '', "&");
	        $config['first_url'] = $config['base_url'].$config['suffix'];
	        $config["total_rows"] = $total_rows;
	        $config["per_page"] = $limit;
	        // integrate bootstrap pagination
	        
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
	        $data["links"] = $this->pagination->create_links();

	        @$start = $this->uri->segment(4);
	        
	         $data['url'] = $this->db->select('*, COUNT(link) as total_link_user')
			->from('user_analiytics')
			->group_by('link') 
			->where($where)
			->order_by('total_link_user','DESC')
			->limit($limit,$start) 
			->get()
			->result();

			$this->load->view('admin/includes/__header', $data);
	        $this->load->view('admin/analytics/view_news_based');
	        $this->load->view('admin/includes/__footer');
	       
	}


		public function location_based(){


		        @$country_name = $this->input->get('country',TRUE);

				if($country_name!=NULL){
			        $rows = $this->db->select('*')
					->from('user_analiytics')
					->where('country',$country_name)
					->order_by('id','DESC')
					->get()
					->num_rows();
		        }else{
			         $rows = $this->db->select('*')
					->from('user_analiytics')
					->order_by('id','DESC')
					->get()
					->num_rows();
		        }


		        $limit = 15;
		        // pagination settings
		        $total_rows = $rows;
		        $config["base_url"] = base_url("admin/user_analytics/location_based/");
		        $config['suffix'] = '?'.http_build_query($_GET, '', "&");
		        $config['first_url'] = $config['base_url'].$config['suffix'];
		        $config["total_rows"] = $total_rows;
		        $config["per_page"] = $limit;
		        // integrate bootstrap pagination
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
		        $data["links"] = $this->pagination->create_links();

		        @$start = $this->uri->segment(4);
		        if($country_name!=NULL){
			        $data['analytics'] = $this->db->select('*')
					->from('user_analiytics')
					->where('country',$country_name)
					->limit($limit,$start)
					->order_by('id','DESC')
					->get()
					->result();
		        }else{
			         $data['analytics'] = $this->db->select('*')
					->from('user_analiytics')
					->limit($limit,$start)
					->order_by('id','DESC')
					->get()
					->result();
		        }

		        $data['country'] = $this->db->select("country")
				->from('user_analiytics')
				->group_by('country')   
				->get()
				->result();



			$this->load->view('admin/includes/__header', $data);
	        $this->load->view('admin/analytics/view_location_based');
	        $this->load->view('admin/includes/__footer');

		}



	public function clear_analytics(){
		
		$data['status'] = $this->view_setting_model->get_previous_settings('settings', 8);

		$this->load->view('admin/includes/__header', $data);
        $this->load->view('admin/analytics/view_clear_analytics');
        $this->load->view('admin/includes/__footer');

	}

	public function analytics_status($status){

		if($status=='active'){
			$data['user_analytics'] = 'inactive';
		}else{
			$data['user_analytics'] = 'active';
		}
        $settings_data['event'] = 'user_analytics';
        $settings_data['details'] = json_encode($data);
        $this->db->where('id',8)->update('settings',$settings_data);
		redirect('admin/user_analytics/clear_analytics');
	}



	public function delete(){

		$this->db->truncate('user_analiytics');
		$this->session->set_flashdata('message','Clear analytics successfully!');
		redirect('admin/user_analytics/clear_analytics');

	}


}

?>