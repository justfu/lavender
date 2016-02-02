/**
 * Created by 宏 on 2016/1/31.
 */


function addAticle(title,content,img_url) {
    $.ajax({
        type:'post',
        data:'title='+title+'&content='+content+'&img_url='+img_url,
        url:'./Ajax/addArticle.php',
        success:function(msg){
            if(msg==1){
                alert('添加成功!');
                $('#title').val(null);
                $('#content').html(null);
                $('#img_url').val(null);
            }else{
                alert('添加失败!请重试!');
            }
        }

    });
}