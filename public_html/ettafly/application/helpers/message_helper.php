<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

function send_message($message = "", $mobile_number) {

    $message = urlencode($message);
    $URL = "http://login.smsmoon.com/API/sms.php"; // connecting url 
    $post_fields = ['username' => 'v2youserve', 'password' => 'vizag@123', 'from' => 'VTOYOU', 'to' => $mobile_number, 'msg' => $message, 'type' => 1, 'dnd_check' => 0];
    //file_get_contents("http://login.smsmoon.com/API/sms.php?username=colourmoonalerts&password=vizag@123&from=WEBSMS&to=$mobile_number&msg=$message&type=1&dnd_check=0");
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $URL);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    return true;
}

?>
