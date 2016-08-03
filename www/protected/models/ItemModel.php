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
        return Yii::app()->createCommand($sql)->queryScalar();
    }
    /*
     * 添加报名队伍的联系人信息
     * */
    function AddGame1($data){
        $a['uid']=Yii::app()->user->id;
        $a['phone']=$data['phone'];
        $a['name']=$data['name'];
        $a['timeline']=time();
        return  $this->addData('jls_teams',$a);
    }
    /*
     * 根据游戏id'id获取itemid
     * */
    function GetItemid($gameid){
        if (!$gameid) return 0;
        $sql="selct item_id from `jls_games` where id=:id";
        return Yii::app()->db->createCommand($sql)->bindParam(':id',$gameid)->queryScalar();
    }
}
?>