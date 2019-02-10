<?php

namespace FFormula\RobotSharpWeb\System;

class Api
{
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
        $url = $this->host .
            '&class=' . $class .
            '&method=' . $method .
            '&token=' . $this->token;

        foreach ($params as $name => $value)
            $url .= '&' . $name . '=' . urlencode($value);

        $json = file_get_contents($url);
        $obj = json_decode($json);
        echo "<!-- get $url\n" . var_export($obj, true) . " -->";
        if ($obj->error == 'ok')
            return $obj->answer;
        die ($obj->error);
    }
}