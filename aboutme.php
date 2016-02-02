<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>欢迎界面</title>
    <script type="text/javascript" src="./js/jquery-2.2.0.min.js"></script>
    <script type="text/javascript" src="./js/jquery.rotate.js"></script>
    <script type="text/javascript">
        $().ready(function(){
            window.i=0;
            setInterval(changegeyan,5000);
        });
        function changegeyan(){
            var arr=Array();
            arr[0]="我是谁呢?";
            arr[1]="我是淡轻风啊  哈哈";
            arr[2]="做这行还真不容易,真的很累,不过还确实有点趣味";
            arr[3]="爱好:敲敲代码?设计设计网页?装装逼?";
            arr[4]="无所谓!!开心就好,不是吗?";
            arr[5]="不太会说话的我,那就不说了\(^o^)/~";
            arr[6]="送给你!送给自己一句话";
            arr[7]="Sometimes you don't have to care so much,just follow your heart.";
            i++;
            if(i>=8){
                i=0;
            }
            $('.geyan').html(arr[i]);
            $('.geyan').css('fontSize','0px');
            $('.geyan').animate({
                fontSize:'30px'
            },3000)
            $('.geyan').rotate({
                duration: 3000,
                angle: 270,
                animateTo: 720
            });

        }
    </script>
    <style type="text/css">
        *{
            margin: 0px;
            padding: 0px;
            font-family: 'Microsoft Yahei';
        }
        body{
            width: 100%;
        }
        .img{
            position: absolute;
            top: 30px;
            left: 630px;
        }
        .geyan{
            position: absolute;
            top: 200px;
            height: 0px;
            left: 300px;
            /*margin-top: 200px;*/
            /*text-align: center;*/
            color: #007FFF;
        }
    </style>
</head>
<body>
<div class="img"><img src="./img/qqimg.png" width="100px" height="100px"/></div>
<div class="geyan">关于我</div>
</body>
</html>