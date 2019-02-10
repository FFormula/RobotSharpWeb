<?php

namespace FFormula\RobotSharpWeb\System;

class Api
{
    /** @var string */
    var $url;
    /** @var string */
    var $host;
    /** @var string */
    var $token;

    public function __construct(array $config)
    {
        $this->host = $config['host'];
    }

    public function setToken(string $token)
    {
        $this->token = $token;
    }

    public function call($class, $method, $params = [])
    {
        $this->url = $this->host .
            '&class=' . $class .
            '&method=' . $method .
            '&token=' . $this->token;

        foreach ($params as $name => $value)
            $this->url .= '&' . $name . '=' . urlencode($value);

        $json = file_get_contents($this->url);
        return json_decode($json);
    }
}