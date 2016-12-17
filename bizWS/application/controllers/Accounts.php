<?php

class Accounts extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('login_model', 'b_login');
        $this->load->helper('string');
        $this->load->model('Mailmodel', 'mail');
        date_default_timezone_set('Asia/Kolkata');
        $user_id = $this->session->userdata('user_id');
        $this->session->unset_userdata('companyid');
        if (empty($user_id)) {
            redirect('login');
        }
    }

    public function overview() {
        $data = array(
            'Page Title' => 'Account Overview',
            'Menu' => 'overview',
            'mainContent' => 'accountpage/overview'
        );
        $user_id = $this->session->userdata('user_id');
        $where = array(
            'user_id' => $user_id
        );
        $data['account'] = $this->b_login->validate_users($where);
        $this->load->view('accountpage/acc_layout', $data);
    }

    public function change_password() {
        $data = array(
            'Page Title' => 'Change Password',
            'Menu' => 'password',
            'mainContent' => 'accountpage/changepassword'
        );
        $this->load->view('accountpage/acc_layout', $data);
    }

    public function subscription() {
        $data = array(
            'Page Title' => 'Subscription',
            'Menu' => 'subscription',
            'mainContent' => 'accountpage/subscription'
        );
        $this->load->view('accountpage/acc_layout', $data);
    }

    public function change_email() {
        $data = array(
            'Page Title' => 'Change Email',
            'Menu' => 'email',
            'mainContent' => 'accountpage/changeemail'
        );
        $user_id = $this->session->userdata('user_id');
        $where = array(
            'user_id' => $user_id
        );
        $data['account'] = $this->b_login->validate_users($where);
        $this->load->view('accountpage/acc_layout', $data);
    }

    public function delete_account() {
        $data = array(
            'Page Title' => 'Delete Account',
            'Menu' => 'delete',
            'mainContent' => 'accountpage/deleteacc'
        );
        $user_id = $this->session->userdata('user_id');
        $where = array(
            'user_id' => $user_id
        );
        $data['account'] = $this->b_login->validate_users($where);
        $this->load->view('accountpage/acc_layout', $data);
    }

    public function email_setting() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $old_email = $this->input->post('email');
            $new_email = $this->input->post('new_mail');
            $user_id = $this->session->userdata('user_id');
            $where = array(
                'user_id' => $user_id,
                'email' => $old_email
            );
            $result = $this->b_login->select_data('biz_users', $where);
            $result_count = $result->num_rows();
            if ($result_count > '0') {
                $data = array(
                    'email' => $new_email,
                    'status' => '0'
                );
                $result = $this->b_login->update_data($user_id, $data);
                if ($result) {
                    $authkey = md5(random_string('alnum', 10));
                    $data1 = array(
                        'id' => $user_id,
                        'auth_key' => $authkey
                    );
                    $this->b_login->insert_data('biz_authenticate', $data1);
                    $url = $this->site_url . 'signup/activation/' . $authkey;
                    $where = array(
                        'user_id' => $user_id
                    );
                    $check = $this->b_login->checkmail($where);
                    $result = $check->row();
                    $name = $result->fname;
                    $to = $new_email;
                    $subject = 'Hi ' . $name . ', welcome to BizJumper';
                    $message = "
                        Dear {$name},<br/><br/>
                        Please click on below link to activate  your account.<br/><br/>
                        <strong>Please Click</strong> $url  <br/><br/>
                        Thanks and Regards,<br/>
                        Your " . TITLE . " Administrator<br/><br/><br/>
                        Disclaimer: This is an auto-generated mail, please do not reply back. In case of any discrepancy please contact administrator 
                        if you are not the intended recipient. You are notified that disclosing, 
                        copying, distributing or taking any action in reliance on the contents of this information is strictly prohibited. ";
                    $this->mail->sendMail($to, $subject, $message);
                    echo '1';
                }
            } else {
                echo '2';
            }
        }
    }

    public function upgrade($val) {
        $data = strstr($val, "?", true);
        $plan = strtolower($data);
        switch ($plan) {
            case 'basic':
                $id = "2";
                break;
            case 'advanced':
                $id = "3";
                break;

            default:
                $id = "2";
                break;
        }
        $value = $id;
        $where = array(
            'pid' => $value
        );
        $package_result = $this->b_login->select_data('biz_package', $where);
        $count = $package_result->num_rows();
        $package_data = $package_result->row();
        if ($count > '0') {
            $user_id = $this->session->userdata('user_id');
            $where = array(
                'user_id' => $user_id
            );
            $user_detail = $this->b_login->select_data('biz_users', $where);
            $data = $user_detail->row();
            $fname = $data->fname;
            $lname = $data->lname;
            $name = $fname . ' ' . $lname;
            $email = $data->email;
            $amount = $package_data->amount;
            $amount = $this->currency_convert('USD', 'INR', $amount);
            $value = explode('.', $amount);
            $money = strip_tags($value[0]);
            $pid = $package_data->pid;
            $url = base_url() . 'payment/payment_request?name=' . $name . '&email=' . $email . '&value=' . $money . '&pid=' . $pid;
            header('Location:' . $url);
        } else {
            redirect('settings/subscription');
        }
    }

    public function currency_convert($from_Currency, $to_Currency, $amount) {
        $from_Currency = urlencode($from_Currency);
        $to_Currency = urlencode($to_Currency);
        $url = 'http://www.google.com/finance/converter?a=' . $amount . '&from=' . $from_Currency . '&to=' . $to_Currency;
        $ch = curl_init();
        $timeout = 0;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $rawdata = curl_exec($ch);
        curl_close($ch);
        $regularExpression = '#\<span class=bld\>(.+?)\<\/span\>#s';
        preg_match($regularExpression, $rawdata, $finalData);
        return $finalData[0];
    }

}
