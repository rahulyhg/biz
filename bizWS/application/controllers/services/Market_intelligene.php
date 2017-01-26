<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH."libraries/REST_Controller.php");

class Market_intelligene extends REST_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array('services/market_intelligene_model'));
        $key  = $this->get('X-APP-KEY');
    }


    public function enquiry_post() {

        $user_data = array();
        $user_data['message'] = "";

        $user_data = array();
        try
        {
            $company         =  $this->post('company_name'); 
            $found_year      =  $this->post('found_year');
            $contact_detail  =  $this->post('contact_detail');
            $designation     =  $this->post('designation'); 
            $website         =  $this->post('website');
            $employees       =  $this->post('employees');
            
            if( strcmp('', trim($company) ) === 0 || strcmp('', trim($found_year) ) === 0 || strcmp('', trim($contact_detail) ) === 0 || strcmp('', trim($contact_detail) ) === 0 || strcmp('', trim($website) ) === 0 || strcmp('', trim($employees) ) === 0)
                throw new Exception("Required fields are missing in your request");

            $insdata['user_id']             = $this->post('user_id');
            $insdata['company_name']        = $company;
            $insdata['found_year']          = $found_year;
            $insdata['contact_detail']      = $contact_detail;
            $insdata['designation']         = $designation;
            $insdata['website']             = $website;
            $insdata['employees']           = $employees;
            $insdata['company_products']    = ($this->post('company_products'))?$this->post('company_products'):'';
            $insdata['require_section']     = ($this->post('section'))?implode(",",$this->post('section')):'';
            $insdata['market_study']        = ($this->post('market_study'))?implode(",",$this->post('market_study')):'';
            $insdata['other_market_study']  = ($this->post('other_market_study'))?$this->post('other_market_study'):'';
            $insdata['company_difficult']   = ($this->post('company_difficult'))?$this->post('company_difficult'):'';
            $insdata['operational_cities_count'] = ($this->post('operational_cities_count'))?$this->post('operational_cities_count'):'';
            $insdata['expect_days']         = ($this->post('expect_days'))?$this->post('expect_days'):'';
            $insdata['created_date']        = date("Y-m-d h:i:s");

            $this->market_intelligene_model->insert($insdata,'marketing_intelligence');

            /*
            $url = site_url() . 'signup/activation/' . $auth_value;

            $to = $email;

            $subject = 'Hi ' . $fname . ', Welcome to BizJumper';

            $data = array(
                'url' => $url,
                'to' => $to,
                'subject' => $subject,
                'link' => 'email_template/verification_usermail',
                'fname' => $fname
            );

            $this->mail->sendemail($data);
            */
            $user_data['message'] = "Form Submitted Successfully";
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
