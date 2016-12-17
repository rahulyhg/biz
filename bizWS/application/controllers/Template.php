<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('pitch_model', 'b_pitch');
        $this->load->model('company_model', 'b_company');
        $this->load->model('Forecast_model', 'forecast');
    }

    public function pitch() {
        $publish_id = $this->uri->segment(4);
        $this->load->helper('currencyconv');
        $value = $this->b_pitch->get_publishpitch($publish_id);
        $count = $value->num_rows();
        if ($count > 0) {
            $val = $value->row();
            $data['company_id'] = $company_id = $val->company_id;
            $data['pitch_details'] = $pitch = $this->b_pitch->get_alldetails($company_id);
            $data['f_length'] = $pitch[0]['forecast_length'];
            $data['f_date'] = $pitch[0]['forecast_date'];
            $data['currency'] = $currency = $pitch[0]['currency'];
            $fund_amt = $pitch[0]['fund_amount'];
            $data['fund_amt'] = converter($fund_amt, $currency);
            $data['competitors'] = $competitors = $this->b_pitch->get_competitordetail($company_id);
            $data['milestones'] = $this->b_pitch->get_milestonedetail($company_id);
            $data['partner'] = $this->b_pitch->get_partnerdetails($company_id);
            $data['team'] = $this->b_pitch->get_teamdetails($company_id);
            $data['fund'] = $this->b_pitch->get_funddetails($company_id);
            $data['revenue'] = $income = $this->forecast->gettotal($company_id, '12');
            $data['income'] = $this->forecast->getincome($company_id, '6');
            $data['costs'] = $this->forecast->gettotal($company_id, '13', 'expense');
            $data['pitch_details'] = $pitch = $this->b_pitch->get_alldetails($company_id);
            $data['f_length'] = $pitch[0]['forecast_length'];
            $data['f_date'] = $pitch[0]['forecast_date'];
            $data['currency'] = $pitch[0]['currency'];
            $data['forecast'] = '0';
            $this->load->view('view', $data);
        } else {
            redirect('login');
        }
    }

}
