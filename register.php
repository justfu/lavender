<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>彩虹网注册界面</title>
    <link rel="stylesheet" type="text/css" href="./css/register.css" />
    <script type="text/javascript" src="./js/jquery-2.2.0.min.js"></script>
    <script type="text/javascript" src="./js/register.js"></script>
</head>
<body>
     <div class="header">
         <div class="logo">Rainbow|注册界面</div>
         <div class="navi">
             <ul>
                 <li><a href="./index.php">首页</a></li>
                 <li>思想者</li>
                 <li>行走</li>
                 <li>大自然</li>
                 <li><a href="./aboutme.php">关于我</a></li>
             </ul>
         </div>
     </div>
     <div class="register">
         <h1 style="font-weight:normal;margin-top:10px;text-align: center;color: gray">填写以下信息完成注册</h1>
         <div class="body">
             <form method="post" action="./controller/registerprocess.php">
             <div class="tel"><span>　手机号:</span>　　<input id="tel" maxlength="11" type="text" name="tel" /><img id="tel_img" src="./img/ok.png" width="30px" height="30px"/></div>
             <div class="username"><span>　用户名:</span>　　<input id="username" maxlength="8" type="text" name="username"/><img id="username_img" src="./img/ok.png" width="30px" height="30px"/></div>
             <div class="password"><span>　　密码:</span>　　<input id="password" maxlength="11" type="password" name="password"><img id="password_img" src="./img/ok.png" width="30px" height="30px"/></div>
             <div class="password"><span>确认密码:</span>　　<input id="password1" maxlength="11" type="password" name="password1"><img id="password1_img" src="./img/ok.png" width="30px" height="30px"/></div>
             <div class="butt"><button id="register_butt">立即注册</button></div>
             <form>
         </div>
     </div>
     <div class="footer">
         <?php require_once './footer.php';?>
     </div>
<style type="text/css">
    .copyright{
        border-color: aqua;
    }
    .footer2{
        background-color: white;
    }
    .footer2 a{
        color: gray;
    }
    .footer2 a:hover{
        color: aqua;
    }

</style>
</body>
</html>