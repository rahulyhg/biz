<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once(COREPATH."models/App_model.php");

class Company_model extends App_Model {

    function __construct()
    {
        parent::__construct();
       

    }

    function get_companies_list($user_id = "")
    {        
        $this->db->select("id,company_id,name,created");
        $this->db->from('company');
        $this->db->where('user_id', $user_id);

        return $this->db->get()->result_array();
        
    }


}
