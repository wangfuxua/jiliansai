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
    public function actionAddItem(){
        $it=new ItemModel();
        $data['pnums']=$it->GetPnums();
        $this->render('addiview',$data);
    }
    public function actionGoaddi(){
      $data=$_POST;
//        var_dump($data);die;
        foreach($data as $k=>$v){
            if(!$v and  $k!='btn_header3'){
                $this->render('addiview',$data);
            }
        }
        $it=new ItemModel();
       $r= $it->AddItem($data);
        if($r){
         $this->redirect('/item/ItemList');
        }else{
            $this->render('addiview',$data);
        }
    }


}


?>