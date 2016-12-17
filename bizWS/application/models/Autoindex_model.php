<?php

class Autoindex_Model extends CI_Model {

    function getAutoindex($type = 'order_id') {
        $this->db->select('last_id')->from('autoindex')->where_in('type', $type);
        return $this->db->get();
    }

    public function updateAutoindex($id, $type = 'order_id') {
        if ($id) {
            $this->db->where('type', $type)->update('autoindex', array('last_id' => ++$id));
            return TRUE;
        }
        return FALSE;
    }

}
