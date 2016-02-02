<?php
/**
 * Created by PhpStorm.
 * User: 宏
 * Date: 2016/1/28
 * Time: 19:29
 */
require_once $_SERVER['DOCUMENT_ROOT'].'/lavender/model/UserService.class.php';
if(isset($_POST['tel'])){
    $tel=$_POST['tel'];
}else{
    echo "请求非法";
    exit;
}
$userService=new UserService();

$res=$userService->checkusername($tel);

echo $res;
