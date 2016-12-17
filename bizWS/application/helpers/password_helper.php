<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

function _randomPassword() {
    return 12345;
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $random = str_shuffle($alphabet);
    return substr($random, 0, 6);
}
