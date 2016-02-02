<?php
/**
 * Created by PhpStorm.
 * User: 宏
 * Date: 2016/2/1
 * Time: 20:56
 */
require_once $_SERVER['DOCUMENT_ROOT'].'/lavender/model/ArticleService.class.php';
if(isset($_POST['id'])){
   $id_arr=$_POST['id'];
}else{
    echo "非法请求";
    exit;
}
$articleService=new ArticleService();
$res=$articleService->deleteallArticle($id_arr);
if($res==1){
    echo "<script type='text/javascript'>alert('删除成功!');</script>";
    echo "<script type='text/javascript'>location.href='../manageArticle.php?pagenow=1';</script>";
    exit;
}else{
    echo "<script type='text/javascript'>alert('删除失败!');</script>";
    echo "<script type='text/javascript'>location.href='../manageArticle.php?pagenow=1';</script>";
}