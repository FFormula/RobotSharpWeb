<?php
namespace FFormula\RobotSharpWeb\System;

class Run
{
    /** @var Session */ var $ses;
    /** @var Api     */ var $api;
    /** @var Display */ var $display;

    /**
     * @param array $get
     */
    public function create(array $get)
    {
        try
        {
            $url = $_SERVER['REQUEST_URI'] . $_SERVER['QUERY_STRING'];
            Log::get()->info('======== ' . $url);
            Log::get()->info('IP: ' . $_SERVER['REMOTE_ADDR']);

            $this->api->setToken($this->ses->load('token'));

            if ($get['page'])
                $pageName = $this->az($get['page']);
            else
                $pageName = 'TaskList';

            $pageClass = '\\FFormula\\RobotSharpWeb\\Page\\' . $pageName;
            if (!class_exists($pageClass)) {
                Log::get()->error('class ' . $pageClass . ' does not exists');
                throw new \Exception('class ' . $pageClass . ' does not exists');
            }

            /** @var $page \FFormula\RobotSharpWeb\Page\Page */
            $page = new $pageClass();
            $page->ses = $this->ses;
            $page->api = $this->api;

            $box = $page->create($get);
            log::get()->debug('Session: ' . json_encode($this->ses->loadAll()));
            $this->display->load($box);
            $this->display->show($pageName);
        }
        catch (\Exception $ex)
        {
            Log::get()->error($ex->getMessage());
            $this->display->load([
                'error' => [
                    'message' => $ex->getMessage()
                ]
            ]);
            try {$this->display->show('Error');}
            catch (\Exception $ex) { die ($ex->getMessage() . $ex->getTraceAsString()); }
        }
    }

    protected function az(string $text) : string
    {
        return preg_replace('/[^a-zA-Z0-9_]+/', '', $text);
    }
}