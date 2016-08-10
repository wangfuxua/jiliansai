<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Lee
 * Date: 16-8-9
 * Time: 下午4:20
 * To change this template use File | Settings | File Templates.
 */
class FightController extends CommonController{
    function init(){
        parent::init();
    }
    /*
     * 对战列表
     * */
    function actionList(){
        $ganeid=Yii::app()->request->getParam('gameid',0);
        $group=Yii::app()->request->getParam('group',0);
        $turn=Yii::app()->request->getParam('turn',0);
        $m=new FightModel();
        $data['list']=$m->GetInfoByG($ganeid,$turn,$group);
        $this->render('list',$data);

    }
}