<?php
namespace FFormula\RobotSharpWeb\Page;

use FFormula\RobotSharpWeb\System\Api;

abstract class Page
{
    /** @var array */
    var $post;
    /** @var Api */
    var $api;
    /** @var Smarty */
    var $smarty;

    public function setApi($api)
    {
        $this->api = $api;
    }

    public function setSmarty($smarty)
    {
        $this->smarty = $smarty;
    }

    abstract public function create(array $get);
}