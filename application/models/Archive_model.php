<?php  defined('BASEPATH') OR exit('No direct script access allowed');

class Archive_Model extends CI_Model {


    public function __construct() {
        parent::__construct();
    }


    public function get_news_by_archive_date($keyword,$limit=NULL,$start=NULL) {

        $query1 = $this->db->select("news_mst.*,user_info.id,user_info.name,user_info.photo")
        ->distinct()
        ->from("news_mst")
        ->join('user_info', 'user_info.id=news_mst.post_by')
        ->like('post_date',$keyword) 
        ->limit($limit,$start)
        ->get()->result();


        $query2 = $this->db->select("news_archive.*,user_info.id,user_info.name,user_info.photo")
        ->distinct()
        ->from("news_archive")
        ->join('user_info', 'user_info.id=news_archive.post_by')
        ->or_like("post_date", $keyword)
        ->get()
        ->result();

       $query = array_merge($query1, $query2);


        if ($query > 0) {
            return $query;
        } else {
            return false;
        }
    }



    /*******************************
      count total row by date
    ******************************/
    public function count_total_news($archive_date){
        $query1 = $this->db->select("news_mst.*,user_info.id,user_info.name,user_info.photo")
        ->distinct()
        ->from("news_mst")
        ->join('user_info', 'user_info.id=news_mst.post_by')
        ->where_in("post_date", $archive_date)
        ->get()->num_rows();
        
        $query2 = $this->db->select("news_archive.*,user_info.id,user_info.name,user_info.photo")
       ->distinct()
       ->from("news_archive")
       ->join('user_info', 'user_info.id=news_archive.post_by')
       ->where_in("post_date", $archive_date)
       ->get()->num_rows();
       $total_news = $query1 + $query2;
       return $total_news;
    }

    
    public function get_pages_archive_date($keyword){
        
        $query1 = $this->db->select("news_mst.page,news_mst.post_date")
        ->distinct()
        ->from("news_mst")
        ->or_like('post_date',$keyword)
        ->get()
        ->result();

        $query2 = $this->db->select("news_archive.page,news_archive.post_date")
        ->distinct()
        ->from("news_archive")
        ->or_like("post_date", $keyword)
        ->get()
        ->result();

        $query = array_merge($query1, $query2);
        if ($query > 0) {
            return $query;
        } else {
            return false;
        }

    }

}
