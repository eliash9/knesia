<?php  defined('BASEPATH') OR exit('No direct script access allowed');

class Archive_model extends CI_Model {

    #------------------------------------------------
    // Constructor
    public function __construct() {
        parent::__construct();
    }

    #------------------------------------------------
    # To get all Category
    #------------------------------------------------
    public function get_all_category() {

        $result = $this->db->select('
            categories.category_id,
            categories.slug,
            categories.category_name,
            max_archive_settings.max_archive')
            ->from('categories')
            ->join('max_archive_settings','max_archive_settings.category_id=categories.category_id')
            ->get()->result();
            
        foreach ($result as $key => $value) {
            $value->slug = str_replace("'", '', $value->slug);
            $count_total_news = $this->db->query("SELECT * FROM news_mst WHERE page='$value->slug'");
            $total_num = $count_total_news->num_rows();
            $available_for_archive = $count_total_news->num_rows();
            $result[$key]->available_for_archive = $total_num - $value->max_archive;
        }
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }



    public function save_mx_archive_settings($categories) {

        foreach ($categories as $key => $value) {

            if ($key == "update") {
                continue;
            }
            $this->db->select('max_archive');
            $this->db->from('max_archive_settings');
            $this->db->where('category_id', $key);
            $check_max_value_exist = $this->db->get();
            $num_rows = $check_max_value_exist->num_rows();

            if ($num_rows == 0) {
                $insert = $this->db->query("INSERT INTO max_archive_settings VALUES ('$key','$value')");
            } else {
                $update = $this->db->query("UPDATE max_archive_settings SET max_archive='$value' WHERE category_id='$key'");
            }
        }
    }


}

