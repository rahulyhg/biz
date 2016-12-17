<?php

class Payment_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function updatePayment($data, $orderid) {
        $this->db->where('order_id', $orderid)->update('biz_subhistory', $data);
        return TRUE;
    }

    public function savePayment($data) {
        return $this->db->insert('biz_subhistory', $data);
    }

    public function select_subscription() {
        $user_id = $this->session->userdata('user_id');
        return $this->db->select('*')->from('biz_subscription')->where('uid', $user_id)->get();
    }

    public function insert_subscription($table, $data) {
        return $this->db->insert($table, $data);
    }

    public function update_subscription($data) {
        $uid = $this->session->userdata('user_id');
        $this->db->where('uid', $uid)->update('biz_subscription', $data);
        return TRUE;
    }

    public function check_data() {
        $date = '2016-11-05';
        return $this->db->select('uid')->from('biz_subscription')->where('end_date <', $date)->get();
    }

    public function get_subtype($data) {
        return $this->db->select('subs_type')->from('biz_users')->where_in('user_id', $data)->get();
    }

    public function update_data($data, $where, $table) {
        $this->db->where($where)->update($table, $data);
        return TRUE;
    }

}

?>