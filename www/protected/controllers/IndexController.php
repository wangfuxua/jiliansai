<?php
class IndexController extends CommonController{
    public $layout='main';
    function init(){
        parent::init();
    }
    function actionIndex(){
      $this->title='季联赛官网';
        //获取轮播图
        $ad=new AdventModel();
        $data['banner']=$ad->GetBans();

        //获取新闻分类
        $new=new NewsModel();
        $data['newtype']=$new->GetNtype();
        /*
         * 获取新闻
         * */
        foreach($data['newtype'] as $v){
        $data['news'][$v['id']]=$new->GetNews($v['id']);
        }
        /*
         * 获取比赛项目
         * */
        $data['item']=$new->GetIGame();


        $this->render('index',$data);
    }
}
?>