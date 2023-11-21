<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Language extends CI_Controller {

    private $table  = "language";
    private $phrase = "phrase";

    public function __construct()
    {
        parent::__construct();  
        $this->load->database();
        $this->load->dbforge(); 
        $this->load->helper('language');
        $session_id = $this->session->userdata('session_id'); 
        $user_type = $this->session->userdata('user_type'); 
        if($session_id == NULL ) {
         redirect('logout');
        }
        if(($user_type!=3) AND ($user_type!=4)) {
            redirect('admin/sign_out');
        } 
    } 



    public function index()
    {

        $data['active_lang']    = $this->db->select('*')->from('lg_setting')->get()->row();
        $data['languages']    = $this->languages(); 

        $this->load->view('admin/includes/__header');
        $this->load->view('admin/language/main',$data);
        $this->load->view('admin/includes/__footer');

    }



    public function phrase()
    {


        $data['title']     = "Phrase List"; 
        #
        #pagination starts
        #
        $config["base_url"]       = base_url('admin/language/phrase/'); 
        $config["total_rows"]     = $this->db->count_all('language'); 
        $config["per_page"]       = 25;
        $config["uri_segment"]    = 4; 
        $config["num_links"]      = 4;  


        $config["last_link"] = false; 
        $config["first_link"] = false; 
        $config['next_link'] = '→';
        $config['prev_link'] = '←'; 
        $config['full_tag_open'] = "<ul class='pagination justify-content-center'>";
        $config['full_tag_close'] = "</ul>"; 
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tagl_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tagl_close'] = '</li>';
        $config['first_tag_open'] = "<li class='page-item disabled'>";
        $config['first_tagl_close'] = "</a></li>";
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tagl_close'] = '</a></li>';
        $config['attributes'] = array('class' => 'page-link'); 
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data["phrases"] = $this->phrases($config["per_page"], $page); 
        $data["links"] = $this->pagination->create_links(); 
        #
        #pagination ends
        # 
        $data['languages']    = $this->languages();

        $this->load->view('admin/includes/__header');
        $this->load->view('admin/language/phrase',$data);
        $this->load->view('admin/includes/__footer');


    }
 

    public function languages()
    { 
        if ($this->db->table_exists($this->table)) { 
            $fields = $this->db->field_data($this->table);
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


    public function addLanguage()
    { 
        $language = preg_replace('/[^a-zA-Z0-9_]/', '', $this->input->post('language',TRUE));
        $language = strtolower($language);

        if (!empty($language)) {
            if (!$this->db->field_exists($language, $this->table)) {
                $this->dbforge->add_column($this->table, [
                    $language => [
                        'type' => 'TEXT'
                    ]
                ]); 
                $this->session->set_flashdata('message', 'Language added successfully');
                redirect('admin/language');
            } 
        } else {
            $this->session->set_flashdata('exception', 'Please try again');
        }
        redirect('admin/language');
    }


    public function editPhrase($language = null)
    { 

        $phrase = $this->input->post('phrase',TRUE);

        if(!empty($phrase)){
           $this->db->like($this->phrase,$phrase); 
        }


        if(!empty($phrase)){
            $this->db->like($this->phrase,$phrase); 
        }
        $total_rows = $this->db->get($this->table)->num_rows();
        


        $this->load->library('pagination');
        #------------------#
        $data['title']     = "Edit Phrase";
        $data['module']    = "dashboard";
        $data['language']   = $language;
        $data['page']      = "language/phrase_edit";
        #
        #pagination starts
        #
        $config["base_url"]       = base_url('admin/language/editPhrase/'. $language); 
        $config["total_rows"]     = $total_rows; 
        $config["per_page"]       = 25;
        $config["uri_segment"]    = 5; 
        $config["num_links"]      = 5;  

        $config["last_link"] = false; 
        $config["first_link"] = false; 
        $config['next_link'] = '→';
        $config['prev_link'] = '←'; 
        $config['full_tag_open'] = "<ul class='pagination justify-content-center'>";
        $config['full_tag_close'] = "</ul>"; 
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tagl_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tagl_close'] = '</li>';
        $config['first_tag_open'] = "<li class='page-item disabled'>";
        $config['first_tagl_close'] = "</a></li>";
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tagl_close'] = '</a></li>';
        $config['attributes'] = array('class' => 'page-link'); 

        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
        $data["phrases"] = $this->phrases($config["per_page"], $page,$phrase); 
        $data["links"] = $this->pagination->create_links(); 
        #
        #pagination ends
        #

        $this->load->view('admin/includes/__header');
        $this->load->view('admin/language/phrase_edit',$data);
        $this->load->view('admin/includes/__footer');

    }



    public function addPhrase() {  

        $lang = $this->input->post('phrase',TRUE); 

        if (sizeof($lang) > 0) {

            if ($this->db->table_exists($this->table)) {

                if ($this->db->field_exists($this->phrase, $this->table)) {

                    foreach ($lang as $value) {

                        $value = preg_replace('/[^a-zA-Z0-9_]/', '', $value);
                        $value = strtolower($value);

                        if (!empty($value)) {
                            $num_rows = $this->db->get_where($this->table,[$this->phrase => $value])->num_rows();

                            if ($num_rows == 0) { 
                                $this->db->insert($this->table,[$this->phrase => $value]); 
                                $this->session->set_flashdata('message', 'Phrase added successfully');
                            } else {
                                $this->session->set_flashdata('exception', 'Phrase already exists!');
                            }
                        }   
                    }  

                    redirect('admin/language/phrase');
                }  

            }
        } 

        $this->session->set_flashdata('exception', 'Please try again');
        redirect('admin/language/phrase');
    }



 
    public function phrases($offset=null, $limit=null,$phrase=null)
    {
        if ($this->db->table_exists($this->table)) {

            if ($this->db->field_exists($this->phrase, $this->table)) {


                if(!empty($phrase)){
                    $this->db->like($this->phrase,$phrase); 
                }
                $this->db->order_by($this->phrase,'asc');
                $this->db->limit($offset, $limit);
                $result = $this->db->get($this->table)->result();
                return $result;


            }  
        } 

        return false;
    }




    public function addLebel() { 

        $language = $this->input->post('language', TRUE);
        $phrase   = $this->input->post('phrase', TRUE);
        $lang     = $this->input->post('lang', TRUE);

        if (!empty($language)) {

            if ($this->db->table_exists($this->table)) {

                if ($this->db->field_exists($language, $this->table)) {

                    if (sizeof($phrase) > 0)
                    for ($i = 0; $i < sizeof($phrase); $i++) {
                        $this->db->where($this->phrase, $phrase[$i])
                            ->set($language,$lang[$i])
                            ->update($this->table); 

                    }  
                    $this->session->set_flashdata('message', 'label update successfully');
                   redirect('admin/language/editPhrase/'.$language);

                }  

            }
        } 

        $this->session->set_flashdata('exception', 'Please try again');
        redirect('admin/language/editPhrase/'.$language);
    }
    
    public function switch_lang($lang=NULL)
    { 
        $data = array('language' => strtolower($lang));
        $this->db->update('lg_setting',$data);
        $this->session->set_flashdata('message', $lang .' is active successfully!');
        redirect('admin/language');
    }

    
}



 