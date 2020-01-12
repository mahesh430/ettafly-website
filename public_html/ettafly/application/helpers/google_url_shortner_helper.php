<?php

function google_url_shortner($url) {
    // This is the URL you want to shorten
    //$longUrl = 'http://www.mysite.com/XXXXX/XX/$_POST['qrname']';
    $longUrl = $url;
// Get API key from : http://code.google.com/apis/console/
    $apiKey = 'AIzaSyByamk6Vf0xm9Nv1DUmjJA_Ze4PJikCQ44';

    $postData = array('longUrl' => $longUrl);
    $jsonData = json_encode($postData);

    $curlObj = curl_init();
    curl_setopt($curlObj, CURLOPT_URL, 'https://www.googleapis.com/urlshortener/v1/url?key=' . $apiKey);
    curl_setopt($curlObj, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curlObj, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curlObj, CURLOPT_HEADER, 0);
    curl_setopt($curlObj, CURLOPT_HTTPHEADER, array('Content-type:application/json'));
    curl_setopt($curlObj, CURLOPT_POST, 1);
    curl_setopt($curlObj, CURLOPT_POSTFIELDS, $jsonData);

    $response = curl_exec($curlObj);

// Change the response json string to object
    $json = json_decode($response);
    curl_close($curlObj);
    //echo 'Shortened URL is: ' . $json->id;
    // for getting id  substr($json->id, -6);
    // $filename = substr(strrchr($url, "/"), 1);
    //  echo $filename;
    return $json->id;
}
