<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Comments_model extends CI_Model {

	
	public function total_comments($news_id){
    	$query = $this->db->where('news_id', $news_id)->where('com_status','1')->get('comments_info');
		return $query->num_rows();
	}


	public function view_data_comments($news_id=null){
		
		$this->db->select('user_info.id,user_info.name,user_info.photo,comments_info.*');
		$this->db->from('comments_info');
		$this->db->join('user_info', 'comments_info.com_user_id = user_info.id');
		$this->db->where('com_status',1);
		$this->db->where('com_replay_id',0);
		$this->db->where('comments_info.news_id',$news_id);
		return $this->db->get()->result();
	}

}