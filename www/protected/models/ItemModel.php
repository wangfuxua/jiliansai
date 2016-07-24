<?php
class ItemModel extends CommonModel{
    public function init(){
        parent::init();
    }

    /*
     * 获取比赛项目
     * */
    function GetItems(){
        $item=new Dtable('imtems');
        return $item->findAll();
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
        $sql="select * from  `jls_games` where item_id={$itemid}";
        return Yii::app()->db->createCommand($sql)->queryAll();
    }
    

}


?>