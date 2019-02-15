<?php
namespace FFormula\RobotSharpWeb\Page;

class Login extends Page
{
    /**
     * @param array $get
     *          partner
     *          time
     *          email
     *          sign
     *          name
     * @return array
     *          page boxes data
     */
    public function create(array $get): array
    {
        try
        {
            $login = $this->api->call('Session', 'login', $get);
            $this->ses->save('token', $login->token);
            $this->ses->save('userId', $login->userId);
            $this->ses->save('userName', $get['name']);
        }
        catch (\Exception $ex)
        {
            $error = $ex->getMessage();
        }
        return [
            'menu' => ['title' => 'User Login'],
            'login' => [
                'userId' => $login->userId,
                'email' => $get['email'],
                'name' => $get['name'],
                'partnerInfo' => $get['partner'] . ' / ' . $login->partnerInfo,
                'error' => $error
            ]
        ];
    }
}