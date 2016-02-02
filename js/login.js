/**
 * Created by 宏 on 2016/1/28.
 */
$().ready(function(){
    $('#tel').bind('blur', function () {
        var username = $('#tel').val();
        checkusername(username);
    });

    $('#password').bind('blur',function(){
        var password = $('#password').val();
        var username = $('#tel').val();
        checkpassword(username,password);
    });

    $('#checkcode').bind('blur',function(){
        var checkcode=$('#checkcode').val();
        checkCode(checkcode);
    });
    if($('#user')[0]){
        $('#login').hide();
        $('#user').show();
    }

    $('#box_hide').bind('mouseover',function(){
        $('#box_hide').rotate({
            duration: 2000,
            angle: 0,
            animateTo: 360
        });
    });
    window.c1=0;
    window.c2=0;
    window.c3=0;//声明全局变量
    $('.login_button').bind('click',function(event){
        checkusername($('#tel').val());
        checkpassword($('#tel').val(),$('#password').val());
        checkCode($('#checkcode').val());
        if(!(c1==1&&c2==1&&c3==1)){
             event.preventDefault();
        }

    });
});


function checkusername(tel){
    $.ajax({
        type:'post',
        url:'./Ajax/checktel.php',
        data:'tel='+tel,
        success:function(msg){
            if(msg==1){
                $('#tel').css('borderColor','aqua');
                c1=1;
            }else{
                $('#tel').css('borderColor','red')
                c1=0;
            }
        }
    });
}

function checkpassword(tel,password){
    $.ajax({
        type:'post',
        url:'./Ajax/checkpassword.php',
        data:'tel='+tel+'&'+'password='+password,
        success:function(msg){
            if(msg==1){
                $('#password').css('borderColor','aqua');
                c2=1;
            }else{
                $('#password').css('borderColor','red');
                c2=0;
            }
        }
    });

}

function checkCode(checkcode){
    $.ajax({
        type:'post',
        url:'./Ajax/checkCode.php',
        data:'checkcode='+checkcode,
        success:function(msg){
            if(msg==1){
                $('#checkcode').css('borderColor','aqua');
                c3=1;
            }else{
                $('#checkcode').css('borderColor','red');
                c3=0;
            }
        }
    });
}