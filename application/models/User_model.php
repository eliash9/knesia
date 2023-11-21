<?php  defined('BASEPATH') OR exit('No direct script access allowed');

class User_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function checkUserExist($data) {
        extract($data);
        $this->db->select("*");
        $this->db->from("user_info");
        $this->db->where("email", $email);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    #------------------------------------------
    #   save user
    #------------------------------------------    
    public function saveUserInfo($table_name, $user_data) {
        $this->db->insert($table_name, $user_data);
    }
    #------------------------------------------
    #   get last 20 access user
    #------------------------------------------   
    public function getLast20Access() {
        $this->db->select("*");
        $this->db->from('ci_sessions');
        $this->db->limit(20);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    #------------------------------------------
    #  clear log data 
    #------------------------------------------   
    public function clearLogData() {
        $this->db->query("DELETE FROM ci_sessions");
    }


    public function login($email, $password) {
        $this->db->select('id, email, password');
        $this->db->from('user_info');
        $this->db->where('email', $email);
        $this->db->where('password', md5($password));
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }


    function checkUserType() {
        if ($this->session->userdata('user_type')) {
            return $this->session->userdata('user_type');
        } else {
            return false;
        }
    }

    public function GetUserInfoByID($reporter_id) {
        $this->db->select('id,name,email,mobile');
        $this->db->from('user_info');
        $this->db->where('id', $reporter_id);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->row_array();
        } else {
            return false;
        }
    }
    
    public function UpdateReporterInfoById($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('user_info', $data);
    }

}

