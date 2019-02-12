<?php
namespace FFormula\RobotSharpWeb\Page;

class TaskList extends Page
{
    public function create(array $get) : array
    {
        $tasks = $this->api->call('Task', 'getTaskList');
        $title = 'Упражнения';
        return [
            'taskList' => $tasks,
            'head' => ['title' => $title],
            'menu' => ['title' => $title]
        ];
    }
}