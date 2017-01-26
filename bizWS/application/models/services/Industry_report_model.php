<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once(COREPATH."models/App_model.php");

class Industry_report_model extends App_Model {

    function __construct()
    {
        parent::__construct();
       

    }

    function get_industry_list()
    {        
        $this->db->select("*");
        $this->db->from('industry_type');
        $this->db->where('status', 1);

        return $this->db->get()->result_array();
        
    }


}
