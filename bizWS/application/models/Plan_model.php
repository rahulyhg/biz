<?php

class Plan_Model extends CI_Model {

    public function setPlanMenu($data) {
        $this->db->insert('plan_menu', $data);
        return TRUE;
    }

    public function setPlanCover($data) {
        $this->db->insert('plan_cover', $data);
        return TRUE;
    }

    public function setPlanMenuBatch($data) {
        $this->db->insert_batch('plan_menu', $data);
        return TRUE;
    }

    public function getPlanMenu($where, $sort_by = null, $sort_order = 'ASC') {
        $this->db->from('plan_menu')->where($where);
        if ($sort_by) {
            $this->db->order_by($sort_by, $sort_order);
        }
        return $this->db->get();
    }

    public function getPlanCover($where, $sort_by = null, $sort_order = 'ASC') {
        $this->db->from('plan_cover')->where($where);
        if ($sort_by) {
            $this->db->order_by($sort_by, $sort_order);
        }
        return $this->db->get();
    }

    public function updatePlanMenu($data, $where) {
        $this->db->where($where)->update('plan_menu', $data);
        return TRUE;
    }

    public function updatePlanCover($data, $where) {
        $this->db->where($where)->update('plan_cover', $data);
        return TRUE;
    }

    public function deletePlanMenu($where) {
        $this->db->where($where)->delete('plan_menu');
        return TRUE;
    }

}
