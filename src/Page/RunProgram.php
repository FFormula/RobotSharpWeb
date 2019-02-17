<?php
namespace FFormula\RobotSharpWeb\Page;

use FFormula\RobotSharpWeb\System\Log;

class RunProgram extends Page
{
    /**
     * @param array $get
     * @return array
     * @throws \Exception
     */
    public function create(array $get): array
    {
        Log::get()->debug(json_encode($get));
        $run = $this->api->call('Program', 'runProgram',
            [
                'taskId' => $get['taskId'],
                'langId' => $get['langId'],
                'source' => $get['source']
            ]);
        return [
            'RunProgram' => ['runkey' => $run->runkey]
        ];
    }
}