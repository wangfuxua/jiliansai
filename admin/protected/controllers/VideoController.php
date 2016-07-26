<?php
class VideoController extends CommonController{
    function init(){
        parent::init();
    }
    function actionList(){
        $mv=new VideoModel();
        $data=$mv->GetVs();
        $this->render('list',$data);
    }
    function actionAdd(){
        $news=new ItemModel();
        $data['cln']=$news->GetItemsBySql();
            $this->render('add',$data);
    }
    function actionGoAdd(){
        $data=$_POST;
        $video=new VideoModel();
        $r=$video->AddV($data);
        if($r){
            $this->redirect('/video/List');
        }else{
            $this->redirect('/video/add/error/添加失败');
        }
    }
    function actionEdit(){
        $id=Yii::app()->request->getParam('id');
        $video=new VideoModel();
        $r=$video->GetVById($id);
        $data['data']=$r;
        $news=new ItemModel();
        $data['cln']=$news->GetItemsBySql();
        $this->render('edit',$data);
    }
    function actionGoEdit(){
        $data=$_POST;
        $video=new VideoModel();
        $r=$video->EditV($data);
        if($r){
            $this->redirect('/video/List');
        }else{
            $this->redirect('/video/add/error/添加失败');
        }
    }

}


?>