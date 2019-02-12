<?php
namespace FFormula\RobotSharpWeb\Page;

use FFormula\RobotSharpWeb\System\Api;
use FFormula\RobotSharpWeb\System\Session;
use Psr\Log\LoggerInterface;

abstract class Page
{
    /** @var Api */
    var $api;
    /** @var Session */
    var $ses;
    /** @var LoggerInterface */
    var $log;
    /** @var array */
    var $box;

    abstract public function create(array $get) : array;

}