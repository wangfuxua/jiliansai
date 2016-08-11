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
       $turn=Yii::app()->request->getParam('turn',0);
        $m=new GroupModel();
       $data= $m->GetTeamsByturn($gameid,$turn);
        $data['gameid']=$gameid;
        $data['turn']=$m->GetTurn($gameid);
            $data['dqturn']=$turn;
            $data['group']=$m->GetGroups($gameid,$turn);
//        var_dump($data);die;
        $this->render('index',$data);
    }
    function actionSearchteam(){
        $turn= Yii::app()->request->getParam('turn');
        $gameid= Yii::app()->request->getParam('gameid');
    }
    function actionAddGroup(){
        $m=new GroupModel();
           $data=$_POST;
        if(empty($data['teamid'])){
        $this->redirect('/group/index/gameid/'.$data['gameid']);
        }
//        var_dump($data);die;
        $m->AddGroup($data);
        $this->redirect('/group/index/gameid/'.$data['gameid']);
    }
    /*
     * 添加对战信息
     * */
     function actionFlight(){
         $data['gameid']=  $gameid= Yii::app()->request->getParam('gameid');
         $group= Yii::app()->request->getParam('group');
         $turn= Yii::app()->request->getParam('turn',1);
         if(!$group){
             $group=1;
         }
         $data['dqgroup']=$group;
         $m=new GroupModel();

         $data['turn']=$m->GetTurn($gameid); //获取轮次
             $data['dqturn']=$turn;
         $data['group']=$m->GetGroup($gameid);//获取所有小组
         $data['dqgroup']=$group;
        $data['data']=$m->GetTinfoByG($gameid, $data['dqturn'],$group);
//         var_dump($data);die;
         $this->render('fight',$data);
//         var_dump($data);

     }
    /*
     * 添加对战动作
     * */
    function actionAddFight(){
        $data=$_POST;
        $m=new GroupModel();
      $r= $m->AddFight($data);
      $this->redirect('/group/Flight/gameid/'.$data['gameid'].'/group/'.$data['group'].'/turn/'.$data['turn']);

//        var_dump($data);
    }





}