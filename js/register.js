/**
 * Created by 宏 on 2016/1/29.
 */
$().ready(function(){
    window.c1=0;
    window.c2=0;
    window.c3=0;
    window.c4=0;

    $('#tel').bind('blur',function(){
        var tel=$('#tel').val();
        checktel(tel);
    });

    $('#username').bind('blur',function(){
        var username=$('#username').val();
        checkusername(username);
    });

    $('#password').bind('blur',function(){
        var password=$('#password').val();
        checkpassword(password);
    });

    $('#password1').bind('blur',function(){
        var password1=$('#password1').val();
        checkpassword1();
    });

   $('#register_butt').bind('click',function(event){
       checktel($('#tel').val());
       checkusername($('#username').val());
       checkpassword($('#password').val());
       checkpassword1();
       if(!(c1==1&&c2==1&&c3==1&&c4==1)){
           event.preventDefault();
       }
   });

});

function checktel(tel){
    if(tel==""||tel.length!=11){
        $('#tel').css('borderColor','red');
        return;
    }
    $.ajax({
        type:'post',
        url:'./Ajax/checktel.php',
        data:'tel='+tel,
        success:function(msg){
            if(msg==0){
                $('#tel').css('borderColor','aqua');
                $('#tel_img').show();
                c1=1;
            }else{
                $('#tel').css('borderColor','red');
                $('#tel_img').hide();
                alert('此账号已经注册过了!');
                c1=0;
            }
        }
    });
}

function checkusername(username){
    if(username==""){
        $('#username').css('borderColor','red');
        $('#username_img').hide();
        c2=0;
    }else{
        $('#username').css('borderColor','aqua');
        $('#username_img').show();
        c2=1;
    }
}

function checkpassword(pwd){
    if(pwd==""){
        $('#password').css('borderColor','red');
        $('#passowrd_img').hide();
        c3=0;
    }else{
        $('#password').css('borderColor','aqua');
        $('#password_img').show();
        c3=1;
    }
}

function checkpassword1(){
    var pwd=$('#password').val();
    var pwd2=$('#password1').val();


    if(pwd2==""){
        $('#password1').css('borderColor','red');
        $('#password1_img').hide();
        return;
    }
    if(pwd==pwd2){
        $('#password1').css('borderColor','aqua');
        $('#password1_img').show();
        c4=1;
    }else{
        $('#password1').css('borderColor','red');
        $('#password1_img').hide();
        c4=0;
    }
}