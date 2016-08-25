<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Lee
 * Date: 16-8-24
 * Time: 下午5:35
 * To change this template use File | Settings | File Templates.
 */

class Restful {
            private $httpType;
            private $url;
            private $remethod;
            private $retime;

    /*
           * 请求开始时候调用
           * */
            function __construct(){
              var_dump($_SERVER);die;
              $this->url=$_SERVER['REDIRECT_URL'];
              $this->remethod=$_SERVER['REQUEST_METHOD'];
              $this->retime=$_SERVER['REQUEST_TIME'];
                echo  $this->retime;
                sleep(3);
            }

    /*
     * 判断所需要执行的操作
     * 默认执行查询操作
     * */
        function Rm($m=''){
            if(!$m)return 'select';
        }
            /*
             * 请求结束时候调用
             *
             * */
            function __destruct(){
                $etime=time();//请求技术的时间
                $seced=$etime-$this->retime;//请求所花费的时间
                echo $seced;
            }


}