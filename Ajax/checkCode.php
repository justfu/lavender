<?php
/**
 * Created by PhpStorm.
 * User: 宏
 * Date: 2016/1/29
 * Time: 12:15
 */
session_start();
if(isset($_POST['checkcode'])){
    $checkcode=$_POST['checkcode'];
}
if($checkcode==$_SESSION['login_checkcode']){
    echo 1;
}else{
    echo 0;
}