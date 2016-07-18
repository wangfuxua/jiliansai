<?php
class IndexController extends CommonController{
    public $layout='main';
    function init(){
        parent::init();
    }
    function actionIndex(){
      $this->title='季联赛官网';
        $new=new NewsModel();
        $data['newt']=$new->GetChan();
//        var_dump($data);die;
        $this->render('index');
    }
}
?>