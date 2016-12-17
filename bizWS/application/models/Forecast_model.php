<?php

class Forecast_Model extends CI_Model {

    public function resetForecast($data, $totalData, $companyId, $types, $totalTypes) {
        if ($data) {
            $this->db->where('cid', $companyId)->where_in('type', $types)->delete('biz_forecast');
            $this->db->insert_batch('biz_forecast', $data);
        }
        if ($totalData) {
            $this->db->where('cid', $companyId)->where_in('type', $totalTypes)->delete('biz_forecast_total');
            $this->db->insert_batch('biz_forecast_total', $totalData);
        }
        return TRUE;
    }

    public function getForecast($where) {
        $this->db->from('biz_forecast')->where($where);
        return $this->db->get();
    }

    public function gettotal($cid, $type, $val = NULL) {
        $where = array(
            'cid' => $cid,
            'type' => $type
        );
        $this->db->select('sum(fy1) as fy1,sum(fy2) as fy2,sum(fy3) as fy3,sum(fy4) as fy4,sum(fy5) as fy5');
        $this->db->from('biz_forecast');
        if ($val === 'expense') {
            $this->db->where('cid', $cid);
            $this->db->where_in('type', array('13', '14'));
        } else {
            $this->db->where($where);
        }
        return $this->db->get();
    }

    public function getincome($cid, $type) {
        $where = array(
            'cid' => $cid,
            'type' => $type
        );
        return $this->db->select('*')->from('biz_forecast_total')->where($where)->get();
    }

}
