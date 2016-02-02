<?php
   $conn=new mysqli("182.254.227.205","root","aa112200","test");
   $conn->query("set names utf8");
   $ip=$_SERVER['REMOTE_ADDR'];
   $host=$_SERVER['REMOTE_HOST'];
   $nowTime=date("Y-m-d H:i:s");
   $sql="insert into fk values (null,'$ip','$nowTime','$host')";
   $conn->query($sql);
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <script type="text/javascript" src="./js/jquery-2.2.0.min.js"></script>
    <script type="text/javascript" src="./js/jquery.rotate.js"></script>
    <script type="text/javascript">
        $().ready(function(){
            window.img_src='snow.png';//设置一个图片地址的全局变量
            setInterval(xunhuan,500);//每隔0.5s创建一个雪花
            $('#aaa').bind('click',function(){//点击按钮将所有雪花变成玫瑰花
                 $('.img1').attr('src','flower.png');
                 img_src='flower.png';
            });
        });

        //使用一个函数来保存创建雪花的函数,以便可以轮转的创建雪花,主要方便能够传递参数
        function xunhuan(){
            createSnow(img_src);
        }


        //创建雪花函数
        function createSnow(img_src){
            var width=window.innerWidth-100;//首先取出当前屏幕的宽度
            var height=window.innerHeight-50;//取出当前屏幕高度
            var img=$("<img>");//创建出一个img标签
            img.attr('src',img_src);//设置img的地址
            img.attr('class','img1');//设置图片的class样式,这里主要是来控制之后的雪花变成玫瑰的功能
            img.attr('width','30px');//设置雪花的宽度
            img.attr('height','30px');//设置雪花的高度
            img.css('position','absolute');//设置雪花div的定位方式
            img.css('top','-30px');//设置雪花的初始位置

            var left=Math.random()*width;//随机的生成雪花的left定位,以便雪花从不同的地方飘下
            var left2=left+"px";
            img.css('left',left2);//设置雪花的left样式

            var left3=left+Math.random()*30;//随机生成雪花飘落的最总left位置
            var left4=left3+"px";

            var height=height+"px";//加上px

            img.rotate({//图片旋转函数
                duration: 100000,//设置从开始角度到目标角度需要的时间
                angle: 0,//初始角度
                animateTo: 5000//目标角度
            });
            img.appendTo('body');//将图片添加的body标签里面
            img.animate({top:height,left:left4},40000,'linear',function(){//jquery自定义动画 来实现雪花从初始化位置到目的位置的函数
                img.remove();//到达目标位置之后自动移除
           });
        }

    </script>
    <style type="text/css">
        *{
            margin: 0px;
            padding: 0px;
        }
    </style>
    <title>Snow</title>
</head>
<body>
<img src="back.jpg" width="100%" height="100%">
</body>
</html>