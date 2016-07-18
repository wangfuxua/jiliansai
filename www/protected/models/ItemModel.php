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
     *
     * */


}


?>