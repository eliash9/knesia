<?php defined('BASEPATH') or exit('No direct script access allowed');

class Authentication extends CI_Controller {

  
    public function __construct() {
        parent::__construct();
       
        $this->load->model('ads');
        $this->load->model('settings');
        $this->load->model('home_model', 'hm');
        $this->load->model('Pb_function', 'pb');
        $this->load->model('All_cata', 'cata');
        $this->load->model('Common_model', 'cm');
        $this->load->model('Write_setting_model', 'wsm');
    }



    #-----------------------------------
    public function login(){

        $data = array(
            'email' => ($this->input->post('email',TRUE)),
            'password' => ($this->input->post('password',TRUE))
        );

        $this->form_validation->set_rules('email', 'E-mail', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
        
        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('exception',display('log_error_msg'));
            redirect('registration/index');

        } else {

            $query = $this->db->select('*')
            ->from('user_info')
            ->where('email', trim($data['email']))
            ->where('password', md5($data['password']))
            ->where('user_type',5)
            ->where('status', 1)
            ->get();

        

            if($query->num_rows()>0){

                $data = $query->row_array(); 

                $session_data = array(

                        'id' => $data['id'],
                        'name' => $data['name'],
                        'pen_name' => $data['pen_name'],
                        'user_type' => $data['user_type'],
                        'email' => $data['email'],
                        'session_id' => session_id(),
                        'logged_in' => TRUE
                );

                $this->session->set_userdata($session_data);

                redirect('/');

            } else{

                $this->session->set_flashdata('exception',display('log_error_msg'));
                redirect('registration/index');
            }

        }   
    
    }


public function redirect(){
   
    $user_type = $this->session->userdata('user_type');
    redirect('registration/index');
      
}  



    #-----------------------
    # pssword genaretor
    #----------------------
    function randstrGen()
    {
        $result = "";
            $chars = "0123456789";
            $charArray = str_split($chars);
            for($i = 0; $i < 5; $i++) {
                    $randItem = array_rand($charArray);
                    $result .="".$charArray[$randItem];
            }
            return $result;
    }



    #------------------------------------
    #   facebook login and registration
    #------------------------------------    
    public function facebook_login()
    {
  

        $data['user'] = array();

        // Check if user is logged in
        if ($this->facebook->is_authenticated())
        {
            // User logged in, get user details
            $user = $this->facebook->request('get', '/me?fields=id, name, email, about, age_range, birthday, cover, education, gender, hometown, languages, relationship_status, religion, photos, picture');
            if (!isset($user['error']))
            {
                $data['user'] = $user;
            }
        }
       

        $check_status = $this->db->select('*')->from('user_info')->where('email',$user['email'])->get()->row();  

        if($check_status){

            $session_data = array(

                'id' => $check_status->id,
                'name' => $check_status->name,
                'pen_name' => $check_status->pen_name,
                'user_type' => $check_status->user_type,
                'email' => $check_status->email,
                'session_id' => session_id(),
                'logged_in' => TRUE

            );

            $this->session->set_userdata($session_data);
            redirect('/');

        } else {

            $password = $this->randstrGen();

            $user_data = array(
                'name'      =>$user['name'],
                'pen_name'  =>$user['name'],
                'email'     =>$user['email'],
                'password'  =>md5($password),
                'user_type' =>5
            );
            $this->db->insert('user_info',$user_data);

            #----------------------------
            $sdata = $this->db->select('*')->from('user_info')->where('email',$user['email'])->get()->row();  
          
            $session_data = array(
                'id'            => $sdata->id,
                'name'          => $sdata->name,
                'pen_name'      => $sdata->pen_name,
                'user_type'     => $sdata->user_type,
                'email'         => $sdata->email,
                'session_id'    => session_id(),
                'logged_in'     => TRUE
            );

            $this->session->set_userdata($session_data);
            #------------------------------
            $data = array(
                'name' => $user['name'],
                'email'=>$user['email'],
                'password'=>$password
            ); 
                         
        }


        #-------------------------------------
        # website setting data        
        $data['setting']                = $this->db->get('app_settings')->row();
        $data['meta']                   = json_decode($this->settings->get_previous_settings('settings', 5));
        $data['social_link']            = json_decode($this->settings->get_previous_settings('settings', 111));
        $data['social_page']            = json_decode($this->settings->get_previous_settings('settings', 6));

        $data['default_theme'] = $this->wsm->theme_data();
        $data['lan'] = $this->wsm->lan_data();
        $default_theme = $data['default_theme'];

        $data['ln'] = $this->cm->latest_news();
        $data['bn'] = $this->cm->breaking_news();
        
        $data['ads'] = $this->ads->SelectAds();
        $data['contact_page_setup'] = $this->settings->get_previous_settings('settings', 113);
        $data['Editor'] = $this->hm->home_data('Editor-Choice');
        $data['main_menu']      = $this->settings->main_menu();
        $data['cat_menus']          = $this->settings->footer_menu();
        $data['footer_menu']    = $this->settings->menu_position_3();


        $this->load->view('themes/' . $default_theme . '/header', $data);
        $this->load->view("themes/" . $default_theme . "/breaking");
        $this->load->view('themes/' . $default_theme . '/menu');
        $this->load->view('themes/' . $default_theme . '/view_fb_registration');
        $this->load->view('themes/' . $default_theme . '/footer'); 
        
    }



    #----------------------------------------
    #       google registration and login
    #----------------------------------------    

    public function googl_login(){
     
        // Check if user is logged in
        if ($this->googleplus->getAuthenticate())
        {
            $data = $this->googleplus->getUserInfo();
        }

        $check_status = $this->db->select('*')->from('user_info')->where('email',$data['email'])->get()->row();  

        if($check_status){
            $session_data = array(
                'id' => $check_status->id,
                'name' => $check_status->name,
                'pen_name' => $check_status->pen_name,
                'user_type' => $check_status->user_type,
                'email' => $check_status->email,
                'session_id' => session_id(),
                'logged_in' => TRUE
            );


            $this->session->set_userdata($session_data);
            redirect(base_url());
            

        }else{

            $password = $this->randstrGen(); 
            $register_data = array(
                'name' => $data['name'],
                'email' => $data['email'],
                'pen_name' => $data['given_name'],
                'user_type' => 5,
                'password' => md5($password)
            );

            $this->db->insert('user_info',$register_data);

            @$sdata = $this->db->select('*')->from('user_info')->where('email',$data['email'])->get()->row();
          
            $session_data = array(
                'id'            => $sdata->id,
                'name'          => $sdata->name,
                'pen_name'      => $sdata->pen_name,
                'user_type'     => $sdata->user_type,
                'email'         => $sdata->email,
                'session_id'    => session_id(),
                'logged_in'     => TRUE
            );

            $this->session->set_userdata($session_data);

             $data = array(
                'name' => $data['name'],
                'email' => $data['email'],
                'pen_name' => $data['given_name'],
                'user_type' => 5,
                'password' => $password
            );
             
            #-------------------------------------
            # website setting data        

            $data['setting']                = $this->db->get('app_settings')->row();
            $data['meta']                   = json_decode($this->settings->get_previous_settings('settings', 5));
            $data['social_link']            = json_decode($this->settings->get_previous_settings('settings', 111));
            $data['social_page']            = json_decode($this->settings->get_previous_settings('settings', 6));
            $data['default_theme'] = $this->wsm->theme_data();
            $data['lan'] = $this->wsm->lan_data();
            $default_theme = $data['default_theme'];

            $data['ln'] = $this->cm->latest_news();
            $data['bn'] = $this->cm->breaking_news();
            $data['ads'] = $this->ads->SelectAds();

            $data['Editor'] = $this->hm->home_data('Editor-Choice');
            
            $data['main_menu']      = $this->settings->main_menu();
            $data['cat_menus']          = $this->settings->footer_menu();
            $data['footer_menu']    = $this->settings->menu_position_3();

            $this->load->view('themes/' . $default_theme . '/header', $data);
            $this->load->view("themes/" . $default_theme . "/breaking");
            $this->load->view('themes/' . $default_theme . '/menu');
            $this->load->view('themes/' . $default_theme . '/view_fb_registration');
            $this->load->view('themes/' . $default_theme . '/footer');
       } 
   
    }




    #------------------------------
    # ContactUs
    #-------------------------------
    public function registration() {
        
        $this->form_validation->set_rules('name', 'Name ', 'required');
        $this->form_validation->set_rules('email', 'Email ', 'trim|required');
        $this->form_validation->set_rules('password', 'Password ', 'trim|required');
       
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

            $data['ln'] = $this->cm->latest_news();
            $data['bn'] = $this->cm->breaking_news();
            
            $data['ads'] = $this->ads->SelectAds();
            $data['Editor'] = $this->hm->home_data('Editor-Choice');
            $data['login_url'] = $this->googleplus->loginURL();
            $data['main_menu']      = $this->settings->main_menu();
            $data['cat_menus']          = $this->settings->footer_menu();
            $data['footer_menu']    = $this->settings->menu_position_3();

            $this->load->view('themes/' . $default_theme . '/header', $data);
            $this->load->view("themes/" . $default_theme . "/breaking");
            $this->load->view('themes/' . $default_theme . '/menu');
            $this->load->view('themes/' . $default_theme . '/view_registration');
            $this->load->view('themes/' . $default_theme . '/footer');

        } else {

            $name = $this->input->post('name',TRUE);
            $email = $this->input->post('email',TRUE);
            $password = md5($this->input->post('password',TRUE));

                $check_status = $this->db->select('*')->from('user_info')->where('email',$email)->get()->row();        
                if ($check_status) {
                    $this->session->set_flashdata('exception', "You already registerd.");
                } else{
                    $user_data = array(
                        'name'      =>$name,
                        'email'     =>$email,
                        'password'  =>$password,
                        'user_type' =>5
                    );
                    $this->db->insert('user_info',$user_data);
                    $this->session->set_flashdata('message', "Registration successfully.");
                }
            redirect('registration');    
         }
    }

}
