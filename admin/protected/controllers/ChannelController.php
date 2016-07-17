<?php
class ChannelCOntroller  extends CommonController{
    function init(){
        parent::init();
    }
    /*
     * 赞助管理  页面
     * */
    function actionZanzhu(){
            $ch=new ChannelModel();
        $data=$ch->GetChannel(4);
        $this->render('channel',$data);
    }
    /*
    * 合作管理  页面
    * */
    function actionHezuofang(){
        $ch=new ChannelModel();
        $data=$ch->GetChannel(5);
        $this->render('channel',$data);
    }
    /*
      *合作媒体  页面
      * */
    function actionMeiti(){
        $ch=new ChannelModel();
        $data=$ch->GetChannel(6);
        $this->render('channel',$data);
    }
        /*
         * 添加页面
         * */
    function actionAddChannel(){
        $ch=new ChannelModel();
        $data['data']=$ch->GetCt(5);
        $this->render('addch',$data);
    }
    /*
     * 添加动作
     * */
    function actionGoAddCh(){
        $data=$_POST;
        unset($data['btn_header3']);
//        var_dump($data);die;
        $ch=new ChannelModel();
        $r=$ch->AddChannel($data);
        $this->redirect('/channel/list/clid/'.$data['cln_id']);
    }

    function actionList(){
        $clid=Yii::app()->request->getParam('clid');
        $ch=new ChannelModel();
        $data=$ch->GetChannel($clid);
        $this->render('channel',$data);
    }


}
?>