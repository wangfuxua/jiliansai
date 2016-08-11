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
        $data=$m->GetInfoByG($ganeid,$turn,$group);
        $m2=new GroupModel();
        $data['turn']=$m2->GetTurn($ganeid); //获取轮次
        $data['group']=$m2->GetGroups($ganeid,$turn);//获取所有小组
        $data['gameid']=$ganeid;
        $data['dqturn']=$turn;
        $data['dqgroup']=$group;
//        var_dump($data);die;
        $this->render('list',$data);
    }
    /*
     * 对战信息更新
     * 胜利队伍入库
     * */
   function actionUpFight(){
       $fid=Yii::app()->request->getParam('fid',0);
       $tid=Yii::app()->request->getParam('tid',0);
       $m=new FightModel();
       $data=$m->GetInfoByid($fid);
        $add['fid']=$fid;
        $add['turn']=$data['turn']+1;
        $add['gameid']=$data['gameid'];
        $add['teamid']=$tid;
        $r=$m->AddWinT($add);
       if($r){
           $up['tid']=$tid;
           $up['fid']=$fid;
            $m->UpFi($up);
           echo 1;
       }else{
            echo 0;
       }

   }
}