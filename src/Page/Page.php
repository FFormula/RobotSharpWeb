<?php
namespace FFormula\RobotSharpWeb\Page;

use FFormula\RobotSharpWeb\System\Api;

abstract class Page
{
    /** @var array */
    var $post;
    /** @var Api */
    var $api;
    /** @var \Smarty */
    var $smarty;

    public function __construct()
    {
        session_start();
    }

    public function setApi(Api $api)
    {
        $this->api = $api;
        $this->api->setToken($this->load('token'));
    }

    public function setSmarty(\Smarty $smarty)
    {
        $this->smarty = $smarty;
    }

    abstract public function create(array $get);

    protected function save($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    protected function load($name)
    {
        if (isset ($_SESSION[$name]))
            return $_SESSION[$name];
        return '';
    }

    protected function call($class, $method, $params = [])
    {
        $obj = $this->api->call($class, $method, $params);
        echo "<!-- get " . $this->api->url . "\n" . var_export($obj, true) . " -->";
        if ($obj->error == 'ok')
            return $obj->answer;
        $this->assign('error', $obj->error);
    }

    protected function assign(string $box, $data)
    {
        if (is_array($data)) $data = (object) $data;
        $this->smarty->assign($box, $data);
    }
}