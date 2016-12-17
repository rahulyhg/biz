<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function validate_users($data) {
        return $user = $this->db->select('user_id,fname,lname,email,modified,subs_type')->from('biz_users')->where($data)->get();
//         return $this->db->last_query();
    }

    public function update_data($user_id, $data) {
        $this->db->where('user_id', $user_id)->update('biz_users', $data);
        return TRUE;
    }

    public function signup_action($data) {
        $this->load->helper('string');
        $this->db->insert('biz_users', $data);
        $last_id = $this->db->insert_id();
        $authkey = md5(random_string('alnum', 10));
        $data1 = array(
            'id' => $last_id,
            'auth_key' => $authkey
        );
        $this->db->insert('biz_authenticate', $data1);
        $curr_date = date('Y-m-d');
        $package_data = array(
            'uid' => $last_id,
            'order_id' => '',
            'tid' => '',
            'pid' => '1',
            'balance' => '1',
            'start_date' => $curr_date,
            'end_date' => ''
        );
        $this->db->insert('biz_subscription', $package_data);
        return $authkey;
    }

    public function check_authkey($key) {
        return $this->db->select('*')->from('biz_authenticate')->where('auth_key', $key);
    }

    public function delete_auth($uid) {
        $this->db->where('id', $uid)->delete('biz_authenticate');
        return TRUE;
    }

    public function checkmail($data) {
        return $this->db->select('user_id,email,fname')->from('biz_users')->where($data)->get();
    }

    public function insert_otp($data) {
        return $this->db->insert('biz_resetpassword', $data);
    }

    public function check_passotp($data) {
        return $this->db->select('*')->from('biz_resetpassword')->where($data)->get();
    }

    public function delete_otp($where) {
        $this->db->where($where)->delete('biz_resetpassword');
    }

    public function change_password($user_id, $data) {
        return $this->db->where('user_id', $user_id)->update('biz_users', $data);
    }

    public function check_data($where) {
        return $this->db->select('*')->from('biz_resetpassword')->join('biz_users', 'biz_users.user_id = biz_resetpassword.memberid')->where($where)->get();
    }

    public function check_password($where) {
        return $this->db->select('*')->from('biz_users')->where($where)->get();
    }

    public function delete_user($id) {
        return $this->db->where('user_id', $id)->delete('biz_users');
    }

    public function insert_data($table, $data) {
        return $this->db->insert($table, $data);
    }

    public function select_data($table, $data) {
        return $this->db->select('*')->from($table)->where($data)->get();
    }

    public function update_values($table, $data, $where) {
        return $this->db->where($where)->update($table, $data);
    }

}
