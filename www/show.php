<?php

use FFormula\RobotSharpWeb\System;

if (!isset($path)) $path = '../';
include $path . 'vendor/autoload.php';

System\Log::set('RobotWeb', $path . '/log/web.log');
System\Log::get()->info('======== ' . $_SERVER['REQUEST_URI'] . $_SERVER['QUERY_STRING']);
System\Log::get()->info('IP: ' . $_SERVER['REMOTE_ADDR']);

$run = new System\Run();
$run->ses = new System\Session();
$run->api = new System\Api(require $path . 'config/api.php');
$run->display = new System\Display($path);

$run->create($_REQUEST);
