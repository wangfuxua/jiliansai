<?php
class ItemController extends CommonController{
    public $layout='main';
    function  init(){
        parent::init();
    }
   public  function actionItemList(){
            $it=new ItemModel();
       $data=$it->GetItems();
    $this->render('ilist',$data);
    }

}


?>