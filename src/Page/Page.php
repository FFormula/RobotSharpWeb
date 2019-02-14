<?php
namespace FFormula\RobotSharpWeb\Page;

use FFormula\RobotSharpWeb\System\Api;
use FFormula\RobotSharpWeb\System\Session;

abstract class Page
{
    /** @var Api */
    var $api;
    /** @var Session */
    var $ses;
    /** @var array */
    var $box;

    abstract public function create(array $get) : array;

}