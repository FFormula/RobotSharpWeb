<?php
namespace FFormula\RobotSharpWeb\Page;

class TaskList extends Page
{
    /**
     * Get the list of all tasks
     * @param array $get
     *          none
     * @return array
     *          page boxes
     * @throws \Exception
     *          on api call
     */
    public function create(array $get) : array
    {
        $tasks = $this->api->call('Task', 'getTaskList');
        $title = 'Список задач';
        return [
            'taskList' => $tasks,
            'head' => ['title' => $title],
            'menu' => [
                'home' => true,
                'title' => $title,
                'userName' => $this->ses->load('userName')
            ]
        ];
    }
}