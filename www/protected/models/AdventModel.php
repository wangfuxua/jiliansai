<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Lee
 * Date: 16-8-1
 * Time: 下午4:02
 * To change this template use File | Settings | File Templates.
 */

class AdventModel extends  CommonModel{
    function init(){
        parent::init();
    }
    /*
     * 获取首页广告图
     * */
    function GetBans(){
         $sql="select * from  `jls_advent` where `show`='home_banner' and status=1 order by timeline desc ";
        return Yii::app()->db->createCommand($sql)->queryAll();
    }
    /*
     * 获取单广告图
     * */
    function GetAdv($show){
        $sql="select * from  `jls_advent` where `show`='{$show}'and status=1 order by timeline desc limit 1 ";
        return Yii::app()->db->createCommand($sql)->queryRow();
    }

}