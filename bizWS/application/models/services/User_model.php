<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once(COREPATH."models/App_model.php");

class User_model extends App_Model {

    function __construct()
    {
        parent::__construct();
       

    }

    function login($email = "",$password = "")
    {
        $where=array('email'=>$email,'password'=>md5('biz_jump' . $password));
        
        $this->db->select("user_id,fname,lname,email,status");
        $this->db->from('users');
        $this->db->where($where);

        $user = $this->db->get()->row_array();

        return $user;
        
    }

    public function signup($data) {

        $this->load->helper('string');

        $this->db->insert('users', $data);

        $last_id = $this->db->insert_id();

        $authkey = md5(random_string('alnum', 10));

        $data1 = array(
            'id' => $last_id,
            'auth_key' => $authkey
        );

        $this->db->insert('authenticate', $data1);

        $package_data = array(
            'uid' => $last_id,
            'order_id' => '',
            'tid' => '',
            'pid' => '1',
            'balance' => '1',
            'start_date' => date('Y-m-d'),
            'end_date' => ''
        );
        $this->db->insert('subscription', $package_data);

        return $authkey;
    }

}
