<?php

namespace FFormula\RobotSharpWeb\System;

/**
 * Class Display - Модуль для подготовки данных для отображения страниц с использованием шаблонизатора Smarty
 * @package FFormula\RobotSharpWeb\System
 */
class Display
{
    /** @var \Smarty - шаблонизатор*/
    private $smart;

    /**
     * Display constructor - создание и насторйка шаблонизатора Smarty
     * @param string $path - путь к корню проекта
     */
    public function __construct(string $path)
    {
        $this->smart = new \Smarty();
        $this->smart->setTemplateDir($path . 'templates');
        $this->smart->setCompileDir($path . 'templates_c');
    }

    /**
     * передача данных для всех подстраниц, "боксиков"
     * @param array $box - массив с данными для всех боксиков, каждый элемент - для отдельной подстраницы
     */
    public function assign(array $box) : void
    {
        foreach ($box as $name => $data)
            $this->assignBox($name, $data);
    }

    /**
     * передача данных для одной подстраницы, "боксика"
     * @param string $name - имя подстраницы
     * @param $data - массив или объект для передачи в подстраницу
     */
    private function assignBox(string $name, $data) : void
    {
        $this->smart->assign($name, (object)$data);
        Log::get()->debug('Box ' . $name . ': ' . json_encode($data));
    }

    /**
     * @param string $page отображение главной страницы
     * @throws \SmartyException - в случае если файл не найден или ошибка в шаблонах
     */
    public function show(string $page)
    {
        $this->smart->display('page/' . $page . '.tpl');
    }
}