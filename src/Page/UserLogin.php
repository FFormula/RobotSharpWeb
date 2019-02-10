<?php
namespace FFormula\RobotSharpWeb\Page;

class UserLogin extends Page
{
    public function create(array $get)
    {
        $login = $this->call('Session', 'login',
            [
                'email' => $get['email'],
                'name' => $get['name'],
                'partner' => 'videosharp',
                'time' => time(),
                'sign' => $get['sign']
            ]);
        $this->save('token', $login->token);
        $this->assign('login', $login);
    }
}