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

        if ($prog->status == "tests")
        {
            return [
                'TaskCode' => [
                    'status' => $prog->status,
                    'caption' => 'Points: ' . $prog->points . ' %'
                ],
                'head' => [
                    'title' => $task->caption
                ],
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
                'taskTestButtons' => $prog->tests
            ];

        } else {

            if ($prog->status == 'run')
                $caption = 'Your Program is checking now';
            else
                $caption = 'Write and run your Program';

            return [
                'TaskCode' => [
                    'status' => $prog->status,
                    'caption' => $caption
                ],
                'compileError' => [
                    'status' => $prog->status,
                    'compiler' => $prog->compiler
                ],
                'head' => [
                    'title' => $task->caption
                ],
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
            ];
        }
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