<?php
/**
 * Created by PhpStorm.
 * User: 宏
 * Date: 2016/1/23
 * Time: 15:53
 * 数据库连接以及操作类
 * 提供多种数据返回类型
 */
class SqlHelper{
    private $host;//数据库地址
    private $username;//数据库用户名
    private $password;//数据库密码
    private $db;//需要连接的数据库
    private $link;//创建的数据库连接

    public function __construct(){
        $ini_path=$_SERVER['DOCUMENT_ROOT'].'/lavender/config/db.ini';
        $db_ini_arr=parse_ini_file($ini_path);//从配置文件夹读取数据库配置信息
        $this->host=$db_ini_arr['host'];
        $this->username=$db_ini_arr['username'];
        $this->password=$db_ini_arr['password'];
        $this->db=$db_ini_arr['db'];
        $this->link=new mysqli($this->host,$this->username,$this->password,$this->db);//创建数据库连接
        if($this->link->connect_error){//判断连接是否成功
            die('数据库连接失败,请联系管理员!'.$this->link->connect_error);
        }
        $this->link->query("set names utf8");//设置操作数据库编码为utf8
    }

    //执行dql语句的方法,直接返回数据库数据
    public function dql($sql){
        return $this->link->query($sql);
    }

    //执行dml语句的方法
    public function dml($sql){
        $res=$this->link->query($sql);
        if($res){
            if($this->link->affected_rows>0){
                return 1;//说明执行语句成功，且数据库里面的数据有改变
            }else{
                return 2;//说明语句执行成功,但是数据库里面的数据没有受到影响
            }
        }else{
            return 0;//语句执行失败
        }
    }

    //执行查询语句,并以二维数组的形式进行返回

    public function dql_arr($sql){
        $arr=array();
        $res=$this->link->query($sql);
        while($row=$res->fetch_assoc()){
            $arr[]=$row;//把得到的结果保存到数组里面
        }
        $res->free();//释放资源
        $this->close_connect();//关闭连接
        return $arr;//返回数据
    }

    public function close_connect(){
        $this->link->close();//关闭数据库连接
    }
}