<?php
/**
 * Created by PhpStorm.
 * User: 宏
 * Date: 2016/2/1
 * Time: 21:21
 */
require_once $_SERVER['DOCUMENT_ROOT'].'/lavender/model/ArticleService.class.php';
if(isset($_GET['id'])&&isset($_GET['pagenow'])&&isset($_POST['title'])&&isset($_POST['content'])&&isset($_POST['img_url'])){
    $id=$_GET['id'];
    $pagenow=$_GET['pagenow'];
    $title=$_POST['title'];
    $content=$_POST['content'];
    $img_url=$_POST['img_url'];
}else{
    echo "非法请求";
    exit;
}
$articleService=new ArticleService();
$res=$articleService->updateArticle($id,$title,$content,$img_url);
if($res==1){
    echo "<script type='text/javascript'>alert('修改成功!');</script>";
    echo "<script type='text/javascript'>location.href='../manageArticle.php?pagenow={$pagenow}';</script>";
    exit;
}else{
    echo "<script type='text/javascript'>alert('修改失败!');</script>";
    echo "<script type='text/javascript'>location.href='../manageArticle.php?pagenow={$pagenow}';</script>";
}