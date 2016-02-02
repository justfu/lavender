<?php
/**
 * Created by PhpStorm.
 * User: 宏
 * Date: 2016/1/28
 * Time: 19:44
 */
require_once $_SERVER['DOCUMENT_ROOT'].'/lavender/conn/SqlHelper.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/lavender/model/User.class.php';

class UserService{
    public function checkusername($tel){
        $sqlHelper=new SqlHelper();
        $sql="select * from user where tel='$tel'";
        $res=$sqlHelper->dql_arr($sql);
        if($res==null){
            return 0;
        }else{
            return 1;
        }
    }

    public function checkpassword($tel,$pwd){
        $sqlHelper=new SqlHelper();
        $sql="select password from user where tel='$tel'";
        $res=$sqlHelper->dql_arr($sql);
        if($res[0]['password']==md5($pwd)){
            return 1;
        }else{
            return 0;
        }

    }

    public function check_login($tel,$pwd){
        $sqlHelper=new SqlHelper();
        $user=new User();
        $sql="select password,username,id from user where tel='$tel'";
        $res=$sqlHelper->dql_arr($sql);
        if($res[0]['password']==md5($pwd)){
            $user->setUsername($res[0]['username']);
            $user->setId($res[0]['id']);
        }
        return $user;
    }

    public function register($user){
        $sqlHelper=new SqlHelper();
        $username=$user->getUsername();
        $password=md5($user->getPassword());
        $tel=$user->getTel();
        $sql="insert into user(username,password,tel) values ('$username','$password','$tel')";
        $res=$sqlHelper->dml($sql);
        $sqlHelper->close_connect();
        return $res;
    }

    public function getId($tel){
        $sqlHelper=new SqlHelper();
        $user=new User();
        $sql="select id from user where tel='$tel'";
        $res=$sqlHelper->dql_arr($sql);
        $user->setId($res[0]['id']);
        return $user;
    }
}