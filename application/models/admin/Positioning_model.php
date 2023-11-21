<?php  defined('BASEPATH') OR exit('No direct script access allowed');

class Positioning_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    
    #---------------------------------------------------
    # To get newses with position according to category
    #---------------------------------------------------

    public function get_newses_with_position($category) {
        $this->db->select("news_position.id,news_position.news_id,news_position.position p_position,news_mst.title");
        $this->db->from("news_position");
        $this->db->where("news_position.page", $category);
        $this->db->join("news_mst", 'news_position.news_id=news_mst.news_id', 'right');
        $this->db->order_by('position','ASC');
        $query = $this->db->get();
        return $query->result();
    }

    /********************************
     * To update Position by ID
     * @param int $positions
     *******************************/
    public function update_positions_by_id($positions) {
        foreach ($positions as $news_id => $position) {
            $data['position'] = $position;
            $this->db->where('id', $news_id);
            $this->db->update('news_position', $data);
        }
    }

    /****************************
     * To delete position by ID
     ****************************/
    public function delete_single_position($id) {
        $this->db->where('id', $id);
        $this->db->delete('news_position');
    }

}

