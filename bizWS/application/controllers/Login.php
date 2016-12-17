<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('login_model', 'b_login');
        $this->load->model('Mailmodel', 'mail');
        $this->load->library('form_validation');
        $this->load->helper('string');
    }

    public function index() {
        $user_id = $this->session->userdata('user_id');
        if (!empty($user_id)) {
            redirect('dashboard');
        } else {
            if ($this->input->server('REQUEST_METHOD') === 'POST') {
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $remember = $this->input->post('remember');
                if ($remember == "1") { // if user check the remember me checkbox		
                    $cookie = array(
                        'name' => 'remember_me',
                        'value' => $email,
                        'expire' => '86500',
                    );
                    $this->input->set_cookie($cookie);
                    $cookie = array(
                        'name' => 'password',
                        'value' => $password,
                        'expire' => '86500',
                    );
                    $this->input->set_cookie($cookie);
                }
                $validation = array(
                    array('field' => 'email', 'label' => 'Login Id', 'rules' => 'trim|required'),
                    array('field' => 'password', 'label' => 'Password', 'rules' => 'trim|required'),
                );
                $this->form_validation->set_rules($validation);
                if ($this->form_validation->run()) {
                    $data = array(
                        'email' => $email,
                        'password' => md5('biz_jump' . $password),
                        'status' => '1'
                    );
                    $result = $this->b_login->validate_users($data);
                    $login_count = $result->num_rows();
                    if ($login_count > 0) {
                        $data = array(
                            'email' => $email,
                            'password' => md5('biz_jump' . $password),
                            'status' => '1',
                            'flag' => '0'
                        );
                        $result = $this->b_login->validate_users($data);
                        $count = $result->num_rows();
                        if ($count > 0) {
                            $this->session->set_userdata($result->row_array());
                            $data = array(
                                'flag' => '0'
                            );
                            $user_id = $this->session->userdata('user_id');
                            $this->b_login->update_data($user_id, $data);
                            redirect('dashboard');
                        } else {
                            $this->session->set_flashdata('error', $this->lang->line('account_login'));
                            redirect('login');
                        }
                    } else {
                        $this->session->set_flashdata('error', $this->lang->line('error_login'));
                        redirect('login');
                    }
                }
            }
            $value = array(
                'maincontent' => 'front/login',
                'keyword'=>'Signin'
            );
            $this->load->view('layout/frontlayout', $value);
        }
    }

    public function logout() {
//        $data = array(
//            'flag' => '0'
//        );
//        $user_id = $this->session->userdata('user_id');
//        $this->b_login->update_data($user_id, $data);
        $this->session->sess_destroy();
        redirect('login');
    }

    public function request_password() {
        if ($this->session->userdata('user_id')) {
            redirect('dashboard');
        }
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $email = $this->input->post('email');
            $data = array(
                'email' => $email
            );
            $check = $this->b_login->checkmail($data);
            $count = $check->num_rows();
            $result = $check->row();
            if ($count == '0') {
                echo '1';
            } else {
                $userid = $result->user_id;
                $email = $result->email;
                $name = $result->fname;
                $check_id = array(
                    'memberid' => $userid
                );
                $authkey = md5(random_string('alnum', 15));
                $data1 = array(
                    'memberid' => $userid,
                    'otp' => $authkey,
                    'created' => date("Y-m-d h:i:s")
                );
                $check = $this->b_login->check_passotp($check_id);
                $result = $check->row();
                $count = $check->num_rows();
                if ($count > '0') {
                    $this->b_login->delete_otp($check_id);
                }
                $result = $this->b_login->insert_otp($data1);
                $url = $this->site_url . 'login/reset_password?memberId=' . $userid . '&email=' . $email . '&authkey=' . $authkey . '&status=true';
                $to = $email;
                $subject = 'Hi ' . $name . ', Welcome to BizJumper';
                $data = array(
                    'url' => $url,
                    'to' => $to,
                    'subject' => $subject,
                    'link' => 'email_template/password_reset',
                    'fname' => $name
                );

                $this->mail->sendemail($data);
//                $this->session->set_flashdata('error', $this->lang->line('send_mail'));
                echo '2';
            }
            die;
        }
        $value = array(
            'maincontent' => 'front/reset_password',
            'keyword'=>'Password Reset'
        );
        $this->load->view('layout/frontlayout', $value);
    }

    public function reset_password() {
        $id = $this->input->get('memberId');
        $email = $this->input->get('email');
        $authkey = $this->input->get('authkey');
        $status = $this->input->get('status');
        $data = array(
            'memberid' => $id,
            'otp' => $authkey
        );
        $check = $this->b_login->check_passotp($data);
        $result = $check->row();
        $count = $check->num_rows();
        if ($count == '1') {
            $form['id'] = $this->input->get('memberId');
            $form['email'] = $this->input->get('email');
            $form['authkey'] = $this->input->get('authkey');
            $form['maincontent'] = 'front/select_password';
            $this->load->view('layout/frontlayout', $form);
        } else {
            redirect('login');
        }
    }

    public function change_password() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $pass = $this->input->post('password');
            $confirmpass = $this->input->post('confirm_pass');
            if ($pass == $confirmpass) {
                $id = $this->input->post('id');
                $email = $this->input->post('email');
                $authkey = $this->input->post('authkey');
                $password = md5('biz_jump' . $pass);
                $check = array(
                    'email' => $email
                );
                $id_check = $this->b_login->check_data($check);
                $count_values = $id_check->num_rows();
                if ($count_values > '0') {
                    $data = array(
                        'password' => $password
                    );
                    $data1 = array(
                        'memberid' => $id
                    );
                    $result = $this->b_login->change_password($id, $data);
                    if ($result) {
                        $this->b_login->delete_otp($data1);
                    }
                    $data = array(
                        'email' => $email
                    );
                    $check = $this->b_login->checkmail($data);
                    $result = $check->row();
                    $name = $result->fname;
                    $to = $email;
                    $subject = 'Your Password Has Changed Recently';
                    $data = array(
                        'to' => $to,
                        'subject' => $subject,
                        'link' => 'email_template/passreset_confirmation',
                        'fname' => $name
                    );

                    $this->mail->sendemail($data);
                    $value['html'] = '<span><b>Your Password is Successfully changed. Please signin by using your credintials.</b></span></br>
                                    <b>For Signin click here:</b> <a href="' . base_url() . 'login">Signin</a></b></br>
                                    <b>For Signup click here:</b> <a href="' . base_url() . 'signup">Signup</a></b>';
                } else {
                    $value['html'] = '<span><b>Something Wrong Happen.</b></span></br>';
                }
                $value['maincontent'] = 'front/complet_password';
                $value['keyword']= 'Password Reset';
                $this->load->view('layout/frontlayout', $value);
            } else {
                $this->session->set_flashdata('msg', 'Something wrong!!');
                redirect('login');
            }
        }
    }

    public function account_password() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $pass = $this->input->post('password');
            $password = md5('biz_jump' . $pass);
            $user_id = $this->session->userdata('user_id');
            $update = array(
                'password' => $password
            );
            $this->b_login->update_data($user_id, $update);
            echo '1';
        }
    }

    public function delete_account() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $user_id = $this->session->userdata('user_id');
            $pass = $this->input->post('password');
            $data = array(
                'user_id' => $user_id,
                'password' => md5('biz_jump' . $pass)
            );
            $result = $this->b_login->check_password($data);
            $count = $result->num_rows();
            if ($count > '0') {
                $result = $this->b_login->delete_user($user_id);
                $this->session->sess_destroy();
                echo '2';
            } else {
                echo '1';
            }
        }
    }

    public function check_data($table, $where) {
        return $this->db->select('*')->from($table)->where($where)->get();
    }

    public function comeback() {
        $usr_id = $this->session->userdata('user_id');
        if (!isset($usr_id)) {
            $data = array(
                'maincontent' => 'front/comeback'
            );
            $this->load->view('layout/frontlayout', $data);
        } else {
            redirect('dashboard');
        }
    }

}
