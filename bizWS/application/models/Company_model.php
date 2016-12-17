<?php

class Company_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function validate_company() {
        $user_id = $this->session->userdata('user_id');
        return $this->db->select('id,company_id,name,created')->from('biz_company')->where('user_id', $user_id)->get();
    }

    public function setcompany($data) {
        $this->db->insert('biz_company', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function getcompany($id) {
        $user_id = $this->session->userdata('user_id');
        return $this->db->select('*')->from('biz_company')->where('user_id', $user_id)->where('company_id', $id)->get();
    }

    public function deletecompany($company_id) {
        $user_id = $this->session->userdata('user_id');
        $where = array(
            'user_id' => $user_id,
            'company_id' => $company_id
        );
        $result = $this->db->where($where)->delete('biz_company');
        if ($result) {
            $data = array(
                'company_id' => $company_id
            );
            $this->db->where($data)->delete('biz_milestones');
            $this->db->where($data)->delete('biz_pitch');
            $this->db->where($data)->delete('biz_pitch_competitor');
            $this->db->where($data)->delete('biz_pitch_funding');
            $this->db->where($data)->delete('biz_pitch_partner');
            $this->db->where($data)->delete('biz_pitch_team');
            $this->db->where($data)->delete('biz_pitch_funding');
        }
        return 1;
    }

    public function check_lead() {
        $user_id = $this->session->userdata('user_id');
        return $this->db->select('balance')->from('biz_subscription')->where('uid', $user_id)->get();
    }

    public function update_sub($data) {
        $user_id = $this->session->userdata('user_id');
        $this->db->where('uid', $user_id)->update('biz_subscription', $data);
        return TRUE;
    }

    public function get_subscription($data) {
        $result = array(
            'end_date <' => $data,
            'end_date !=' => '0000-00-00'
        );
        return $this->db->select('uid')->from('biz_subscription')->where($result)->get();
    }

    public function get_notify_sub() {
        return $this->db->select('uid,email,fname,lname,end_date')->from('biz_subscription')->join('biz_users', 'biz_users.user_id=biz_subscription.uid')->where("end_date = DATE_ADD(CURDATE(), INTERVAL 2 DAY)", NULL, FALSE)->get();
    }

}
