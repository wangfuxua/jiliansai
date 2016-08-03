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
    /*
     * 添加比赛
     * */
    function AddFight($data){
        $fi['teamA']=$data['teama'];
        $fi['teamB']=$data['teamb'];
        $fi['starttime']=$data['stime'];
        $fi['group_id']=$data['groupid'];
        $fi['turn']=$data['turn'];
        $fi['timeline']=time();
        return $this->addData('jls_fights',$fi);
    }
   /*
    * 获取比赛
    * */
    function GetFi($group_id,$turn){

        $sql="select * from `jls_fights`  where turn={$turn} ADD  group_id={$group_id}";
        $data= Yii::app()->db->createCommand($sql)->queryALl();
        foreach ($data as $k=>$v){
            $data[$k]['Tainfo']=$this->GetTname($v['teamA']);
            $data[$k]['Tbinfo']=$this->GetTname($v['teamB']);

        }
        return $data;
    }
    /*
     * 获取队伍名称
     * */
        function GetTname($tid){
            $sql="select * from `jls_teams` where id={$tid}";
            return Yii::app()->db->createCommand($sql)->queryRow();
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
    /*
     * h获取某个小组的队伍信息
     * */
    function GetTinfoByG($gameid,$turn,$group){
            $sql="select * from `jls_groups` where game_id={$gameid} and turn={$turn} and group={$gameid}";
            $data=Yii::app()->db->createCommand($sql)->queryAll();

        return $data;

    }

}