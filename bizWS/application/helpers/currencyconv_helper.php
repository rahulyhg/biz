<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

function count_digit($number) {
    return strlen($number);
}

function divider($number_of_digits) {
    $tens = "1";
    while (($number_of_digits - 1) > 0) {
        $tens.="0";
        $number_of_digits--;
    }
    return $tens;
}

function converter($val, $currency) {
    switch ($currency) {
        case '1':
            $num = $val;
            $ext = ""; //thousand,lac, crore
            $number_of_digits = count_digit($num); //this is call :)
            if ($number_of_digits > 3) {
                if ($number_of_digits % 2 != 0)
                    $divider = divider($number_of_digits - 1);
                else
                    $divider = divider($number_of_digits);
            } else
                $divider = 1;

            $fraction = $num / $divider;
            $fraction = $fraction;
            if ($number_of_digits == 4 || $number_of_digits == 5)
                $ext = "k";
            if ($number_of_digits == 6 || $number_of_digits == 7)
                $ext = "Lac";
            if ($number_of_digits == 8 || $number_of_digits == 9)
                $ext = "Cr";
            return $fraction . " " . $ext;

            break;

        case '2':
            $n = $val;
            $val = '';
            if ($n >= 1000000000000) {
                $val = round(($n / 1000000000000), 1) . 'T';
            } else if ($n >= 1000000000) {
                $val = round(($n / 1000000000), 1) . 'B';
            } else if ($n >= 1000000) {
                $val = round(($n / 1000000), 1) . 'M';
            } else if ($n >= 1000) {
                $val = round(($n / 1000), 1) . 'K';
            } else if ($n >= 0) {
                $val = $n;
            } else {
                $val = '00';
            }
            return $val;
            break;
        default:
            $n = $val;
            $val = '';
            if ($n >= 1000000000000) {
                $val = round(($n / 1000000000000), 1) . 'T';
            } else if ($n >= 1000000000) {
                $val = round(($n / 1000000000), 1) . 'B';
            } else if ($n >= 1000000) {
                $val = round(($n / 1000000), 1) . 'M';
            } else if ($n >= 1000) {
                $val = round(($n / 1000), 1) . 'K';
            } else if ($n >= 0) {
                $val = $n;
            } else {
                $val = '00';
            }
            return $val;
            break;
    }
    //function call
}
