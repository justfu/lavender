<?php
/**
 * Created by PhpStorm.
 * User: 宏
 * Date: 2016/1/23
 * Time: 19:28
 */
require_once $_SERVER['DOCUMENT_ROOT'].'/lavender/conn/SqlHelper.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/lavender/model/Article.class.php';

class ArticleService{
    private $rowcounts;

    //获取总文章数目
    public function getrowcounts(){
        $sqlHelper=new SqlHelper();
        $sql="select count(*) from lavender_article";
        $res=$sqlHelper->dql_arr($sql);
        $this->rowcounts=$res[0]['count(*)'];
    }
    //分页函数
    public function getArticle_paging($paging){
        $this->getrowcounts();
        $paging->rowCounts=$this->rowcounts;
        $paging->pageCounts=ceil($paging->rowCounts/$paging->pagesize);//页数
        $sql="select * from lavender_article ORDER BY date DESC limit ".(($paging->pagenow-1)*$paging->pagesize.",".$paging->pagesize);
        $sqlHelper=new SqlHelper();
        $res=$sqlHelper->dql_arr($sql);
        $paging->res_arr=$res;
        return $paging;
    }

    //获取文章访问量最高的一篇文章
    public function getfirstarticle(){
        $sqlHelper=new SqlHelper();
        $sql="SELECT * FROM lavender_article WHERE read_time in( SELECT MAX(read_time) FROM `lavender_article` WHERE 1)";
        $res=$sqlHelper->dql_arr($sql);
        return $res;
    }

    //获得文章的详情
    public function getArticleDetail($id){
        $sqlHelper=new SqlHelper();
        $article=new Article();
        $sql="select * from lavender_article where id=$id";
        $res=$sqlHelper->dql_arr($sql);
        $article->setId($res[0]['id']);
        $article->setPraise($res[0]['praise']);
        $article->setContent($res[0]['content']);
        $article->setDate($res[0]['date']);
        $article->setReadTime($res[0]['read_time']);
        $article->setImg($res[0]['img']);
        $article->setNoPraise($res[0]['no_praise']);
        $article->setTitle($res[0]['title']);
        return $article;
    }

    //添加文章的访问次数
    public function AddReadTime($id){
        $sqlHelper=new SqlHelper();
        $sql="update lavender_article set read_time=read_time+1 where id=$id";
        $res=$sqlHelper->dml($sql);
        $sqlHelper->close_connect();
        return $res;
    }
     //增加文章点赞次数
    public function AddPraise($id){
        $sqlHelper=new SqlHelper();
        $sql="update lavender_article set praise=praise+1 where id=$id";
        $res=$sqlHelper->dml($sql);
        $sqlHelper->close_connect();
        return $res;
    }

    //增加文章不点赞次数
    public function NoPraise($id){
        $sqlHelper=new SqlHelper();
        $sql="update lavender_article set no_praise=no_praise+1 where id=$id";
        $res=$sqlHelper->dml($sql);
        $sqlHelper->close_connect();
        return $res;
    }

    //添加文章
    public function AddArticle($title,$content,$img,$date){
        $sqlHelper=new SqlHelper();
        $sql="insert into lavender_article(title,content,img,date) values ('$title','$content','$img','$date')";
        $res=$sqlHelper->dml($sql);
        $sqlHelper->close_connect();
        return $res;
    }

    //删除文章
    public function deleteArticle($id){
        $sqlHelper=new SqlHelper();
        $sql="delete from lavender_article where id=$id";
        $res=$sqlHelper->dml($sql);
        $sqlHelper->close_connect();
        return $res;
    }

    //更新文章信息
    public function updateArticle($id,$title,$content,$img_url){
        $sqlHelper=new SqlHelper();
        $sql="update lavender_article set title='$title',content='$content',img='$img_url' where id=$id";
        $res=$sqlHelper->dml($sql);
        $sqlHelper->close_connect();
        return $res;
    }

    //批量删除文章
    public function deleteallArticle($arr){
        $id="";
        $sqlHelper=new SqlHelper();
        for($i=0;$i<count($arr);$i++){
            if($i<count($arr)-1) {
                $id .= $arr[$i] . ",";
            }else{
                $id .= $arr[$i];
            }
        }
        $sql="delete from lavender_article where id in ($id)";
        $res=$sqlHelper->dml($sql);
        $sqlHelper->close_connect();
        return $res;
    }

}