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
        $test = $this->api->call('Test','getDemoTest',
            ['taskId' => $get['taskId']]);

        //$langs = $this->api->call('Lang','getLangList');

        $title = $task->caption;
        return [
            'head' => ['title' => $title],
            'menu' => [
                'title' => $title,
                'userName' => $this->ses->load('userName')
            ],
            'taskDescription' => [
                'id' => $task->id,
                'video' => $task->video,
                'description' => $this->ah($task->description)
            ],
            'taskCodeButton' => [
                'taskId' => $get['taskId']
            ],
            'taskTest' => [
                'taskId' => $test->taskId,
                'fileIn' => trim($test->fileIn),
                'fileOut' => trim($test->fileOut),
                'fileInRows' => $test->fileInRows,
                'fileOutRows' => $test->fileOutRows
            ]
        ];
    }

    function ah(string $text) : string
    {
        return str_replace("\n", '<br>', $text);
    }
}