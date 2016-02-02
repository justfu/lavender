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
            arr[0]="每一个成功者都有一个开始。勇于开始，才能找到成功的路。";
            arr[1]="即使爬到最高的山上，一次也只能脚踏实地地迈一步。";
            arr[2]="别想一下造出大海，必须先由小河川开始。";
            arr[3]="做自己以后不会后悔的事情";
            arr[4]="有时候不用在意那么多,跟着自己的心走就是了";
            arr[5]="该有的总会有的";
            arr[6]="有时候沉默不是金子,有可能是孙子";
            i++;
            if(i>=7){
                i=0;
            }
            $('.geyan').html(arr[i]);
            $('.geyan').css('fontSize','0px');
            $('.geyan').animate({
                fontSize:'30px'
            },3000);
            $('.geyan').rotate({
                duration: 3000,
                angle: 90,
                animateTo: 360
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
        .geyan{
            height: 500px;
            margin-top: 200px;
            text-align: center;
            color: #007FFF;
        }
    </style>
</head>
<body>
      <h1 style="text-align: center;margin-top: 50px;">欢迎来到管理界面</h1>
      <h2 class="geyan">彩虹网</h2>
</body>
</html>