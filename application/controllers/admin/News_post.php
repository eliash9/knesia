<?php defined('BASEPATH') or exit('No direct script access allowed');

class News_post extends CI_Controller {


    public function __construct() {

        parent::__construct();
        $session_id = $this->session->userdata('session_id'); 
        $user_type = $this->session->userdata('user_type'); 
        if($session_id == NULL ) {
            redirect('admin/sign_out');
        }
        if(($user_type!=3) AND ($user_type!=4) AND ($user_type!=2)) {
            redirect('admin/sign_out');
        } 
        $this->load->model('admin/common_model');   
    }



    #----------------------------
    # To add new post
    #----------------------------    
    public function index() {

        $data['cat'] = $this->db->select("*")->from('categories')
        ->order_by('position','ASC')->get()->result(); 
        
        $this->load->view('admin/includes/__header');
        $this->load->view('admin/news/__view_post',$data);
        $this->load->view('admin/includes/__footer');

    }


    public function get_youtube_id_from_url($url) 
    {
        if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[\w\-?&!#=,;]+/[\w\-?&!#=/,;]+/|(?:v|e(?:mbed)?)/|[\w\-?&!#=,;]*[?&]v=)|youtu\.be/)([\w-]{11})(?:[^\w-]|\Z)%i', $url, $match)) {
        return $match['1']; 
        }else{
            return $video='';
        }
    }
  

    public function post() {

        // on page SEO
        $post_keyword = trim($this->input->post('meta_keyword',TRUE));
        $post_description = trim($this->input->post('meta_description',TRUE));
        if ($post_keyword != '' || $post_keyword != '') {
            $post_meta['meta_keyword'] = $post_keyword;
            $post_meta['meta_description'] = $post_description;
        }


        if ($_FILES['file_select_machin']['name']) {

            $pst_imge = $_FILES['file_select_machin']['name'];
            $image_chk = explode(".",$pst_imge);
            $extent = end($image_chk);

            if($extent=="jpg" || $extent=="png" || $extent=="jpeg" || $extent=="gif"){
                $sizes = array(260 => 200, 552 => 400);
                $file_location = $this->common_model->do_upload($_FILES['file_select_machin'], $sizes);
                if(@$file_location['msg']!=NULL){
                    $this->session->set_flashdata('exception', $file_location['msg']);
                    redirect('admin/news_post');
                } else {
                    $image = explode('/', $file_location[0]);
                    $image = end($image);
                }
                
            } else{
                $this->session->set_flashdata('exception','This File Not allowed!');
                redirect('admin/news_post');
            }
            
        } else {
            $image = $this->input->post('lib_file_selected',TRUE);
        }


        // check user post status
        if($this->session->userdata('user_type')==2){

            $d = $this->db->select('post_ap_status,id')
            ->from('user_info')
            ->where('id',$this->session->userdata('id'))->get()->row(); 

            if($d->post_ap_status !=0){
                $post_ap_status = 1;
            }else{
                $post_ap_status = 0;
            }

        } else{
            $post_ap_status = $this->input->post('status_confirmed',TRUE);
        }//end

        $data = array(
            'home_page'         => $this->input->post('home_page',TRUE),
            'other_page'        => $this->input->post('other_page',TRUE),
            'other_position'    => $this->input->post('other_position',TRUE),
            'image'             => @$image,
            'picture_name'      => @$image_chk[0],
            'videos'            => $this->get_youtube_id_from_url($this->input->post('videos',TRUE)),
            'stitle'            => $this->input->post('short_head',TRUE),
            'title'             => $this->input->post('head_line',TRUE),
            'reporter'          => $this->input->post('reporter',TRUE),
            'news'              => $this->input->post('details_news'),
            'confirm_dynamic_static' => $this->input->post('confirm_dynamic_static',TRUE),
            'latest_confirmed'  => $this->input->post('latest_confirmed',TRUE),
            'breaking_confirmed' => $this->input->post('breaking_confirmed',TRUE),
            'send_to_temp'      => $this->input->post('send_to_temp',TRUE),
            'reference'         => $this->input->post('reference',TRUE),
            'ref_date'          => $this->input->post('ref_date',TRUE),
            'publish_date'      => ($this->input->post('publish_date',TRUE)!=NULL?$this->input->post('publish_date',TRUE):$this->input->post('ref_date',TRUE)),
            'post_by'           => $this->session->userdata('id'),
            'status1'           =>  $post_ap_status
        );


        $result = $this->common_model->pbnews_post($data);

        if (isset($post_meta)) {
            $post_meta['news_id'] = $result['news_id'];
            $this->common_model->save_meta_on_page_seo('post_seo_onpage', $post_meta);
        }

        $this->session->set_flashdata('message', display('news_post_msg'));
        redirect("admin/news_post");
    }



    #----------------------------------------------
    #   My window to select  images form library
    #----------------------------------------------
    public function my_window() {
        $this->load->view('admin/includes/__library_image_search');
    }




}
