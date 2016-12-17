<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Access_layer {

    var $tms_routes = array();
    private $uri;

    public function __construct() {
        $this->uri = & load_class('URI', 'core');
    }

    /**
     * function to check whether user has an access against the feature
     * @return boolean
     */
    public function has_permission() {
        $uri = implode('/', $this->uri->segments);
        $uri = explode('/', $uri);
        $CI = & get_instance();
        $CI->base_url = base_url();
        $CI->site_url = site_url();
        if (empty($uri[0])) {
            return;
        }
        $arg_first = strtolower($uri[0]);
        $arg_second = isset($uri[1]) ? strtolower($uri[1]) : NULL;
        if ($CI->input->is_cli_request())
            return TRUE;# run from command line
//        $user_id = $CI->session->userdata('user_id');
//        $this->check_user();
    }

//    public function check_user() {
//        $CI = & get_instance();
//        $user_id = $CI->session->userdata('user_id');
//        if (!empty($user_id)) {
//            $result = $CI->db->select('membership')->from('biz_users')->where('user_id', $user_id)->get();
//            $data = $result->row();
//            $status = $data->membership;
//            if ($status == '0') {
//                redirect(site_url('login'));
//            }
//        }
//    }

}
