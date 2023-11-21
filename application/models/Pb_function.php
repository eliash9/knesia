<?php  defined('BASEPATH') OR exit('No direct script access allowed');
class Pb_function extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function engtobng($input) {
        $engDATE = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 0, 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December', 'Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday');
        $bangDATE = array('১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০', 'জানুয়ারী', 'ফেব্রুয়ারী', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'আগস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর', 'শনিবার', 'রবিবার', 'সোমবার', 'মঙ্গলবার', '
		বুধবার', 'বৃহস্পতিবার', 'শুক্রবার'
        );
        return $convertedDATE = str_replace($engDATE, $bangDATE, $input);
    }



    public function get_category_image($page_name){
          return $query =  $this->db->select('category_imgae')
            ->from('categories')
            ->where('slug', $page_name)
            ->where('img_status',1)
            ->get()
            ->row();
    }    


    function common_upload($FILES, $folder, $newspaper_name) {
        $uploadfile = $newspaper_name . '.' . end(explode('.', $FILES['name']));
        if (move_uploaded_file($FILES['tmp_name'], $folder . '/' . $uploadfile)) {
            return $uploadfile;
        } else {
            return 0;
        }
    }

    function max_id($table) {
        $sqlm = "SELECT max(id) as maxid FROM $table";
        $rowm = mysql_fetch_assoc(mysql_query($sqlm));
        return $rowm['maxid'] + 1;
    }
    
    public function get_post_meta_information($news_id = '') {
        $query = $this->db->select('meta_keyword,meta_description')
        ->from('post_seo_onpage')
        ->where('news_id', $news_id)
        ->get();
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            false;
        }
    }


}

