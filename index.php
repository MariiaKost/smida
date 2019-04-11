<?php
error_reporting(0);

function __autoload($class_name) {

    $filename = $class_name . '.php';
    $file = SITE_PATH . 'application' . DIRSEP . 'models' . DIRSEP . 'classes' . DIRSEP . $filename;
    if (file_exists($file) == false)
    {

        return false;
    }
    include ($file);
}

/*
if(!function_exists('mb_ucfirst'))
{
    function mb_ucfirst($string, $enc = 'UTF-8')
    {
        return mb_strtoupper(mb_substr($string, 0, 1, $enc), $enc) .
        mb_substr($string, 1, mb_strlen($string, $enc), $enc);
    }
}
*/
require_once 'application/bootstrap.php';

