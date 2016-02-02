<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/lavender/admin/common/checklogin.php';
checklogin();
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" href="./css/common.css" />
    <script type="text/javascript" src="./js/jquery-2.2.0.min.js"></script>
    <script type="text/javascript" src="./js/addAticle.js"></script>
    <script type="text/javascript">
        $().ready(function(){
            $('#release').bind('click',function(){
                var title=$('#title').val();
                var content=$('#content').html();
                var img_url=$('#img_url').val();
                addAticle(title,content,img_url);
            });

        });
    </script>
    <title>添加文章</title>
</head>
<body>
   <div class="title">
       <h2>输入文章标题</h2>
       <input type="text" id="title" name="title" />
   </div>
   <div class="content">
       <h2>输入文章内容</h2>
       <textarea name="content" id="content">

       </textarea>
   </div>
   <div class="img">
       <h2>输入图片链接地址<button>选择服务器图片</button></h2>
       <input type="text" id="img_url" name="img_url" />
   </div>
   <div class="butt">
       <button id="release">发布</button>
   </div>
</body>
</html>