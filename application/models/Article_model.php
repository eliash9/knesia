<?php  defined('BASEPATH') OR exit('No direct script access allowed');
class Article_model extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }

    #----------------------------------------
    #   news details
    #----------------------------------------
    function article_select($news_id=NULL) {
        
        $this->db->select('news_mst.*,user_info.id,user_info.name,user_info.photo');
        $this->db->from('news_mst');
        $this->db->join('user_info', 'user_info.id=news_mst.post_by');
        $this->db->where('news_mst.news_id', $news_id);
        @$row = $this->db->get()->row_array();
        
        if (!empty($row)) {
            $row['meta']['keyword'] = implode(', ', explode(' ', $row['title']));
            $row['meta']['description'] = $row['title'] . ' - ' . implode(' ', array_slice(explode(' ', htmlspecialchars(strip_tags($row['news']))), 0, 30));
            return $row;
        } else {
            redirect('home');
        }
    }

}

