var arr=new Array();
arr[0]='rgb(255,0,0)';
arr[1]='rgb(255,165,0)';
arr[2]='rgb(255,255,0)';
arr[3]='rgb(0,255,0)';
arr[4]='rgb(0,127,255)';
arr[5]='rgb(0,0,255)';
arr[6]='rgb(139,0,255)';

var arr2=new Array;
arr2[0]='http://music.163.com/outchain/player?type=2&id=167802&auto=1&height=66';//旅行
arr2[1]='http://music.163.com/outchain/player?type=2&id=32507038&auto=1&height=66';//演员
arr2[2]='http://music.163.com/outchain/player?type=2&id=29947326&auto=1&height=66';//何以爱情
arr2[3]='http://music.163.com/outchain/player?type=2&id=287063&auto=1&height=66';//我怀念的
arr2[4]='http://music.163.com/outchain/player?type=2&id=35403523&auto=1&height=66';//陪你度过漫长岁月
arr2[5]='http://music.163.com/outchain/player?type=2&id=25731320&auto=1&height=66';//男孩别哭
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
    getarticle(1);
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

var pagenow1=1;

function getarticle(pagenow) {

    var jisu=0;
    $.ajax({
        type: 'get',
        data: 'pagenow=' + pagenow,
        url: './Ajax/getarticle.php',
        dataType: 'json',
        success: function (msg) {
//                    $('.img2').each(function(i,item){
//                       $(item).attr('src','./img/loading.gif');
//                    });
//                    $('.article2_title').each(function(i,item){
//                       $(item).html('加载中...');
//                    });
//                    $('.article2_content').each(function(i,item){
//                        $(item).html('加载中...');
//                    });
//                    $(msg).each(function(i,item){
//                        $($('.img2')[i]).attr('src',item.img);
//                        $($('.article2_title')[i]).html(item.title);
//                        $($('.article2_content')[i]).html(item.content);
//                        $($('.a')[i]).html(item.date);
//                        $($('.b')[i]).html(item.read_time);
//                        $($('.c')[i]).html(item.praise);
////                            $($('.d')[i]).html(item.pinlun);//评论次数
//                    });
            $(msg).each(function (i, item) {

//                        <div class="content_two" style="display: none">
//                        <div class="content_two_img">
//                        <img src="./img/loading.gif" class="img2"/>
//                        </div>
//                        <div class="article2">
//                        <div class="article2_title">加载中</div>
//                        <a><div class="article2_content">加载中</div></a>
//                        <div class="article2_date">
//                        <img src="./img/date.png" width="18px" height="18px"/><a class="a">2016-1-18</a>&nbsp;&nbsp;
//                        <img src="./img/read.png" width="18px" height="18px"/><a class="b">50次</a>&nbsp;&nbsp;
//                        <img src="./img/love.png" width="18px" height="18px"/><a class="c">1080</a>&nbsp;&nbsp;
//                        <img src="./img/reply.png" width="18px" height="18px"/><a class="d">1080</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
//                        <span><a href="#">阅读全文</a></span>
//                        </div>
//                        </div>
//                        </div>


                var new_node = $($('.content_two')[0]).clone();
                new_node.appendTo('.content_left');
                new_node.slideDown(1000);
//                        alert(new_node.children('.content_two_img').html());
                new_node.children('.content_two_img').children('img').attr('src',item.img);
                new_node.children('.article2').children('.article2_title').html(item.title);
                new_node.children('.article2').children('.article2_content').wrap("<a class='aaa' target='_blank' href='./article.php?id="+item.id+"'></a>");
                new_node.children('.article2').children('.aaa').children('.article2_content').html(item.content);

                new_node.children('.article2').children('.article2_date').find('.a').html(item.date);
                new_node.children('.article2').children('.article2_date').find('.b').html(item.read_time);
                new_node.children('.article2').children('.article2_date').find('.c').html(item.praise);
                new_node.children('.article2').children('.article2_date').children('span').children('.read_all').attr('href','./article.php?id='+item.id);
                new_node.children('.article2').children('.article2_date').children('span').children('.read_all').attr('target','_blank');
//  new_node.children('.article2_date').find('.d').html(item.date);
                /* var offset=$('.footer').offset();
                 var os_json={
                 top:offset.top+85,
                 left:0
                 };
                 $('.footer').offset(os_json);
                 });*/

                var content_fenye = $('.content_fenye').clone();
                $('.content_fenye').remove();
                content_fenye.appendTo('.content_left');
                jisu=i;
            });


            $('#more1').bind('click',function(){
                getarticle(pagenow1++);
            });

            var footer_weizhi=$('.footer').offset();
            $('.footer').offset(
                {
                    top:footer_weizhi.top+192*(jisu+1),
                    left:0
                }
            );
            if(jisu+1!=5){
                $('#more1').css('backgroundColor','gray');
                $('#more1').html('加载完成');
                $('#more1').unbind('click');
            }
        }
    });
}