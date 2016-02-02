<?php
/**
 * Created by PhpStorm.
 * User: 宏
 * Date: 2016/1/23
 * Time: 19:27
 */
class Article{
    private $id;//文章id
    private $content;//文章内容
    private $title;

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }//文章标题
    private $img;//文章图片
    private $date;//文章发布日期
    private $read_time;//文章阅读次数
    private $praise;//文章被赞次数
    private $classify;//文章的分类
    private $no_praise;//不被赞次数

    /**
     * @return mixed
     */
    public function getNoPraise()
    {
        return $this->no_praise;
    }

    /**
     * @param mixed $no_praise
     */
    public function setNoPraise($no_praise)
    {
        $this->no_praise = $no_praise;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * @param mixed $img
     */
    public function setImg($img)
    {
        $this->img = $img;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getReadTime()
    {
        return $this->read_time;
    }

    /**
     * @param mixed $read_time
     */
    public function setReadTime($read_time)
    {
        $this->read_time = $read_time;
    }

    /**
     * @return mixed
     */
    public function getPraise()
    {
        return $this->praise;
    }

    /**
     * @param mixed $praise
     */
    public function setPraise($praise)
    {
        $this->praise = $praise;
    }

    /**
     * @return mixed
     */
    public function getClassify()
    {
        return $this->classify;
    }

    /**
     * @param mixed $classify
     */
    public function setClassify($classify)
    {
        $this->classify = $classify;
    }


}