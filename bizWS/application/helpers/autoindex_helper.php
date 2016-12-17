<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

function generate_autoindex($type) {
    $CI = & get_instance();
    $CI->load->model('Autoindex_model', 'autoindex');
    $autoindex = $CI->autoindex->getAutoindex($type);
    if ($autoindex->num_rows()) {
        $last_id = $autoindex->row('last_id');
        if ($CI->autoindex->updateAutoindex($last_id, $type)) {
            return $last_id;
        }
    }
}
