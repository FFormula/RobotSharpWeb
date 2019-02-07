<?php
session_start();
include '../vendor/autoload.php';

if (isset($_GET['email']))
{
    $client = new FFormula\RobotSharpWeb\Api\Client(require '../config/api.php');
    $login = $client->call('Session', 'login', $_GET);
    $_SESSION['token'] = $login->token;
    $_SESSION['userId'] = $login->userId;
    print_r($login);
    $url = 'list.php';
} else {

    $partner = 'videosharp';
    $apikey = 'videosharp';
    $email = 'robot@videosharp.info';
    $name = 'Robot Sharp';
    $time = time();
    $sign = md5("$partner/$apikey/$time/$email");
    $url = "index.php?partner=$partner&time=$time&email=$email&sign=$sign&name=$name";
}

echo "<a href='$url'>$url</a>";
