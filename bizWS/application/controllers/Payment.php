<?php

class Payment extends CI_Controller {

    private $pay_order_id;
    private $pay_status;
    private $package_id;
    private $txr_id;

    function __construct() {
        parent::__construct();
        $this->load->model('Payment_model', 'payment');
        $this->load->model('Login_model', 'b_login');
        $this->load->model('Mailmodel', 'mail');
        date_default_timezone_set('Asia/Kolkata');
    }

    public function index() {
        $this->load->view('accountpage/Payment_message', array('page_title' => 'CCAvenue'));
    }

    public function payment_request() {
        if ($this->_save_payment()) {
            $payment_gateway = APP_PAY_GATEWAY;
            switch ($payment_gateway) {
                case 1:
                    return $this->pay_ccavenue();
                    break;
            }
        }
        return $this->payment_error();
    }

    public function payment_error() {
        $this->session->set_flashdata('payment_error', 'Unable to process your payment. Please try again.');
        return redirect('payment');
    }

    private function _save_payment() {
        $input = $this->input->get();
        $this->package_id = $this->input->get('pid');
        $this->load->helper('autoindex');
        $order_id = generate_autoindex('order_id');
        $this->pay_order_id = PAY_ORDER_ID . sprintf("%06s", $order_id);
        $pay_gateway_env = APP_PAY_GATEWAY_ENV;
        if ($this->pay_order_id) {
            return $this->payment->savePayment(
                            array(
                                'uid' => $this->session->userdata('user_id'),
                                'order_id' => $this->pay_order_id,
                                'pid' => $this->package_id,
                                'env' => $pay_gateway_env,
                                'amount' => $this->input->get('value'),
                                'tid' => '',
                                'ref_no' => '',
                                'pay_type' => 'Avenue',
                                'card_name' => '',
                                'status' => 'Initiated',
                                'created' => date('Y-m-d H:i:s')
                            )
            );
        }
        return $this->payment_error();
    }

    public function pay_ccavenue() {
        $this->load->helper('ccencryption');
        $amount = $this->input->get('value');
        $pay_array = array(
            'merchant_id' => APP_MERCHANT_ID,
            'order_id' => $this->pay_order_id,
            'amount' => $amount . ".00",
            'currency' => 'INR',
            'redirect_url' => base_url() . 'payment/payment_return',
            'cancel_url' => base_url() . 'payment/payment_cancel',
            'billing_name' => $this->session->userdata('fname') . ' ' . $this->session->userdata('lname'),
            'billing_email' => $this->session->userdata('email'),
            'billing_tel' => '9876543210',
            'billing_address' => 'Room no 1101, near Railway station Ambad',
            'billing_city' => 'Indore',
            'billing_state' => 'MP',
            'billing_country' => 'India',
            'billing_zip' => '425001',
            'integration_type' => 'iframe_normal',
            'merchant_param1' => $this->package_id
        );
        $pay_data = '';
        foreach ($pay_array as $key => $value) {
            $pay_data.=$key . '=' . $value . '&';
        }
        $pay_data = rtrim($pay_data, '&');
        $pay_gateway_env = APP_PAY_GATEWAY_ENV;
        $pay_form_action = CCAVENUE_TEST_PAY_FORM_ACTION;
        $pay_access_code = PAY_TEST_ACCESS_CODE;
        $pay_working_key = PAY_TEST_WORKING_KEY;
        if ($pay_gateway_env == 2) {
            $pay_form_action = CCAVENUE_PROD_PAY_FORM_ACTION;
            $pay_access_code = PAY_PROD_ACCESS_CODE;
            $pay_working_key = PAY_PROD_WORKING_KEY;
        }
        $encrypted = encrypt($pay_data, $pay_working_key);
        $iframe_url = $pay_form_action . 'transaction/transaction.do?command=initiateTransaction&encRequest=' . $encrypted . '&access_code=' . $pay_access_code;
        return $this->load->view('accountpage/paymentrequest', array('page_title' => 'CCAvenue', 'iframe_url' => $iframe_url));
    }

    public function payment_return() {
        $this->_update_payment();
        if ($this->pay_status === "Success") {
            $user_id = $this->session->userdata('user_id');
            $get_data = $this->payment->select_subscription();
            $get_count = $get_data->num_rows();
            if ($get_count > 0) {
                $this->update_subscription($user_id, $this->package_id, $this->pay_order_id, $this->txr);
            } else {
                $result = $this->b_login->select_data('biz_package', array('pid' => $this->package_id));
                $package_res = $result->row();
                $leads = $package_res->leads;
                $curr_date = date('Y-m-d');
                $exp_date = date('Y-m-d', strtotime('+1 month'));
                $where = array(
                    'uid' => $user_id,
                    'order_id' => $this->pay_order_id,
                    'tid' => $this->txr,
                    'pid' => $this->package_id,
                    'balance' => $leads,
                    'start_date' => $curr_date,
                    'end_date' => $exp_date
                );
                $this->payment->insert_subscription('biz_subscription', $where);
            }
            $result = $this->b_login->select_data('biz_package', array('pid' => $this->package_id));
            $data = $result->row();
            $package_name = $data->plan;
            $package_amount = $data->amount;
            $name = $this->session->userdata('fname') . ' ' . $this->session->userdata('lname');
            $to = $this->session->userdata('email');
            $subject = 'Subscription Confirmation Email';

            $data = array(
                'to' => $to,
                'subject' => $subject,
                'link' => 'email_template/sub_confirmation',
                'name' => $name,
                'pay_order_id' => $this->pay_order_id,
                'package_amount' => $package_amount,
                'package_name' => $package_name
            );

            $this->mail->sendemail($data);
            $this->session->set_flashdata('payment_success', 'Payment is successful. Receipt has been sent via registered email.');
        } else if ($this->pay_status === "Failure") {
            $this->session->set_flashdata('payment_error', 'Payment transaction has been declined.');
        }
        return redirect('payment');
    }

    public function payment_cancel() {
        $this->_update_payment();
        $this->session->set_flashdata('payment_error', 'Payment transaction has been cancelled.');
        return redirect('payment');
    }

    private function _update_payment() {
        $this->load->helper('ccencryption');
        $pay_gateway_env = APP_PAY_GATEWAY_ENV;
        $pay_working_key = PAY_TEST_WORKING_KEY;
        if ($pay_gateway_env == 2) {
            $pay_working_key = PAY_PROD_WORKING_KEY;
        }
        $input = $this->input->post();
        $encResponse = $input["encResp"];
        $rcvdString = decrypt($encResponse, $pay_working_key);
        $decryptValues = explode('&', $rcvdString);
        $order_data = explode('=', $decryptValues[0]);
        $txn_data = explode('=', $decryptValues[1]);
        $ref_data = explode('=', $decryptValues[2]);
        $payment_data = explode('=', $decryptValues[5]);
        $card_data = explode('=', $decryptValues[6]);
        $status_data = explode('=', $decryptValues[3]);
        $package_id = explode('=', $decryptValues[26]);
        $this->pay_order_id = $order_data[1];
        $this->pay_status = $status_data[1];
        $this->package_id = $package_id[1];
        $this->txr = $txn_data[1];
        return $this->payment->updatePayment(array('status' => $status_data[1], 'ref_no' => $ref_data[1], 'pay_type' => $payment_data[1], 'card_name' => $card_data[1], 'tid' => $txn_data[1]), $order_data[1]);
    }

    public function update_subscription($uid, $pid, $order_id, $trans_id) {
        $where1 = array(
            'uid' => $uid
        );
        $where2 = array(
            'pid' => $pid
        );
        $where3 = array(
            'user_id' => $uid
        );

        $result = $this->b_login->select_data('biz_package', array('pid' => $pid));
        $package_res = $result->row();
        $leads = $package_res->leads;
        $pid = $package_res->pid;
        $user_result = $this->b_login->select_data('biz_users', array('user_id' => $uid));
        $user_res = $user_result->row();
        $sub_type = $user_res->subs_type;
        if ($sub_type == '1') {
            $curr_date = date('Y-m-d');
            $exp_date = date('Y-m-d', strtotime('+1 month'));
            $update_data = array(
                'order_id' => $order_id,
                'tid' => $trans_id,
                'pid' => $pid,
                'balance' => $leads,
                'start_date' => $curr_date,
                'end_date' => $exp_date
            );
        } else {
            $result = $this->b_login->select_data('biz_subscription', $where1);
            $sub_data = $result->row();
            $date = $sub_data->end_date;
            $lead = $sub_data->balance;
            $time = strtotime($date);
            $final_date = date("Y-m-d", strtotime("+1 month", $time));
            $new_bal = ($lead + $leads);
            $update_data = array(
                'order_id' => $order_id,
                'tid' => $trans_id,
                'pid' => $pid,
                'balance' => $new_bal,
                'end_date' => $final_date
            );
        }
        $this->payment->update_subscription($update_data);
        $update = array(
            'subs_type' => $pid,
            'download' => '1'
        );
        $this->b_login->update_values('biz_users', $update, $where3);
    }

    public function check_subscription() {
        $result = $this->payment->check_data();
        $count = $result->num_rows();
        if ($count > '0') {
            $data = $result->result();
            foreach ($data as $val) {
                $res = $val->uid;
                $result = $this->payment->get_subtype($res);
                $count = $result->num_rows();
                if ($count > 0) {
                    $da = $result->row();
                    $type = $da->subs_type;
                    $this->payment->update_data(array('pid' => '1', 'balance' => '0'), array('uid' => $res), 'biz_subscription');
                    $this->payment->update_data(array('subs_type' => '1', 'membership' => '0'), array('user_id' => $res), 'biz_users');
                }
            }
        }
    }

}

?>