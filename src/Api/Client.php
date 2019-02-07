<?php

namespace FFormula\RobotSharpWeb\Api;

class Client
{
    var $host;

    public function __construct($config)
    {
        $this->host = $config['host'];
    }

    public function call($class, $method, $params = [])
    {
        $url = $this->host .
            '&class=' . $class .
            '&method=' . $method .
            '&token=' . $_SESSION['token'];

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