<?php defined('BASEPATH') or exit('No direct script access allowed');

class Subscription extends CI_Controller {


    public function __construct() {

        parent::__construct();

        // loading model
        $this->load->model('ads');
        $this->load->model('settings');
        $this->load->model('home_model', 'hm');
        $this->load->model('Pb_function', 'pb');
        $this->load->model('All_cata', 'cata');
        $this->load->model('Common_model', 'cm');
        $this->load->model('Write_setting_model', 'wsm');
    }


    public function index(){

 
        $data['setting']                = $this->db->get('app_settings')->row();
        $data['meta']                   = json_decode($this->settings->get_previous_settings('settings', 5));
        $data['social_link']            = json_decode($this->settings->get_previous_settings('settings', 111));
        $data['social_page']            = json_decode($this->settings->get_previous_settings('settings', 6));

        $data['default_theme'] = $this->wsm->theme_data();
        $data['lan'] = $this->wsm->lan_data();
        $default_theme = $data['default_theme'];

        $data['ln'] = $this->cm->latest_news();
        $data['bn'] = $this->cm->breaking_news();
        $data['mr'] = $this->cm->most_read_dbse();

        $data['ads'] = $this->ads->SelectAds();
        $data['contact_page_setup'] = $this->settings->get_previous_settings('settings', 113);

        $data['main_menu']      = $this->settings->main_menu();
        $data['cat_menus']          = $this->settings->footer_menu();
        $data['footer_menu']    = $this->settings->menu_position_3();

        $data['cata'] = $this->cata->all_cata();


        $this->load->view('themes/' . $default_theme . '/header', $data);
        $this->load->view("themes/" . $default_theme . "/breaking");
        $this->load->view('themes/' . $default_theme . '/menu');
        $this->load->view('themes/' . $default_theme . '/view_subscription');
        $this->load->view('themes/' . $default_theme . '/footer');

    }


    public function save() {
        
        $this->form_validation->set_rules('name', 'Name ', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'Email ', 'trim|required|xss_clean|valid_email');
        $this->form_validation->set_rules('phone', 'Phone ', 'trim|required|xss_clean');
        $this->form_validation->set_rules('news_number', 'Numbre of news ', 'trim|required|xss_clean');


        if ($this->form_validation->run() == FALSE) { 

            $data['setting']                = $this->db->get('app_settings')->row();
            $data['meta']                   = json_decode($this->settings->get_previous_settings('settings', 5));
            $data['social_link']            = json_decode($this->settings->get_previous_settings('settings', 111));
            $data['social_page']            = json_decode($this->settings->get_previous_settings('settings', 6));


            $data['default_theme'] = $this->wsm->theme_data();
            $data['lan'] = $this->wsm->lan_data();
            $default_theme = $data['default_theme'];

            $data['ln'] = $this->cm->latest_news();
            $data['bn'] = $this->cm->breaking_news();
            $data['mr'] = $this->cm->most_read_dbse();
            $data['pull'] = $this->cm->pulling();

            $data['ads'] = $this->ads->SelectAds();
            $data['contact_page_setup'] = $this->settings->get_previous_settings('settings', 113);
            $data['Editor'] = $this->hm->home_data('Editor-Choice');
            
            $data['main_menu']      = $this->settings->main_menu();
            $data['cat_menus']          = $this->settings->footer_menu();
            $data['footer_menu']    = $this->settings->menu_position_3();
            
            $data['cata'] = $this->cata->all_cata();


            $this->load->view('themes/' . $default_theme . '/header', $data);
            $this->load->view("themes/" . $default_theme . "/breaking");
            $this->load->view('themes/' . $default_theme . '/menu');
            $this->load->view('themes/' . $default_theme . '/view_subscription');
            $this->load->view('themes/' . $default_theme . '/footer'); 


        } else {

            $name = $this->input->post('name',TRUE);
            $email = $this->input->post('email',TRUE);
            $phone = $this->input->post('phone',TRUE);
            $category = $this->input->post('category',TRUE);
            $frequency = $this->input->post('frequency',TRUE);
            $news_number = $this->input->post('news_number',TRUE);                       

                $check_status = $this->db->select('*')->from('subscription')
                ->where('phone',$phone)
                ->where('email',$email)
                ->get()->row();        
                
                if ($check_status) {
                    $this->session->set_flashdata('exception', "You already Subscription.");
                } else{

                    $user_data = array(
                        'name'              =>$name,
                        'email'             =>$email,
                        'phone'             =>$phone,
                        'category'          =>json_encode($category),
                        'frequency'         =>$frequency,
                        'number_of_news'    =>$news_number
                    ); 

                    $this->db->insert('subscription',$user_data);
                    $this->session->set_flashdata('message', "Subscription successful.");
                }

            redirect('subscription/index');    
        }
    }

    public function unsubscription($id){

        $this->db->where('md5(subs_id)',$id)->delete('subscription');
        redirect(base_url());  

    }
    

}
