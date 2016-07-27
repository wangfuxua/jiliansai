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
}