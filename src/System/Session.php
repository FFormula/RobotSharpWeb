<?php

namespace FFormula\RobotSharpWeb\System;

class Session
{
    public function __construct()
    {
        session_start();
    }

    public function save(string $name, $value)
    {
        $_SESSION[$name] = $value;
    }

    public function load(string $name)
    {
        if (isset ($_SESSION[$name]))
            return $_SESSION[$name];
        return '';
    }
}