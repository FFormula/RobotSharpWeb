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

    /**
     * @param string $class class to initialize
     * @param string $method method to call
     * @param array $params arguments data
     * @return object an result of API function
     * @throws \Exception on any API error throw error message
     */
    public function call(string $class, string $method, array $params = []) : object
    {
        $this->url = $this->host .
            '&class=' . $class .
            '&method=' . $method .
            '&token=' . $this->token;

        foreach ($params as $name => $value)
            $this->url .= '&' . $name . '=' . urlencode($value);
        Log::get()->info('API Call: ' . $this->url);

        $json = file_get_contents($this->url);
        Log::get()->debug('API Resp: ' . $json);

        $result = json_decode($json);

        if ($result->error != 'ok')
            throw new \Exception($result->error);

        return (object)$result->answer;
    }
}