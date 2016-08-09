<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Lee
 * Date: 16-8-9
 * Time: 下午4:22
 * To change this template use File | Settings | File Templates.
 */
class FightModel extends CommonModel{
    function init(){
        parent::init();
    }
    /*
     * 获取摸个对战的信息
     * */
    function GetInfoByid($fid){
          $sql="select * from `jls_fights` where id={$fid}";
            $data=Yii::app()->db->createCommand($sql)->queryRow();
        if(!empty($data)){
            $data['ainfo']=$this->GetTinfo($data['teamA']);
             $data['binfo']=$this->GetTinfo($data['teamB']);
        }
        return $data;
    }
    /*
     * 获取指定的比赛的某个轮次的某个小组的所有对战
     *  默认获取当前轮次的第一小组的对战信息
     * */
    function GetInfoByG($gameid,$trun=0;$group=1){
           if(!$turn){
            $gr=new GroupModel();
            $trun=  $gr->GetTurn($gameid);
        }
        $criteria = new CDbCriteria;
        $sql="select count(1) from `jls_fights` where group_id={$group} and gameid={$gameid} and turn={$trun}";
        $num=Yii::app()->db->createCommand($sql)->queryScalar();
        $page=new CPagination($num);
        $page->pageSize=20;//每页数量
        $sql="select * from `jls_fights` where group_id={$group} and gameid={$gameid} and turn={$trun}";
        $sql=$sql." limit :offset,:limit";
        $page->applyLimit($criteria);
        $model=Yii::app()->db->createCommand($sql);
        $model->bindValue(':offset',$page->currentPage*$page->pageSize);
        $model->bindValue(':limit',$page->pageSize);
        $data=$model->queryAll();
        if(!empty($data) and is_array($data)){
            foreach($data as $k->$v){
                $data[$k]['ainfo']=$this->GetTinfo($v['teamA']);
                $data[$k]['binfo']=$this->GetTinfo($v['teamB']);
            }
        }
        return array('data'=>$data,'page'=>$page);
    }

/*
    * 添加比赛胜利队伍
    * */
        function AddWinT($data){
            $wi['fid']=$data['fid'];//胜利队伍所书的对战id
            $wi['turn']=$data['turn'];//队伍进入到的轮次
            $wi['gameid']=$data['gameid'];//队伍所属的比赛
            $wi['teamid']=$data['teamid'];
            $wi['timeline']=time();
            return $this->addData('jls_winteam',$wi);
        }


}