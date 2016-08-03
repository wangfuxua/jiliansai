<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Lee
 * Date: 16-8-2
 * Time: 上午11:11
 * To change this template use File | Settings | File Templates.
 */

class ChannelModel extends CommonModel{
    function init(){
        parent::init();
    }
    /*
     * 获取指定的合作方
     * */
    function GetchByCid($cln_id=0,$limit=4){
        if(!$cln_id){
            $where='';
        }else{
            $where=' where  cln_id='.$cln_id;
        }
        $l=' limit '.$limit;
         $sql="select * from `jls_channels` ".$where .$l;
        return Yii::app()->db->createCommand($sql)->queryAll();
    }
}