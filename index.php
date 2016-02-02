<?php session_start();
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
    <title>紫色</title>
    <link rel="stylesheet" type="text/css" href="./css/app.css"/>
    <script type="text/javascript" src="./js/jquery-2.2.0.min.js"></script>
    <script type="text/javascript" src="./js/jquery.rotate.js"></script>
    <script type="text/javascript" src="./js/index_js.js"></script>
    <script type="text/javascript" src="./js/login.js"></script>
    <script type="text/javascript" src="./js/createSnow.js"></script>
    <meta name="keywords" content="彩虹网旗下网站 紫色站 爱情站 薰衣草"/>
</head>
<body>
   <div class="header" id="header">
       <div>
       <img style="margin-left: 20px" src="img/icon.png"/><span class="wz_logo">彩虹网</span>
       </div>
       <div class="login" id="login">
           <span><a id="login_b" href="javascript:void();">登陆</a></span><span>|</span><span><a href="./register.php">注册</a></span><span>|</span><span id="rainbowone" style="cursor: pointer"><a href="#footer">彩虹网分站点▼</a></span>

       </div>
                  <?php
                    if(isset($_SESSION['username'])){
                        echo "<div class='login' id='user'><span><a href='userinfo.php'>".$_SESSION['username']
                            ."</a></span><span>|</span><span><a href='./controller/exitprocess.php'>安全退出</a></span><span>|</span><span id='rainbowone' style='cursor: pointer'><a href='#footer'>彩虹网分站点▼</a></span></div>";
                    }
                   ?>
   </div>
   <div class="tit">
       <div id="lavender" style="cursor:pointer;margin-left: 20px;line-height:130px;font-style:italic;font-size:60px;font-family: '微软雅黑';color: white">简.言</div><div class="beizhu">情感语录分享平台</div>
       <div class="login">
       </div>
   </div>
   <div class="content">
       <div class="content_left">
           <div class="content_o">
               <?php
               require_once $_SERVER['DOCUMENT_ROOT'].'/lavender/model/ArticleService.class.php';
               $articleService=new ArticleService();
               $arr=$articleService->getfirstarticle();
               $arr[0]['content']=mb_substr($arr[0]['content'],0,74,'UTF-8')."...";
               ?>
           <div class="content_one">
               <div class="content_one_img">
                   <img src="<?php echo $arr[0]['img'];?>" class="img1"/>
               </div>
               <div class="article">
                   <div class="article_title"><?php echo $arr[0]['title'];?></div>
                   <div class="article_content"><?php echo "<a target='_blank' href='./article.php?id=".$arr[0]['id']."'>".$arr[0]['content']."</a>";?></div>
                   <div class="article_date">
                       <img src="./img/date.png" width="25px" height="25px"/><?php echo $arr[0]['date'];?>&nbsp;&nbsp;
                       <img src="./img/read.png" width="25px" height="25px"/><?php echo $arr[0]['read_time'];?>&nbsp;&nbsp;
                       <img src="./img/love.png" width="25px" height="25px"/><?php echo $arr[0]['praise'];?>&nbsp;&nbsp;
                       <img src="./img/reply.png" width="25px" height="25px"/>1000&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                       <span><a target="_blank" href="<?php echo './article.php?id='.$arr[0]['id'];?>">阅读全文</a></span>
                   </div>
               </div>
           </div>
           </div>
<!--           --><?php
//            for($i=0;$i<5;$i++) {
//                ?>
                <div class="content_two" style="display: none">
                    <div class="content_two_img">
                        <img src="./img/loading.gif" class="img2"/>
                    </div>
                    <div class="article2">
                        <div class="article2_title">加载中</div>
                        <div class="article2_content">加载中</div>
                        <div class="article2_date">
                            <img src="./img/date.png" width="18px" height="18px"/><a class="a">2016-1-18</a>&nbsp;&nbsp;
                            <img src="./img/read.png" width="18px" height="18px"/><a class="b">50次</a>&nbsp;&nbsp;
                            <img src="./img/love.png" width="18px" height="18px"/><a class="c">1080</a>&nbsp;&nbsp;
                            <img src="./img/reply.png" width="18px" height="18px"/><a class="d">1080</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span><a  class="read_all" href="#">阅读全文</a></span>
                        </div>
                    </div>
                </div>
<!--            --><?php
//            }
//        ?>
           <div class="content_fenye">
               <div class="more" id="more1">加载更多</div>
           </div>

       </div>
       <div class="content_right">
           <div class="box1">
               <div class="box1_title">关注我们</div>
               <img src="./img/weibo.png" onmouseover="this.src='./img/weibohover.png'" onmouseout="this.src='./img/weibo.png'" width="70px" height="70px"/>
               <a href="#footer"><img src="./img/wechat.png" id="wechat" onmouseover="this.src='./img/wechathover.png'" onmouseout="this.src='./img/wechat.png'" width="70px" height="70px"/></a>
               <a href="http://github.com/justfu" target="_blank"><img src="./img/github.png" onmouseover="this.src='./img/githubhover.png'" onmouseout="this.src='./img/github.png'" width="70px" height="70px"/></a>
           </div>
           <div class="box2">
               <div id="box2_menu" class="box2_menu">文章标签</div>
               <div class="box2_tab">
                   <div>爱情</div>
                   <div>励志</div>
                   <div>青春</div>
                   <div>校园</div>
                   <div>疯狂</div>
                   <div>爱好</div>
                   <div>激情</div>
                   <div>高兴</div>
                   <div>欢快</div>
                   <div>Dove</div>
                   <div>love</div>
               </div>
               </div>
           <div class="box3">
                 <div id="box3_menu" class="box3_menu">小乐</div>
                  <div class="xiaoyue"><iframe id="music" frameborder="no" border="0" marginwidth="0" marginheight="0" width=330 height=86 src="http://music.163.com/outchain/player?type=2&id=35403523&auto=0&height=66"></iframe></div>
                  <div class="changemusic">
                      <ul>
                          <li onclick="$('iframe').attr('src',arr2[0])">1.旅行--许巍</li>
                          <li onclick="$('iframe').attr('src',arr2[1])">2.演员--薛之谦</li>
                          <li onclick="$('iframe').attr('src',arr2[2])">3.何以爱情--钟汉良</li>
                          <li onclick="$('iframe').attr('src',arr2[3])">4.我怀念的--孙燕姿</li>
                          <li onclick="$('iframe').attr('src',arr2[4])">5.陪你度过漫长岁月--陈奕迅</li>
                          <li onclick="$('iframe').attr('src',arr2[5])">6.男孩别哭--海龟先生</li>
                          <li onclick="$('iframe').attr('src',arr2[6])">7.因为爱情--陈奕迅,王菲</li>
                      </ul>
                      <button class="random">随机放一首</button>
                  </div>
           </div>
           </div>

       </div>
   </div>
<div class="login_box">
    <div class="login_box_title"><img style="margin-top: 16px;margin-left: 45px;" src="img/icon.png"><span style="position: relative;top: -10px;">　　登陆到彩虹网</span><span id="box_hide" class="box_hide">X</span></div>
    <div class="login_box_body">
    <form action="./controller/loginprocess.php" method="post">
        <div class="login_user"><input id="tel" maxlength="11" type="text" name="tel" placeholder="请输入用户名或手机号"/></div>
        <div class="login_pwd"><input id="password" maxlength="16" type="password" name="password" placeholder="请输入密码"/></div>
        <div class="check_code"><input id="checkcode" maxlength="4" type="text" name="checkcode" placeholder="将右边的二进制转换成十进制"/><img id="checkimg" src="./common/getCheckCode.php" alt="单击可更换验证码" onclick="this.src='./common/getCheckCode.php?a='+Math.random()" /></div>
        <button class="login_button">登陆</button>
        <div class="more">
            <div style="margin-top: 12px;margin-left: 5px">快捷登陆　　　　　　　　　　　<span>没有账号？点击立即注册</span></div>
                <hr/>
                <div style="position: relative;bottom: -5px;">
                <img src="./img/qq.png" width="30px" height="30px" />
                <img src="./img/weibo1.png" width="30px" height="30px"/>
                </div>
        </div>
    </form>
    </div>
</div>
<div class="footer" id="footer">
    <?php
     require_once 'footer.php';
    ?>
<div>
</body>
</html>