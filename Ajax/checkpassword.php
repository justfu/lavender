<?php
/**
 * Created by PhpStorm.
 * User: 宏
 * Date: 2016/1/28
 * Time: 19:29
 */
require_once $_SERVER['DOCUMENT_ROOT'].'/lavender/model/UserService.class.php';

if(isset($_POST['tel'])&&isset($_POST['password'])){
    $tel=$_POST['tel'];
    $password=$_POST['password'];
}else{
    echo "请求非法";
    exit;
}
$userService=new UserService();

$res=$userService->checkpassword($tel,$password);

echo $res;
