<?php
include_once '../component/controller.php';
//call class
$apps = new controller;
//get  para
$fn = $apps->post_request('fn');
$ln = $apps->post_request('ln');
$email = $apps->post_request('email');
$password = sha1($apps->post_request('password'));
$ref_code = $apps->post_request('ref_code');
//generate ref code
$gencode = rand(123456, 12345678);
//pass to db
$regis = $apps->new_members($fn, $ln, $email, $password, $ref_code, $gencode);
if($regis){
    echo 'done';
}