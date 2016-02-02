/**
 * Created by 宏 on 2016/1/29.
 */
$().ready(function(){
    window.img_src='./img/snow.png';
    setInterval(xunhuan,500);
    $('#lavender').bind('click',function(){
        $('.img1').attr('src','./img/flower.png');
        img_src='./img/flower.png';
    });

});

function xunhuan(){
    createSnow(img_src);
}

function createSnow(img_src){
    var width=window.innerWidth-100;
    var img=$("<img>");
    img.attr('src',img_src);
    img.attr('class','img1');
    img.attr('width','30px');
    img.attr('height','30px');
    img.css('position','absolute');
    img.css('top','0px');
    var left=Math.random()*width;
    var left2=left+"px";
    img.css('left',left2);

    var left3=left+Math.random()*30;
    var left4=left3+"px";

    img.bind('mouseover',function(){
       img.remove();
    });

    img.rotate({
        duration: 100000,
        angle: 0,
        animateTo: 5000
    });
    img.appendTo('body');
    img.animate({top:'1700px',left:left4},40000,'linear',function(){
        img.remove();
    });
}