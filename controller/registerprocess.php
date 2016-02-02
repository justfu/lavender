<?php
/**
 * Created by PhpStorm.
 * User: 宏
 * Date: 2016/1/29
 * Time: 19:20
 */
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/lavender/model/UserService.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/lavender/model/User.class.php';
if(isset($_POST['username'])&&isset($_POST['tel'])&&isset($_POST['password1'])){
    $username=$_POST['username'];
    $tel=$_POST['tel'];
    $password1=$_POST['password1'];
}else{
    echo "请求非法";
    exit;
}
$userService=new UserService();
$user=new User();
$user->setUsername($username);
$user->setTel($tel);
$user->getPassword($password1);
$res=$userService->register($user);
$res_class=$userService->getId($tel);
if($res==1){
    $user_id=$userService->getId($tel);
    $_SESSION['username']=$username;
    $_SESSION['user_id']=$res_class->getId();
    echo "<script type='text/javascript'>alert('注册成功!点击回到首页!');location.href='../index.php';</script>";
    exit;
}else{
    echo "<script type='text/javascript'>alert('注册失败!');history.go(-1);</script>";
    exit;
}
