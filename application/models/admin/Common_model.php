<?php  defined('BASEPATH') OR exit('No direct script access allowed');

class Common_model extends CI_Model {


    function __construct() {
        parent::__construct();
        $this->load->library('Cache');
        
    }


    function generate_id($lenth) {
        $number = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "N", "M", "O", "P", "Q", "R", "S", "U", "V", "T", "W", "X", "Y", "Z", "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z", "1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
        for ($i = 0; $i < $lenth; $i++) {
            $rand_value = rand(0, 61);
            $rand_number = $number["$rand_value"];
            if (empty($con)) {
                $con = $rand_number;
            } else {
                $con = "$con" . "$rand_number";
            }
        }
        return $con;
    }


    #--------------------------------------
    #    generate_id;
    #    To get Max id of Table
    #--------------------------------------    
    function max_id($table) {
        $maxid = $this->db->query('SELECT MAX(id) AS `news_id` FROM `news_mst`')->row()->news_id; 
        return $maxid + 1;
    }


    #-----------------------------------
    #     create_user;
    #-----------------------------------    
    function org_upload($FILES) {
        $uploadfile = 'uploads/bdtask.com_' . time() . '.' . end(explode('.', $FILES['name']));
        if (move_uploaded_file($FILES['tmp_name'], $uploadfile)) {
            return $uploadfile;
        } else {
            return 0;
        }
    }


    #-------------------------------
    #       end function org_upload;
    #-------------------------------    
    function common_upload($FILES) 
    {

        $post_by = $this->session->userdata('id');
        $uploadfile = 'uploads/user/' . $post_by . '.' . end(explode('.', $FILES['name']));
        if (move_uploaded_file($FILES['tmp_name'], $uploadfile)) {
            return $uploadfile;
        } else {
            return 0;
        }
    }

    #--------------------------------
    #       end function org_upload;
    #--------------------------------    
    function do_upload($FILES, $sizes) {
        // settings
        $max_file_size = 1024 * 1024; // 1MB
        $valid_exts = array('jpeg', 'jpg', 'png', 'gif');
        $diractory = array('uploads/thumb', 'uploads');
        if ($FILES['size'] < $max_file_size) {
            // get file extension
            $ext = strtolower(pathinfo($FILES['name'], PATHINFO_EXTENSION));
            if (in_array($ext, $valid_exts)) {
                /* resize image */
                $k = 0;
                foreach ($sizes as $w => $h) {

                    $files[] = $this->resize($w, $h, $FILES, $diractory[$k]);
                    $k++;
                }
            } else {

                $files['msg'] = $msg = 'Unsupported file';

            }

        } else {

            $files['msg'] = $msg = 'Please upload image smaller than 1MB';

        }

        sleep(1);
        return $files;
    }

    #-------------------------------
    #     to generate random ID
    #-------------------------------    
    function random_routing_id($l, $c = 'abcdefghijklmnopqrstuvwxyz1234567890') {
        for ($s = '', $cl = strlen($c) - 1, $i = 0; $i < $l; $s .= $c[mt_rand(0, $cl)], ++$i);
        return $s;
    }

    #-------------------------------------
    #     To get Category Name by Slug
    #-------------------------------------    
    function get_category_name_by_slug($slug) {
        $this->db->select("category_name");
        $this->db->from("categories");
        $this->db->where("slug", $slug);

        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            $fetch = $query->row();
            return $fetch->category_name;
        } else {
            return false;
        }
    }


    #--------------------------------------
    #        explode Title
    #--------------------------------------    
    function explodedtitle($title) {
        return @trim(@implode('-', @preg_split("/[\s,-\:,()]+/", @$title)), '-');
    }

    
    #--------------------------------------
    #       string_clean
    #--------------------------------------    
    function string_clean($string) {
       $string = str_replace('?', ' ', $string); 
       return $text= preg_replace('/[^A-Za-z0-9\-]/', ' ', $string); 
    }



    #--------------------------------------
    #       Save Post into database
    #--------------------------------------    
    function pbnews_post($data, $total_news = 14) {


        extract($data); 
        $generate_id = $this->max_id('news_mst') + 1;

        $settings = $this->db->get('app_settings')->row();
        date_default_timezone_set($settings->time_zone);

        $time_stamp = strtotime($publish_date);
        $post_date = date('Y-m-d');
        # publish status
        if($status1==1){
            $sta = 0;
        } 
        else{
            $sta = 1;
        }
        
        if($status1 == 1){
            $st = 1;
        } 
        else{
            $st=0;
        }
        $i=1;

        $page = ($other_page) ? $other_page : 'home';
        $news_mst = array(
            'id' => '',
            'news_id' => $generate_id,
            'stitle' => $stitle,
            'title' => $title,
            'news' => $news,
            'image' => $image,
            'videos' => $videos,
            'page' => $page,
            'reference' => $reference,
            'ref_date' => $ref_date,
            'reporter' => $reporter,
            'post_by' => $post_by,
            'update_by' => 0,
            'time_stamp' => $time_stamp,
            'post_date' => $post_date,
            'publish_date' => $publish_date,
            'reader_hit' => 0,
            'is_latest' => $latest_confirmed,
            'status' => $sta, 
        );

        $this->db->insert('news_mst', $news_mst);      

        if ($picture_name != '') {
            $p = array(
                'actual_image_name' =>$image, 
                'picture_name' =>$picture_name,
                'time_stamp' =>$post_date 
                );
            $this->db->insert('photo_library',$p);
        }        

        $br_data ['news_title'] = $title;
        $br_data ['url'] = base_url() . $page . '/details/' . $generate_id . '/' . @trim(@implode('-', @preg_split("/[\s,-\:,()]+/", @$title)), '-');
        $JSON_format_breaking_news = json_encode($br_data);
        if ($breaking_confirmed == 1){
            $br_all_data = array(
                'id' => NULL,
                'title' => $JSON_format_breaking_news,
                'time_stamp' => $time_stamp,
                'status' => 1
            );
            $this->db->insert('breaking_news', $br_all_data);
        }

        #--------------------------------
        # 0 for dynamic home
        if ($home_page and ($confirm_dynamic_static == 0)) {
            $home_news_id_arr = array();
            for ($i = $home_page; $i <= $total_news + 7; $i++) {
                $row = $this->db->select('news_id')
                ->from('news_position')
                ->where('position',$i)
                ->where('page','home')
                ->order_by('id','DESC')
                ->get()
                ->row();
                if (!empty($row->news_id)) {
                  $home_news_id_arr[$i + 1] = $row->news_id;
                }
            }

            foreach ($home_news_id_arr as $position => $news_id) {
                $this->db->where('news_id',$news_id)
                ->where('page','home')
                ->delete('news_position');

                $pos = array(
                    'news_id' =>$news_id ,
                    'page' =>'home' ,
                    'position' =>$position ,
                    'status' =>1
                     );
                $this->db->insert('news_position',$pos);
            }

            $this->db->where('position',$home_page)
            ->where('page','home')
            ->delete('news_position');
            
            $pos1 = array(
                    'news_id' =>$generate_id ,
                    'page' =>'home' ,
                    'position' =>$home_page ,
                    'status' =>$sta
                     );
            $this->db->insert('news_position',$pos1);
        }

        #-------------------------------------------
        # 0 for dynamic other pages

        if ($other_position and $other_page and ($confirm_dynamic_static == 0)) {
            $news_id_arr = array();
            $statuss = array();

            for ($i = $other_position; $i <= $total_news; $i++) {
               $row = $this->db->select('news_id,status')
               ->from('news_position')
               ->where('position',$i)
               ->where('page',$other_page)
               ->order_by('id','DESC')
               ->get()
               ->row();
                if (!empty($row->news_id)) {
                    $news_id_arr[$i + 1] = $row->news_id;
                    $statuss[$row->news_id] = $row->status;
                }
            }

            foreach ($news_id_arr as $position => $news_id) {
                $this->db->where('news_id',$news_id)
                    ->where('page',$other_page)
                    ->delete('news_position');

                    $news_pos1 = array(
                        'news_id' =>$news_id ,
                        'page' =>$other_page,
                        'position' =>$position ,
                        'status' =>$statuss[$news_id]
                         );
                $this->db->insert('news_position',$news_pos1);
            }


            $this->db->where('position',$other_position)
                ->where('page',$other_page)
                ->delete('news_position');

            $news_pos2 = array(
                    'news_id' =>$generate_id ,
                    'page' =>$other_page,
                    'position' =>$other_position ,
                    'status' =>$st
                     );
            $this->db->insert('news_position',$news_pos2);

        }
    


        if ($home_page && ($confirm_dynamic_static == 1)) {
            $sd = $this->db->select('news_id')->from('news_position')->where('news_id',$generate_id)->get()->num_rows();
           if($sd<=0){

            $this->db->where('position',$other_position)
                ->where('page','home')
                ->delete('news_position');

            $news_pos3 = array(
                    'news_id' =>$generate_id ,
                    'page' => 'home',
                    'position' =>$home_page ,
                    'status' =>$sta
                     );
            $this->db->insert('news_position',$news_pos3);
           }
        }


        // 1 for static other
        if ($other_position && $other_page && ($confirm_dynamic_static == 1)) {
            $sd = $this->db->select('news_id')->from('news_position')->where('news_id',$generate_id)->get()->num_rows();

           if($sd<=0){
            $this->db->where('position',$other_position)
                ->where('page', $other_page)
                ->delete('news_position');

           $news_pos4 = array(
                    'news_id' =>$generate_id ,
                    'page' => $other_page,
                    'position' =>$other_position ,
                    'status' =>$st
                     );
            $this->db->insert('news_position',$news_pos4);
           }
        } 


        //create rss.xml
        $this->rss_xml();

        // delete cache file 
        $this->delete_cache($generate_id);        
        return array('news_id' => $generate_id);
        
    }


    #---------------------------------------
    function delete_cache($newsid)
        {
         $this->category_by_id($newsid);
         $new_id = $this->category_by_id($newsid);

        //Categoy deletion
              $cache_news_link = md5($new_id ['news_link']);
              $this->cache->delete_output($cache_news_link); 
        //Home page deletion
                $cache_id = md5(base_url());
                $this->cache->delete_output($cache_id);
        //default category deletion
                $cache_id = md5(base_url()."home");
                $this->cache->delete_output($cache_id);
        //News details page deletions
                $cache_dtail_id = md5($new_id['newsid']);
                $this->cache->delete_output($cache_dtail_id);
        //deleting category page
                $category1 = md5($new_id ['category']);
                $this->cache->delete_output($category1);
                
          $page = $new_id ['page'];
          $id = $new_id ['newsid'];
          $this->db->cache_delete($page, $id);     
    }


 
    public function category_by_id($newsid){            
            $result = $this->db->select("*")
            ->from('news_mst')
            ->where('news_id',$newsid)
            ->get()
            ->row();

            @$news_id = $result->news_id; 
            @$title = $result->title;
            @$splited_TITLE = $this->explodedtitle($title);
            @$page = $result->page;

            $delete_cache['news_link'] = base_url() .$page.'/'. $news_id.'/'.$splited_TITLE;
            $delete_cache['category'] = base_url().$page; 
            $delete_cache['page'] = $page;
            $delete_cache['newsid'] = $news_id;    
        return $delete_cache;
    }



    function temp_news_post($data) {
        extract($data);
        $generate_id = $this->generate_id(10);
        $time_stamp = time() + (6 * 60 * 60); // 6 hours; 60 mins; 60secs   
        $post_date = date('d-m-Y', $time_stamp);
        $temp_news = array(
            'id' => NULL,
            'news_id' => $generate_id,
            'stitle' => $stitle,
            'title' => $title,
            'news' => $news,
            'image' => $image,
            'videos' => $videos,
            'reporter' => $reporter,
            'page' => $other_page,
            'post_by' => $post_by,
            'update_by' => 0,
            'time_stamp' => $time_stamp,
            'post_date' => $post_date,
            'ip' => $_SERVER['REMOTE_ADDR'],
            'status' => 1
        );

        $reporter_post_news_info = array(
            'id' => NULL,
            'news_id' => $generate_id,
            'page' => $other_page,
            'page_position' => $other_position,
            'reporter_id' => $post_by,
            'time_stamp' => $time_stamp,
            'status' => 1
        );

        $this->db->insert('temp_news', $temp_news);
        $this->db->insert('reporter_post_news_info', $reporter_post_news_info);
    }

#---------------------------------------------------
#  temp_news_post;
    function temp_news_update($data) {
        extract($data);
        $data_arr = array(
            'stitle' => $stitle,
            'title' => $title,
            'news' => $news,
            'image' => $image,
            'videos' => $videos,
            'reporter' => $reporter,
            'page' => $other_page,
            'update_by' => $post_by
        );
        $this->db->where('news_id', $news_id);
        $this->db->update('temp_news', $data_arr);
    }

    #------------------------------------------------- 
    #temp_news_update;
    public function update_reporter_news_info($data) {
        extract($data);
        $udata = array(
            'page ' => $other_page,
        );
        $this->db->where('news_id', $news_id);
        $this->db->update('reporter_post_news_info', $udata);
    }

  
    function meta_key() {
        $data = array(
            'title' => 'This is my fan',
            'meta' => 'My Heading'
        );
        return $data;
    }

    #------------------------------------------------- 
    # end function seo_data;
    function pb_delete($id) {
        $generate_id = $this->max_id('news_mst') + 1;
        $this->db->delete('news_mst', array('news_id' => $id));
        $data = $this->db->delete('news_position', array('news_id' => $id));
        $query = $this->db->query("DELETE FROM news_routing WHERE  news_id='$id'");
        $this->delete_cache($generate_id);
        
    }
    
    #-------------------------------------------------  
    # end function pb_delete;
    function pb_delete_temp($id) {
        $this->db->delete('news_mst', array('news_id' => $id));
        $data = $this->db->delete('temp_news', array('news_id' => $id));
        return $data;
    }

    #------------------------------------------------- 
    # end function pb_delete_temp;
    function resize($width, $height, $FILES, $diractory) {
        $sssss = $FILES['size'] / 1024;
        list($w, $h) = getimagesize($FILES['tmp_name']);
        $ratio = max($width / $w, $height / $h);
        $h = ceil($height / $ratio);
        $x = ($w - $width / $ratio) / 2;
        $w = ceil($width / $ratio);
        $ext = explode(".", $FILES['name']);
        $path = $diractory . '/' . time() . '.' . end($ext);
        if ($sssss < 100 && ($diractory == 'uploads')) {
            copy($FILES['tmp_name'], $path);
        }

        /* read binary data from image file */
        $imgString = file_get_contents($FILES['tmp_name']);
        /* create image from string */
        $image = imagecreatefromstring($imgString);
        $tmp = imagecreatetruecolor($width, $height);
        imagecopyresampled($tmp, $image, 0, 0, $x, 0, $width, $height, $w, $h);
        /* Save image */
        switch ($FILES['type']) {
            case 'image/jpeg':
                imagejpeg($tmp, $path, 100);
                break;
            case 'image/png':
                imagepng($tmp, $path, 0);
                break;
            case 'image/gif':
                imagegif($tmp, $path);
                break;
            default:
                exit;
                break;
        }
        return $path;
        /* cleanup memory */
        imagedestroy($image);
        imagedestroy($tmp);
    }


    function update_news($data) {
        $generate_id = $this->max_id('news_mst') + 1;
        extract($data);
        $q_c = $this->db->query("SELECT * FROM news_mst WHERE news_id='$news_id'");
        if ($q_c->num_rows() == 1) {
            $fetch_q_c = $q_c->row();
            if ($fetch_q_c->page == $other_page) {
                $new_category_found = false;
            } else {
                $new_category_found = true;
                $previous_page = $fetch_q_c->page;
                $new_category = $other_page;
            }
        }

        $data_arr = array(
            'stitle' => $stitle,
            'title' => $title,
            'news' => $news,
            'image' => $image,
            'videos' => $videos,
            'reporter' => $reporter,
            'page' => $other_page,
            'reference' => $reference,
            'ref_date' => $ref_date,
            'post_date' => $post_date,
            'time_stamp' => strtotime($publish_date),
            'publish_date' => $publish_date,
            'last_update' => date('Y-m-d h:i:s'),
            'post_by' => $pp,
            'update_by' => $update_boy
        );
        $this->db->where('news_id', $news_id);
        $this->db->update('news_mst', $data_arr);
        $this->delete_cache($generate_id);
        $this->rss_xml();

    }


    #------------------------------------------
    # update news_position per page    
    public function update_category($data) {
    
        extract($data);
        @$other_page_row = $this->db->select('*')->from('news_position')->where('news_id',$news_id)->where('page !=','home')->get()->num_rows();
      if($other_page_row>0){
        $this->db->where("news_id", $news_id);
        $this->db->where_not_in("page", 'home');
        $this->db->update('news_position', array('page' => $other_page,'position'=>$other_position));
      }else{
        $this->db->insert('news_position', array('page' => $other_page,'news_id'=>$news_id,'position'=>$other_position));
      }

      @$home_page_row = $this->db->select('*')->from('news_position')->where('news_id',$news_id)->where('page','home')->get()->num_rows();
      if($home_page_row>0){

        # 0 for dynamic home
        if ($home_page) {
            $home_news_id_arr = array();
            for ($i = $home_page; $i <= 30; $i++) {
                $row = $this->db->select('news_id')
                ->from('news_position')
                ->where('position',$i)
                ->where('page','home')
                ->order_by('id','DESC')
                ->get()
                ->row();
                if (!empty($row->news_id)) {
                  $home_news_id_arr[$i + 1] = $row->news_id;
                }
            }

            foreach ($home_news_id_arr as $position => $news_id1) {
                $this->db->where('news_id',$news_id1)
                ->where('page','home')
                ->delete('news_position');

                $pos = array(
                    'news_id' =>$news_id1 ,
                    'page' =>'home' ,
                    'position' =>$position ,
                    'status' =>1
                     );
                $this->db->insert('news_position',$pos);
            }

       

        $this->db->where("news_id", $news_id);
        $this->db->where("page", 'home');
        $this->db->update('news_position', array('position'=>$home_page));

        }else{
             $this->db->where('news_id',$news_id)
                ->where('page','home')
                ->delete('news_position');
        }

      }else{

        if($home_page>0){
            $this->db->insert('news_position', array('page' => 'home','news_id'=>$news_id,'position'=>$home_page));
        }

      }
      

    }

    

    #----------------------------------------==
    # Save Meta On page SEO
    function save_meta_on_page_seo($table_name = '', $data = array()) {
        $this->db->insert($table_name, $data);
    }

    #------------------------------------------
    # Update Meta On page SEO
    function update_meta_on_page_seo($table_name = '', $data = array(), $news_id = '') {
        $this->db->where('news_id', $news_id);
        $this->db->update($table_name, $data);
    }
    
    #-------------------------------------------
    # Check Meta exist
    function check_meta_exist($news_id = '') {
        $this->db->select('*');
        $this->db->from('post_seo_onpage');
        $this->db->where('news_id', $news_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }





    #-------------------------------
    # create rss.xml
    public function rss_xml(){

        $settings = $this->db->get('app_settings')->row();
        $to_date = date('d-m-Y');
        $website_title = $settings->website_title;
        $website_logo = $settings->logo;


        $xml ="<?xml version=\"1.0\" encoding=\"utf-8\"?><rss version=\"2.0\"\n";
        $xml.="xmlns:content=\"http://purl.org/rss/1.0/modules/content/\">\n";

        $xml.="<channel>\n";
        $xml.="<title>".$website_title." RSS Feed RSS</title>\n";
        $xml.="<link>".base_url()."</link>\n";
        $xml.="<description>Read our awesome news, every day</description>\n";
        $xml.="<lastBuildDate>".$to_date."</lastBuildDate>\n";
        $xml.="<image>
                    <title>".$website_title ."RSS Feed</title>
                    <url>".base_url().$website_logo."</url>
                    <link>".base_url()."</link>
                </image>\n";

        

            $post = $this->db->select('news_mst.*,user_info.id,user_info.name')
            ->from('news_mst')
            ->join('user_info','user_info.id=news_mst.post_by')
            ->where('news_mst.status',0)
            ->order_by('news_mst.id','DESC')
            ->limit(20)
            ->get()
            ->result();

            foreach ($post as $row) {

            $news1 = strip_tags(@$row->news);
            $news2 = htmlspecialchars($news1, ENT_QUOTES);
            $word_limit = (@$row->image) ? 30 : 50;
            $news = implode(' ', array_slice(explode(' ', $news2), 0, $word_limit));
            $xml.="
                <item>
                    <title>" . @$row->title . "</title>
                            <link>" .base_url(). @$row->page."/details/".@$row->news_id ."/".$this->explodedtitle(@$row->title). "</link>
                    <pubDate>" . date('l, d M, Y', @$row->time_stamp) . "</pubDate>  
                    <author>".$row->name."</author>     
                    <description>" . $news . "</description>
                    <image>
                        <url>".base_url()."uploads/".@$row->image."</url>
                        <title>".@$row->title."</title>
                        <link>" .base_url(). @$row->page."/details/".@$row->news_id ."/".$this->explodedtitle(@$row->title). "</link>
                    </image>
                    <guid isPermaLink='false'>" .base_url(). @$row->page."/details/".@$row->news_id ."/".$this->explodedtitle(@$row->title). "</guid>
                    <category><![CDATA[".@$row->page."]]></category>\n
                    <content:encoded>
                    <![CDATA[
                        <!doctype html>
                        <html lang=\"en\" prefix=\"op: http://media.facebook.com/op#\">
                          <head>
                            <meta charset=\"utf-8\">
                            <link rel=\"canonical\" href=".base_url(). @$row->page."/details/".@$row->news_id ."/".$this->explodedtitle(@$row->title).">
                            <meta property=\"op:markup_version\" content=\"v1.0\">
                          </head>
                          <body>
                            <article>
                              <header>
                                <!— Article header goes here -->
                              </header>

                                <p>".$news."</p>

                              <footer>
                                <!— Article footer goes here -->
                              </footer>
                            </article>
                          </body>
                        </html>
                        ]]>
                   </content:encoded>
                </item>\n";
            
        }

        $xml.="</channel>\n</rss>";
        $file = fopen("rss/rss.xml","w");
        fwrite($file,$xml);
        fclose($file);
    }  







}
