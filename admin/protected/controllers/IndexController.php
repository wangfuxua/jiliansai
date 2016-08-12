<?php
class IndexController extends CommonController{
    public $uid;
    public  function init(){
        parent::init();
        $this->uid= Yii::app()->user->id;

        if(!$this->uid){
            $this->redirect("/");
        }
    }
    function actionIndex(){
        $this->render('index');
    }
    /*
     * 修改密码
     * */
    function actionEditPass(){
        $m=new UsersModel();
            $data['admin']=   $m->GetUinfo($this->uid);
           $this->render('epass',$data);
    }

}

?>