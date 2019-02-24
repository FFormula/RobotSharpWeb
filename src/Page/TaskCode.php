<?php
namespace FFormula\RobotSharpWeb\Page;

class TaskCode extends Page
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
        $langList = $this->getLangList($get);

        $task = $this->api->call('Task','getTask',
            ['taskId' => $get['taskId']]);

        $prog = $this->api->call('Program', 'getProgram',
            ['taskId' => $get['taskId'], 'langId' => $langList['langId']]);

        if ($prog->status == 'run')
            $caption = 'Ваша программа ещё тестируется';
        else if ($prog->status == 'compiler')
            $caption = 'Ошибка при компиляции вашей программы';
        else if ($prog->status == 'tests')
            $caption = 'Результат тестирования: ' . $prog->points . ' %';
        else
            $caption = 'Напишите программу для решения задачи';

        if ($prog->status == 'run')
            $captionBg = 'primary';
        else if ($prog->status == 'compiler')
            $captionBg = 'danger';
        else if ($prog->status == 'tests')
            if ($prog->points >= 100)
                $captionBg = 'success';
            else if ($prog->points >= 50)
                $captionBg = 'warning';
            else
                $captionBg = 'danger';
        else
            $captionBg = 'default';

        return [
            'TaskCode' => [
                'showTests' => $prog->status == 'tests',
                'caption' => $caption,
                'captionBg' => $captionBg
            ],
            'head' => [
                'title' => $task->caption
            ],
            'menu' => [
                'title' => $task->caption,
                'userName' => $this->ses->load('userName')
            ],
            'langList' => $langList,
            'taskCompilerError' => [
                'compiler' => $prog->compiler
            ],
            'userSourceEditor' => [
                'taskId' => $get['taskId'],
                'langId' => $langList['langId'],
                'source' => $prog->source
            ],
            'taskTestButtons' => json_decode($prog->tests),
            'taskTest' => [
                'fileIn' => '',
                'fileOut' => '',
                'fileInRows' => 5,
                'fileOutRows' => 5
            ]
        ];
    }

    /**
     * @param array $get
     * @return array
     * @throws \Exception
     */
    function getLangList(array $get) : array
    {
        $list = [];
        if ($get['langId'])
        {
            $list['langId'] = $get['langId'];
            $this->ses->save('langId', $list['langId']);
        }
        else
            $list['langId'] = $this->ses->load('langId');
        if (!$list['langId']) $list['langId'] = 'cs';
        $list['langs'] = $this->api->call('Lang','getLangList');
        $list['lang'] = $this->findLangName($list['langId'], $list['langs']);
        $list['taskId'] = $get['taskId'];
        return $list;
    }

    function findLangName(string $langId, object $langs) : string
    {
        foreach ($langs as $item)
            if ($item->id == $langId)
                return $item->lang;
        return 'N/A';
    }

    function ah(string $text) : string
    {
        return str_replace("\n", '<br>', $text);
    }
}