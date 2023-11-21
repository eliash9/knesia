<?php defined('BASEPATH') OR exit('No direct script access allowed');

$ci =& get_instance();
$googleplus = $ci->db->select('*')->from('social_auth')->where('id',2)->where('status',1)->get()->row();

$config['googleplus']['application_name'] = 'web';
$config['googleplus']['client_id']        = @$googleplus->app_id;
$config['googleplus']['client_secret']    = @$googleplus->app_secret;
$config['googleplus']['redirect_uri']     = base_url().'Registration/googl_login/';
$config['googleplus']['api_key']          = @$googleplus->api_key;
$config['googleplus']['scopes']           = array('profile','email');

