<?php
$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
//echo(parse_url($url, PHP_URL_SCHEME));
//echo(parse_url($url, PHP_URL_HOST));
//echo(parse_url($url, PHP_URL_PATH));
echo '</br>';
var_dump(parse_url($url));


//$url = $_GET['url'];
//        'http://username:password@hostname:9090/path?arg=value#anchor';

//var_dump(parse_url($url));
//echo '</br>';
//echo(parse_url($url, PHP_URL_SCHEME));
//echo '</br>';
//var_dump(parse_url($url, PHP_URL_USER));
//echo '</br>';
//var_dump(parse_url($url, PHP_URL_PASS));
//echo '</br>';
//echo(parse_url($url, PHP_URL_HOST));
//echo(parse_url($url, PHP_URL_PATH));
//echo '</br>';
//var_dump(parse_url($url, PHP_URL_QUERY));
//echo '</br>';
//var_dump(parse_url($url, PHP_URL_FRAGMENT));
?>