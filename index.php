<?php
session_start();

require_once('./framework/support/Route.php');
require(__DIR__ . '/vendor/autoload.php');
require_once('./framework/database/Connect.php');

use Database\Connect;
use Framework\Support\Route;

// error_reporting(E_ERROR | E_PARSE);
error_reporting(E_ERROR);
ini_set('display_errors', 'on');

$instance = Connect::getInstance();
$conn     = $instance->getConnection();

$app = new Route();
$app->run();
