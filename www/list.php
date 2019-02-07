<?php

session_start();
include '../vendor/autoload.php';

$client = new \FFormula\RobotSharpWeb\Api\Client(require '../config/api.php');

$tasks = $client->call('Task', 'getTaskList');

$smart = new Smarty();
$smart->setTemplateDir('../templates');
$smart->assign('tasks', $tasks);
$smart->display('list.tpl');