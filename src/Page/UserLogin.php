<?php
namespace FFormula\RobotSharpWeb\Page;

class UserLogin extends Page
{
    /**
     * Login or Join user and store api-token
     * @param array $get
     *          email
     *          name
     *          partner
     *          sign
     * @return array
     *          page boxes
     * @throws \Exception
     *          on api call
     */
    public function create(array $get) : array
    {
        $login = $this->api->call('Session', 'login',
            [
                'email' => $get['email'],
                'name' => $get['name'],
                'partner' => 'videosharp',
                'time' => time(),
                'sign' => $get['sign']
            ]);
        var_dump($login);
        $this->ses->save('token', $login->token);
        return [
            'login' => $login
        ];
    }
}