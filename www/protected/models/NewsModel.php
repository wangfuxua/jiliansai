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
    function GetNtype1(){
        $new=new Dtable('colmns');
        $criteria = new CDbCriteria;
        $criteria->addCondition('fid=1');
        return $new->findAll($criteria);
    }
    /*
     * 获取新闻分类
     * */
    function GetNtype(){
        $sql="select * from `jls_colmns` where fid=1";
        return Yii::app()->db->createCommand($sql)->queryAll();
    }
    /*
     * 获取新闻列表
     * */
    function GetNews1($clnid=0,$limit=4){
        $n=new Dtable('news');
        $criteria = new CDbCriteria;
        $criteria->addCondition('cln_id=2');
        $criteria->limit=$limit;
        return $n->findAll($criteria);
    }
    /*
    * 获取新闻列表
    * */
    function GetNews($clnid=0,$limit=6){
        $sql="select * from `jls_news` where cln_id={$clnid} limit {$limit}";
        return Yii::app()->db->createCommand($sql)->queryAll();
    }

    /*
     * 获取合作方
     * */
    function GetChan1($cllnid=4,$limit=4){
        $ne=new Dtable('channels');
        $criteria = new CDbCriteria;
        $criteria->limit=$limit;
        $criteria->addCondition('cln_id='.$cllnid);
        return $ne->findAll($criteria);
    }

    /*
 * 获取合作方
 * */
    function GetChan($cllnid=4,$limit=4){
        $sql="select * from `jls_channels` where cln_id={$clnid} limit {$limit}";
        return Yii::app()->db->createCommand($sql)->queryAll();
    }

    /*
     * 获取比赛
     * */
    function GetIGame1($gids,$limit=4){
        if(!$gids) return 0;
        $g=new Dtable('games');
        $criteria = new CDbCriteria;
        $criteria->left='left join `items` as a on t.item_id=a.id';
        $criteria->addInCondition('id',$gids);
        $criteria->limit=$limit;
        return $g->findAll($criteria);
    }
    /*
 * 获取比赛
 * */
    function GetIGame($limit=4){

        $sql="select b.* from `jls_games` as a left join `jls_items` as b on a.item_id= b.id  limit {$limit}";
           return Yii::app()->db->createCommand($sql)->queryAll();
    }




}