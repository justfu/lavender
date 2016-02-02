/**
 * Created by 宏 on 2016/1/30.
 */


$().ready(function(){
     window.i=0;
    //$('.header').animate({top:'0px',left:'0px'},10000);
    //$('.body').animate({top:'100px',left:'0px'},10000);
    $('.login').animate({top:'90px',left:'900px'},5000);
    $('.body').animate({left:'0px'},3000);
    $('.logo').animate({top:'15px',left:'30px'});
    $('.geyan').animate({left:'60px',fontSize:'30px'},3000);
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
    $('.geyan').css('left','-50px');
    $('.geyan').animate({left:'60px',fontSize:'30px'},3000);
}

