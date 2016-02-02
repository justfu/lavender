<?php
/**
 * Created by PhpStorm.
 * User: 宏
 * Date: 2016/1/30
 * Time: 11:10
 */
function getData($url){
    $content=file_get_contents($url);
    $url=$url."/".'[0-9]*'.".html";
    $patt=addcslashes($url,'/');
    $pattern = '/'.$patt.'/';
    preg_match($pattern, $content, $matches);
    $url1=$matches[0];
    $content2=file_get_contents($url1);
    $property2 = "/og:title\"\scontent=\"[\x{4e00}-\x{9fa5}，]+/u";
    preg_match($property2, $content2, $matches2);
    $str3 = $matches2[0];
    $pattern3 = '/[\x{4e00}-\x{9fa5}，,，]+/u';
    preg_match($pattern3, $str3, $matches3);
    $arr['title'] = $matches3[0];
    $pattern4 = '/single-content"><p>[\x{4e00}-\x{9fa5}，。：\……\s-“”；？、\....！]+/u';
    preg_match($pattern4, $content2, $matches4);
    $str5 = $matches4[0];
    $str5 = substr($str5, 16);
    $arr['content'] = $str5;
    $str6 = $content2;
    $property6 = "/uploads\/2016\/[0-9]*\/[a-zA-Z0-9\s-]*.[a-z]{3}/u";
    preg_match($property6, $str6, $matches6);
    $img_url = 'http://www.wyl.cc/wp-content/' . $matches6[0];
    $arr['img_url'] = $img_url;
    $arr['date']=date("Y-m-d H:m:s");
    $arr['content']= str_replace('<p>', '', $arr['content']);
    $arr['content']=$arr['content']."--------原文自动抓取自微语录网--------原文链接".$url1;
    return $arr;
}