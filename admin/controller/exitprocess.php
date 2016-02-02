<?php
/**
 * Created by PhpStorm.
 * User: 宏
 * Date: 2016/2/2
 * Time: 12:55
 */
session_start();
if(isset($_SESSION['adminname'])){
    unset($_SESSION['adminname']);
    unset($_SESSION['adminlevel']);
    header("location:../login.php");
    exit;
}else{
    echo "请求非法";
    exit;
}