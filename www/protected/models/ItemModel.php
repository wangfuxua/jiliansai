<?php
class ItemModel extends CommonModel{
    public function init(){
        parent::init();
    }
    /*
     * 获取比赛项目
     * */
    function GetItems(){
        $item=new Dtable('items');
        return $item->findAll();
    }
    /*
     * 获取比赛项目sql执行
     * */
    function GetItemsBysql(){
        $sql="select * from `jls_items`";
        return Yii::app()->db->createCommand($sql)->queryAll();
    }
    /*
     *获取比赛需要的验证项目
     * */
    function GetVers($gameid){
        $sql="select b.* from `jls_games` as a RIGHT  JOIN  `jls_vervitys` as b on a.verify_ud=b.id where a.id={$gameid}";
        return Yii::app()->db->createCommand($sql)->queryAll();
    }
    /*
     * 获取项目下的所有比赛
     * */
    function GetGaems($itemid){
        $sql="select a.*,b.name from  `jls_games` as a left join `jls_items` as b on a.item_id=b.id where a.item_id={$itemid}";
        return Yii::app()->db->createCommand($sql)->queryAll();
    }
    /*
     *判断当前选择游戏是否允许报名
     * */
    function Checkgame($gameid){
        $tt=time();
        $sql="select id from `jls_games` where `etime`>{$tt} and stime<{$tt} and status!=0";
        return Yii::app()->db->createCommand($sql)->queryScalar();
    }
    /*
     * 添加报名队伍的联系人信息
     * */
    function AddGame1($data){
        $uid=Yii::app()->user->id;
         $sql="select id from `jls_teams` where uid='{$uid}' and `game_id`={$data['gameid']}";
       $r=Yii::app()->db->createCommand($sql)->queryScalar();
        if($r){
            return $r;
        }
        $a['uid']=Yii::app()->user->id;
        $a['phone']=$data['phone'];
        $a['name']=$data['name'];
        $a['game_id']=$data['gameid'];
        $a['timeline']=time();
          $this->addData('jls_teams',$a);
        return Yii::app()->db->getLastInsertID();
    }
    /*
     * 根据游戏id'id获取itemid
     * */
    function GetItemid($gameid){
        if (!$gameid) return 0;
        $sql="select item_id from `jls_games` where id=:id";
        return Yii::app()->db->createCommand($sql)->bindParam(':id',$gameid)->queryScalar();
    }
    /*
     * 根据gameid  获取报名的信息
     * */
    function GetPtBygame($gameid,$uid=0){
            if(!$uid){
                $uid=Yii::app()->user->id;
            }
        $sql="select * from `jls_teams` where game_id={$gameid} and uid='{$uid}'";
        return Yii::app()->db->createCommand($sql)->queryRow();
    }
    /*
     * 获取队伍的队员信息
     * */
    function GetTinfiBytid($tid){
        if(!$tid) return 0;
        $sql="select * from `jls_team_info` where tid={$tid}";
        return Yii::app()->db->createCommand($sql)->queryAll();
    }
    /*
     * 通过gameid  获取比赛的信息以及需要验证的信息
     * */
        function GetGameinfo($gameid){
            $sql="select * from  `jls_games`  where id={$gameid}";
            return Yii::app()->db->createCommand($sql)->queryRow();
        }
    /*
     * 更新队伍信息
     * */
    function Upteam($data){
            $da['tname']=$data['tname'];
            $da['logo']=$data['logo'];
            $da['descript']=$data['descript'];
            $da1['id']=$data['tid'];
       return  $this->setData('jls_teams',$da,$da1);
    }
    /*
     * 添加或者更新队伍队员信息
     * */
        function addteaminfo($data){
               return  $this->addData('jls_team_info',$data);
        }
        /*
         * 更新队员信息
         * */
    function Upteaminfo($data,$w){
        return $this->setData('jls_team_info',$data,$w);
    }

    /*
     * 判断队员是否存在
     * */
    function Checktinfo($tid,$num){
        $sql="select id from jls_team_info where `tid`={$tid} and `number`={$num}";
        return Yii::app()->db->createCommand($sql)->queryScalar();
    }
}
?>