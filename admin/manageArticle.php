<?php
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'].'/lavender/admin/common/checklogin.php';

    require_once $_SERVER['DOCUMENT_ROOT'].'/lavender/model/Paging.class.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/lavender/model/ArticleService.class.php';
    //此处应当加是否来自可信站点获取数据
    //以免造成数据泄露
    //******
    checklogin();
    if(isset($_GET['pagenow'])){
        $pagenow=$_GET['pagenow'];
    }
    $paging=new Paging();
    $articleService=new ArticleService();
    $paging->pagenow=$pagenow;
    $paging->pagesize=12;
    $res_class=$articleService->getArticle_paging($paging);
    $arr=$res_class->res_arr;
    for($i=0;$i<count($arr);$i++){
        $arr[$i]['content']=mb_substr($arr[$i]['content'],0,27,'UTF-8')."...";
    }
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" href="./css/manageArticle.css" />
    <script type="text/javascript" src="./js/jquery-2.2.0.min.js"></script>
    <script type="text/javascript" src="./js/manageArticle.js"></script>
    <script type="text/javascript">
        $().ready(function(){
            $('#select_all').bind('click',function(){
                $('.id').fanxuan();
            });
        });
    </script>
    <title>管理文章</title>
</head>
<body>
<h2 style="margin-left: 30px;margin-top: 20px;">管理文章界面</h2>
<div class="article">
    <table class="article_table">
        <form method="post" action="./controller/deleteallprocess.php">
        <tr><th>id</th><th>文章标题</th><th>文本内容</th><th>发布时间</th><th>阅读次数</th><th>被赞次数</th><th>不赞次数</th><th>文章分类</th><th>全选<input type='checkbox' id="select_all"></th><th>删除</th><th>修改</th></tr>
        <?php
        for($i=0;$i<count($arr);$i++){
            $a=$i+1;
            if($i%2==0){
                $a=$i+1;
                echo "<tr class='one'><td>{$a}</td><td>{$arr[$i]['title']}</td><td>{$arr[$i]['content']}</td><td>{$arr[$i]['date']}</td><td>{$arr[$i]['read_time']}</td><td>{$arr[$i]['praise']}</td><td>{$arr[$i]['no_praise']}</td><td>{$arr[$i]['classify']}</td><td><input type='checkbox' value='{$arr[$i]['id']}' class='id' name='id[]'></td><td><a href='./controller/deleteprocess.php?id={$arr[$i]['id']}&pagenow={$pagenow}'>删除</a></td><td><a href='./update.php?id={$arr[$i]['id']}&pagenow={$pagenow}'>修改</a></td></tr>";
            }else{
                echo "<tr><td>{$a}</td><td>{$arr[$i]['title']}</td><td>{$arr[$i]['content']}</td><td>{$arr[$i]['date']}</td><td>{$arr[$i]['read_time']}</td><td>{$arr[$i]['praise']}</td><td>{$arr[$i]['no_praise']}</td><td>{$arr[$i]['classify']}</td><td><input type='checkbox' value='{$arr[$i]['id']}' class='id' name='id[]'></td><td><a href='./controller/deleteprocess.php?id={$arr[$i]['id']}&pagenow={$pagenow}'>删除</a></td><td><a href='./update.php?id={$arr[$i]['id']}&pagenow={$pagenow}'>修改</a></td></tr>";
            }
        }
        ?>
    </table>
</div>
<div class="navi">
    <?php if($pagenow>1){
        $prepage=$pagenow-1;
        echo "<a href='./manageArticle.php?pagenow={$prepage}'>上一页</a>";
    }
    ?>
    <span>当前<?php echo $pagenow;?>页&nbsp;共<?php echo $res_class->pageCounts?>页&nbsp;共<?php echo $res_class->rowCounts;?>篇文章</span>
    <?php
    if($pagenow<$res_class->pageCounts){
        $nextpage=$pagenow+1;
        echo "<a href='./manageArticle.php?pagenow={$nextpage}'>下一页</a>";
    }
    ?>
</div>
    <button id="deleteall" style="float: right;margin-right: 60px;cursor:pointer;background-color: #007FFF;color: white;border: 0px;box-shadow: 0px 0px 10px #007FFF;width: 60px;height: 30px">批量删除</button>
    </form>
</body>
</html>