<?php defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller {


    public function __construct() {
        parent::__construct();

        $session_id = $this->session->userdata('session_id'); 
        $user_type = $this->session->userdata('user_type'); 
        if($session_id == NULL ) {
            redirect('admin/sign_out');
        }
            
        if(($user_type != 4) && ($user_type != 3) ) {
            redirect('admin/sign_out');
        }
        
        $this->load->model('admin/page_model');
        $this->load->model("admin/category_model");
    }

       
    public function index() {

        $data['menu'] = $this->db->select('*')->from('menu')->get()->result();
        $this->load->view('admin/includes/__header',$data);
        $this->load->view('admin/menu/view_menu_list');
        $this->load->view('admin/includes/__footer'); 

    }


    public function udate_status(){
        $id = $this->uri->segment(4);
        $status = ($this->uri->segment(5) == 1) ? 0 : 1;
        $this->db->set('status',$status)->where('menu_id', $id)->update('menu');
        $this->session->set_flashdata('message', display('update_message'));
        redirect("admin/menu");
    }


    // save menu
    public function save_menu() {

        $check = $this->db->where('menu_position',$this->input->post('position',TRUE))->get('menu')->row();
        if(!empty($this->input->post('menu_name',TRUE)) && !empty($this->input->post('position',TRUE))){
            if(empty($check)){
                $data = array(
                    'menu_name' => $this->input->post('menu_name',TRUE),
                    'menu_position' => $this->input->post('position',TRUE)
                ); 
                $this->db->insert('menu',$data);
                echo json_encode(array("status" => 1));
            }else{
                echo json_encode(array("status" => 0));
            }
        }else{
            echo json_encode(array("status" => 2));
        }
    }


    // get update date by id
    public function edit_data($id){
        $data = $this->db->select('*')
        ->from('menu')
        ->where('menu_id',$id)
        ->get()
        ->row();
        echo json_encode($data);
    }


    public function menu_update(){
        $id = $this->input->post('id',TRUE);
        $data = array(
            'menu_name' => $this->input->post('menu_name',TRUE),
            'menu_position' => $this->input->post('position',TRUE)
            ); 
        $this->db->where('menu_id',$id)->update('menu',$data);
        echo json_encode(array("status" => TRUE));
    }

      
    // delete menu by id
    public function delete_menu($id) {
        $this->db->where('menu_id', $id);
        $this->db->delete('menu');
        echo json_encode(array("status" => TRUE));
    }


    public function setup_menu_content($menu_id=NULL){

        $data['menu_content'] = $this->db->select("*")
        ->from('menu_content')
        ->where('menu_id',$menu_id)
        ->order_by('menu_position','ASC')->get()->result(); 

        $slug = [];
        foreach ($data['menu_content'] as $key => $value) {
            if(!empty($value->slug)){
                $slug[] = $value->slug;
            }
        }
       

        $this->db->select('*');
        $this->db->from('categories');
        if($slug){
            $this->db->where_not_in('slug', @$slug);
        }
        $data['categories'] = $this->db->get()->result();


        $data['link_info'] = $this->db->select("*")
        ->from('links')
        ->get()
        ->result();

        $data['page'] = $this->page_model->all_page();
        $data['menu_id'] = $menu_id;

        $this->load->view('admin/includes/__header',$data);
        $this->load->view('admin/menu/view_setup_menu_content');
        $this->load->view('admin/includes/__footer'); 

    }



    public function savemenuone($category_id){

        $cat_info = $this->category_model->get_category_info($category_id);

        $data = array(
            'content_type'  => 'categories',
            'content_id'    => $cat_info->category_id,
            'slug'          => $cat_info->slug,
            'menu_lavel'    => $cat_info->category_name,
            'menu_id'       => 1
        );

        $this->db->insert('menu_content',$data);
        $con = $this->db->insert_id();

        $os = $this->db->where('id',1)->get('settings')->row();
        $menus = json_decode($os->details);


    }


public function save_content_menu(){
    
    $content_id = $this->input->post('content_id',TRUE);
    $menu_id = $this->input->post('menu_id',TRUE);
    if($content_id[0]==NULL){
        $this->session->set_flashdata('message', "Please select anyone");
        redirect("admin/menu/setup_menu_content/".$menu_id);
    } else{
        for($i=0; $i<count($content_id); $i++) {

            $cat_info = $this->category_model->get_category_info($content_id[$i]);
            $data = array(
                'content_type' => $this->input->post('content_type',TRUE),
                'content_id' => $cat_info->category_id,
                'slug' => $cat_info->slug,
                'menu_lavel' => $cat_info->category_name,
                'menu_id' => $this->input->post('menu_id',TRUE)
            );
            $this->db->insert('menu_content',$data);
        }
        
        $this->session->set_flashdata('message', display('menu_save_msg'));
        redirect("admin/menu/setup_menu_content/".$menu_id);
    }
}





    #-----------------------------------------------
    #   save menu content data for menu content tbl
    #-----------------------------------------------
    public function save_page_content_menu(){

        $content_id = $this->input->post('content_id',TRUE);
        $menu_id = $this->input->post('menu_id',TRUE);
        if($content_id[0]==NULL){
            $this->session->set_flashdata('message', "Please select anyone");
            redirect("admin/menu/setup_menu_content/".$menu_id);
        } else{

            for($i=0; $i<count($content_id); $i++) {
                $page_info = $this->page_model->page_by_id($content_id[$i]);
                $data = array(
                    'content_type'  => $this->input->post('content_type',TRUE),
                    'content_id'    => $page_info->page_id,
                    'slug'          => $page_info->page_slug,
                    'menu_lavel'    => $page_info->title,
                    'menu_id'       => $this->input->post('menu_id',TRUE)
                );
                $this->db->insert('menu_content',$data);
            }
            
            $this->session->set_flashdata('message', display('menu_save_msg'));
            redirect("admin/menu/setup_menu_content/".$menu_id);
        }
    }


    #-----------------------------------------------
    #   delete menu content data for menu content tbl
    #-----------------------------------------------
    public function delete_content_menu($id){
        $this->db->where('menu_content_id', $id);
        $this->db->delete('menu_content');
        echo json_encode(array("status" => TRUE));
    }


    #-----------------------------------------------
    #   get menu content data for ajax 
    #-----------------------------------------------
    public function content_menu_data($id){
         $data = $this->db->select("*")
        ->from('menu_content')
        ->where('menu_content_id',$id)
        ->get()
        ->row(); 
        echo json_encode($data);
    }

    #-----------------------------------------------
    #   Content_menu_update
    #-----------------------------------------------
    public function content_menu_update(){

        $id = $this->input->post('id',TRUE);
        $data = array(
            'menu_lavel'    => $this->input->post('lavel',TRUE),
            'menu_position' => $this->input->post('position',TRUE),
            'link_url'      => $this->addhttp($this->input->post('link',TRUE)),
            'parents_id'    => $this->input->post('parent_id',TRUE),
        ); 
       $this->db->where('menu_content_id',$id)->update('menu_content',$data);
       echo json_encode(array("status" => TRUE));

    }

    #----------------------------------
    #      To add http dynamically
    #----------------------------------
    function addhttp($url) {
        if($url!=NULL){
            if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
                $url = "http://" . $url;
            }
            return $url;
        }else{
            return $url;
        }
    }

    #-----------------------------------------------
    #   Save_link
    #---------------------------------------------
    public function save_link(){
        $linkdata = array(
            'link_level' => $this->input->post('lavel',TRUE),
            'link_url' => $this->addhttp($this->input->post('link',TRUE)),
        );
        $this->db->insert('links',$linkdata);
        $content_id = $this->db->insert_id(); 

        $data = array(
            'menu_lavel'    => $this->input->post('lavel',TRUE),
            'content_type'  => 'links',
            'content_id'    => $content_id,
            'menu_position' => $this->input->post('position',TRUE),
            'menu_id'       => $this->input->post('menu_id',TRUE),
            'link_url'      => $this->addhttp($this->input->post('link',TRUE)),
        ); 

        $this->db->insert('menu_content',$data);
        echo json_encode(array("status" => TRUE));
    }

    #-----------------------------------------------
    #   Add_link_with_content
    #---------------------------------------------
    public function add_link_with_content(){

        $content_id = $this->input->post('content_id',TRUE);
        $menu_id    = $this->input->post('menu_id',TRUE);

        if($content_id[0]==NULL){
            $this->session->set_flashdata('message', "Please select anyone");
            redirect("admin/menu/setup_menu_content/".$menu_id);
        } else{

            for($i=0; $i<count($content_id); $i++) {

                $linkdata = $this->db->select("*")
                    ->from('links')
                    ->where('link_id',$content_id[$i])->get() ->row();

                $data = array(
                    'content_type'  => 'links',
                    'link_url'      => $linkdata->link_url,
                    'menu_lavel'    => $linkdata->link_level,
                    'menu_id'       => $this->input->post('menu_id',TRUE)
                );
                $this->db->insert('menu_content',$data);
            }
            $this->session->set_flashdata('message', display('menu_save_msg'));
            redirect("admin/menu/setup_menu_content/".$menu_id);
        }
    }

    #---------------------------------------
    #   update menu content position
    #---------------------------------------

    public function update_content_position(){
        $id = $this->input->post('id',TRUE);
        $position = $this->input->post('position',TRUE);

        for($i = 0; $i<count($position); $i++){
            $ds = array('menu_position' => $position[$i],);
           $this->db->where('menu_content_id',$id[$i])
           ->update('menu_content',$ds);
        }
       echo json_encode(array("status" => TRUE));
    }


    public function drag_drop_update(){

            $ids = $this->input->post('id',TRUE);
            $i=1;
            foreach ($ids as  $value) {
                $this->db->set('menu_position',$i)
                ->where('menu_content_id',$value)
                ->update('menu_content');
                 $i++;
            }
            $this->sitemap_xml();
            echo json_encode(array("status" => TRUE));
     
    }


    #-------------------------------
    # create rss.xml
    public function sitemap_xml(){

        @$info = $this->db->select('*')->from("menu_content")->get()->result();

        $xml ="<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
        $xml.="<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n";
        $xml.="
                <url>
                    <loc>" . base_url()."</loc>
                    <changefreq> always </changefreq>
                    <priority>1.0</priority>    
                </url>\n";
                
        foreach ($info as $key => $row) {
            
            if($row->slug!=''){
            $xml.="
                <url>
                    <loc>" . base_url().html_escape(@$row->slug) . "</loc>
                    <changefreq> always </changefreq>
                    <priority>1.0</priority>    
                </url>\n";
            }   
        }

        $xml.="</urlset>\n";
        $file = fopen("rss/sitemap.xml","w");
        fwrite($file,$xml);
        fclose($file);
    }  


}
