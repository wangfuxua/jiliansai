<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Lee
 * Date: 16-7-27
 * Time: 上午11:40
 * To change this template use File | Settings | File Templates.
 */
class VideoController extends  CommonController{
    function init(){
        parent::init();
    }
    function actionVideo(){
        $vi=new VideoModel();
        $data['list']=$vi->Getvs();
        $this->render('video',$data);
    }

}
