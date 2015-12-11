<?php
$json = file_get_contents('http://hieunc.me/public/user/checkuser/kiata/0f4ccd0463163077deec');
$obj = json_decode($json);
print_r($obj);
