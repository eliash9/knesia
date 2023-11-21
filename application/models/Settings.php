<?php  defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_previous_settings($table_name, $id = '') {
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


    public function main_menu() {
        $query = $this->db->select('menu_content.*,menu.*')
        ->from('menu_content')
        ->join('menu','menu.menu_id=menu_content.menu_id')
        ->where('menu.menu_position',1)
        ->where('menu.status',1)
        ->order_by('menu_content.menu_position','ASC')
        ->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }

    }

    public function footer_menu() {
        
        $query = $this->db->select('menu_content.*,menu.*')
        ->from('menu_content')
        ->join('menu','menu.menu_id=menu_content.menu_id')
        ->where('menu.menu_position',2)
        ->where('menu.status',1)
        ->order_by('menu_content.menu_position','ASC')

        ->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }

    }


    public function menu_position_3() {

        $query = $this->db->select('menu_content.*,menu.*')
        ->from('menu_content')
        ->join('menu','menu.menu_id=menu_content.menu_id')
        ->where('menu.menu_position',3)
        ->where('menu.status',1)
        ->order_by('menu_content.menu_position','ASC')
        ->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
        
    }

}
