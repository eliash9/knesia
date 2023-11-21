<?php  defined('BASEPATH') OR exit('No direct script access allowed');

class View_setting_model extends CI_model {

    public function save_settings($table_name, $data){
        $this->db->insert($table_name, $data);
    }



    public function update_table_by_data($table_name, $data, $id) {
        $this->db->where('id', $id);
        $this->db->update($table_name, $data);
    }


    public function check_settings_exist($table_name, $id) {
        $this->db->select('*');
        $this->db->from($table_name);
        $this->db->where('id', $id);
        $qeury = $this->db->get();
        return $qeury->num_rows();
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

    #------------------------------------------------
    #      To get all categories
    #------------------------------------------------
    public function get_all_categories() {
        $this->db->select('*');
        $this->db->from('categories');
        $qeury = $this->db->get();
        if ($qeury->num_rows() > 0) {
            return $qeury->result();
        } else {
            return false;
        }
    }


    public function check_category_existance_by_position($position_id) {
        $this->db->select('*');
        $this->db->from('home_page_view_setup');
        $this->db->where('position_no', $position_id);
        $qeury = $this->db->get();
        if ($qeury->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }


    public function update_Home_settings($position_no = '', $category_id = '', $max_news = '', $status = '') {
        foreach ($position_no as $key => $value) {
            $data['category_id'] = $category_id[$value];
            $data['max_news'] = $max_news[$value];
            $data['status'] = isset($status[$value]) ? $status[$value] : 0;
            $this->db->where('position_no', $value);
            $this->db->update('home_page_view_setup', $data);
        }
    }

    public function save_contact_page($table_name = '', $S_data) {
        $this->db->insert($table_name, $S_data);
    }


    public function update_contact_page($table_name = '', $S_data, $settings_id) {
        $this->db->where('id', $settings_id);
        $this->db->update($table_name, $S_data);
    }
    
}