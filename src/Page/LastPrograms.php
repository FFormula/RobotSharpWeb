<?php

namespace FFormula\RobotSharpWeb\Page;


class LastPrograms extends Page
{
    /**
     * @param array $get
     * @return array
     * @throws \Exception
     */
    public function create(array $get) : array
    {
        $programList = $this->api->call('Program', 'getLastPrograms', ['limit' => 100]);
        $title = 'Решения участников';
        return [
            'programList' => $programList,
            'head' => ['title' => $title],
            'menu' => [
                'home' => true,
                 'title' => $title,
                'userName' => $this->ses->load('userName')
            ]
        ];
    }
}