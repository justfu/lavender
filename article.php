<?php
   require_once $_SERVER['DOCUMENT_ROOT'].'/lavender/model/ArticleService.class.php';
  if(isset($_GET['id'])){
      $id=$_GET['id'];
  }else{
      echo "操作非法";
      exit;
  }
   $articleService=new ArticleService();
   $res_class=$articleService->getArticleDetail($id);
   $articleService->AddReadTime($id);
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>文章详情</title>
    <link rel="stylesheet" type="text/css" href="./css/app.css"/>
    <link rel="stylesheet" type="text/css" href="./css/article.css" />
    <script type="text/javascript" src="./js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="./js/jquery.rotate.js"></script>
    <script type="text/javascript" src="./js/login.js"></script>
    <script type="text/javascript">
        var arr=new Array();
        arr[0]='rgb(255,0,0)';
        arr[1]='rgb(255,165,0)';
        arr[2]='rgb(255,255,0)';
        arr[3]='rgb(0,255,0)';
        arr[4]='rgb(0,127,255)';
        arr[5]='rgb(0,0,255)';
        arr[6]='rgb(139,0,255)';

        var arr2=new Array;
        arr2[0]='http://music.163.com/outchain/player?type=2&id=31473269&auto=1&height=66';//默
        arr2[1]='http://music.163.com/outchain/player?type=2&id=29947326&auto=1&height=66';//何以爱情
        arr2[2]='http://music.163.com/outchain/player?type=2&id=28387590&auto=1&height=66';//大城小爱
        arr2[3]='http://music.163.com/outchain/player?type=2&id=287063&auto=1&height=66';//我怀念的
        arr2[4]='http://music.163.com/outchain/player?type=2&id=35403523&auto=1&height=66';//陪你度过漫长岁月
        arr2[5]='http://music.163.com/outchain/player?type=2&id=30512459&auto=1&height=66';//突然好想你
        arr2[6]='http://music.163.com/outchain/player?type=2&id=64317&auto=1&height=66';//因为爱情

        $().ready(function(){
            setInterval(tab_change,5000);
            $('#login_b').bind('click',function(){
                var div=$('<div></div>');
                div.attr('id','login_mirror');
                div.css('position','fixed');
                div.css('width','100%');
                div.css('height','100%');
                div.css('top','0px');
                div.css('left','0px');
                div.css('opacity',0.9);
                div.css('zIndex',500);
                div.css('backgroundColor','black');
                div.css('overflow','hidden');

                div.appendTo('body');
                $('#login_mirror').slideDown(2000);
                $('.login_box').slideDown(2000);
            });

            $('#font-').bind('click',function(){
                $('.article_content').css('fontSize','10px');
            });
            $('#font_add').bind('click',function(){
                $('.article_content').css('fontSize','20px');
            });
            $('#box_hide').bind('click',function(){
                $('.login_box').hide(1000);
                $('#login_mirror').remove();
            });

            $('#username').bind('focus',function(){
                $('#username').css('borderColor','#8B00FF');
            });
            $('#username').bind('blur',function(){
                $('#username').css('borderColor','#DEDEDE');
            });

            $('#password').bind('focus',function(){
                $('#password').css('borderColor','#8B00FF');
            });
            $('#password').bind('blur',function(){
                $('#password').css('borderColor','#DEDEDE');
            });

            $('#rainbowone').bind('mouseover',function(){
                $('.rainbow_other>ul').show();
            });

            $('.rainbow_other>ul').bind('mouseout',function(){
                $('.rainbow_other>ul').hide();
            });

            $('.random').bind('click',function(){
                var musicid=Math.floor(Math.random()*6);

                $('#music').attr('src',arr2[musicid]);
            });

            $('#lavender').bind('click',function(){
                $('.beizhu').fadeIn(2000);
            });

            $('.praise_yes').one('click',function(){
                  addpraise(<?php echo $res_class->getId();?>);
            });

            $('.no_praise').one('click',function(){
                  no_praise(<?php echo $res_class->getId();?>);
            });


        });

        function tab_change() {
            $('.box2_tab > div').each(function (i, item) {
                var top = Math.random() * 140 + "px";
                var left = Math.random() * 60 + "px";
                var color = arr[Math.floor(Math.random() * 6)];
                $(item).hide();
                $(item).css('color', color);
                $(item).css('top', top);
                $(item).css('left', left);
                $(item).fadeIn(2000);
            });
        }

        function addpraise(id){
            $.get('./Ajax/add_praise.php?id='+id,function(msg){
                if(msg==1) {
                    var praise = $('.e').html();
                    praise = parseInt(praise) + 1;
                    $('.e').html(praise);
                }else{
                    alert("出问题了!");
                }
            },'text');
        }

        function no_praise(id){
            $.get('./Ajax/no_praise.php?id='+id,function(msg){
                if(msg==1) {
                    var praise = $('.f').html();
                    praise = parseInt(praise) + 1;
                    $('.f').html(praise);
                }else{
                    alert("出问题了!");
                }
            },'text');
        }

    </script>
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
    <div id="lavender" style="cursor:pointer;margin-left: 20px;line-height:130px;font-style:italic;font-size:60px;font-family: '微软雅黑';color: white">lavender</div><div class="beizhu">--等你爱我,爱情语录分享平台</div>
    <div class="login">
    </div>
</div>
<div class="content">
    <div class="content_left">
         <div class="article_detail">
                <div class="article_head">
                    <div class="article_date">
                        <div class="article_img"></div>
                        <div class="article_read">

                        </div>
                    </div>
                </div>
                <div class="article_title"><?php echo $res_class->getTitle();?></div>
                <div class="article_button">
                    <button id="font_add">A+</button>
                    <button id="font-">A-</button>
                </div>
             <p class="article_content">
                    &nbsp;&nbsp;<?php echo $res_class->getContent();?>
             </p>
             <div class="article_img">
                 <img src="<?php echo $res_class->getImg();?>" width="300px"  />
             </div>
             <div class="praise">
                 <div class="praise_yes">赞一下&nbsp;<a class="e"><?php echo $res_class->getPraise();?></a></div>
                 <div class="no_praise">不给力&nbsp;<a class="f"><?php echo $res_class->getNoPraise();?></a></div>
             </div>
             <div class="share">
                 <img src="./img/wechat.png" onmouseover="this.src='./img/wechathover.png'" onmouseout="this.src='./img/wechat.png'" width="60px" height="60px"/>
<!--                 <img src="./img/qzone.png" onmouseover="this.src='./img/qzone_hover.png'" onmouseout="this.src='./img/qzone.png'" width="60px" height="60px"/>-->
                 <script type="text/javascript">
                     (function(){
                         var p = {
                             url:location.href,
                             showcount:'1',/*是否显示分享总数,显示：'1'，不显示：'0' */
                             desc:'送给最真实的你',/*默认分享理由(可选)*/
                             summary:'<?php echo $res_class->getContent();?>',/*分享摘要(可选)*/
                             title:'<?php echo $res_class->getTitle();?>',/*分享标题(可选)*/
                             site:'彩虹网',/*分享来源 如：腾讯网(可选)*/
                             pics:'<?php echo $res_class->getImg();?>', /*分享图片的路径(可选)*/
                             style:'203',
                             width:98,
                             height:22
                         };
                         var s = [];
                         for(var i in p){
                             s.push(i + '=' + encodeURIComponent(p[i]||''));
                         }
                         document.write(['<a version="1.0"  href="http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?',s.join('&'),'" target="_blank"><img src="./img/qzone.png" id="wechat" width="60px" height="60px"></a>'].join(''));
                         $('#wechat').bind('mouseover',function(){
                            $('#wechat').attr('src','./img/qzone_hover.png');
                         });
                         $('#wechat').bind('mouseout',function(){
                            $('#wechat').attr('src','./img/qzone.png');
                         });
                     })();
                 </script>
                 <script src="http://qzonestyle.gtimg.cn/qzone/app/qzlike/qzopensl.js#jsdate=20111201" charset="utf-8"></script>
                 <img src="./img/weibo.png" onmouseover="this.src='./img/weibohover.png'" onmouseout="this.src='./img/weibo.png'" width="60px" height="60px"/>
             </div>
             <div class="fanhui" onclick="location.href='./index.php';">返回</div>
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
                    <li onclick="$('iframe').attr('src',arr2[0])">1.默--那英</li>
                    <li onclick="$('iframe').attr('src',arr2[1])">2.何以爱情--钟汉良</li>
                    <li onclick="$('iframe').attr('src',arr2[2])">3.大城小爱--王力宏</li>
                    <li onclick="$('iframe').attr('src',arr2[3])">4.我怀念的--孙燕姿</li>
                    <li onclick="$('iframe').attr('src',arr2[4])">5.陪你度过漫长岁月--陈奕迅</li>
                    <li onclick="$('iframe').attr('src',arr2[5])">6.突然好想你--许飞</li>
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
        <form>
            <div class="login_user"><input id="username" type="text" name="username" placeholder="请输入用户名或手机号"/></div>
            <div class="login_pwd"><input id="password" type="password" name="password" placeholder="请输入密码"/></div>
            <div class="check_code"><input id="checkcode" type="text" name="checkcode" placeholder="请输入验证码"/></div>
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