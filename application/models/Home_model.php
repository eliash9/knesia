<?php  defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }


    // Getting Page data for home
    function page_data_for_home($page_comma_seperator, $limit = 15) {

        $PN = array();
        $bu = base_url();
        $page_list = explode(',', $page_comma_seperator);
        $word_limit = 30;
        $i = 1;

        foreach ($page_list as $page){

            list($page, $position) = explode('~', $page);

            $this->db->select('t1.news_id,t1.time_stamp,t1.page,t1.stitle,t1.title,t1.image,t1.videos,
                t1.news,t1.reference,t1.ref_date,t1.reporter,t1.videos,t1.post_date,t1.post_by,
                t3.id,t3.photo,t3.name,t4.category_name');
            $this->db->from('news_position t2');
            $this->db->where('t2.page', $page);
            $this->db->where('t2.status', '1');
            $this->db->join('news_mst t1', 't1.news_id=t2.news_id', 'left');
            $this->db->join('user_info t3', 't3.id=t1.post_by');
            $this->db->join('categories t4', 't4.slug=t2.page');
            $this->db->where('t1.publish_date <=',date("Y-m-d"));
            $this->db->order_by('t2.position', 'ASC');
            $this->db->limit(50);  
            $result = $this->db->get()->result_array();
            
            $i = 1;
            foreach ($result as $data) {
                $news_id = $data['news_id']; 
                $stitle = $data['stitle'];
                $title = $data['title'];
                $ptime = $data['time_stamp'];
                @$splited_TITLE = $this->explodedtitle($title);
                $image = $data['image'];
                $videos = $data['videos'];
                $news_dtl = implode(' ', array_slice(explode(' ', $data['news']), 0, $word_limit));
                $news_full = $data['news'];
                @$page = $data['page'];
                $post_by_name = $data['name'];
                $post_by_img = $data['photo'];
                $post_date = $data['post_date'];

                // category
                $PN['position_' . $position]['category_' . $i] = $page;

                $PN['position_' . $position]['category_name_' . $i] = html_escape($data['category_name']);

                $PN['position_' . $position]['reporter_' . $i] = html_escape($data['reporter']);
                // category link
                $PN['position_' . $position]['category_link_' . $i] = base_url().$page;
                //Only news ID 
                $PN['position_' . $position]['news_id_' . $i] = $news_id;
                // post by image
                $PN['position_' . $position]['post_by_image_' . $i] = base_url() . $post_by_img;
                // editor name
                $PN['position_' . $position]['post_by_name_' . $i] = html_escape($post_by_name);
                // post time
                $PN['position_' . $position]['ptime_' . $i] =  date('l, d M, Y', $ptime);
                // post date
                $PN['position_' . $position]['post_date_' . $i] = $post_date;
                // News Title
                $PN['position_' . $position]['news_title_' . $i] = strip_tags(htmlspecialchars_decode($title));
                // Short Title
                $PN['position_' . $position]['stitle_' . $i] = html_escape($stitle);
                // video 
                $PN['position_' . $position]['video_' . $i] = $videos;
                // news splide title
                $PN['position_' . $position]['splted_title_' . $i] = html_escape($this->string_clean($splited_TITLE));
                //News Title With Link
                $PN['position_' . $position]['title_' . $i] = '<a href="' . $bu . @$page . '/' . $news_id . '/' . $this->string_clean($splited_TITLE) . '">' . $title . '</a>';
                //Only News With Link 
                $PN['position_' . $position]['news_link_' . $i] = base_url() . $page . '/details/' . $news_id.'/'.$this->string_clean($splited_TITLE);
                //Short News
                $PN['position_' . $position]['short_news_'.$i]      = character_limiter(strip_tags(htmlspecialchars_decode($news_full), '<p><a>'),150);
                // full_news
                $PN['position_' . $position]['full_news_' . $i] = html_escape(strip_tags($news_full, '<p><a>'));     
                //Thumb Image
                $PN['position_' . $position]['image_check_' . $i] = $image;
                $PN['position_' . $position]['image_thumb_' . $i] = base_url() . 'uploads/thumb/' . $image;
                //Large Image 
                $PN['position_' . $position]['image_large_' . $i] = base_url() . 'uploads/' . $image;
                //Image thumb with link
                $PN['position_' . $position]['image_thumb_link_' . $i] = "<a href='" . @$PN['position_' . $position]['newslink' . $i] . "'><img src='" . base_url() . 'uploads/thumb/' . $image . "' alt='" . $splited_TITLE . "' class='img-responsive bdtask_image_thumb'></a>";
                //Image large with link
                $PN['position_' . $position]['image_large_link_' . $i] = "<a href='" . @$PN['position_' . $position]['newslink' . $i] . "'><img src='" . base_url() . 'uploads/' . $image . "' alt='" . $splited_TITLE . "' class='img-responsive bdtask_image_large'></a>";

                $i++;

                if ($i > $limit) {
                    break;
                }
            }
        }    

    return $PN;
}

    #------------------------------------------------
    # gatting home data
    #------------------------------------------------    
    public function home_data($page = 'home') {

        $result = $this->db->select('t1.news_id,t1.post_date,t1.time_stamp,t1.page,t1.stitle,t1.title,t1.image,t1.news,t1.reference,t1.ref_date,t1.publish_date,t1.post_by,t1.reporter,t1.status,t1.videos,t3.id,t3.name,t3.photo,t4.category_name')
                ->from('news_position t2')
                ->join('news_mst t1', 't1.news_id=t2.news_id', 'left')
                ->join('user_info t3', 't3.id=t1.post_by')
                ->join('categories t4', 't4.slug=t1.page')
                ->where('t1.publish_date <=',date("Y-m-d"))
                ->where('t2.page', $page)
                ->where('t1.status', '0')
                ->limit(10)
                ->order_by('t2.position', 'ASC')
                ->order_by('t2.news_id', 'DESC')
                ->get()
                ->result();

        $bu = base_url();
        $i = 1;
        @$HN = array();

        foreach ($result as $key => $value1) {
            //Category
            $HN['category_' . $i] = html_escape($value1->page);
            $HN['category_name_' . $i] = html_escape($value1->category_name);
            //category link
            $HN['category_link_' . $i] = base_url().$value1->page;
            // video id
            $HN['video_' . $i] = $value1->videos;
            //Ptime
            $HN['ptime_' . $i] = $value1->time_stamp;
            //post date
            $HN['post_date_' . $i] = $value1->post_date;
            $HN['publish_date_' . $i] = $value1->publish_date; 
            // post by images
            $HN['post_by_image_' . $i] =  base_url() . $value1->photo;
            // post by name
            $HN['post_by_name_' . $i] = html_escape($value1->name);
            //Only news ID 
            $HN['news_id_' . $i] = $value1->news_id;
            //post Title
            $HN['news_title_' . $i] = html_escape(strip_tags($value1->title));
            //Short Title
            $HN['stitle_' . $i] = html_escape($value1->stitle);
            //Spilt Title;              
            $HN['TITLE_'.$i] = html_escape($this->explodedtitle($HN['news_title_' . $i]));
            $HN['splited_title_' . $i] = html_escape($this->string_clean($HN['TITLE_'.$i]));
            //post Title With Link
            $HN['title_' . $i] = '<a href="' . $bu . $HN['category_' . $i] . '/' . $HN['news_id_' . $i] . '/' . $HN['splited_title_' . $i] . '">' . $HN['news_title_' . $i] . '</a>';
            //Only News Link 
            $HN['news_link_' . $i] = base_url() .$HN['category_' . $i] . '/details/' . $HN['news_id_' . $i] . '/' . $HN['splited_title_' . $i];
            //full news
            $HN['full_news_' . $i] = html_escape(strip_tags($value1->news, '<p><a>'));                         
            //Image ID
            $HN['image_' . $i] = $value1->image;
            $HN['image_check_' . $i] = $value1->image;
            //Thumb Image Link
            $HN['image_thumb_' . $i] = base_url() . 'uploads/thumb/' . $HN['image_' . $i];
            //Large Image 
            $HN['image_large_' . $i] = base_url() . 'uploads/' . $HN['image_' . $i];
            //Image thumb with with link
            $HN['image_thumb_link_' . $i] = "<a href=" . $bu . $HN['category_' . $i] . '/' . $HN['news_id_' . $i] . '/' . $HN['splited_title_' . $i] ."><img src='" . base_url() . 'uploads/thumb/' . $HN['image_' . $i] . "' alt='" . $HN['splited_title_' . $i] . "'></a>";
            //Image large with with link
            $HN['image_large_link_' . $i] = "<a href=" . $bu . $HN['category_' . $i] . '/' . $HN['news_id_' . $i] . '/' . $HN['splited_title_' . $i] ."><img src='" . base_url() . 'uploads/' . $HN['image_' . $i] . "' alt='" . $HN['splited_title_' . $i] . "'></a>";
            ### Image Group End  ###
            $i++;
        }
  
        $home_page_position = $this->add_home_category_position_data();
        
        if ($home_page_position) {
            foreach ($home_page_position as $key1 => $va) {
                foreach ($va as $key => $value) {
                   $cat_list[] = trim($value['slug']) . '~' . $key;
                } 
            }
            $cat_list = implode(',', $cat_list);
            @$PN = $this->page_data_for_home($cat_list);
           
        } else {
            $PN = '';
        }
        
        return array('hn' => $HN, 'pn' => $PN);
    }


    #-----------------------------------------------
    #       hoem page positionign data
    #-----------------------------------------------    
    public function add_home_category_position_data() {
    
        $settings = $this->check_settings_exist(4);
        
        if ($settings != false) {
            $setting_details = $this->object_to_Array(json_decode('[' . $settings . ']'));
            return $setting_details;
        } else {
            return '';
        }
    }

    #----------------------------------------------
    function object_to_Array($object) {
        if (!is_object($object) && !is_array($object))
            return $object;
        return array_map('self::object_to_Array', (array) $object);
    }

    #--------------------------------------------
    public function check_settings_exist($id) {
        $query = $this->db->select('*')
        ->from('settings')
        ->where('id',$id)
        ->get();
        
        $num_rows = $query->num_rows();
      
        if ($num_rows == 1) {
            $fetch_settings = $query->row();
            return $fetch_settings->details;
        } else {
            return false;
        }
    }

    #-----------------------------------------
    // explode Title
    #-----------------------------------------    
    function explodedtitle($title) {
        return @trim(@implode('-', @preg_split("/[\s,-\:,()]+/", @$title)), '');
    }

    #----------------------------------------
    function string_clean($string) {
        $string1 = str_replace(' ', '', $string); 
        return $text = preg_replace('/[^A-Za-z0-9\-]/', '', $string1); 
    }

}

?>