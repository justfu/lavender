<?php
/**
 * Created by PhpStorm.
 * User: 宏
 * Date: 2016/1/28
 * Time: 11:53
 */
require_once $_SERVER['DOCUMENT_ROOT'].'/lavender/model/ArticleService.class.php';
if(isset($_GET['id'])){
    $id=$_GET['id'];
}else{
    echo "请求非法";
}
$articleService=new ArticleService();
$res=$articleService->NoPraise($id);
echo $res;

