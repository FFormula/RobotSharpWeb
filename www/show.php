<?php

use FFormula\RobotSharpWeb\System;

if (!isset($path)) $path = '../';
include $path . 'vendor/autoload.php';

if (!file_exists($path . 'config/api.php'))
    die('Copy "config/api.php.default" to "config/api.php" and edit it');

System\Log::set('RobotWeb', $path . '/log/web.log');
System\Log::get()->info('IP: ' . $_SERVER['REMOTE_ADDR'] . ' ====================================');
System\Log::get()->info('Request: ' . $_SERVER['REQUEST_URI'] . $_SERVER['QUERY_STRING']);

$run = new System\Run();
$run->ses = new System\Session();
$run->api = new System\Api(require $path . 'config/api.php');
$run->display = new System\Display($path);

$run->create($_REQUEST);
