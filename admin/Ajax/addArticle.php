<?php
/**
 * Created by PhpStorm.
 * User: 宏
 * Date: 2016/1/31
 * Time: 21:22
 */
require_once $_SERVER['DOCUMENT_ROOT'].'/lavender/model/ArticleService.class.php';
if(isset($_POST['title'])&&isset($_POST['content'])&&isset($_POST['img_url'])){
    $title=$_POST['title'];
    $content=$_POST['content'];
    $img_url=$_POST['img_url'];
}else{
    echo "请求非法!";
    exit;
}
$articleService=new ArticleService();
$date=date("Y-m-d");
$res=$articleService->AddArticle($title,$content,$img_url,$date);
echo $res;