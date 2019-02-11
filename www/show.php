<?php

    if (!isset($path)) $path = '../';

    include $path . 'vendor/autoload.php';

    $log = new Monolog\Logger('RobotSharpWeb');
    $log->pushHandler(new Monolog\Handler\StreamHandler($path . '/log/web.log', Monolog\Logger::DEBUG));
    $log->info('Request: ' . $_SERVER['REQUEST_URI'] . $_SERVER['QUERY_STRING']);
    $log->info('Client IP: ' . $_SERVER['REMOTE_ADDR']);

    $api = new \FFormula\RobotSharpWeb\System\Api(require $path . 'config/api.php');

    if (isset($_GET['page'])) 
        $pageName = $_GET['page'];
    else
        $pageName = 'TaskList';
    $pageClass = '\\FFormula\\RobotSharpWeb\\Page\\' . $pageName;
    if (!class_exists($pageClass)) {
        $log->error('class ' . $pageClass . ' does not exists');
        die('class ' . $pageClass . ' does not exists');
    }
    $smart = new Smarty();
    $smart->setTemplateDir($path . 'templates');
    $smart->setCompileDir($path . 'templates_c');

    /** @var $page \FFormula\RobotSharpWeb\Page\Page */
    $page = new $pageClass();
    $page->setApi($api);
    $page->setSmarty($smart);
    $page->create($_GET);

    try {
        $smart->display('page/' . $pageName . '.tpl');
    } catch (\Exception $ex) {
        $log->error($ex->getMessage());
    }
