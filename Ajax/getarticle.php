 <?php
/**
 * Created by PhpStorm.
 * User: 宏
 * Date: 2016/1/24
 * Time: 20:16
 */
 require_once $_SERVER['DOCUMENT_ROOT'].'/lavender/model/Paging.class.php';
 require_once $_SERVER['DOCUMENT_ROOT'].'/lavender/model/ArticleService.class.php';
 /*****************************
    此处应当加是否来自可信站点获取数据
    以免造成数据泄露
 ****************************/
 if(isset($_GET['pagenow'])){
     $pagenow=$_GET['pagenow'];
 }
 $paging=new Paging();
 $articleService=new ArticleService();
 $paging->pagenow=$pagenow;
 $res_class=$articleService->getArticle_paging($paging);
 $arr=$res_class->res_arr;
 for($i=0;$i<count($arr);$i++){
     $arr[$i]['content']=mb_substr($arr[$i]['content'],0,74,'UTF-8')."...";
 }
 print_r(json_encode($arr));