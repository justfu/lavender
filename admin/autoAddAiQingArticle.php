<?php
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'].'/lavender/admin/common/checklogin.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/lavender/admin/getweb/getData.php';
    checklogin();
    $url="http://www.wyl.cc/weiyu/aiqing";
    $arr=getData($url);
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
    <script type="text/javascript">
        $().ready(function(){
            $('#refresh').bind('click',function(){
                document.location.reload();
            });

            $('#show').bind('click',function(){
                var content_title=$('#title').val();
                var content=$('#content').html();
                var img_url=$('#img_url').val();
                var div=$('<div></div>');
                div.attr('id','div1');
                div.css('position','fixed');
                div.css('width','100%');
                div.css('height','100%');
                div.css('top','0px');
                div.css('left','0px');
                div.css('opacity',0.9);
                div.css('zIndex',500);
                div.css('backgroundColor','black');
                div.css('overflow','hidden');
                div.css('cursor','pointer');

                var div2=$('<div></div>');
                div2.attr('id','div2');
                var css={
                    width:'50%',
                    height:'50%',
                    position:'absolute',
                    top:'25%',
                    left:'25%',
                    zIndex:1000,
                    backgroundColor:'white'
                }
                div2.css(css);

                div2.html("<center>"+content_title+"<br/>"+content+"<br/>"+"<img src='"+img_url+"'>"+"</center>")
                div2.appendTo(div);
                div.appendTo('body');


                div.bind('click',function(){
                    div2.remove();
                    div.remove();
                });
            });
        });

    </script>
    <style type="text/css">
        a{
            color: #007FFF;
            text-decoration: none;
        }
        a:hover{
            color: #007FFF;
        }
        .butt{
            margin-left: 50%;
        }
    </style>
    <title>添加文章</title>
</head>
<body>
   <h2 style="margin-left: 30px;margin-top: 10px;">以下内容为抓取<a href="http://www.wyl.cc">微语录网站</a>&nbsp;抓取时间<?php echo $arr['date'];?></h2>
   <div class="title">
       <h2>输入文章标题</h2>
       <input id="title" type="text" name="title" value="<?php echo $arr['title']?>"/>
   </div>
   <div class="content">
       <h2>输入文章内容</h2>
       <textarea name="content" id="content"><?php echo $arr['content']?></textarea>
   </div>
   <div class="img">
       <h2>输入图片链接地址<button>选择服务器图片</button></h2>
       <input id="img_url" type="text" name="img_url" value="<?php echo $arr['img_url']?>"/>
   </div>
   <div class="butt">
       <button id="show">预览</button><button id="refresh" style="margin-left: 10px">刷新</button><button id="release" style="margin-left: 10px">发布</button>
   </div>
</body>
</html>