<?php

    $root = '../';
    $inc_files = array('engine/Bootstrap.php');

    foreach ($inc_files as $file) {
        include_once($root . $file);
    }

    define('DEBUG', true);
    define('ROOT_DIR', $root);
    define('DS', DIRECTORY_SEPARATOR);

    //Default Controller & AMQPConnection
    define('DEFAULT_NAMESPACE', 'App\Controllers\\');
    define('DEFAULT_CONTROLLER', 'Home');
    define('DEFAULT_ACION', 'Index');
