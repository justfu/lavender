<?php
/**
 * Created by PhpStorm.
 * User: 宏
 * Date: 2016/2/1
 * Time: 20:56
 */
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/lavender/model/AdminService.class.php';
if(isset($_POST['username'])&&isset($_POST['password'])&&($_POST['checkcode'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $checkcode=$_POST['checkcode'];
}else{
    echo "请求非法";
    exit;
}
if($checkcode!=520){
    echo "<script type='text/javascript'>history.go(-1);alert('内部验证码错误!');</script>";
    exit;
}
$adminService=new AdminService();
$res_class=$adminService->AdminLogin($username,$password);
if($res_class->getUsername()){
    $_SESSION['adminname']=$res_class->getUsername();
    $_SESSION['adminlevel']=$res_class->getLevel();
    header("location:../admin.php");
    exit;
}else{
    echo "<script type='text/javascript'>history.go(-1);alert('用户名或密码错误!');</script>";
    exit;
}
