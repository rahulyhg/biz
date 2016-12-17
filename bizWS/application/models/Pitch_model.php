<?php

class Pitch_model extends CI_Model {

    public function update_company($data, $where_data) {
        $this->db->where($where_data)->update('biz_company', $data);
        return TRUE;
    }

    public function get_pitchdetails($company_id) {
        return $this->db->select('*')->from('biz_pitch')->where('company_id', $company_id)->get();
    }

    public function set_pitchdetails($data, $company_id) {
        $result = $this->db->select('*')->from('biz_pitch')->where('company_id', $company_id)->get();
        $count = $result->num_rows();
//        echo '<pre>';
//        print_r($data);die;
        if ($count > 0) {
            $this->db->where('company_id', $company_id)->update('biz_pitch', $data);
        } else {
            $this->db->insert('biz_pitch', $data);
        }
        return TRUE;
    }

    public function get_funddetails($company_id) {
        return $this->db->select('*')->from('biz_pitch_funding')->where('company_id', $company_id)->get();
    }

    public function set_funddetails($data, $company_id) {
        $result = $this->get_funddetails($company_id);
        if ($result->num_rows() > 0) {
            $this->db->where('company_id', $company_id)->update('biz_pitch_funding', $data);
        } else {
            $this->db->insert('biz_pitch_funding', $data);
        }
        return TRUE;
    }

    public function get_competitordetail($company_id) {
        $check = array(
            'company_id' => $company_id
        );
        return $this->db->select('*')->from('biz_pitch_competitor')->where($check)->get();
    }

    public function set_competitordetail($data, $company_id) {
        $this->db->insert('biz_pitch_competitor', $data);
        return TRUE;
    }

    public function edit_competitordetail($data, $company_id, $id) {
        $update = array(
            'id' => $id,
            'company_id' => $company_id
        );
        $this->db->where($update)->update('biz_pitch_competitor', $data);
        return TRUE;
    }

    public function delete_competitordetail($id) {
        $this->db->where('id', $id);
        $this->db->delete('biz_pitch_competitor');
        return 1;
    }

    public function set_teamdetails($data) {
        $this->db->insert('biz_pitch_team', $data);
        return TRUE;
    }

    public function edit_teamdetails($data, $id) {
        $update = array(
            'id' => $id
        );
        $this->db->where($update)->update('biz_pitch_team', $data);
        return TRUE;
    }

    public function get_teamdetails($company_id, $limit = NULL) {
        $check = array(
            'company_id' => $company_id
        );
        $this->db->select('*')->from('biz_pitch_team')->where($check);
        if ($limit) {
            $this->db->order_by('id', 'ASC')->limit($limit);
        }
        return $this->db->get();
    }

    public function getteam($company_id, $id) {
        $check = array(
            'id' => $id,
            'company_id' => $company_id
        );
        return $this->db->select('name,role,description,image')->from('biz_pitch_team')->where($check)->get();
    }

    public function delete_teamdetail($id) {
        $this->db->where('id', $id);
        $this->db->delete('biz_pitch_team');
        return 1;
    }

    public function set_partnerdetails($data) {
        $this->db->insert('biz_pitch_partner', $data);
        return TRUE;
    }

    public function get_partnerdetails($company_id) {
        $check = array(
            'company_id' => $company_id
        );
        return $this->db->select('*')->from('biz_pitch_partner')->where($check)->get();
    }

    public function getpartner($company_id, $id) {
        $check = array(
            'id' => $id,
            'company_id' => $company_id
        );
        return $this->db->select('partner_name,description,image')->from('biz_pitch_partner')->where($check)->get();
    }

    public function edit_partnerdetails($data, $id) {
        $update = array(
            'id' => $id
        );
        $this->db->where($update)->update('biz_pitch_partner', $data);
        return TRUE;
    }

    public function delete_partnerdetail($id) {
        $this->db->where('id', $id);
        $this->db->delete('biz_pitch_partner');
        return 1;
    }

    public function get_milestonedetail($company_id) {
        $check = array(
            'company_id' => $company_id,
            'flag' => 1
        );
        return $this->db->select('*')->from('biz_milestones')->where($check)->order_by('DATE_FORMAT(DATE,"%M %e, %Y")')->limit('6')->get();
    }

    public function get_completedmilestone($company_id) {
        $check = array(
            'company_id' => $company_id,
            'flag' => 0
        );
        return $this->db->select('*')->from('biz_milestones')->where($check)->order_by('id', 'desc')->limit('6')->get();
    }

    public function get_singlemilestone($company_id, $id) {
        $check = array(
            'company_id' => $company_id,
            'id' => $id
        );
        return $this->db->select('*')->from('biz_milestones')->where($check)->get();
    }

    public function set_milestonedetail($data, $company_id) {
        $this->db->insert('biz_milestones', $data);
        return TRUE;
    }

    public function edit_milestonedetail($data, $company_id, $id) {
        $update = array(
            'id' => $id,
            'company_id' => $company_id
        );
        $this->db->where($update)->update('biz_milestones', $data);
        return TRUE;
    }

    public function delete_milestonedetail($id) {
        $this->db->where('id', $id);
        $this->db->delete('biz_milestones');
        return 1;
    }

    public function completed_milestonedetail($id, $company_id) {
        $data = array(
            'flag' => '0'
        );
        $update = array(
            'id' => $id,
            'company_id' => $company_id
        );
        $this->db->where($update)->update('biz_milestones', $data);
        return TRUE;
    }

    public function get_alldetails($company_id) {
        $this->db->select('*');
        $this->db->from('biz_company c');
        $this->db->join('biz_pitch p', 'c.company_id = p.company_id', 'left');
        $this->db->join('biz_pitch_funding f', 'c.company_id = f.company_id', 'left');
        $this->db->where('c.company_id', $company_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_publish($id) {
        return $this->db->select('*')->from('biz_pitch_publish')->where('company_id', $id)->get();
    }

    public function edit_publish($id, $data) {
        $this->db->where('company_id', $id)->update('biz_pitch_publish', $data);
        return TRUE;
    }

    public function publish_pitch($data) {
        $this->db->insert('biz_pitch_publish', $data);
        return TRUE;
    }

    public function get_publishpitch($id) {
        $data = array(
            'publish_id' => $id,
            'flag' => '1'
        );
        return $this->db->select('*')->from('biz_pitch_publish')->where($data)->get();
    }

}
