<?php defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller {

   
    public function __construct() {

        parent::__construct();

        $session_id = $this->session->userdata('session_id'); 
        $user_type = $this->session->userdata('user_type'); 

        if($session_id == NULL ) {
            redirect('admin/sign_out');
        }
        $this->load->model("admin/User_model", 'um');

    }

   
    public function index() {

        $time_stamp = time();   
        $post_date  = date('Y-m-d', $time_stamp);
        $name       = $this->input->post('r_name',TRUE);
        $page_name  = $this->input->post('page_name',TRUE);
        $news_id    = $this->input->post('news_id',TRUE);
        $formdate   = $this->input->post('formdate',TRUE);
        $todate     = $this->input->post('todate',TRUE);

        if($news_id!=NULL){
            @$where = "news_mst.news_id='" . $news_id . "'";
        }
        elseif(!empty($formdate AND $todate)){
              @$f = date('Y-m-d',strtotime($formdate));
              @$t = date('Y-m-d',strtotime($todate));
              @$where="news_mst.post_date BETWEEN '$f' AND '$t'";  
       }
        elseif($name!=NULL){
            @$where = "news_mst.post_date='" . $post_date . "'";
            @$where .= "AND news_mst.post_by='" . $name . "'";
        }elseif($page_name!=NULL) {
           @$where = "news_mst.post_date='" . $post_date . "'";
           @$where.=" AND news_mst.page='" . $page_name . "'";
        }
        else{
            @$where = " post_date='" . $post_date . "'";
        }

        $query = $this->db->query("SELECT news_mst.*, user_info.name FROM news_mst  JOIN  user_info ON user_info.id = news_mst.post_by WHERE $where  ORDER BY news_mst.id DESC");        
        $data['cat'] = $this->db->select("*")->from('categories')->order_by('position','ASC')->get()->result();
        $data['reporter'] = $this->db->select()->from('user_info')->get()->result();
        $data['pp']= $query->result_array();
        $this->load->view('admin/_header');
        $this->load->view('admin/_top_menu');
        $this->load->view('admin/reporter/__reports_news_list',$data);
        $this->load->view('admin/_footer');
    }


    public function registration() {
        $this->load->view('admin/includes/__header');
        $this->load->view('admin/reporter/__add_new_registration');
        $this->load->view('admin/includes/__footer');
    }



    public function create_new_reporter() {

        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', display('email'),'required|valid_email|is_unique[user_info.email]|max_length[100]');
        $this->form_validation->set_rules('name', display('name'),'trim|required|xss_clean');
        $this->form_validation->set_rules('mobile', display('mobile'),'trim|required|xss_clean');
        $this->form_validation->set_rules('user_type', 'User type','trim|required|xss_clean');
        
        $postData = array(
            'name'          => $this->input->post('name',TRUE),
            'pen_name'      => $this->input->post('nick_name',TRUE),
            'email'         => $this->input->post('email',TRUE),
            'mobile'        => $this->input->post('mobile',TRUE),
            'password'      => md5($this->input->post('password',TRUE)),
            'sex'           => $this->input->post('sex',TRUE),
            'blood'         => $this->input->post('blood',TRUE),
            'birth_date'    => $this->input->post('birth_date',TRUE),
            'address_one'   => $this->input->post('address_one',TRUE),
            'address_two'   => $this->input->post('address_two',TRUE),
            'city'          => $this->input->post('city',TRUE),
            'user_type'     => $this->input->post('user_type',TRUE),
            'state'         => $this->input->post('state',TRUE),
            'country'       => $this->input->post('country',TRUE),
            'zip'           => $this->input->post('zip',TRUE),
            'verification_id_no'    => $this->input->post('verification_id_no',TRUE),
            'verification_type'     => $this->input->post('verification_type',TRUE),
            'status'     => 1,
        );



        if($this->form_validation->run() == FALSE){

            $data['r'] = (object)$postData;

            $this->load->view('admin/includes/__header');
            $this->load->view('admin/reporter/__add_new_registration',$data);
            $this->load->view('admin/includes/__footer');

        }else{

            $this->db->insert('user_info', $postData);
            $this->session->set_flashdata('message', display('user_reagistration_message'));
            redirect('admin/users/registration');
        }
      
    }



    public function last_20_access() {

        $this->db->select("*");
        $this->db->from('ci_sessions');
        $this->db->limit(20);
        $data['last_access'] =  $this->db->get()->result();


        $this->load->view('admin/includes/__header');
        $this->load->view('admin/reporter/__last_access',$data);
        $this->load->view('admin/includes/__footer');

        
    }


    public function clearlog() {

        $this->db->query("DELETE FROM ci_sessions");
        $this->session->set_flashdata("message", 'Log Cleared Successfully.');
        redirect('admin/users/last_20_access');
    }


    public function repoter_list() {

        $user_type = $this->session->userdata('user_type'); 

        $data['query'] = $this->db->Select("*")->from('user_info')
            ->where_not_in('user_type',3)
            ->where('user_type',1)
            ->or_where('user_type',2)
            ->or_where('user_type',4)
            ->get()->result_array();
         

        $this->load->view('admin/includes/__header',$data);
        $this->load->view('admin/reporter/__view_repoter_list');
        $this->load->view('admin/includes/__footer');


    }
    

    public function repoter_delete() {
        $id = $this->uri->segment(4);
        $this->db->delete('user_info', array('id' => $id));
        redirect("admin/users/repoter_list");
    }

    public function repoter_status_edit() {
        $id = $this->uri->segment(4);
        $status = ($this->uri->segment(5) == 1) ? 0 : 1;
        $data_arr = array('status' => $status);
        $this->db->where('id', $id);
        $this->db->update('user_info', $data_arr);

        $this->session->set_flashdata('message',display('update_message'));
        redirect("admin/users/repoter_list");
    }



    public function repoter_type_edit() {
        $id = $this->uri->segment(4);
        $status = ($this->uri->segment(5) == 3) ? 1 : 3;
        $data_arr = array('user_type' => $status);
        $this->db->where('id', $id);
        $this->db->update('user_info', $data_arr);
        redirect("admin/users/repoter_list");
    }

    public function repoter_post_approval_status(){
        $id = $this->uri->segment(4);
        $status = ($this->uri->segment(5) == 1) ? 0 : 1;
        $data_arr = array('post_ap_status' => $status);
        $this->db->where('id', $id);
        $this->db->update('user_info', $data_arr);
        redirect("admin/users/repoter_list");
    }    


    public function repoter_edit($reporter_id) {

        $data['user_info'] = $this->db->where('id',$reporter_id)->get('user_info')->row();
        $this->load->view('admin/includes/__header', $data);
        $this->load->view('admin/reporter/__view_repoter_edit');
        $this->load->view('admin/includes/__footer');

    }


    public function update_reporter_info() {

        $id = $this->input->post('id');

        if (isset($id)) {

            $postData = array(
                'name'          => $this->input->post('name',TRUE),
                'pen_name'     => $this->input->post('nick_name',TRUE),
                'email'         => $this->input->post('email',TRUE),
                'mobile'        => $this->input->post('mobile',TRUE),
                'sex'           => $this->input->post('sex',TRUE),
                'blood'         => $this->input->post('blood',TRUE),
                'birth_date'    => $this->input->post('birth_date',TRUE),
                'address_one'   => $this->input->post('address_one',TRUE),
                'address_two'   => $this->input->post('address_two',TRUE),
                'city'          => $this->input->post('city',TRUE),
                'state'         => $this->input->post('state',TRUE),
                'country'       => $this->input->post('country',TRUE),
                'zip'           => $this->input->post('zip',TRUE),
                'verification_id_no'    => $this->input->post('verification_id_no',TRUE),
                'verification_type'     => $this->input->post('verification_type',TRUE),
                'status'     => 1,
            );

            $this->db->where('id', $id);
            $this->db->update('user_info', $postData);

            $this->session->set_flashdata('message', display('update_message'));
        }

        redirect('admin/users/repoter_list');

    }


    public function clear_log(){
        $this->db->empty_table('ci_sessions');
        $this->session->set_flashdata('message','Clear  successfully!');
        redirect('login');
    }




}
