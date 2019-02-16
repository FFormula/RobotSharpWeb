<?php

namespace FFormula\RobotSharpWeb\System;

/**
 * Class Session - Класс обёртка для работы с переменными сессии
 * @package FFormula\RobotSharpWeb\System
 */
class Session
{
    /**
     * Session constructor. Запуск сессии
     */
    public function __construct()
    {
        session_start();
    }

    /**
     * Сохранение переменной
     * @param string $name - имя переменной
     * @param $value - значение
     */
    public function save(string $name, $value)
    {
        $_SESSION[$name] = $value;
    }

    /**
     * Получение сохранённого значения
     * @param string $name - имя перемнной
     * @return string - возвращаем сохранённое значение
     */
    public function load(string $name)
    {
        if (isset($_SESSION[$name]))
            return $_SESSION[$name];
        return '';
    }

    /**
     * Получение всех переменных сессии
     * @return array - массив всех значений
     */
    public function loadAll() : array
    {
        return $_SESSION;
    }
}