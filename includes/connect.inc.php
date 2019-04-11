<?php
//include("includes/vars.inc.php");

ini_set("include_path", ".:".SITE_PATH."application/models:".SITE_PATH."application/views:".SITE_PATH."application/views/helpers:".SITE_PATH."application/controllers:".SITE_PATH."application/core:".SITE_PATH."/includes");


   $u_host = 'db12.freehost.com.ua';
   $u_name = 'imagelab_smida';
   $u_password = 'yHjTe9IOw';
   $u_db = 'imagelab_smida';



include(SITE_PATH. "application" . DIRSEP . "models" . DIRSEP . "classes" . DIRSEP . "DataBase.php");

$db = DataBase::getDB($u_host, $u_name, $u_password, $u_db);

session_start();

?>
