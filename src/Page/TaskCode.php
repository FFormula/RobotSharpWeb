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

        $test = $this->api->call('Test','getDemoTest',
            ['taskId' => $get['taskId']]);

        $prog = $this->api->call('Program', 'getProgram',
            ['taskId' => $get['taskId'], 'langId' => $langList['langId']]);

        $tests = $this->api->call('Test', 'getAllTests',
            ['taskId' => $get['taskId']]);

        return [
            'head' => ['title' => $task->caption],
            'menu' => [
                'title' => $task->caption,
                'userName' => $this->ses->load('userName')
            ],
            'langList' => $langList,
            'userSourceEditor' => [
                'taskId' => $get['taskId'],
                'langId' => $langList['langId'],
                'source' => $prog->source
            ],
            'taskTest' => [
                'taskId' => $test->taskId,
                'fileIn' => trim($test->fileIn),
                'fileOut' => trim($test->fileOut),
                'fileInRows' => $test->fileInRows,
                'fileOutRows' => $test->fileOutRows
            ],
            'taskTestButtons' => $tests
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