<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Subscription extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Login_model', 'b_login');
        $this->load->model('Subscription_model', 'Subscription');
        $this->load->model('Login_model', 'login');
        $this->load->library('form_validation');
    }

    public function index() {
        $user_id = $this->session->userdata('user_id');
        if (empty($user_id)) {
            redirect('login');
        }
    }

    public function get_sub_detail() {
        $user_id = $this->session->userdata('user_id');
        if (!empty($user_id)) {
            $result = $this->Subscription->get_sub_detail()->row();
            $type = $result->download;
            if ($type == '0') {
                echo '1';
            } else {
                echo '2';
            }
        } else {
            echo '3';
        }
    }

    public function get_leads() {
        $user_id = $this->session->userdata('user_id');
        if (!empty($user_id)) {
            $where = array(
                'uid' => $user_id,
                'status' => 'Success'
            );
            $sub_where = array(
                'uid' => $user_id
            );
            $result = $this->login->select_data('biz_subhistory', $where);
            $count = $result->num_rows();
            if ($count > 0) {
                $result = $this->login->select_data('biz_subscription', $sub_where)->row();
                $type = $result->balance;
                if ($type == '0') {
                    echo '3';
                } else {
                    echo '2';
                }
            } else {
                $result = $this->login->select_data('biz_subscription', $sub_where)->row();
                $type = $result->balance;
                if ($type == '0') {
                    echo '1';
                } else {
                    echo '2';
                }
            }
        } else {
            echo '4';
        }
    }

}
