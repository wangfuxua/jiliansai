<?php
/**
 * Created by PhpStorm.
 * User: wangyan
 * Date: 16/7/17
 * Time: 下午3:57
 */
class NewsModel extends CommonModel{
    function init(){
        parent::init();
    }
    /*
     * 获取新闻分类
     * */
    function GetNtype(){
        $new=new Dtable('colmns');
        return $new->findAll();
    }

}