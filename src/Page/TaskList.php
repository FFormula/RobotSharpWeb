<?php
namespace FFormula\RobotSharpWeb\Page;

class TaskList extends Page
{
    public function create(array $get)
    {
        $tasks = $this->call('Task', 'getTaskList');
        $this->assign('taskList', $tasks);
        $title = 'Список задач';
        $this->assign('head', ['title' => $title]);
        $this->assign('menu', ['title' => $title]);
    }
}