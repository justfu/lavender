<?php
/**
 * Created by PhpStorm.
 * User: 宏
 * Date: 2016/1/30
 * Time: 10:39
 */
//取得单个文章url
$content=file_get_contents("http://www.wyl.cc/weiyu/aiqing");
$pattern = '/http:\/\/www.wyl.cc\/weiyu\/aiqing\/[0-9]*.html/';
preg_match($pattern, $content, $matches);
$url1=$matches[0];

//从单个文章中匹配出文章标题的内容
$content2=file_get_contents($url1);
$property2 = "/og:title\"\scontent=\"[\x{4e00}-\x{9fa5}，]+/u";
preg_match($property2, $content2, $matches2);

//精确地匹配出标题
$str3 = $matches2[0];
$pattern3 = '/[\x{4e00}-\x{9fa5}，,，]+/u';
preg_match($pattern3, $str3, $matches3);

//将标题保存到数组里面
$arr['content_head'] = $matches3[0];

//从单个文章页面源码之中匹配出包含文章文本内容的内容
$pattern4 = '/single-content"><p>[\x{4e00}-\x{9fa5}，。：\……\s-“”；？]+/u';
preg_match($pattern4, $content2, $matches4);
//echo $matches4[0];

//精确地匹配出文本内容
$str5 = $matches4[0];
$str5 = substr($str5, 16);

$arr['content'] = $str5;

//匹配文章的图片
$str6 = $content2;
$property6 = "/uploads\/2016\/[0-9]*\/[a-zA-Z0-9\s-]*.[a-z]{3}/u";
preg_match($property6, $str6, $matches6);
$img_url = 'http://www.wyl.cc/wp-content/' . $matches6[0];
$arr['img_url'] = $img_url;


$arr['date']=date("Y-m-d");//保存当前抓取时间
echo "<h1>以下是页面抓取结果</h1>";
echo $arr['content_head'] . "<br/>" . $arr['content'] . "<br/>";
echo "<img src={$arr['img_url']} width='300px'/>";
