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
        $criteria = new CDbCriteria;
        $new=new Dtable('news');
        $num=$new->count();
        if($clnid){
            $criteria->addCondition('cln_id='.$clnid);
        }
        $page=new CPagination($num);
        $page->pageSize=20;//每页数量
        $page->applyLimit($criteria);
        $criteria->limit=$page->pageSize;
        $criteria->offset=$page->currentPage*$page->pageSize;
        $dd= $new->findAll($criteria);
           foreach($dd as $k=>$v){
               $dd[$k]['cln_id']=$this->GetTname($v['cln_id']);
           }
        return array('data'=>$dd,'page'=>$page);

    }
    /*
     * 添加新闻
     * */
    function Addnews($data){
        foreach($data as $k=>$v){
            $data[$k]=isset($data[$k])?$data[$k]:'';
        }

        $new=new Dtable('news');
        if(isset($data['id'])){
            $new= $new->findByPk($data['id']);
        $new->isNewRecord=false;
        }

        $new->title=$data['title'];
        $new->desc=$data['desc'];
        $new->cln_id=$data['cln_id'];
        $new->text=isset($data['text'])?$data['text']:'';
        $new->timeline=time();
        return $new->save();
    }


    /*
     * 获取文章所属栏目
     * */
    function GetTname($id){
        $sql="select name from `jls_colmns` where id=".$id;
        $r=Yii::app()->db->createCommand($sql)->queryRow();
        return $r['name'];
    }

    /*
     * 获取文章详情
     * */
    function GetNewsinfo($id){
        if(!$id) return 0;
$sql="select * from `jls_news` where id={$id}";
        $data=Yii::app()->db->createCommand($sql)->queryRow();
      return $data;
    }
}


?>