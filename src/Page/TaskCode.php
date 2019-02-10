<?php
namespace FFormula\RobotSharpWeb\Page;

class TaskCode extends Page
{
    public function create(array $get)
    {
        $task = $this->api->call('Task','getTask',
            ['taskId' => $_GET['taskId']]);

        $langs = $this->api->call('Lang','getLangList');

        $program = $this->api->call('Program','getProgram',
            [
                'userId' => $_GET['userId'],
                'taskId' => $_GET['taskId'],
                'langId' => $_GET['langId']
            ]);

        $this->smarty->assign('task', $task);
        $this->smarty->assign('langs', $langs);
        $this->smarty->assign('program', $program);
    }
}