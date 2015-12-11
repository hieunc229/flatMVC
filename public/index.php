<?php
use Engine as Engine;
include('config.php');
if (DEBUG) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}
$url = isset($_GET['url']) ? $_GET['url'] : 'home/index';
$bootstrap = new Engine\Bootstrap($url);

spl_autoload_register(array($bootstrap,'loader'));
$bootstrap->init();


?>
