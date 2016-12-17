<?php

require 'instamojo.php';


$api = new Instamojo\Instamojo('61aec0f1b0b44f13bbda72b0597b35c3', '5e2ccbed55dd104552afa1850ea24a54', 'https://test.instamojo.com/api/1.1/');


try {
    $response = $api->paymentRequestStatus('6624fde481094398abbb2e302d420943');
    print_r($response);
} catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}
?>