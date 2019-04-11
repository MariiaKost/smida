<?php
define ('DIRSEP', DIRECTORY_SEPARATOR);
// Узнаём путь до файлов сайта
$site_path = realpath(dirname(__FILE__) . DIRSEP . '..' . DIRSEP) . DIRSEP;
define ('SITE_PATH', $site_path);


require_once 'includes/connect.inc.php';
require_once 'includes/vars.inc.php';
require_once 'core/Model.php';
require_once 'core/View.php';
require_once 'core/Controller.php';
require_once 'core/Route.php';
error_reporting(0);
Route::start($db);
