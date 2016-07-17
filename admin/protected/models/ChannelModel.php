<?php
class ChannelModel extends CommonModel{
    function init(){
        parent::init();
    }
    /*
     * 获取赞助商的信息
     * */
        function GetChannel($clnid){
            if(!$clnid) return 0;
            $ch=new Dtable('channels');
            $num=$ch->count();
            $criteria = new CDbCriteria;
            $criteria->addCondition('cln_id='.$clnid);
            $page=new CPagination($num);
            $page->pageSize=20;//每页数量
            $page->applyLimit($criteria);
            $criteria->limit=$page->pageSize;
            $criteria->offset=$page->currentPage*$page->pageSize;
           $dd= $ch->findAll($criteria);
            $cname=$this->GetCname($clnid);
//            echo $cname;die;
            return array('data'=>$dd,'page'=>$page,'cname'=>$cname);

    }
    /*
     * 添加渠道商信息
     * */
    function AddChannel($data){
        $ch=new Dtable('channels');
        $ch->name=$data['name'];
        $ch->url=$data['url'];
        $ch->cln_id=$data['cln_id'];
        $ch->desc=$data['desc'];
        $ch->logo=$data['logo'];
        $ch->type=isset($data['type'])?$data['type']:0;
        $ch->status=isset($data['status'])?$data['status']:0;
        $ch->timeline=time();
        return $ch->save();
    }
    /*
     * 获取添加渠道的分类
     * */
    function GetCt(){
        $sql="select *  from `jls_colmns` where fid=3";
        return   Yii::app()->db->createCommand($sql)->queryAll();
    }

    /*
     *获取渠道名
     * */
    function GetCname($clnid){
      $sql="select `name` from `jls_colmns` where id=:id";
      return   Yii::app()->db->createCommand($sql)->bindParam(':id',$clnid)->queryScalar();
    }
}

?>