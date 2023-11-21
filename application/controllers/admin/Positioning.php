<?php defined('BASEPATH') or exit('No direct script access allowed');

class Positioning extends CI_Controller {
 

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

        $this->load->model("admin/category_model");
        $this->load->model("admin/positioning_model");

    }



    #----------------------------------------
    # To view position according to Category
    #----------------------------------------    
    public function index() {

        if ($this->input->post('category',TRUE)) {
            $category = $this->input->post('category',TRUE);
        } elseif ($this->uri->segment(4)) {
            $category = $this->uri->segment(4);
        } else {
            $category = 'home';
        }

        $data['selected_category']  = $category;
        $data['categories']         = $this->category_model->all_categories();
        $data['newses']             = $this->positioning_model->get_newses_with_position($category);


        $this->load->view('admin/includes/__header', $data);
        $this->load->view('admin/news/__veiw_positioning');
        $this->load->view('admin/includes/__footer');

    }


    #-----------------------------
    #   To update positioning
    #-----------------------------
    public function update_positioning() {
        
        $positions = $this->input->post('position',TRUE);
        if (isset($positions) && is_array($positions)) {
            foreach ($positions as $key => $value) {
                $positions_with_news_ID['id'] = $key;
                $positions_with_news_ID['position'] = $value;
            }
            $this->positioning_model->update_positions_by_id($positions);
            $this->session->set_flashdata('message', display('update_message'));
            redirect('admin/positioning/index/' . $this->input->post('category',TRUE), 'refresh');
        }
    }

    #---------------------------------------
    #     Delete position by ID
    #---------------------------------------    
    public function delete_positionbyid($id) {

        $this->positioning_model->delete_single_position($id);
        $this->session->set_flashdata('message', display('delete_message'));
        redirect('admin/positioning/');
    }

}

