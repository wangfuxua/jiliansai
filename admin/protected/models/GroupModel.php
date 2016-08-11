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
     function GetTeamsByturn($gameid,$turn=0){
         if(!$turn){
            $turn=$this->GetTurn($gameid);
         }
//         echo $turn;die;
            if($turn==1){

                $criteria = new CDbCriteria;
                  $sql="select count(1) from `jls_teams` as a  where a.game_id={$gameid} and a.id not in(select  tid from `jls_groups` where game_id={$gameid} and turn={$turn}) ";

                $num=Yii::app()->db->createCommand($sql)->queryScalar();
                $page=new CPagination($num);
                $page->pageSize=20;//每页数量
                $sql="select a.* from `jls_teams` as a   where a.game_id={$gameid} and a.id not in(select  tid from `jls_groups` where game_id={$gameid} and turn={$turn}) ";
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
                $sql="select  `teamid`  from `jls_winteam` where `gameid`={$gameid} and `turn`={$turn} and `teamid` not in(select  tid from `jls_groups` where game_id={$gameid} and turn={$turn})";
                $num=Yii::app()->db->createCommand($sql)->queryScalar();
                $page=new CPagination($num);
                $page->pageSize=20;//每页数量
                $sql="select  b.*  from `jls_winteam` as a left join `jls_teams` as b on a.teamid=b.id  where a. `gameid`={$gameid} and a.`turn`={$turn} and `teamid` not in(select  tid from `jls_groups` where game_id={$gameid} and turn={$turn})";
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
    function GetGroups($gameid,$turn=0){
        if(!$turn){
        $turn=$this->GetTurn($gameid);
        }

            $sql="select `group` from `jls_groups` where `game_id`={$gameid} and turn={$turn} group by `group`";
            $data= Yii::app()->db->createCommand($sql)->queryAll();
            return $data;
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
        $fi['teamA']=$data['teamA'];
        $fi['teamB']=$data['teamB'];
        $fi['starttime']=strtotime($data['stime']);
        $fi['group_id']=$data['group'];
        $fi['turn']=$data['turn'];
        $fi['gameid']=$data['gameid'];
        $fi['timeline']=time();
        $r= $this->addData('jls_fights',$fi);
        if($r){
            $u=1;
            while($u){
             $ru= $this->UpGroupT($data['gameid'],$data['group'],$data['turn'],$data['teamA']);
                if($ru){
                    $u=0;
                }
            }
            $u=1;
            while($u){
                $ru1= $this->UpGroupT($data['gameid'],$data['group'],$data['turn'],$data['teamB']);
                if($ru1){
                    $u=0;
                }
            }
            return 1;
        }else{
            return 0;
        }
    }
    /*
     * 更新新组队伍信息
     * */
    function UpGroupT($gameid,$group,$turn,$tid){
            $this->Upgameturn($gameid,$turn);
        $sql="update `jls_groups` set status=1 where game_id={$gameid} and `turn`={$turn} and `group`={$group} and tid={$tid}";
       return  Yii::app()->db->createCommand($sql)->execute();
    }
    /*
     * 更新比赛的轮次
     * */
    function Upgameturn($gameid,$turn){
        $turn1=$this->GetTurn($gameid);
        if($turn1<=$turn){
            $sql="update `jls_games` set turn={$turn}+1 where id={$gameid}";
            Yii::app()->db->createCommand($sql)->execute();
        }
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
              $sql="select * from `jls_groups` where game_id={$gameid} and turn={$turn} and `group`={$group} and status=0";

            $data=Yii::app()->db->createCommand($sql)->queryAll();
        foreach($data as $k=>$v){
           $ta=$this->GetTname($v['tid']);
            $data[$k]['tname']=$ta['tname'];
        }
        return $data;

    }
    /*
     * 添加分组
     * */
    function AddGroup($data){
        if(!$data['goup']){
            $gg=$this->GetGroup1($data['gameid'],$data['turn']);

            $data['goup']= $gg+1;
        }
        foreach($data['teamid'] as $v){
         $g['game_id']=$data['gameid'];
        $g['group']=$data['goup'];
        $g['turn']=$data['turn'];
        $g['tid']=$v;
        $g['timeline']=time();
            $this->addData('jls_groups',$g);
        }
    }
    /*
     * 获取比赛当前轮次的所有小组
     * */
    function GetGroup($gameid){
        $sql="select `group` from  `jls_groups` where game_id={$gameid} group by `group`   ";
        $r=  Yii::app()->db->createCommand($sql)->queryAll();
        if($r){
            return $r;
        }else{
            return 0;
        }
    }
    /*
     * 获取比赛当前轮次的所有小组
     * */
    function GetGroup1($gameid,$turn){
        $sql="select `group` from  `jls_groups` where game_id={$gameid} and turn={$turn} order by `group` desc   limit 1    ";
        $r=  Yii::app()->db->createCommand($sql)->queryScalar();
        if($r){
            return $r;
        }else{
            return 0;
        }
    }
}