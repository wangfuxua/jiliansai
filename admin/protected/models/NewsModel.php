<?php
class NewsModel extends CommonModel{
  function init(){
      parent::init();
  }
    /*
     * 获取新闻的所有类别
     * */
    function GetNewsType(){
            $new=new Dtable('colmns');
        $criteria = new CDbCriteria;
        $criteria->addCondition('fid=1');
        return $new->findAll($criteria);
    }
    /*
     * 获取所有新闻信息
     * */
    function GetNews($clnid=0){
        $new=new Dtable('news');
        $criteria = new CDbCriteria;
        if($clnid){
            $criteria->addCondition('cln_id='.$clnid);
        }
        return $new->findAll($criteria);
    }
    /*
     * 添加新闻
     * */
    function Addnews($data){
        $new=new Dtable('news');
        $new->title=$data['title'];
        $new->desc=$data['desc'];
        $new->cln_id=$data['cln_id'];
        $new->text=$data['text'];
        $new->timeline=time();
        return $new->save();
    }

}


?>