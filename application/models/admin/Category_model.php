<?php  defined('BASEPATH') OR exit('No direct script access allowed');
class Category_model extends CI_Model {

    // Constructor
    public function __construct() {
        parent::__construct();
    }

    public function save_category_name($data) {
        $this->db->insert('categories', $data);
       return $insert_id = $this->db->insert_id();

    }

    public function saveSub_category_name($p_id, $sub_id) {
        $this->db->where('category_id', $category_id);
        $this->db->update('sub_id', $sub_id);
    }

    public function all_categories() {
        $this->db->select('*');
        $this->db->from('categories');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function check_category_existance($data) {
        $this->db->select('*');
        $this->db->from('categories');
        $this->db->where('slug', $data['slug']);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function delete_category($category_id) {
        $this->db->where('category_id', $category_id)->delete('categories');
        return true;
    }

    public function get_category_info($category_id) {
        $this->db->select('*');
        $this->db->from('categories');
        $this->db->where('category_id', $category_id);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function update_category($category_id, $data) {
        $this->db->where('category_id', $category_id);
        $this->db->update('categories', $data);

    }

    public function update_category_positions() {
        
        foreach ($_POST['position'] as $key => $value) {
            $this->db->query("UPDATE categories SET position='$value' WHERE category_id='$key'");
        }
    }



}

