<?php defined('BASEPATH') or exit('No direct script access allowed');

class News_edit extends CI_Controller {


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
        $this->load->model("admin/category_model");

    }


    public function index($news_id=NULL) {


        $data['row'] = $this->db->select("news_mst.*,user_info.id,user_info.name")
        ->from('news_mst')
        ->join('user_info','user_info.id=news_mst.post_by')
        ->where('news_mst.news_id',$news_id)
        ->get()->row_array();

        $data['seo_info'] = $this->db->select('*')->from('post_seo_onpage')->where('news_id',$news_id)->get()->row_array();
        $data['categories'] = $this->category_model->all_categories();
      
        $this->load->view('admin/includes/__header',$data);
        $this->load->view('admin/news/__view_edit');
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



    #--------------------------------------------
    # To update news according to News ID
    #--------------------------------------------
    public function update() {

        if ((trim($this->input->post('meta_keyword',TRUE))) != '' || (trim($this->input->post('meta_description',TRUE))) != '') {
            $post_meta['meta_keyword'] = trim($this->input->post('meta_keyword',TRUE));
            $post_meta['meta_description'] = trim($this->input->post('meta_description',TRUE));
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
                    $id = $this->input->post('news_id');
                    redirect('admin/news_edit/index/'.$id);
                } else {
                    $image = explode('/', $file_location[0]);
                    $image = end($image);
                }

            } else{
                $this->session->set_flashdata('exception','This File Not allowed!');
                $id = $this->input->post('news_id',TRUE);
                redirect('admin/news_edit/index/'.$id);
            }
            
        } else if ($this->input->post('lib_file_selected',TRUE) != '') {
            $image = $this->input->post('lib_file_selected',TRUE);
        } else {
            $image = $this->input->post('image_old',TRUE);
        }
        
        // news data
        $data = array(

            'news_id'           => $this->input->post('news_id',TRUE),
            'home_page'         => $this->input->post('home_page',TRUE),
            'other_page'        => $this->input->post('other_page',TRUE),
            'other_position'    => $this->input->post('other_position',TRUE),
            'picture_name'      => @$image_chk[0],
            'image'             => $image,
            'videos'            => $this->input->post('videos',TRUE),
            'stitle'            => $this->input->post('short_head',TRUE),
            'title'             => $this->input->post('head_line',TRUE),
            'reporter'          => $this->input->post('reporter',TRUE),
            'news'              => $this->input->post('details_news',TRUE),
            'reference'         => $this->input->post('reference',TRUE),
            'ref_date'          => $this->input->post('ref_date',TRUE),
            'post_date'         => $this->input->post('ref_date',TRUE),
            'publish_date'      => ($this->input->post('publish_date',TRUE)?$this->input->post('publish_date',TRUE):$this->input->post('ref_date',TRUE)),
            'pp'                => $this->input->post('post_by',TRUE),
            'update_boy'        => $this->session->userdata('id')
            
        );


        $update_position = $this->common_model->update_category($data);
        
        $result = $this->common_model->update_news($data);
        
        // update meta information
        if (isset($post_meta)) {
            $news_id = $this->input->post('news_id',TRUE);
            //check meta data exist
            $check_status = $this->common_model->check_meta_exist($news_id);
            if ($check_status) {
                $this->common_model->update_meta_on_page_seo('post_seo_onpage', $post_meta, $news_id);
            } else {
                $post_meta['news_id'] = $news_id;
                $this->common_model->save_meta_on_page_seo('post_seo_onpage', $post_meta);
            }
        }


        $this->session->set_flashdata('message', display('update_message'));
        redirect("admin/news_list/newses");
    }


    //set publesh news
    public function publishd($news_id) {

        $this->db->set('status', 0);
        $this->db->where('news_id', $news_id);
        $this->db->update('news_mst');


        $this->db->set('status', 1);
        $this->db->where('news_id', $news_id);
        $this->db->update('news_position');
        
        if ($this->session->userdata['user_type'] == 1) {
            redirect("admin/news_list/user_interface");
        } else {
            redirect("admin/news_list/newses");
        }
    }


    //set unpublesh news
    public function unpublishd($news_id) {
        $this->db->set('status', 1);
        $this->db->where('news_id', $news_id);
        $this->db->update('news_mst');
        $this->db->set('status', 0);
        $this->db->where('news_id', $news_id);
        $this->db->update('news_position');

        if ($this->session->userdata['user_type'] == 1) {
            redirect("admin/news_list/user_interface");
        } else {
            redirect("admin/news_list/newses");
        }
    }




}

