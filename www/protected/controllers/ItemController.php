<?php
class ItemController extends CommonController{
    function  init(){
        parent::init();
    }
    /*
     * 报名列表
     * */

    function actionIndex(){
        $m=new ItemModel();
//        echo 4%2;die;
       $data['list']= $m->GetItems();
        $this->render('index',$data);
    }
    /*
     * 报名比赛选择页面
     * */
    function actionGame(){
        $this->layout='main2';
        $itemid= Yii::app()->request->getParam('itemid');
        $m=new ItemModel();
//        echo 4%2;die;
        $data['list']= $m->GetGaems($itemid);
        var_dump($data);die;
        $this->render('game',$data);
    }
    /*
     * 报名比赛第二
     * */
    function actionBGanme(){
        $itemid= Yii::app()->request->getParam('itemid');
        $gameid= Yii::app()->request->getParam('gameid');
        $m=new ItemModel();
        $r=$m->Checkgame($gameid);
        if(!$r){
            $this->redirect('/item/game/errmsg/该比赛未开赛或不在报名时间内/itemid/'.$itemid);die;
        }
        $data['gameid']=$gameid;
        $this->render('bgame',$data);
    }
    /*
     * 报名比赛3
     * */
    function actionCgame(){
        $gameid= Yii::app()->request->getParam('gameid');
        $uid=Yii::app()->user->id;
        $name= Yii::app()->request->getParam('name');
        $phone= Yii::app()->request->getParam('phone');
        $vercode= Yii::app()->request->getParam('vercode');
        $imgcode= Yii::app()->request->getParam('imgcode');

    }

}


?>