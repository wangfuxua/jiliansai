<?php
/*
 * yii  动态实例数据表 以后可以继续优化
 * */

 class Dtable extends CActiveRecord{
     private static $tableName ;
     public   $prefix='jls_';
    public  function __construct($tableName=''){
        if(!$tableName){
            parent::__construct(null);
        }else{
        self::$tableName=$this->prefix.$tableName;
            parent::__construct();
        }

    }
     public static  function Model($tableName=''){
         self::$tableName='jls_'.$tableName;
         return parent::model(__CLASS__);
     }
     public function tableName(){
         return self::$tableName;
     }
}
?>