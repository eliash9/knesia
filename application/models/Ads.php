<?php  defined('BASEPATH') OR exit('No direct script access allowed');

class Ads extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

#--------------------------------------
#     DESC - to select ads
#--------------------------------------
    public function SelectAds() {

        $active_theme = json_decode($this->get_previous_settings('settings', 16));


        $this->db->select('*');
        $this->db->from('ad_s');
        $this->db->where('theme',$active_theme->default_theme);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result();
            foreach ($result as $key => $value) {
                if ($value->page == 1) {
                    $page = 'home';
                } elseif ($value->page == 2) {
                    $page = 'category';
                } elseif ($value->page == 3) {
                    $page = 'news_view';
                }
                $ads[$page . '_' . $value->ad_position] = $value->embed_code;
                $ads['lg_status_'. $value->ad_position] = $value->large_status;
                $ads['sm_status_'. $value->ad_position] = $value->mobile_status;
            }
            return $ads;
        } else {
            return false;
        }
    }
    
#--------------------------------------
#     selectbg
#--------------------------------------
    public function selectbg() {
        $this->db->select('*');
        $this->db->from('bg');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }



    public function get_previous_settings($table_name, $id) {
        $this->db->select('*');
        $this->db->from($table_name);
        $this->db->where('id', $id);
        $qeury = $this->db->get();
        if ($qeury->num_rows() > 0) {
            $result = $qeury->row();
            return $result->details;
        } else {
            return false;
        }
    }



}
