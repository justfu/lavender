<?php
/**
 * Created by PhpStorm.
 * User: 宏
 * Date: 2016/2/1
 * Time: 21:40
 */
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/lavender/admin/common/checklogin.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/lavender/model/ArticleService.class.php';
checklogin();
if(isset($_GET['id'])&&isset($_GET['pagenow'])){
    $id=$_GET['id'];
    $pagenow=$_GET['pagenow'];
}else{
    echo "请求非法";
    exit;
}
$articleService=new ArticleService();
$res_class=$articleService->getArticleDetail($id);
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" href="./css/common.css" />
    <script type="text/javascript" src="./js/jquery-2.2.0.min.js"></script>
    <title>修改文章页面</title>
</head>
<body>
<form method="post" action="./controller/updateprocess.php?id=<?php echo $id;?>&pagenow=<?php echo $pagenow;?>">
<div class="title">
    <h2>编辑文章标题</h2>
    <input type="text" id="title" name="title" value="<?php echo $res_class->getTitle();?>"/>
</div>
<div class="content">
    <h2>编辑文章内容</h2>
       <textarea name="content" id="content"><?php echo $res_class->getContent();?></textarea>
</div>
<div class="img">
    <h2>编辑图片链接地址<button>选择服务器图片</button></h2>
    <input type="text" id="img_url" name="img_url" value="<?php echo $res_class->getImg();?>"/>
</div>
<div class="butt">
    <button id="release">发布</button>
</div>
</form>
</body>
</html>