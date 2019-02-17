<?php
namespace FFormula\RobotSharpWeb\Page;

use FFormula\RobotSharpWeb\System\Log;

class RunResults extends Page
{
    /**
     * @param array $get
     * @return array
     * @throws \Exception
     */
    public function create(array $get) : array
    {
        Log::get()->debug(json_encode($get));
        $run = $this->api->call('Program', 'getRunResults',
            [ 'runkey' => $get['runkey'] ]);
        return [
            'RunResults' => $run
        ];
    }
}