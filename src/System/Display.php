<?php
namespace FFormula\RobotSharpWeb\System;

class Display
{
    /** @var string */
    var $path;

    /** @var \Smarty */
    var $smart;

    public function __construct(string $path)
    {
        $this->path = $path;
        $this->smart = new \Smarty();
        $this->smart->setTemplateDir($path . 'templates');
        $this->smart->setCompileDir($path . 'templates_c');
    }

    public function load(array $box)
    {
        foreach ($box as $name => $data)
        {
            $this->smart->assign($name, (object)$data);
            Log::get()->debug('Box ' . $name . ': ' . json_encode($data));
        }
    }

    /**
     * @param string $page template name
     * @throws \SmartyException
     */
    public function show(string $page)
    {
        $this->smart->display('page/' . $page . '.tpl');
    }
}