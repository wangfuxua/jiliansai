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

    /*
     * 添加比赛
     * */
    function actionAddGame(){
       $itemid= Yii::app()->request->getParam('itemid');
        $m=new ItemModel();
        if(!$itemid){
            $this->redirect('/item/ItemList');die;
        }
        $data['item']=$m->GetItemByI($itemid);
        $data['pnums']=$m->GetPnumByI($itemid);
        $data['vers']=$m->GetVers();
        $this->render('addgame',$data);
    }
    /*
     * 获取比赛列表
     * */
    function actionGames(){
        $m=new ItemModel();
        $data=  $m->GetGames(0);
        $data['item']= $m->GetItemsBySql();

//        var_dump($data);die;
        $this->render('gamelist',$data);
    }

    /*
     * 添加比赛动作
     * */
    function actionGoAddG(){
        $data=$_POST;
        $m=new ItemModel();
       $r= $m->Addgame($data);
        if($r){
            $this->redirect('/item/Games');
        }else{
            $this->redirect('/item/ItemList');
        }
    }

}


?>