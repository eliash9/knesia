<?php  defined('BASEPATH') OR exit('No direct script access allowed');

class Ad_s extends CI_Model {

    // Construction Function
    public function __construct() {
        parent::__construct();
    }

    #--------------------------------------
    #      To save Ad Info
    #--------------------------------------
    public function save_ad_info($data) {
        $this->db->insert('ad_s', $data);
    }

    #--------------------------------------
        # to get all ads
    #--------------------------------------
    public function get_all_ads($default_theme) {
       $query = $this->db->select('*')->where('theme',$default_theme)->from('ad_s')->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    #---------------------------------------
        # To get Ad by ID
    #---------------------------------------
    public function get_ad_by_id($ad_id) {
       $query = $this->db->select('*')->from('ad_s')->where('id', $ad_id)->limit(1)->get();

        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }
    #--------------------------------------
        # To update ad by ID
    #--------------------------------------
    public function update($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('ad_s', $data);
    }


}

