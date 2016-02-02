<?php
/**
 * Created by PhpStorm.
 * User: 宏
 * Date: 2016/1/29
 * Time: 11:36
 */
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/lavender/model/CheckCode.class.php';
$checkCode=new Checkcode();
$checkCode->getCodeImg();
$code=$checkCode->getCheckCode();
$_SESSION['login_checkcode']=$code;