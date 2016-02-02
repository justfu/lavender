<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/lavender/admin/common/checklogin.php';
checklogin();
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" href="./css/admin.css" />
    <script type="text/javascript" src="./js/jquery-2.2.0.min.js"></script>
    <script type="text/javascript" src="./js/admin_js.js"></script>
    <title>后台界面</title>
</head>
<body>
<div class="header">
    <div class="navi">
        <ul>
            <li><img src="./img/icon.png"></li>
            <li>彩虹网</li>
            <li><a href="../index.php" target="_blank">lavender</a></li>
            <li>行走</li>
            <li>思想者</li>
            <li>大自然</li>
            <li>逗趣</li>
            <li>科技树</li>
            <li>young</li>
        </ul>
    </div>
    <div class="login">
        <ul>
            <li>欢迎您</li>
            <?php  if(isset($_SESSION['adminname'])){
                         if($_SESSION['adminlevel']==1) {
                             echo "<li style='color:rgb(255,215,0);'>" . $_SESSION['adminname'] . "</li>";
                         }else{
                             echo "<li style='color:rgb(192,192,192);'>" . $_SESSION['adminname'] . "</li>";
                         }
                }?>
            <li><a href="./controller/exitprocess.php">安全退出</a></li>
            <li>管理窗口</li>
        </ul>
    </div>
</div>
 <div class="menu">
     <div class="red">Rainbow</div>
     <div class="red_menu">
         <ul>
             <li>管理用户</li>
             <li>添加管理员</li>
             <li>邮件管理</li>
         </ul>
     </div>
      <div class="red">思想者</div>
      <div class="red_menu">
          <ul>
              <li>添加文章</li>
              <li>审核文章</li>
          </ul>
      </div>
     <div class="red">行走</div>
     <div class="red_menu">
         <ul>
             <li>添加文章</li>
             <li>审核文章</li>
             <li>添加管理员</li>
         </ul>
     </div>
     <div class="red">大自然</div>
     <div class="red_menu">
         <ul>
             <li>添加文章</li>
             <li>审核文章</li>
             <li>添加管理员</li>
         </ul>
     </div>
     <div class="red">lavender</div>
     <div class="red_menu">
         <ul>
             <li id="purple_add_article">添加文章</li>
             <li id="purple_auto_add_aiqing_article">获取微语录网爱情语录文章(自动获取)</li>
             <li id="purple_auto_add_lizhi_article">获取微语录网励志语录文章(自动获取)</li>
             <li id="purple_manage_article">管理文章</li>
         </ul>
     </div>
 </div>
 <iframe class="ifr" id="ifr" src="./welcome.php" width="83%" height="100%"></iframe>
</body>
</html>