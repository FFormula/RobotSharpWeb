<?php
namespace FFormula\RobotSharpWeb\Page;

class TaskInfo extends Page
{
    public function create(array $get)
    {
        $task = $this->call('Task','getTask',
            ['taskId' => $get['taskId']]);
        $langs = $this->call('Lang','getLangList');

        $title = $task->caption;
        $this->assign('head', ['title' => $title]);
        $this->assign('menu', ['title' => $title]);
        $this->assign('taskInfo', $task);
        $this->assign('langs', $langs);
    }
}