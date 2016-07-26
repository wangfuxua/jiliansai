<?php
class VideoModel extends CommonModel{
    function init(){
        parent::init();
    }
    /*
     * 获取所有的视频列表
     * */
    function GetVs(){
        $criteria = new CDbCriteria;
        $sql="select count(1) from `jls_videos` where 1";
        $num=Yii::app()->db->createCommand($sql)->queryScalar();
        $page=new CPagination($num);
        $page->pageSize=20;//每页数量

        $sql="select * from `jls_videos`";
        $sql=$sql." limit :offset,:limit";
        $page->applyLimit($criteria);
        $model=Yii::app()->db->createCommand($sql);
        $model->bindValue(':offset',$page->currentPage*$page->pageSize);
        $model->bindValue(':limit',$page->pageSize);
        $data=$model->queryAll();
       foreach($data as $k=>$v){
           $sql="select name from `jls_items` where id={$v['item_id']}";
           $data[$k]['itemname']=Yii::app()->db->createCommand($sql)->queryScalar();
       }
//        var_dump($data);die;
        return array('data'=>$data,'page'=>$page);
    }
    /*
     * 添加视频
     * */
    function AddV($data){
        if(!$data) return 0;
        $v['name']=$data['name'];
        $v['intr']=$data['intr'];
        $v['url']=$data['url'];
        $v['item_id']=$data['item_id'];
        $v['timeline']=time();
        $v['status']=isset($data['status'])?$data['status']:0;
       return  $this->addData('jls_videos',$v);
    }
    /*
     * 更新视频
     * */
    function EditV($data){
        if(!$data) return 0;
        $array['id']=$data['id'];
        $v['name']=$data['name'];
        $v['intr']=$data['intr'];
        $v['url']=$data['url'];
        $v['item_id']=$data['item_id'];
        $v['timeline']=time();
        $v['status']=$data['status'];
        return  $this->setData('jls_videos',$v,$array);
    }
        /*
         * 获取单个视频的详情
         * */
        function GetVById($id){
            $sql="select * from `jls_videos` where id={$id}";
            return Yii::app()->db->createCommand($sql)->queryRow();
        }
}


?>