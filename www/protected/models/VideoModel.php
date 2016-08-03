<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Lee
 * Date: 16-7-27
 * Time: 下午4:15
 * To change this template use File | Settings | File Templates.
 */
class VideoModel extends CommonModel{
    function init(){
        parent::init();
    }
    function GetVs(){
        $sql="select * from `jls_videos` order by `sort` desc limit 6";
        return Yii::app()->db->createCommand($sql)->queryAll();
    }

    /*
     * 首页热门视频
     * */
    function GetHotVs($item){
         $sql="select * from `jls_videos` where  find_in_set('1',`type`) and item_id={$item} order by `sort` desc limit 6";
        return Yii::app()->db->createCommand($sql)->queryAll();
    }

}