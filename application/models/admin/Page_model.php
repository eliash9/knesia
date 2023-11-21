<?php  defined('BASEPATH') OR exit('No direct script access allowed');

class Page_model extends CI_Model {


    function __construct() {
        parent::__construct();
        $this->load->library('Cache');
    }

    public function page_list(){
        return $result = $this->db->select('pages.*,user_info.id,user_info.name')
        ->from('pages')
        ->join('user_info','user_info.id=pages.publishar_id')
        ->get()
        ->result();
    }
    public function all_page(){
        return $result = $this->db->select('*')
        ->from('pages')
        ->get()
        ->result();
    }
    
    public function page_by_id($id){
        return $result = $this->db->select('*')
        ->from('pages')
        ->where('page_id',$id)
        ->get()
        ->row();
    }


}
