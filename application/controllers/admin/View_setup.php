<?php defined('BASEPATH') or exit('No direct script access allowed');

class View_setup extends CI_Controller {


    public function __construct() {

        parent::__construct();
        $user_type = $this->session->userdata('user_type'); 
        $session_id = $this->session->userdata('session_id'); 
        if(($user_type != 4) && ($user_type != 3) ) {
            redirect('admin/sign_out');
        }

        $this->load->model("admin/view_setting_model");
        $this->load->model("admin/category_model");
        $this->load->model('admin/archive_model');

    }


    public function app_setting(){

        $data['settings'] = $this->db->get('app_settings')->row();
        $this->load->view('admin/includes/__header');
        $this->load->view('admin/settings/__app_setting',$data);
        $this->load->view('admin/includes/__footer');

    }


    public function app_settings_save(){

        //logo upload
        $logo = $this->fileupload->do_upload(
            'uploads/images/',
            'website_logo'
        );

        //if logo is not uploaded
        if ($logo === false) {
            $this->session->set_flashdata('exception', 'Invalid logo');
        }

        if ($logo !== false && $logo != null) {
            $logo = $logo;
        }else{
            $logo = $this->input->post('website_logo_old',TRUE);
        }



        //footer_logo upload
        $footer_logo = $this->fileupload->do_upload(
            'uploads/images/',
            'footer_logo'
        );

        //if logo is not uploaded
        if ($footer_logo === false) {
            $this->session->set_flashdata('exception', 'Invalid footer logo');
        }

        if ($footer_logo !== false && $footer_logo != null) {
            $footer_logo = $footer_logo;
        }else{
            $footer_logo = $this->input->post('footer_logo_old',TRUE);
        }


        //favicon upload
        $favicon = $this->fileupload->do_upload(
            'uploads/images/',
            'favicon'
        );

        //if logo is not uploaded
        if ($favicon === false) {
            $this->session->set_flashdata('exception', 'Invalid favicon');
        }

        // if favicon is uploaded then resize the favicon
        if ($favicon !== false && $favicon != null) {
            $this->fileupload->do_resize(
                $favicon, 
                32,
                32
            );
        }else{
            $favicon = $this->input->post('favicon_old',TRUE);
        }
        




        $app_logo = $this->fileupload->do_upload(
            'uploads/images/',
            'app_logo'
        );

        //if app_logo is not uploaded
        if ($app_logo === false) {
            $this->session->set_flashdata('exception', 'Invalid app logo');
        }

        if ($app_logo !== false && $app_logo != null) {
            $this->fileupload->do_resize(
                $app_logo, 
                210,
                52
            );
        }else{
            $app_logo = $this->input->post('app_logo_old',TRUE);
        }




        $mobile_menu_image = $this->fileupload->do_upload(
            'uploads/images/',
            'mobile_menu_image'
        );

        //if app_logo is not uploaded
        if ($mobile_menu_image === false) {
            $this->session->set_flashdata('exception', 'Invalid mobile menu image');
        }

        if ($mobile_menu_image !== false && $mobile_menu_image != null) {
            $this->fileupload->do_resize(
                $mobile_menu_image, 
                845,
                1334
            );
        }else{
            $mobile_menu_image = $this->input->post('mobile_menu_image_old',TRUE);
        }


        $settingData = array(
            'website_title'     => $this->input->post('website_title',TRUE),
            'footer_text'       => $this->input->post('footer_text',TRUE),
            'copy_right'        => $this->input->post('copy_right',TRUE),
            'logo'              => @$logo,
            'footer_logo'       => $footer_logo,
            'favicon'           => @$favicon,
            'app_logo'          => @$app_logo,
            'mobile_menu_image'          => @$mobile_menu_image,
            'time_zone'         => $this->input->post('time_zone',TRUE),
            'ltl_rtl'           => $this->input->post('ltl_rtl',TRUE)
        );

        $id = $this->input->post('id');

        if(!empty($id)){
            $this->db->where('id',$id)->update('app_settings',$settingData);
            $this->session->set_flashdata('message', display('update_message'));
        }else{
            $this->db->insert('app_settings',$settingData);
            $this->session->set_flashdata('message', display('save_message'));
        }

        
        redirect('admin/view_setup/app_setting');

    }


    public function social_link(){

        $data['s_link'] = json_decode($this->view_setting_model->get_previous_settings('settings', 111));
        $this->load->view('admin/includes/__header');
        $this->load->view('admin/settings/__social_link',$data);
        $this->load->view('admin/includes/__footer');

    }


    public function social_link_save() {

        $S_data ['id'] = 111;
        $S_data ['event'] = 'social_link';
        

        $post['fb'] = $this->input->post('fb',TRUE);
        $post['tw'] = $this->input->post('tw',TRUE);
        $post['linkd'] = $this->input->post('linkd',TRUE);
        $post['google'] = $this->input->post('google',TRUE);
        $post['pin'] = $this->input->post('pin',TRUE);
        $post['vimo'] = $this->input->post('vimo',TRUE);
        $post['youtube'] = $this->input->post('youtube',TRUE);
        $post['flickr'] = $this->input->post('flickr',TRUE);
        $post['vk'] = $this->input->post('vk',TRUE);

        $S_data ['details'] = json_encode($post);
        

        $check_settings_exist = $this->view_setting_model->Check_settings_exist('settings', 111);

        if ($check_settings_exist == 0) {
            $this->db->insert('settings', $S_data);
            $this->session->set_flashdata('message','Save Successfully');
            redirect("admin/view_setup/social_link");
        } else {
            $this->db->where('id',111);
            $this->db->update('settings', $S_data);

            $this->session->set_flashdata('message','Updated Successfully');
            redirect("admin/view_setup/social_link");
        }
        
    }




    public function email_setting(){

        $data['email_config'] = $this->db->select('*')->get('email_config')->row();
        
        $this->load->view('admin/includes/__header',$data);
        $this->load->view('admin/settings/__email_config');
        $this->load->view('admin/includes/__footer');

    }



    public function email_config() {

            $data = array (
                'smtp_protocol' => $this->input->post('protocol',TRUE),
                'smtp_host' => $this->input->post('host',TRUE),
                'smtp_port' => $this->input->post('port',TRUE),
                'smtp_username' => $this->input->post('username',TRUE),
                'smtp_password' => $this->input->post('password',TRUE),
                'smtp_mailtype' => $this->input->post('mailtype',TRUE),
                'smtp_charset' => $this->input->post('charset',TRUE),
                'status' => ($this->input->post('status')?'1':0)
                
            );

            $id = $this->input->post('id');
            $this->db->where('id',$id)->update('email_config',$data);

        $this->session->set_flashdata('message','Updated Successfully');
        redirect("admin/view_setup/email_setting");
    }



    public function theme(){

        $theme_dir = 'application/views/themes/';
        $dir_folders = scandir($theme_dir);
        $themes = array();
        foreach ($dir_folders as $key => $value) {
            if ($value === '.' or $value === '..')
                continue;
            $themes[] = $value;
        }
        $data['themes'] = $themes; 

        $this->load->view('admin/includes/__header',$data);
        $this->load->view('admin/settings/__theme');
        $this->load->view('admin/includes/__footer');

    }



    public function active_theme($theme_name = '') {

        $data['default_theme'] = $theme_name;
        $JSON_data = json_encode($data);
        $settings_data['id'] = 16;
        $settings_data['event'] = 'default_theme';
        $settings_data['details'] = $JSON_data;

        $num_rows = $this->view_setting_model->check_settings_exist('settings', 16);
        
        if ($num_rows == 0) {
            // insert into DB
            $this->view_setting_model->save_settings('settings', $settings_data);
        } else {
            // update previous settings
            $this->view_setting_model->update_table_by_data('settings', $settings_data, 16);
        }

        $this->session->set_flashdata('message','Theme Active Successfully');
        redirect("admin/view_setup/theme");
        
    }


    public function home_view_settings() {
      
        $data['categories'] = $this->view_setting_model->get_all_categories();
        $data['home_page_settings'] = json_decode($this->view_setting_model->get_previous_settings('settings', 4));  

        $this->load->view('admin/includes/__header');
        $this->load->view('admin/settings/__home_page_settings',$data);
        $this->load->view('admin/includes/__footer');


    }


    public function save_home_page_settings() {
        
        $data['position_no'] = $this->input->post('position_no',TRUE);
        $data['category_id'] = $this->input->post('category_name',TRUE);
        $data['max_news'] = $this->input->post('max_news',TRUE);

        if ($data['position_no'] == '' || $data['category_id'] == '' ) {
            $this->session->set_flashdata('exception','Please enter missing fields.');
            redirect('admin/view_setup/home_view_settings');
        }else {

            $hpData['id'] = 4;
            $hpData['event'] = 'home_page_cat_style';
            $cat_info = $this->category_model->get_category_info($data['category_id']);
            $position_wise_data = array();

            $position_wise_data[$data['position_no']] = array(
                'slug' => $cat_info->slug,
                'cat_name' => $cat_info->category_name,
                'category_id' => $data['category_id'],
                'status' => 0,
            );

            //JSON FORMAT 
            $JSON_DATA = json_encode($position_wise_data);
            $hpData['details'] = $JSON_DATA;
            // check settings exist
            $settings_count = $this->view_setting_model->check_settings_exist('settings', 4);
            
            if ($settings_count == 0) {

                $this->view_setting_model->save_settings('settings', $hpData, 4);
                $this->session->set_flashdata('exception',display('setting_message'));
                redirect('admin/view_setup/home_view_settings');

            } else {
                
                $previous_data = json_decode('[' . $this->view_setting_model->get_previous_settings('settings', 4) . ']');
                
                if (count($previous_data) != 0) {

                    if (property_exists($previous_data[0], $data['position_no'])) {
                        
                        $this->session->set_flashdata("exception","Category already exist in position - <b>" . $data['position_no'] . "</b>");
                        redirect('admin/view_setup/home_view_settings');

                    } else {

                        function objectToArray($object) {
                            if (!is_object($object) && !is_array($object))
                            return $object;
                            return array_map('objectToArray', (array) $object);
                        }

                        $new_data = objectToArray($previous_data[0]);
                        $new_data[$data['position_no']] = array(
                            'slug' => $cat_info->slug,
                            'cat_name' => $cat_info->category_name,
                            'max_news' => $data['max_news'],
                            'category_id' => $data['category_id'],
                            'status' => 0,
                        );

                        $JSON_DATA = json_encode($new_data);
                        $hpData['details'] = $JSON_DATA;

                        $this->view_setting_model->update_table_by_data('settings', $hpData, 4);
                        
                        $this->session->set_flashdata('message',display('setting_message'));

                        redirect('admin/view_setup/home_view_settings');
                        
                    }

                }else {

                    $this->view_setting_model->update_table_by_data('settings', $hpData, 4);
                    $this->session->set_flashdata('message',display('setting_message'));

                    redirect('admin/view_setup/home_view_settings');
                }
            }

        }
    }



    public function update_home_page_settings() {
       

        $position_no    = $this->input->post('position_no',TRUE);
        $category_id    = $this->input->post('category_id',TRUE);
        $max_news       = $this->input->post('max_news',TRUE);
        $status         = $this->input->post('status',TRUE);
        $hpData['id']   =  4;
        $hpData['event'] = 'home_page_cat_style';

        foreach ($position_no as $key => $value) {

            $cat_info = $this->category_model->get_category_info($category_id[$value]);
            
            if (!isset($status[$value])) {
                $new_status = 0;
            } else {
                $new_status = $status[$value];
            }
            $new_data[$value] = array(
                'cat_name'      => $cat_info->category_name,
                'slug'          => $cat_info->slug,
                'max_news'      => $max_news[$value],
                'category_id'   => $category_id[$value],
                'status'        => $new_status,
            );
        }

        $details = json_encode($new_data);

        $hpData['details'] = $details;

        $this->view_setting_model->update_table_by_data('settings', $hpData, 4);

        $this->session->set_flashdata('message',display('update_message'));
            redirect("admin/view_setup/home_view_settings");

    }



    public function social_auth_setting(){

        $data['facebook'] = $this->db->select('*')->from('social_auth')->where('id=',1)->get()->row();
        $data['google'] = $this->db->select('*')->from('social_auth')->where('id=',2)->get()->row();

        $this->load->view('admin/includes/__header',$data);
        $this->load->view('admin/settings/__social_auth_setting');
        $this->load->view('admin/includes/__footer');

    }




    public function social_auth_update(){

        $id         = $this->input->post('id',TRUE);
        $app_id     = $this->input->post('app_id',TRUE);
        $app_secret = $this->input->post('app_secret',TRUE);
        $api_key    = $this->input->post('api_key',TRUE);

        $data = array(
            'app_id'        => $app_id,
            'app_secret'    => $app_secret,
            'api_key'       => $api_key
        );
        
        $this->db->where('id',$id)->update('social_auth',$data);

        $this->session->set_flashdata('message',display('update_message'));
        redirect("admin/view_setup/social_auth_setting");

        
    }
    

    public function update_status($id){

        $data = $this->db->select('status')->where('id',$id)->get('social_auth')->row();
        $new_status = ($data->status==1?'0':'1');
        $this->db->set('status',$new_status)->where('id',$id)->update('social_auth');
        $this->session->set_flashdata('message',display('update_message'));
        redirect("admin/view_setup/social_auth_setting");
    }




    public function contact_page_setup(){

        $data['contact_setting'] = json_decode($this->view_setting_model->get_previous_settings('settings', 113));
        $this->load->view('admin/includes/__header',$data);
        $this->load->view('admin/settings/__contact_page');
        $this->load->view('admin/includes/__footer');

    }


    public function save_contact_page() {

    
        $S_data ['id'] = 113;
        $S_data ['event'] = 'contact_page_setup';

        $post['content'] = $this->input->post('content',TRUE);
        $post['address'] = $this->input->post('address',TRUE);
        $post['phone'] = $this->input->post('phone',TRUE);
        $post['phone_two'] = $this->input->post('phone_two',TRUE);
        $post['email'] = $this->input->post('email',TRUE);
        $post['website'] = $this->input->post('website',TRUE);
        $post['googlemap'] = $this->input->post('googlemap',TRUE);
        $S_data ['details'] = json_encode($post);
        $check_settings_exist = $this->view_setting_model->check_settings_exist('settings', 113);
        
        if ($check_settings_exist == 0) {
            $this->view_setting_model->save_contact_page('settings', $S_data);
             $this->session->set_flashdata('message',display('update_message'));
            redirect("admin/view_setup/contact_page_setup");
        } else {
            $this->view_setting_model->update_contact_page('settings', $S_data, 113);

            $this->session->set_flashdata('message',display('update_message'));
            redirect("admin/view_setup/contact_page_setup");

        }

    }



    public function languageList(){ 

        if ($this->db->table_exists("language")) { 

                $fields = $this->db->field_data("language");

                $i = 1;
                foreach ($fields as $field)
                {  
                    if ($i++ > 2)
                    $result[$field->name] = ucfirst($field->name);
                }

                if (!empty($result)) return $result;
 
        } else {

            return false; 
            
        }
    }


    public function rss_sitemap(){

        $this->load->view('admin/includes/__header');
        $this->load->view('admin/settings/__rss_sitemap');
        $this->load->view('admin/includes/__footer');

    }



}

