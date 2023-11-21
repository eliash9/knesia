<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Write_setting_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function objectToArray($object) {
        if (!is_object($object) && !is_array($object))
            return $object;
        return array_map('self::objectToArray', (array) $object);
    }



    public function check_settings_exist($id) {

        $query = $this->db->select('*')->from('settings')->where('id',$id)->get();

        $num_rows = $query->num_rows();

        if ($num_rows == 1) {
            $fetch_settings = $query->row();
            return $fetch_settings->details;
        } else {
            return false;
        }
    }

    #--------------------------------
    #    loanguage setup
    #--------------------------------
    public function lan_data() {
         $lan = array();
        $settings = $this->check_settings_exist(3);
        if ($settings != false) {
            $setting_details = $this->objectToArray(json_decode('[' . $settings . ']'));
            $i = 1;
            foreach ($setting_details[0] as $key => $value) {
                if ($i == count($setting_details[0])) {
                    $lan[$key] = $value;
                } else {
                   $lan[$key] = $value;
                }
                ++$i;
            }
            return $lan;
        } else {
            return '';
        }
    }

    #--------------------------------
    #   website_title
    #--------------------------------    
    public function website_title() {
        $data = '';
        $settings = $this->check_settings_exist(12);
        if ($settings != false) {
            $setting_details = $this->objectToArray(json_decode('[' . $settings . ']'));
            $data = $setting_details[0]['website_title'];
            return $data;
        } else {
            return '';
        }
    }

    #----------------------------------
    #   prayer time
    #----------------------------------    
     public function prayer_time() {
        $data = '';
        $settings = $this->check_settings_exist(18);
        if ($settings != false) {
            $setting_details = $this->objectToArray(json_decode('[' . $settings . ']'));
            $data = $setting_details[0]['prayer_time'];
            return $data;
        } else {
            return '';
        }
    }
    

    public function website_footer() {
       $data = array();
        $settings = $this->check_settings_exist(13);
        if ($settings != false) {
            $setting_details = $this->objectToArray(json_decode('[' . $settings . ']'));
            $i = 1;
            foreach ($setting_details[0] as $key => $value) {
                if ($i == count($setting_details[0])) {
                    $data[$key] = $value;
                } else {
                   $data[$key] = $value;
                }
                ++$i;
            }
            return $data;
        } else {
            return '';
        }
    }
    #--------------------------------
    # website logo
    #--------------------------------    
    public function website_logo() {
         $data = '';
        $settings = $this->check_settings_exist(14);
        if ($settings != false) {
            $setting_details = $this->objectToArray(json_decode('[' . $settings . ']'));
            $data = $setting_details[0]['website_logo'];
            return $data;
        } else {
            return '';
        }
    }


    public function footer_logo() {
         $data = '';
        $settings = $this->check_settings_exist(112);
        if ($settings != false) {
            $setting_details = $this->objectToArray(json_decode('[' . $settings . ']'));
            $data =  $setting_details[0]['footer_logo'] ;
            return $data;
        } else {
            return '';
        }
    }

    public function website_favicon() {
         $data = '';
        $settings = $this->check_settings_exist(15);
        if ($settings != false) {
            $setting_details = $this->objectToArray(json_decode('[' . $settings . ']'));
            $data = $setting_details[0]['website_favicon'];
            return $data;
        } else {
            return '';
        }
    }


    public function website_timezone() {
        $settings = $this->check_settings_exist(17);

        $data = '';
        if ($settings != false) {
            $setting_details = $this->objectToArray(json_decode('[' . $settings . ']'));
           
            $data =  $setting_details[0]['website_timezone'];
            return $data;
        } else {
            return '';
        }
    }

    function objectToArray1($object) {
        if (!is_object($object) && !is_array($object)) {
            return json_decode($object,true);
        } else {
            return array_map('self::objectToArray', (array) $object);
        }
    }

    #-----------------------------------------------
    #       hoem page positionign data
    #-----------------------------------------------    
    public function home_category_position() {

        $settings = $this->check_settings_exist(4);
        if ($settings != false) {

            $setting_details = $this->objectToArray1($settings);


            for ($i=1; $i <= sizeof($setting_details) ; $i++) { 
                $newsPosition[$i] = array(
                    'cat_name' => $setting_details[$i]['cat_name'],
                    'slug'     => $setting_details[$i]['slug'],
                    'max_news' => $setting_details[$i]['max_news'],
                    'category_id' => $setting_details[$i]['category_id'],
                    'status'   => $setting_details[$i]['status']
                ); 
            }
            return $newsPosition;
        } else {
            return '';
        }
    }


    public function get_nenu_by_position() {
        $query =  $this->db->select('slug,position,category_name')
        ->where('menu',1)
        ->order_by('position','ASC')->get('categories');
        $num_rows = $query->num_rows();

        $num_rows = $query->num_rows();
        if ($num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function home_top_menu_positions() {
        $data = '';
        $menus = $this->get_nenu_by_position();
        if ($menus != false) {
            $data .= '$home_top_menu = ' . "array(\n\n";
            foreach ($menus as $key => $value) {
                $data.= "\t '$value->category_name' => " . "'" . $value->slug . "',\n";
            }
            $data.=");\n\n";
            return $data;
        } else {
            return '';
        }
    }

    public function metch_sub_menu() {
        $data = '';
        $menus = $this->get_sub_menu();
        
        if ($menus != false) {
            $data .= '$sub_netch = ' . "array(\n\n";
            foreach ($menus as $key => $value) {
                $data.= "\t '$value->sub_menu' => " . "'" . $value->m_slug . "',\n";
            }
            $data.=");\n\n";
            return $data;
        } else {
            return '';
        }
         
    }
    

    function theme_data() {
        $settings = $this->check_settings_exist(16);
        if ($settings != false) {
            $setting_details = $this->objectToArray(json_decode('[' . $settings . ']'));
            $data =  $setting_details[0]['default_theme'] ;
            return $data;
        } else {
            return '';
        }
    }

}
