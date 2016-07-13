<?php
class NewsController extends CommonController{
    function init(){
        parent::init();
    }
    /*
     *新闻列表
     * */
    function actionList(){
        $news=new NewsModel();
        $data=$news->GetNews();
//        var_dump($data);die;
        $this->render('list',$data);
    }
    /*
     * 添加新闻
     * */
    function actionAddnews(){
        $news=new NewsModel();
        $data['cln']=$news->GetNewsType();

        $this->render('addnew',$data);
    }
    function actionGoAddnew(){
            $data=$_POST;
        $news=new NewsModel();
     $r=$news->Addnews($data);
        if($r){
            $this->redirect('/news/List');
        }else{
            $this->redirect('/news/Addnews');
        }
    }
}

?>