<?php

    include '../vendor/autoload.php';

    $api = new \FFormula\RobotSharpWeb\System\Api(require '../config/api.php');

    $smart = new Smarty();
    $smart->setTemplateDir('../templates');
    $smart->setCompileDir('../templates_c');

    $pageName = $_GET['page'];
    $pageClass = '\\FFormula\\RobotSharpWeb\\Page\\' . $pageName;
    if (!class_exists($pageClass))
        die('class ' . $pageClass . ' does not exists');

    /** @var $page \FFormula\RobotSharpWeb\Page\Page */
    $page = new $pageClass();
    $page->setApi($api);
    $page->setSmarty($smart);
    $page->create($_GET);

    $smart->display('page/' . $pageName . '.tpl');
