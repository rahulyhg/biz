<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('login_model', 'b_login');
        $this->load->library('form_validation');
        $this->load->model('Mailmodel', 'mail');
        date_default_timezone_set('Asia/Kolkata');
    }

    public function index() {
        if ($this->session->userdata('user_id')) {
            redirect('dashboard');
        }
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $email = $this->input->post('email');
            $fname = $this->input->post('firstname');
            $lname = $this->input->post('secondname');
            $check = array(
                'email' => $email
            );
            $result = $this->b_login->checkmail($check);
            $count = $result->num_rows();
            if ($count == '0') {
                $data = array(
                    'fname' => $fname,
                    'lname' => $lname,
                    'email' => $email,
                    'password' => md5('biz_jump' . $this->input->post('password')),
                    'subs_type' => '1',
                    'status' => '0',
                    'membership' => '0',
                    'download' => '0',
                    'flag' => '0',
                    'created' => date("Y-m-d h:i:s"),
                    'modified' => date("Y-m-d h:i:s")
                );
                $auth_value = $this->b_login->signup_action($data);
                $url = $this->site_url . 'signup/activation/' . $auth_value;
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
                $this->session->set_flashdata('error', $this->lang->line('send_mail'));
            } else {
                $this->session->set_flashdata('already_reg', 'This email id is already registered.');
            }
//            $this->mail->sendMail($to, $subject, $message);
            redirect('signup');
        }
        $value = array(
            'maincontent' => 'front/signup',
            'keyword'=>'Signup'
        );
        $this->load->view('layout/frontlayout', $value);
    }

    public function activation() {
        $authkey = $this->uri->segment(3);
        $query = $this->b_login->check_authkey($authkey)->get();
        if ($query->num_rows() > 0) {
            $uid = $query->row('id');
            $check_data = array(
                'user_id' => $uid
            );
            $qu = $this->b_login->validate_users($check_data);
            if ($qu->num_rows() > 0) {
                $user_data = array(
                    'status' => 1
                );
                $this->b_login->update_data($uid, $user_data);
                $this->b_login->delete_auth($uid);
                $this->session->set_flashdata('activate', $this->lang->line('acc_activate'));
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('msg', $this->lang->line('link_expired'));
            redirect('login');
        }
    }

    public function check_email() {
        $email = $this->input->post('email');
        $data = array(
            'email' => $email
        );
        $result = $this->b_login->checkmail($data);
        $count = $result->num_rows();
        if ($count == '0') {
            echo 'ok';
        } else {
            echo 'used';
        }
    }

}
