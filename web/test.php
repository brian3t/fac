<?php

define('WEBROOT', 'http://fac/');

$html = file_get_contents(dirname(__DIR__) . "/web/sites/project4url/index.html");
$html = '    <link rel="stylesheet" href="hattp://sa/assets/css/owl.carousel.css">';

//$search = '/<link rel="stylesheet" href=([a-zA-Z\/])"/i';//root dir or current dir
$search = '/<link rel="stylesheet" href="(?!http)/';
//$search = '/\<link rel=\"/';
preg_match_all($search, $html, $out);
$replaced = preg_replace($search, '<link rel="stylesheet" href="' . WEBROOT, $html);

$a = 1;

