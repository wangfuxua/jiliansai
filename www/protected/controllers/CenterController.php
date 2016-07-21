<?php
class CenterController extends CommonController{
    public  $uid;
    function init(){
        parent::init();
        $this->uid=Yii::app()->user->id;
        if(! $this->uid){
            $this->redirect('/');
        }
    }
    function actionIndex(){
        $this->render('index');
    }

}


?>