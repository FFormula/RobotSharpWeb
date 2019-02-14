<?php
namespace FFormula\RobotSharpWeb\Page;

class TaskInfo extends Page
{
    /**
     * @param array $get
     *          taskId - task to read
     * @return array
     *          page boxes
     * @throws \Exception
     *          on api call
     */
    public function create(array $get) : array
    {
        $task = $this->api->call('Task','getTask',
            ['taskId' => $get['taskId']]);
        $langs = $this->api->call('Lang','getLangList');

        $title = $task->caption;
        return [
            'head' => ['title' => $title],
            'menu' => ['title' => $title],
            'taskInfo' => $task,
            'langs' => $langs
        ];
    }
}