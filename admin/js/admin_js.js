/**
 * Created by 宏 on 2016/1/31.
 */
jQuery.fn.extend({
    quanxuan : function() {
        this.prop('checked', true);
    },
    quxiao : function() {
        this.prop('checked', false);
    },
    fanxuan : function() {
        for ( var i = 0; i < this.length; i++) {
            if (this[i].checked == true) {

                this[i].checked = false;
            } else {
                this[i].checked = true;
            }
        }
    }
});

$().ready(function(){
    $('.red').bind('click',function(){
        //$('.red').next('div').hide(1000);
       $(this).next('div').toggle(1000);
    });

    $('#purple_add_article').bind('click',function(){
          $('#ifr').attr('src','./addArticle.php');
    });
    $('#purple_auto_add_aiqing_article').bind('click',function(){
          $('#ifr').attr('src','./autoAddAiQingArticle.php');
    });
    $('#purple_auto_add_lizhi_article').bind('click',function(){
          $('#ifr').attr('src','./autoAddLiZhiArticle.php');
    });
    $('#purple_manage_article').bind('click',function(){
        $('#ifr').attr('src','./manageArticle.php?pagenow=1');
    });
});