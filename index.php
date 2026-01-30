<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/src/Utility/config.php';

use Controller\CFrontController;

$frontController = new CFrontController();
$frontController->start();
?>