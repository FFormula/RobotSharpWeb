<?php

$host = 'http://localhost/';
$partner = 'videosharp';
$apikey = 'videosharp';
$time = time();

$email = 'formulist@gmail.com'; // get from
$name = 'Jevgenij Volosatov';     // your dbase

$sign = md5("$partner/$apikey/$time/$email");
$url = "$host/index.php?page=Login&partner=$partner&time=$time&email=$email&sign=$sign&name=$name";

header("Location: $url");
