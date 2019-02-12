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
        $this->addBox('head', ['title' => $title]);
        $this->addBox('menu', ['title' => $title]);
        $this->addBox('taskInfo', $task);
        $this->addBox('langs', $langs);
    }
}