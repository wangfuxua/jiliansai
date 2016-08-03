<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Lee
 * Date: 16-8-3
 * Time: 下午4:38
 * To change this template use File | Settings | File Templates.
 */
class GroupModel extends CommonModel{
    function init(){
        parent::init();
    }
    /*
     * 获取需要分组的队伍信息
     * */
     function GetTeamsByturn($gameid){
            $turn=$this->GetTurn($gameid);
//         echo $turn;die;
            if($turn==1){

                $criteria = new CDbCriteria;
                $sql="select * from `jls_teams` where game_id={$gameid}";
                $num=Yii::app()->db->createCommand($sql)->queryScalar();
                $page=new CPagination($num);
                $page->pageSize=20;//每页数量
                $sql="select * from `jls_teams` where game_id={$gameid}";
                $sql=$sql." limit :offset,:limit";
                $page->applyLimit($criteria);
                $model=Yii::app()->db->createCommand($sql);
                $model->bindValue(':offset',$page->currentPage*$page->pageSize);
                $model->bindValue(':limit',$page->pageSize);
                $data=$model->queryAll();

                return array('data'=>$data,'page'=>$page);
            }else{
                /*
                 * 获取所有的分组
                 * */
                $criteria = new CDbCriteria;
                $sql="select  `winteam`  from `jls_fights` where `group_id`=1 and `turn`={$turn}";
                $num=Yii::app()->db->createCommand($sql)->queryScalar();
                $page=new CPagination($num);
                $page->pageSize=20;//每页数量
                $sql="select  `winteam`  from `jls_fights` where `group_id`=1 and `turn`={$turn}";
                $sql=$sql." limit :offset,:limit";
                $model=Yii::app()->db->createCommand($sql);
                $model->bindValue(':offset',$page->currentPage*$page->pageSize);
                $model->bindValue(':limit',$page->pageSize);
                $data=$model->queryAll();

                return array('data'=>$data,'page'=>$page);
            }
     }
    /*
     * 获取当前轮次的分组信息
     * */
    function GetGroups($gameid){
        $turn=$this->GetTurn($gameid);
        if($turn==1){
           return 1;
        }else{
            $sql="select `group` from `jls_groups` where `game_id`={$gameid}";
            $data= Yii::app()->db->createCommand($sql)->queryAll();
            return $data;
        }
    }

    /*
     * 根据比赛d获取当前比赛的的轮次
     * */
    function GetTurn($gameid){
        $sql="select `turn` from `jls_games` where id={$gameid}";
        return Yii::app()->db->createCommand($sql)->queryScalar();
    }

}