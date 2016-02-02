<?php
/**
 * Created by PhpStorm.
 * User: 宏
 * Date: 2016/1/29
 * Time: 13:28
 */
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/lavender/model/UserService.class.php';
if(isset($_POST['tel'])){
    $tel=$_POST['tel'];
}else{
    echo "请求非法";
    exit;
}
if(isset($_POST['password'])){
    $password=$_POST['password'];
}else{
    echo "请求非法";
    exit;
}
if(isset($_POST['checkcode'])){
    $checkcode=$_POST['checkcode'];
}else{
    echo "请求非法";
    exit;
}
$userService=new UserService();
$res_class=$userService->check_login($tel,$password);
if($res_class->getUsername()!=null){
    $_SESSION['username']=$res_class->getUsername();
    $_SESSION['user_id']=$res_class->getId();
    header("location:../index.php");
    exit;
}else{
    echo "<script type='text/javascript'>history.go(-1);alert('手机号或密码错误!')</script>";
}

