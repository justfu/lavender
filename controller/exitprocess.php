<?php
/**
 * Created by PhpStorm.
 * User: 宏
 * Date: 2016/1/29
 * Time: 14:10
 */
session_start();
unset($_SESSION['username']);
unset($_SESSION['user_id']);
header('location:../index.php');