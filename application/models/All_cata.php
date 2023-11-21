<?php  defined('BASEPATH') OR exit('No direct script access allowed');
class All_cata extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function all_cata() {
        $this->db->select('*');
        $this->db->from("categories");
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

}

?>