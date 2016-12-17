<?php

class Subscription_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_sub_detail() {
        $user_id = $this->session->userdata('user_id');
        return $this->db->select('*')->from('biz_users')->where('user_id', $user_id)->get();
    }


}

?>