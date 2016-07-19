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


}


?>