<?php  defined('BASEPATH') OR exit('No direct script access allowed');

class New_page extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    #--------------------------------
    #       get page Data
    #--------------------------------    
    public function page_data($slug = NULL) {

        $page_result = $this->db->select('*')
        ->from('pages')
        ->where('page_slug',$slug)
        ->get()
        ->row();

        if (@$page_result->title!=NULL) {
            //new id
            $pn['page_id'] = $page_result->page_id;
            $pn['title'] = html_escape(strip_tags($page_result->title));
            $pn['page_slug'] = html_escape(strip_tags($page_result->page_slug));
            $pn['description'] = $page_result->description;
            $pn['image_id'] = $page_result->image_id;
            $pn['seo_keyword'] = html_escape(strip_tags($page_result->seo_keyword));
            $pn['seo_description'] = html_escape(strip_tags($page_result->seo_description));
            $pn['video_url'] = $page_result->video_url;
            $pn['publish_date'] = $page_result->publish_date;

            return $PAGE_DATA = array('pd' => $pn);
        } else {
            return false;
        }
    }


    // explode Title
    function explodedtitle($title) {
        return @trim(@implode('-', @preg_split("/[\s,-\:,()]+/", @$title)), '');
    }

    function string_clean($string) {
        return $string = str_replace(' ', '', $string); 
    }

}

