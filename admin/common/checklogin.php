<?php
/**
 * Created by PhpStorm.
 * User: 宏
 * Date: 2016/2/2
 * Time: 10:47
 */
function checklogin(){
    if(!isset($_SESSION['adminname'])){
        header("location:./login.php");
        exit;
    }
}