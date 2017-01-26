<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH."libraries/REST_Controller.php");

class Industry_report extends REST_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array('services/industry_report_model'));
        $key  = $this->get('X-APP-KEY');
    }


    public function list_get() {

        $user_data = array();
        $user_data['message'] = "";

        try
        {
           
            $user_data['ind_list'] = $this->industry_report_model->get_industry_list();

            $user_data['status'] = 'success';
        
        }
        catch( Exception $e)
        {
            $user_data['message'] = $e->getMessage();
            $user_data['status'] = 'error';
        }

        $this->response( $user_data, 200);    

        
    }

    public function compdelete_get() {

        $user_data = array();
        $user_data['message'] = "";

        try
        {
            $user_id = $this->get('user_id');
            $comp_id = $this->get('comp_id');

            if(!$user_id || !$comp_id)
                throw new Exception("Invalid User or Company");

            $where = array('user_id' => $user_id,'company_id' => $comp_id);

            $this->company_model->delete($where, 'company');

            $where = array('company_id' => $comp_id);

            $this->company_model->delete($where, 'milestones');
            $this->company_model->delete($where, 'pitch');
            $this->company_model->delete($where, 'pitch_competitor');
            $this->company_model->delete($where, 'pitch_funding');
            $this->company_model->delete($where, 'pitch_partner');
            $this->company_model->delete($where, 'pitch_team');
            $this->company_model->delete($where, 'pitch_funding');

            $user_data['status'] = 'success';

        }
        catch( Exception $e)
        {
            $user_data['message'] = $e->getMessage();
            $user_data['status'] = 'error';
        }

        $this->response( $user_data, 200);    

    }


}
