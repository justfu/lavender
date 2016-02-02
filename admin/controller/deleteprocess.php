<?php
/**
 * Created by PhpStorm.
 * User: 宏
 * Date: 2016/2/1
 * Time: 20:56
 */
require_once $_SERVER['DOCUMENT_ROOT'].'/lavender/model/ArticleService.class.php';
if(isset($_GET['id'])&&isset($_GET['pagenow'])){
    $id=$_GET['id'];
    $pagenow=$_GET['pagenow'];
}else{
    echo "非法请求";
    exit;
}
$articleService=new ArticleService();
$res=$articleService->deleteArticle($id);
if($res==1){
    echo "<script type='text/javascript'>alert('删除成功!');</script>";
    echo "<script type='text/javascript'>location.href='../manageArticle.php?pagenow={$pagenow}';</script>";
    exit;
}else{
    echo "<script type='text/javascript'>alert('删除失败!');</script>";
    echo "<script type='text/javascript'>location.href='../manageArticle.php?pagenow={$pagenow}';</script>";
}