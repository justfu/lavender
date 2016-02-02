<?php
/**
 * Created by PhpStorm.
 * User: 宏
 * Date: 2016/1/30
 * Time: 18:40
 */
require_once $_SERVER['DOCUMENT_ROOT'].'/lavender/conn/SqlHelper.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/lavender/model/Admin.class.php';

class AdminService{
    public function AdminLogin($username,$password){
        $sqlHelper=new SqlHelper();
        $admin=new Admin();
        $sql="select password,level from admin where username='$username'";
        $res=$sqlHelper->dql_arr($sql);
        if($res[0]['password']==md5($password)){
            $admin->setUsername($username);
            $admin->setLevel($res[0]['level']);
            return $admin;
        }else{
            return null;
        }
    }
}
