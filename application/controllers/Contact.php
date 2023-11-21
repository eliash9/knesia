<?php defined('BASEPATH') or exit('No direct script access allowed');

class Contact extends CI_Controller {

    #---------------------------------------    
    # construction function
    #---------------------------------------    
    public function __construct() {
        parent::__construct();
        // loading model
        $this->load->model('ads','ads');
        $this->load->model("settings");
        $this->load->model('home_model', 'hm');
        $this->load->model('Pb_function', 'pb');
        $this->load->model('All_cata', 'cata');
        $this->load->model('Common_model', 'cm');
        $this->load->model('Write_setting_model', 'wsm');
    }

    #-----------------------------------
    public function index(){
     
        $data['home_page_positions'] = $this->wsm->home_category_position();

        $data['setting']                = $this->db->get('app_settings')->row();
        $data['meta']                   = json_decode($this->settings->get_previous_settings('settings', 5));
        $data['social_link']            = json_decode($this->settings->get_previous_settings('settings', 111));
        $data['social_page']            = json_decode($this->settings->get_previous_settings('settings', 6));

        $data['default_theme'] = $this->wsm->theme_data();
        $data['lan'] = $this->wsm->lan_data();
        $default_theme = $data['default_theme'];

        #--------------------------------------
        $data['contact_page_setup'] = $this->settings->get_previous_settings('settings', 113);
       
        $data['ln'] = $this->cm->latest_news();
        $data['bn'] = $this->cm->breaking_news();
        $data['mr'] = $this->cm->most_read_dbse();

        $data['main_menu']      = $this->settings->main_menu();
        $data['cat_menus']      = $this->settings->footer_menu();
        $data['footer_menu']    = $this->settings->menu_position_3();


        $this->load->view('themes/' . $default_theme . '/header', $data);
        $this->load->view("themes/" . $default_theme . "/breaking");
        $this->load->view('themes/' . $default_theme . '/menu');
        $this->load->view('themes/' . $default_theme . '/view_contact');
        $this->load->view('themes/' . $default_theme . '/footer');
    
    }



    #------------------------------
    # ContactUs
    #-------------------------------
    public function contacts() {
        
        
        $this->form_validation->set_rules('first_name', 'First name ', 'trim|required|xss_clean');
        $this->form_validation->set_rules('last_name', 'Last name ', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'Email ', 'trim|required|xss_clean|valid_email');
        $this->form_validation->set_rules('subject', 'Subject ', 'trim|required|xss_clean');
        $this->form_validation->set_rules('message', 'Message', 'trim|required|xss_clean');
        
        if ($this->form_validation->run() == FALSE) { 
        #---------------------
        # website setting data   


            $data['setting']                = $this->db->get('app_settings')->row();
            $data['meta']                   = json_decode($this->settings->get_previous_settings('settings', 5));
            $data['social_link']            = json_decode($this->settings->get_previous_settings('settings', 111));
            $data['social_page']            = json_decode($this->settings->get_previous_settings('settings', 6));
            
            $data['default_theme'] = $this->wsm->theme_data();
            $data['lan'] = $this->wsm->lan_data();
            $default_theme = $data['default_theme'];
            #--------------------------
            $data['ln'] = $this->cm->latest_news();
            $data['bn'] = $this->cm->breaking_news();
            $data['contact_page_setup'] = $this->settings->get_previous_settings('settings', 113);
            
            $data['main_menu']      = $this->settings->main_menu();
            $data['cat_menus']          = $this->settings->footer_menu();
            $data['footer_menu']    = $this->settings->menu_position_3();

            $this->load->view('themes/' . $default_theme . '/header', $data);
            $this->load->view("themes/" . $default_theme . "/breaking");
            $this->load->view('themes/' . $default_theme . '/menu');
            $this->load->view('themes/' . $default_theme . '/view_contact');
            $this->load->view('themes/' . $default_theme . '/footer');            
        
        } else {

                $contact = $this->settings->get_previous_settings('settings', 113);
                $contact_emmail = json_decode($contact);

                $first_name     = $this->input->post('first_name',TRUE);
                $last_name      = $this->input->post('last_name',TRUE);
                $email          = $this->input->post('email',TRUE);
                $subject        = $this->input->post('subject',TRUE);
                $messages       = $this->input->post('message',TRUE);
                $this->load->library('email',TRUE);
                
                $config['protocol'] = 'sendmail';
                $config['mailpath'] = '/usr/sbin/sendmail';
                $config['charset'] = 'utf-8';
                $config['wordwrap'] = TRUE;
                $config['mailtype'] = 'html';
                $this->email->initialize($config);

                //send email 
                $this->load->library('email', array('mailtype'=>'html'));
                $this->email->from($email,"NewsPaper365");
                $this->email->to(@$contact_emmail->email);
                $this->email->subject($subject);
                $message = "<p>". $messages ."</p>";
                $this->email->message($message);

                if (!$this->email->send()) {
                    //error
                    $this->session->set_flashdata('exception', 'There is error in sending mail! Please try again later');
                    redirect("contact/index");
                } else {
                    // mail sent
                    $this->session->set_flashdata('message', display('contact_message'));
                    redirect("contact/index");
                }
         }
    }

}
