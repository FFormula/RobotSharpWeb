<?php

if (!isset($path)) $path = '../';
include $path . 'vendor/autoload.php';

FFormula\RobotSharpWeb\System\Log::set(
    new Monolog\Logger('RobotSharpWeb',
   [new Monolog\Handler\StreamHandler($path . '/log/web.log', Monolog\Logger::DEBUG)]));

$run = new FFormula\RobotSharpWeb\System\Run();
$run->ses = new FFormula\RobotSharpWeb\System\Session();
$run->api = new FFormula\RobotSharpWeb\System\Api(require $path . 'config/api.php');
$run->display = new FFormula\RobotSharpWeb\System\Display($path);

$run->create($_GET);
