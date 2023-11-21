<?php defined('BASEPATH') or exit('No direct script access allowed');

class Archive extends CI_Controller {

    #-----------------------------------------
    #          constructor class
    #-----------------------------------------
    public function __construct() {
        parent::__construct();
        $session_id = $this->session->userdata('session_id'); 
        $user_type = $this->session->userdata('user_type'); 
        if($session_id == NULL ) {
            redirect('admin/sign_out');
        }
        if(($user_type!=3) AND ($user_type!=4)) {
            redirect('admin/sign_out');
        }
        $this->load->model('admin/archive_model');
    }

    #-------------------------------------------------
    # Maximum Archive Settings View function
    #------------------------------------------------
    public function maximum_archive_settings_view() {
        
        $data['categories'] = $this->archive_model->get_all_category();

        $this->load->view('admin/includes/__header',$data);
        $this->load->view('admin/archive/max_archive_settings');
        $this->load->view('admin/includes/__footer');

    }

    #-----------------------------------------------
        # save maximum archive settings
    #-----------------------------------------------
    public function save_max_archive_settings() {

        if (($this->input->post('update',TRUE))) {
            $this->archive_model->save_mx_archive_settings(array_map('trim', $_POST));
            $this->session->set_flashdata('message',display('max_archive_save_msg'));
        }
        redirect('admin/archive/maximum_archive_settings_view');
    }


    #------------------------------------------
       # To get category slug by category ID
    #------------------------------------------
    public function get_category_slug_by_id($category_id) {
        $this->db->select('slug');
        $this->db->from('categories');
        $this->db->where('category_id', $category_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->row();
            return $result->slug;
        }
    }

    #------------------------------------------
        # To send news in news archive
    #---------------------------------------------
    public function send_to_news_archive($category_name, $number_of_archive) {

        $this->db->query("INSERT INTO news_archive SELECT * FROM news_mst WHERE page = '$category_name' ORDER BY id DESC LIMIT $number_of_archive");

    }

    #------------------------------------------
        # generating random routing ID
    #------------------------------------------    
    function random_routing_id($l, $c = 'abcdefghijklmnopqrstuvwxyz1234567890') {
        for ($s = '', $cl = strlen($c) - 1, $i = 0; $i < $l; $s .= $c[mt_rand(0, $cl)], ++$i)
            ;
        return $s;
    }

    #-----------------------------------------

    #-----------------------------------------
    function get_news_by_category($tbl_name, $category_name, $limit) {


        $query = $this->db->query("SELECT * FROM $tbl_name WHERE page ='$category_name' ORDER BY id DESC LIMIT $limit");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    #-----------------------------------------
         # To routing news in Routing Table
    #----------------------------------------
    public function news_routing($tbl_name, $news_id) {
        $this->db->set('table_name',$tbl_name)->where('news_id',$news_id)->update('news_routing');
        
    }

    #----------------------------------------
         # To DELETE news by ID
    #---------------------------------------
    public function delete_news_by_id($tbl_name, $news_id) {
        $this->db->where('news_id',$news_id)->delete($tbl_name);
    }

    #-----------------------------------------------
         # @param string $category_name
    #----------------------------------------------
    public function maximum_archive_settings_by_category($category_name, $category_id, $available_for_archive) {
        // max archive settings
        $this->db->select('*');
        $this->db->from('max_archive_settings');
        $this->db->where('category_id', $category_id);
        $archive_settings = $this->db->get();
        $arc_settings = $archive_settings->row();

        $max_archive_settings = $arc_settings->max_archive;

        $this->db->select('news_id');
        $this->db->from('news_mst');
        $this->db->where('page', $category_name);
        $result = $this->db->get();
        $total_news = $result->num_rows();

        $now_available_news = $total_news - $max_archive_settings;

        if ($now_available_news < 10) {
            return $now_available_news;
        } else {
            return 10;
        }
    }


    #-------------------------------------------------
    # to archive news into another table
    #-------------------------------------------------
    public function archive_newses_by_category($catID_AvaibleForArchive) {

        list($category_id, $available_for_archive) = explode('~', $catID_AvaibleForArchive);

        $category_name = $this->get_category_slug_by_id($category_id);


        // confirmation for max archive settings
        $number_of_archive = $this->maximum_archive_settings_by_category($category_name, $category_id, $available_for_archive);


        // send to news archive
        $this->send_to_news_archive($category_name, $number_of_archive);
        // updating routing table
        $news_by_category = $this->get_news_by_category('news_mst', $category_name, $number_of_archive);
        $tbl_name = 'news_archive';
        if ($news_by_category) {
            foreach ($news_by_category as $key => $value) {
                $this->news_routing($tbl_name, $value->news_id);
                $this->delete_news_by_id('news_mst', $value->news_id);
            }
        }
    }

    
}

?>
