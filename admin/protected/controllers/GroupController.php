<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Lee
 * Date: 16-8-3
 * Time: 下午4:33
 * To change this template use File | Settings | File Templates.
 */
class GroupController extends  CommonController{
    function init(){
        parent::init();
    }
    function actionIndex(){
        $gameid= Yii::app()->request->getParam('gameid');
        $m=new GroupModel();
       $data= $m->GetTeamsByturn($gameid);
//        var_dump($data);die;
        $this->render('index',$data);
    }

}