<?php  defined('BASEPATH') OR exit('No direct script access allowed');

class Seo_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function save_settings($table_name = '', $SEO_data) {
        $this->db->insert($table_name, $SEO_data);
    }

    public function update_settings($table_name = '', $SEO_data, $settings_id) {
        $this->db->where('id', $settings_id);
        $this->db->update($table_name, $SEO_data);
    }

    public function save_social_lik($table_name = '', $S_data) {
        $this->db->insert($table_name, $S_data);
    }

    public function update_social_lik($table_name = '', $S_data, $settings_id) {
        $this->db->where('id', $settings_id);
        $this->db->update($table_name, $S_data);
    }

}
