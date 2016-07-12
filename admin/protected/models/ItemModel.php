<?php
class ItemModel extends CommonModel{
    function init(){
        parent::init();
    }
    function GetItems(){
        $criteria = new CDbCriteria;
        $item=new Dtable('items');
        $num=$item->count();
//        echo $num;die;
        $page=new CPagination($num);
        $page->pageSize=20;//每页数量
        $page->applyLimit($criteria);
        $criteria->limit=$page->pageSize;
        $criteria->offset=$page->currentPage*$page->pageSize;
        $dd= $item->findAll($criteria);
        return array('data'=>$dd,'page'=>$page);
    }
    /*
     * 获取比赛人数
     * */
    public function GetPnums(){
        $item=new Dtable('pnums');
        return $item->findAll();
    }
    /*
     * 添加项目
     * */
    public function AddItem($data=''){
        if(!$data) return 0;
        $item=new Dtable('items');
        $item->name=$data['name'];
        $item->logo=$data['logo'];
        $item->p_num=implode(',',$data['p_num']);
        $item->intr=$data['intr'];
        return $item->save();
    }
}

?>