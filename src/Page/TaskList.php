<?php
namespace FFormula\RobotSharpWeb\Page;

class TaskList extends Page
{
    public function create(array $get)
    {
        $tasks = $this->api->call('Task', 'getTaskList');
        $this->smarty->assign('tasks', $tasks);
    }
}