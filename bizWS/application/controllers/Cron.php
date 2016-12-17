<?php

class Cron extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('login_model', 'b_login');
        $this->load->model('company_model', 'b_company');
        date_default_timezone_set('Asia/Kolkata');
        $user_id = $this->session->userdata('user_id');
    }

    public function update_subscription() {
        $date = date('Y-m-d');
        $result = $this->b_company->get_subscription($date);
        $sub_data = $result->result();
        $count = $result->num_rows();
        if ($count > '0') {
            foreach ($sub_data as $val) {
                $uid = $val->uid;
                $data = array(
                    'user_id' => $uid
                );
                $value = $this->b_login->select_data('biz_users', $data);
                $val_count = $value->num_rows();
                if (!empty($val_count)) {
                    $type = $value->row();
                    $sub_type = $type->subs_type;
                    $val = array(
                        'pid' => '1',
                        'balance' => '0'
                    );
                    $val2 = array(
                        'subs_type' => '1',
                        'membership' => '0'
                    );
                    $where = array(
                        'uid' => $uid
                    );
                    $this->b_login->update_values('biz_subscription', $val, $where);
                    $this->b_login->update_values('biz_users', $val2, $data);
                }
            }
        }
    }

    public function sub_notify() {
        $this->load->model('Mailmodel', 'mail');
        $res = $this->b_company->get_notify_sub();
        $res_count = $res->num_rows();
        if (!empty($res_count)) {
            $result = $res->result();
            foreach ($result as $val) {
                $uid = $val->uid;
                $to = $val->email;
                $enddate = $val->end_date;
                $Date = date("j F Y", strtotime($enddate));
                die;
                $name = $val->fname . ' ' . $val->lname;
                $subject = 'Bizjumper - Subscription Renewal Email';
                $data = array(
                    'app_link' => 'https://app.bizjumper.com',
                    'to' => $to,
                    'subject' => $subject,
                    'link' => 'email_template/sub_renewal',
                    'name' => $name,
                    'enddate' => $Date
                );

                $this->mail->sendemail($data);
            }
        }
    }

}
