<?php  defined('BASEPATH') OR exit('No direct script access allowed');
class Common_model extends CI_Model {


    //Send email via SMTP server in CodeIgniter
    public function send($post=array()){

        $em = $this->db->select('*')
        ->from('email_config')
        ->where('id',1)
        ->where('status',1)
        ->get()
        ->row();

        if($em){


            //Load email library
            $this->load->library('email');
            //SMTP & mail configuration
            $config = array(
                'protocol'  =>  $em->smtp_protocol,
                'smtp_host' =>  $em->smtp_host,
                'smtp_port' =>  $em->smtp_port,
                'smtp_user' =>  $em->smtp_username,
                'smtp_pass' =>  $em->smtp_password,
                'mailtype'  => 'html',
                'charset'   => 'utf-8'
            );

            $this->email->initialize($config);
            $this->email->set_mailtype("html");
            $this->email->set_newline("\r\n");
            //Email content
            $htmlContent = $post['message'];
            $this->email->to($post['to']);
            $this->email->from('workbd60@gmail.com','News365.com');
            $this->email->subject($post['subject']);
            $this->email->message($htmlContent);
            //Send email
            if($this->email->send()){
                return 1;
            } else{
                return 0;
            }

        }else{
            return 0;
        }



        
    }


    #------------------------------------
    #     Getting breaking news
    #------------------------------------    
    public function breaking_news() {

        $BN = array();
        $bu = base_url();
        $this->db->select('title');
        $this->db->from('breaking_news');
        $this->db->where('status', 1);
        $this->db->order_by('id', 'desc');
        $this->db->limit(5);
        $result = $this->db->get()->result();
        $i = 1;
        foreach ($result as $key => $data){
            @$json_data = json_decode($data->title);
            $title = $json_data->news_title;
            $url = $json_data->url;
            if ($url != '') {
                $title = '<a href="' . $url . '">' . $title . '</a>';
            }
            $BN['title_' . $i] = $title;
            $i++;
       }
        return $BN;
    }



    #------------------------------------
    #     getting latest news
    #------------------------------------ 
    function latest_news() {
        $todate = date('Y-m-d');
        $bu = base_url();
        $LN = array();
        $this->db->select('news_mst.news_id,news_mst.title,news_mst.image,
            news_mst.videos,news_mst.page,news_mst.time_stamp,
            news_mst.post_date,news_mst.news,news_mst.post_by,
            user_info.id,user_info.photo,user_info.name,categories.category_name');
        $this->db->from('news_mst');
        $this->db->join('user_info', 'user_info.id=news_mst.post_by');
         $this->db->join('categories', 'categories.slug=news_mst.page');
        $this->db->where('news_mst.publish_date <=',date("Y-m-d"));
        $this->db->where('news_mst.is_latest', 1);
        $this->db->where('news_mst.status', 0);
        $this->db->order_by('news_mst.id', 'desc');
        $this->db->limit(20);
        $result = $this->db->get()->result();

        $i = 1;
        foreach ($result as $key => $data){
            $splited_TITLE = $this->string_clean($this->explodedtitle($data->title));

            @$page = $data->page;
            @$news_id = $data->news_id;
            @$title = $data->title;
            @$image = $data->image;
            @$ptime = $data->time_stamp;
            @$post_date = $data->post_date;
            @$news = $data->news;
            @$post_by = $data->name;
            @$post_by_img = $data->photo;
            @$videos = $data->videos;
            
            // video
            $LN['video_'.$i] = $videos;
            // news title
            $LN['news_title_'.$i]           = strip_tags(htmlspecialchars($title));
            // post time
            $LN['ptime_' . $i]              = date('l, d M, Y', $ptime);
            // post date
            $LN['post_date_' . $i]          = @$post_date;
            // news
            $LN['news_' . $i]               = strip_tags(htmlspecialchars($news),'<p><a>');
           
            $LN['category_' . $i]            = html_escape(strip_tags($data->category_name));
            $LN['category_name_' . $i]       = html_escape(strip_tags($data->category_name));
            // category link         
            $LN['category_link_' . $i]       = base_url().$page;
            // editor image      
            $LN['post_by_image_' . $i]       =  base_url() . $post_by_img ;
            // editor name
            $LN['post_by_name_' . $i]       = html_escape(strip_tags(@$post_by));
            //news link
            $LN['news_link_' . $i]          = $bu . @$page . '/details/' . $news_id . '/' . $splited_TITLE;
            //Image 
            $LN['image_check_' . $i]        = $image;
            // image thumb
            $LN['image_thumb_' . $i]        = base_url() . 'uploads/thumb/' . $image;
            //Large Image 
            $LN['image_large_' . $i]        = base_url() . 'uploads/' . $image;
            $i++;
        }
        return $LN;
    }

    
    #------------------------------------
    #     getting most read newspaper
    #------------------------------------
    function most_read_dbse() {
        $MR = array();
        $bu = base_url();
        $i = 1;

        $this->db->select('t1.news_id,t1.stitle,t1.title,t1.page,t1.image,t1.videos,t1.reader_hit,t1.time_stamp,
            t1.post_date,t1.news,t2.id,t2.name,t2.photo,t4.category_name
            ');
        $this->db->from('news_mst t1');
        $this->db->join('user_info t2', 't2.id=t1.post_by');
        $this->db->join('categories t4', 't4.slug=t1.page');
        
        $this->db->order_by('t1.reader_hit', 'desc');
        $this->db->limit(20);
        $result = $this->db->get()->result_array();

        foreach ($result as $key => $rows) {
            $splited_TITLE = $this->string_clean($this->explodedtitle($rows['title']));            
            // news title
            $MR['news_title_' . $i]         = html_escape(strip_tags($rows['title']));
            // image name
            $MR['image_check_' . $i]        =  $rows['image'];
            // image view form thumb
            $MR['image_thumb_' . $i]        =  base_url() . 'uploads/thumb/' . $rows['image'];
            // image view form upload
            $MR['image_large_' . $i]        =  base_url() . 'uploads/' . $rows['image'];
            // video id
            $MR['video_' . $i]              = html_escape(strip_tags($rows['videos']));
            // post time
            $MR['ptime_' . $i]              = date('l, d M, Y', $rows['time_stamp']);
            // category link
            $MR['category_link_' . $i]      = base_url().$rows['page'];
            // category name
            $MR['category_' . $i]           = html_escape(strip_tags($rows['category_name']));
            $MR['category_name_' . $i]      = html_escape(strip_tags($rows['category_name']));
            // read hit
            $MR['reader_hit_' . $i]         = $rows['reader_hit'];
            // full news
            $MR['full_news_' . $i]          = html_escape(strip_tags($rows['news'], '<p><a>'));
            // post date
            $MR['post_date_' . $i]          = $rows['post_date'];
            // editor name
            $MR['post_by_name_' . $i]       = html_escape(strip_tags($rows['name']));
            // editor image
            $MR['post_by_image_' . $i]      =  base_url() . $rows['photo'];
            //News Link Creation
            $MR['news_link_' . $i]          = base_url() . $rows['page'] . '/details/' . $rows['news_id'] . '/' . $splited_TITLE;
           
            $i++;
        }
        return $MR;
    }
    
    #-----------------------------------
    #     explode Title
    #----------------------------------- 
    function explodedtitle($title) {
        return @trim(@implode('-', @preg_split("/[\s,-\:,()]+/", @$title)), '-');
    }
    #------------------------------------
    #     string_clean
    #------------------------------------ 
    function string_clean($string) {
       $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
        return $text = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    }
    #------------------------------------
    #     pulling
    #------------------------------------ 
    function pulling() {

        @$PULL = array();
        $result = $this->db->select('*')
                ->from('pulling')
                ->order_by('time_stamp', 'DESC')
                ->limit(1)
                ->get()
                ->row();
        @$PULL['question'] = $result->question;
        @$PULL['id'] = $result->id;
        return $PULL;
    }

}
