<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Lee
 * Date: 16-8-1
 * Time: 上午11:02
 * To change this template use File | Settings | File Templates.
 */
class AdventModel extends CommonModel{
    function init(){
        parent::init();
    }
    /*
     *获取列表
     * */
    function GetAds(){
        $criteria = new CDbCriteria;
        $sql="select count(1) from `jls_advent` where 1";
        $num=Yii::app()->db->createCommand($sql)->queryScalar();
        $page=new CPagination($num);
        $page->pageSize=20;//每页数量

        $sql="select * from `jls_advent`";
        $sql=$sql." limit :offset,:limit";
        $page->applyLimit($criteria);
        $model=Yii::app()->db->createCommand($sql);
        $model->bindValue(':offset',$page->currentPage*$page->pageSize);
        $model->bindValue(':limit',$page->pageSize);
        $data=$model->queryAll();
//        var_dump($data);die;
        return array('data'=>$data,'page'=>$page);
    }
    /*
 * 添加渠道商信息
 * */
    function AddAdv($data){
        $ch=new Dtable('advent');
        $ch->title=$data['title'];
        $ch->showname=$data['showname'];
        $ch->url=$data['url'];
        $ch->show=$data['show'];
        $ch->img=$data['img'];
        $ch->type=isset($data['type'])?$data['type']:0;
        $ch->status=isset($data['status'])?$data['status']:0;
        $ch->timeline=time();
        return $ch->save();
    }

    function GetVById($id){
        $sql="select * from `jls_advent` where id=:id";
        return Yii::app()->db->createCommand($sql)->bindParam(':id',$id)->queryRow();
    }
    function EditAdv($data){
        $arr=array('id'=>$data['id']);
           $adv['title']= $data['title'];
        $adv['url']= $data['url'];
        $adv['img']= $data['img'];
        $adv['showname']= $data['showname'];
        $adv['type']=isset($data['type'])?$data['type']:0;
        $adv['status']= isset($data['status'])?$data['status']:0;
        $adv['show']= $data['show'];
       return  $this->setData('jls_advent',$adv,$arr);

    }



}