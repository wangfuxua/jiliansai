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
        //广告位置1
        $data['adv1']=$ad->GetAdv('home_adv1');
        $data['adv2']=$ad->GetAdv('home_adv2');
        /*
         * 获取所有的xiangm
         * */
        $it=new ItemModel();
        $data['item']=$it->GetItemsBysql();
        /*
         * 获取热门视频
         * */
            $vs=new VideoModel();
        $data['videos']=[];
        foreach($data['item'] as $v){
            $data['videos'][]=$vs->GetHotVs($v['id']);
        }
        /*
         * 获取赞助
         * */
         $ch=new ChannelModel();
            $data['zanzhu']=$ch->GetchByCid(4);
            $data['hezuo']=$ch->GetchByCid(5);
            $data['meiti']=$ch->GetchByCid(6);
//            var_dump( $data['zanzhu']);die;

        $this->render('index',$data);
    }
}
?>