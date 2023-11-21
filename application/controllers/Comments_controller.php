<?php defined('BASEPATH') or exit('No direct script access allowed');

class Comments_controller extends CI_Controller {


	#-----------------------------------    
	#     Construction Function
	#-----------------------------------    
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }


	public function comments() {

		$this->form_validation->set_rules('comment', 'comment', 'required');
        
        if ($this->form_validation->run() != FALSE) { 

			
				$data['com_type'] 		= "1";
				$data['news_id'] 		= $this->input->post('news_id',TRUE);
				$data['comments'] 		= $this->input->post('comment',TRUE);
				$data['com_user_id'] 	= $this->session->userdata('id');
				$data['com_date_time'] 	= date("Y-m-d H:i:s");
				$data['com_status'] 	= 0;

				$this->db->insert('comments_info',$data);

				echo "1";
			} else {
				echo "4";
		 	}
		
	}

	public function re_comments() {
	
			$this->form_validation->set_rules('comments', 'comment', 'required');

			if ($this->form_validation->run() != TRUE) {
				$msg['message'] = 4;
			} else {
				$data['com_type'] = "2";
				$data['com_replay_id'] = $this->input->post('com_replay_id',TRUE);
				$data['comments'] = $this->input->post('comments',TRUE);
				$data['news_id'] = $this->input->post('news_id',TRUE);
				$data['com_user_id'] = $this->session->userdata('id');
				$data['com_date_time'] = date("Y-m-d H:i:s");
				$data['com_status'] = 0;
				$this->db->insert('comments_info',$data);
				$msg['message'] = 1;
			}
		echo json_encode($msg);
	}




	#---------------------------------
	#    To logout users
	#---------------------------------	
    public function logout() {
        $post_by = $this->session->userdata('id');
        $time_stmp = date("Y-m-d h:i:s");
        $data_arr = array(
            'logout_time' => $time_stmp
        );
        $this->db->where('id', $post_by);
        $this->db->update('user_info', $data_arr);
        $this->session->sess_destroy();
        redirect(base_rul());
    }

}