<?php

session_start();
include '../vendor/autoload.php';

$client = new \FFormula\RobotSharpWeb\Api\Client(require '../config/api.php');

$task = $client->call('Task','getTask', ['taskId' => $_GET['taskId']]);
var_dump($task);

$langs = $client->call('Lang','getLangList');


$smart = new Smarty();
$smart->setTemplateDir('../templates');
$smart->assign('task', $task);
$smart->assign('langs', $langs);
$smart->display('task.tpl');
