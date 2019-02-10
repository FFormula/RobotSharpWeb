<?php
namespace FFormula\RobotSharpWeb\Page;

class TaskInfo extends Page
{
    public function create(array $get)
    {
        $task = $this->api->call('Task','getTask',
            ['taskId' => $get['taskId']]);
        $langs = $this->api->call('Lang','getLangList');

        $this->smarty->assign('task', $task);
        $this->smarty->assign('langs', $langs);
    }
}