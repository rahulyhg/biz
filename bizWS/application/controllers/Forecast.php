<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Forecast extends CI_Controller {

//    var $companyId = 5;
//    var $totalYear = 5;
    var $typeArr = array(
        'current' => 1,
        'fixed' => 2,
        'other' => 3,
        'currentLb' => 4,
        'longTerm' => 5,
        'equity' => 6,
        'business' => 7,
        'premises' => 8,
        'equipment' => 9,
        'operations' => 10,
        'capital' => 11,
        'revenues' => 12,
        'goods' => 13,
        'operating' => 14,
        'interest' => 15,
        'handcf' => 16,
        'receiptscf' => 17,
        'goodscf' => 18,
        'operatingcf' => 19,
        'othercf' => 20,
    );
    var $totalTypeArr = array(
        'Assets' => 1,
        'EAssets' => 2,
        'SSetup' => 3,
        'BSetup' => 4,
        'OPStatement' => 5,
        'NIStatement' => 6,
        'NCCashflow' => 7,
        'CPCashflow' => 8,
    );

    public function __construct() {
        parent::__construct();
        $this->load->model('Forecast_model', 'forecast');
        $this->load->model('company_model', 'company');
        $this->load->library('Assets', 'assets');
    }

    public function balancesheet() {
        $company_id = $this->session->userdata('companyid');
        if (empty($company_id)) {
            redirect('dashboard');
        }
        $result = $this->company->getcompany($company_id)->row();
        $totalYear = $result->forecast_length;
        $data = array(
            'pageTitle' => 'Balance Sheet',
            'addLink' => 'forecast/balancesheet/' . $company_id,
            'menu_type' => 'forecast',
            'sub_menu' => 'balancesheet',
            'mainContent' => (key_exists('view', $_GET)) ? 'forecast/balance_sheet_view' : 'forecast/balance_sheet',
            'js' => 'balance_sheet_js',
            'companyid' => $company_id,
            'totalYear' => $totalYear,
            'tdClass' => ($totalYear > 3) ? 'col-sm-1' : 'col-sm-2',
            'signArr' => array(0 => 'plus', 1 => 'minus'),
            'currentAssets' => $this->_getDefaultArray($this->assets->currentAssets),
            'fixedAssets' => $this->_getDefaultArray($this->assets->fixedAssets),
            'otherAssets' => $this->_getDefaultArray($this->assets->otherAssets),
            'currentLbAssets' => $this->_getDefaultArray($this->assets->currentLiabilities),
            'longTermAssets' => $this->_getDefaultArray($this->assets->longTermLiabilities),
            'equityAssets' => $this->_getDefaultArray($this->assets->equity),
            'fCA' => $this->assets->currentAssets,
            'fFA' => $this->assets->fixedAssets,
            'fOA' => $this->assets->otherAssets,
            'fCL' => $this->assets->currentLiabilities,
            'fLL' => $this->assets->longTermLiabilities,
            'fE' => $this->assets->equity,
            'sectionArray' => array(
                array('current', 'fixed', 'other'),
                array('currentLb', 'longTerm', 'equity')
            ),
            'static_content' => "Finally, a balance sheet represents a financial statement, one that summarizes your company's assets and liabilities and the shareholders' equity at a given time. The above three balance sheet segments give the business owners and the investors a clear idea regarding what all the company possesses and what it owes besides the amount that has been invested by all the shareholders. "
        );
        $ca = $this->forecast->getForecast(array('type' => $this->typeArr['current'], 'cid' => $company_id));
        if ($ca->num_rows() > 0) {
            $data['currentAssets'] = $ca->result_array();
        }
        $fa = $this->forecast->getForecast(array('type' => $this->typeArr['fixed'], 'cid' => $company_id));
        if ($fa->num_rows() > 0) {
            $data['fixedAssets'] = $fa->result_array();
        }
        $oa = $this->forecast->getForecast(array('type' => $this->typeArr['other'], 'cid' => $company_id));
        if ($oa->num_rows() > 0) {
            $data['otherAssets'] = $oa->result_array();
        }
        $cla = $this->forecast->getForecast(array('type' => $this->typeArr['currentLb'], 'cid' => $company_id));
        if ($cla->num_rows() > 0) {
            $data['currentLbAssets'] = $cla->result_array();
        }
        $lta = $this->forecast->getForecast(array('type' => $this->typeArr['longTerm'], 'cid' => $company_id));
        if ($lta->num_rows() > 0) {
            $data['longTermAssets'] = $lta->result_array();
        }
        $ea = $this->forecast->getForecast(array('type' => $this->typeArr['equity'], 'cid' => $company_id));
        if ($ea->num_rows() > 0) {
            $data['equityAssets'] = $ea->result_array();
        }
        $this->load->view('layout/forecastlayout', $data);
    }

    public function setupcost() {
        $company_id = $this->session->userdata('companyid');
        if (empty($company_id)) {
            redirect('dashboard');
        }
        $result = $this->company->getcompany($company_id)->row();
        $totalYear = $result->forecast_length;
        $data = array(
            'pageTitle' => 'Setup Cost',
            'addLink' => 'forecast/setupcost/' . $company_id,
            'mainContent' => (key_exists('view', $_GET)) ? 'forecast/setup_cost_view' : 'forecast/setup_cost',
            'js' => 'setup_cost_js',
            'menu_type' => 'forecast',
            'sub_menu' => 'setupcost',
            'totalYear' => $totalYear,
            'companyid' => $company_id,
            'tdClass' => ($totalYear > 3) ? 'col-sm-1' : 'col-sm-2',
            'signArr' => array(0 => 'plus', 1 => 'minus'),
            'businessSetup' => $this->_getDefaultArray($this->assets->businessSetup),
            'premisesSetup' => $this->_getDefaultArray($this->assets->premisesSetup),
            'equipmentSetup' => $this->_getDefaultArray($this->assets->equipmentSetup),
            'operationsSetup' => $this->_getDefaultArray($this->assets->operationsSetup),
            'capitalSetup' => $this->_getDefaultArray($this->assets->capitalSetup),
            'fBS' => $this->assets->businessSetup,
            'fPS' => $this->assets->premisesSetup,
            'fES' => $this->assets->equipmentSetup,
            'fOS' => $this->assets->operationsSetup,
            'fCS' => $this->assets->capitalSetup,
            'sectionArray' => array(
                array('business', 'premises', 'equipment', 'operations'),
                array('capital'),
            ),
            'static_content' => 'When you are starting your business, you will need to incur expenses during this process. These are the startup costs and prior to launching a new business you must take all the time to make out a viable estimate for the total expenditure that will have to be made. All you need to do is to ensure that only those items are included that are absolutely essential for starting the business. '
        );
        $bs = $this->forecast->getForecast(array('type' => $this->typeArr['business'], 'cid' => $company_id));
        if ($bs->num_rows() > 0) {
            $data['businessSetup'] = $bs->result_array();
        }
        $ps = $this->forecast->getForecast(array('type' => $this->typeArr['premises'], 'cid' => $company_id));
        if ($ps->num_rows() > 0) {
            $data['premisesSetup'] = $ps->result_array();
        }
        $es = $this->forecast->getForecast(array('type' => $this->typeArr['equipment'], 'cid' => $company_id));
        if ($es->num_rows() > 0) {
            $data['equipmentSetup'] = $es->result_array();
        }
        $os = $this->forecast->getForecast(array('type' => $this->typeArr['operations'], 'cid' => $company_id));
        if ($os->num_rows() > 0) {
            $data['operationsSetup'] = $os->result_array();
        }
        $cs = $this->forecast->getForecast(array('type' => $this->typeArr['capital'], 'cid' => $company_id));
        if ($cs->num_rows() > 0) {
            $data['capitalSetup'] = $cs->result_array();
        }
        $this->load->view('layout/forecastlayout', $data);
    }

    public function statement() {
        $company_id = $this->session->userdata('companyid');
        if (empty($company_id)) {
            redirect('dashboard');
        }
        $result = $this->company->getcompany($company_id)->row();
        $totalYear = $result->forecast_length;
        $data = array(
            'pageTitle' => 'Income Profit and Loss Statement',
            'addLink' => 'forecast/statement/' . $company_id,
            'mainContent' => (key_exists('view', $_GET)) ? 'forecast/statement_view' : 'forecast/statement',
            'js' => 'statement_js',
            'menu_type' => 'forecast',
            'sub_menu' => 'statement',
            'totalYear' => $totalYear,
            'companyid' => $company_id,
            'tdClass' => ($totalYear > 3) ? 'col-sm-1' : 'col-sm-2',
            'signArr' => array(0 => 'plus', 1 => 'minus'),
            'revenuesStatement' => $this->_getDefaultArray($this->assets->revenuesStatement),
            'goodsStatement' => $this->_getDefaultArray($this->assets->goodsStatement),
            'operatingStatement' => $this->_getDefaultArray($this->assets->operatingStatement),
            'interestStatement' => $this->_getDefaultArray($this->assets->interestStatement),
            'fRS' => $this->assets->revenuesStatement,
            'fGS' => $this->assets->goodsStatement,
            'fOS' => $this->assets->operatingStatement,
            'fIS' => $this->assets->interestStatement,
            'sectionArray' => array(
                array('revenues', 'goods'),
                array('capital'),
            ),
            'static_content' => "There are a few terms and processes you will have to be familiar with. Firstly there is a Profit & Loss Statement that makes a summary of all the revenue, cost and expense that has been incurred during generally either the fiscal quarter or the year. These  indicate the ability of the company for the generation of profit by an increase in revenue or a reduction of cost or sometimes both. "
        );
        $rs = $this->forecast->getForecast(array('type' => $this->typeArr['revenues'], 'cid' => $company_id));
        if ($rs->num_rows() > 0) {
            $data['revenuesStatement'] = $rs->result_array();
        }
        $gs = $this->forecast->getForecast(array('type' => $this->typeArr['goods'], 'cid' => $company_id));
        if ($gs->num_rows() > 0) {
            $data['goodsStatement'] = $gs->result_array();
        }
        $os = $this->forecast->getForecast(array('type' => $this->typeArr['operating'], 'cid' => $company_id));
        if ($os->num_rows() > 0) {
            $data['operatingStatement'] = $os->result_array();
        }
        $is = $this->forecast->getForecast(array('type' => $this->typeArr['interest'], 'cid' => $company_id));
        if ($is->num_rows() > 0) {
            $data['interestStatement'] = $is->result_array();
        }
        $this->load->view('layout/forecastlayout', $data);
    }

    public function cashflow() {
        $company_id = $this->session->userdata('companyid');
        if (empty($company_id)) {
            redirect('dashboard');
        }
        $result = $this->company->getcompany($company_id)->row();
        $totalYear = $result->forecast_length;
        $data = array(
            'pageTitle' => 'Cash Flow',
            'addLink' => 'forecast/cashflow/' . $company_id,
            'mainContent' => (key_exists('view', $_GET)) ? 'forecast/cashflow_view' : 'forecast/cashflow',
            'js' => 'cashflow_js',
            'menu_type' => 'forecast',
            'sub_menu' => 'cashflow',
            'totalYear' => $totalYear,
            'companyid' => $company_id,
            'tdClass' => ($totalYear > 3) ? 'col-sm-1' : 'col-sm-2',
            'signArr' => array(0 => 'plus', 1 => 'minus'),
            'handcfCashflow' => $this->_getDefaultArray($this->assets->handcfCashflow),
            'receiptscfCashflow' => $this->_getDefaultArray($this->assets->receiptscfCashflow),
            'goodscfCashflow' => $this->_getDefaultArray($this->assets->goodscfCashflow),
            'operatingcfCashflow' => $this->_getDefaultArray($this->assets->operatingcfCashflow),
            'othercfCashflow' => $this->_getDefaultArray($this->assets->othercfCashflow),
            'fHC' => $this->assets->handcfCashflow,
            'fRC' => $this->assets->receiptscfCashflow,
            'fGC' => $this->assets->goodscfCashflow,
            'fOPC' => $this->assets->operatingcfCashflow,
            'fOC' => $this->assets->othercfCashflow,
            'sectionArray' => array(
                array('goodscf', 'operatingcf', 'othercf'),
                array()
            ),
            'static_content' => "Further, a cash flow statement represents a financial statement that indicates how the various changes in balance sheet accounts and the income ultimately affect the cash and cash equivalents and thereafter breaks the analysis down to activities such as operation, investment and financing. Effectively, cash flow statement is related to the flow of the cash in and cash out of the business. This statement is important since it indicates at once both the current operating results as well as the accompanying changes in your balance sheet. Cash flow statement is very useful in the determination of the viability of the company in the short term, especially its ability to be able to pay all bills. "
        );
        $hc = $this->forecast->getForecast(array('type' => $this->typeArr['handcf'], 'cid' => $company_id));
        if ($hc->num_rows() > 0) {
            $data['handcfCashflow'] = $hc->result_array();
        }
        $rc = $this->forecast->getForecast(array('type' => $this->typeArr['receiptscf'], 'cid' => $company_id));
        if ($rc->num_rows() > 0) {
            $data['receiptscfCashflow'] = $rc->result_array();
        }
        $gc = $this->forecast->getForecast(array('type' => $this->typeArr['goodscf'], 'cid' => $company_id));
        if ($gc->num_rows() > 0) {
            $data['goodscfCashflow'] = $gc->result_array();
        }
        $opc = $this->forecast->getForecast(array('type' => $this->typeArr['operatingcf'], 'cid' => $company_id));
        if ($opc->num_rows() > 0) {
            $data['operatingcfCashflow'] = $opc->result_array();
        }
        $oc = $this->forecast->getForecast(array('type' => $this->typeArr['othercf'], 'cid' => $company_id));
        if ($oc->num_rows() > 0) {
            $data['othercfCashflow'] = $oc->result_array();
        }
        $this->load->view('layout/forecastlayout', $data);
    }

    public function ajax($companyid) {
        $companyid = $this->session->userdata('companyid');
        $batchArr = array();
        $types = array();
        $batchTotArr = array();
        $totalTypes = array();
        $curDate = date('Y-m-d H:i:s');
        $post = $this->input->post();
        foreach ($post['forecast'] as $key => $data) {
            $types[] = $type = $this->typeArr[$key];
            foreach ($data as $row) {
                $price = str_replace(',', '', $row['price']);
                $fy1 = str_replace(',', '', $row['fy1']);
                $fy2 = str_replace(',', '', $row['fy2']);
                $fy3 = str_replace(',', '', $row['fy3']);
                $fy4 = str_replace(',', '', $row['fy4']);
                $fy5 = str_replace(',', '', $row['fy5']);
                $batchArr[] = array(
                    'cid' => $companyid,
                    'type' => $type,
                    'name' => $row['name'],
                    'price' => $price,
                    'fy1' => $fy1,
                    'fy2' => $fy2,
                    'fy3' => $fy3,
                    'fy4' => $fy4,
                    'fy5' => $fy5,
                    'sign' => $row['sign'],
                    'modified_on' => $curDate
                );
            }
        }
        foreach ($post['total'] as $key => $row) {
            $totalTypes[] = $type = $this->totalTypeArr[$key];
            $fy1 = str_replace(',', '', $row['fy1']);
            $fy2 = str_replace(',', '', $row['fy2']);
            $fy3 = str_replace(',', '', $row['fy3']);
            $fy4 = str_replace(',', '', $row['fy4']);
            $fy5 = str_replace(',', '', $row['fy5']);
            $batchTotVal = array(
                'cid' => $companyid,
                'type' => $type,
                'fy1' => $fy1,
                'fy2' => $fy2,
                'fy3' => $fy3,
                'fy4' => $fy4,
                'fy5' => $fy5,
                'modified_on' => $curDate
            );
            if (isset($row['price'])) {
                $price = str_replace(',', '', $row['price']);
                $batchTotVal['price'] = $price;
            }
            $batchTotArr[] = $batchTotVal;
        }
        if (!empty($batchArr)) {
            $result = $this->forecast->resetForecast($batchArr, $batchTotArr, $companyid, $types, $totalTypes);
            if ($result) {
                echo 'success';
            } else {
                echo 'failed';
            }
            exit;
        }
    }

    public function _getDefaultArray($arr) {
        $assets = array();
        foreach ($arr as $title => $sign) {
            $assets[] = array(
                'name' => $title,
                'price' => '0',
                'fy1' => '0',
                'fy2' => '0',
                'fy3' => '0',
                'fy4' => '0',
                'fy5' => '0',
                'sign' => $sign
            );
        }
        return $assets;
    }

}
