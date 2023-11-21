<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


if (!function_exists("makeString")) {
    
    function makeString ($data = [])
    {
        $output = "";
        $i = 0;
        foreach ($data as $val) {
            $output .= ($i>0?" ":"");
            $output .= display("$val");
            $i++;
        }
        return $output;
    }
}



if (!function_exists('display')) {

    function display($text = null)
    {


        $ci =& get_instance();
        $ci->load->database();
        $table  = 'language';
        $phrase = 'phrase';
        $setting_table = 'lg_setting';
        $default_lang  = 'english';


      #---------------------------------------
        #   modify function 30-01-2018
        #--------------------------------------
        $set_lang = $ci->session->userdata('set_lang');
     
        if(!empty($set_lang)){
            $data = $ci->db->select('*')->from('set_language')->where('lang_code',$ci->session->userdata('set_lang'))->get()->row();
            
        } else {
            $data = $ci->db->get($setting_table)->row();
        }#end

        if (!empty($data->lang_name)) {
            $language =$data->lang_name; 
        } else {
            $language = $data->language; 
        } 


        if (!empty($text)) {

            if ($ci->db->table_exists($table)) { 

                

                if ($ci->db->field_exists($phrase, $table)) { 

                    if ($ci->db->field_exists($language, $table)) {

                        $row = $ci->db->select($language)
                              ->from($table)
                              ->where($phrase, $text)
                              ->get()
                              ->row(); 

                        if (!empty($row->$language)) {
                            return html_escape($row->$language);
                        } else {
                            return false;
                        }

                    } else {
                        return false;
                    }

                } else {
                    return false;
                }

            } else {
                return false;
            }            
        } else {
            return false;
        }  

    }
 
}
