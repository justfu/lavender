<?php
/**
 * Created by PhpStorm.
 * User: 宏
 * Date: 2016/1/28
 * Time: 22:49
 */

//验证码类
class Checkcode{
    private $checkcode;//验证码
    private $add='+';
    private $img;
    private $width=100;
    private $height=27;
    private $text="";//写入到图片的内容
    private $font="../font/msyh.ttc";

    public function createimg(){
        $this->img=imagecreatetruecolor($this->width,$this->height);
        $color=imagecolorallocate($this->img,255,255,255);
        imagefill($this->img,0,0,$color);

    }

    public function createCode(){
        for($i=0;$i<4;$i++){
            $this->text.=rand(0,1);
        }
        $this->checkcode=bindec(intval($this->text));
    }

    public function writetoimg(){
        $black=imagecolorallocate($this->img,0,0,0);
        imagettftext($this->img,10,0,20,20,$black,$this->font,$this->text);
    }

    public function getCodeImg(){
        $this->createimg();
        $this->createCode();
        $this->writetoimg();
        header("Content-type: image/png");
        imagepng($this->img);
        imagedestroy($this->img);
    }

    public function getCheckCode(){
        return $this->checkcode;
    }
}