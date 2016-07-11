<?php
class ItemModel extends CommonModel{
    function init(){
        parent::init();
    }
    function GetItems(){
        $item=new Dtable('items');
        return $item->findAll();
    }
}

?>