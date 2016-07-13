<?php
class IndexController extends CommonController{
    public  function init(){
        parent::init();
    }
    function actionIndex(){
        $this->render('index');
    }
}

?>