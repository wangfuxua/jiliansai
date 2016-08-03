<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Lee
 * Date: 16-8-1
 * Time: 上午11:00
 * To change this template use File | Settings | File Templates.
 */
class AdventController extends CommonController{
    function init(){
        parent::init();
    }
    /*
     * 广告列表
     * */

    function actionList(){
        $m=new AdventModel();
       $data= $m->GetAds();
        $this->render('list',$data);
    }

    function GetShowname($id=0){
        $data=[
            0=>[
                'id'=>'home_banner',
                'name'=>'首页banner',
            ],
            1=>[
                'id'=>'home_adv1',
                'name'=>'首页广告1',
            ],
            2=>[
                'id'=>'home_adv2',
                'name'=>'首页广告2',
            ]
        ];
        foreach($data as $v){
            if($v['id']==$id){
                return $v['name'];
            }
        }
    }

    /*
     * 添加广告
     * */
    function actionAdd(){
        $data=[
            0=>[
                'id'=>'home_banner',
                'name'=>'首页banner',
            ],
            1=>[
                'id'=>'home_adv1',
                'name'=>'首页广告1',
            ],
            2=>[
                'id'=>'home_adv2',
                'name'=>'首页广告2',
            ]
        ];
        $data['data']=$data;

        $this->render('add',$data);
    }
    function actionGoadd(){
            $data=$_POST;
            $data['img']=$data['logo'];
             unset($data['logo']);
        $data['showname']=$this->GetShowname($data['show']);
        $m=new AdventModel();
        $r=$m->AddAdv($data);
        if($r){
            $this->redirect('/advent/list');
        }else{
            $this->redirect('/advent/add/error/数据不完整或者提交错误');
        }

    }

    function actionEdit(){
        $id=Yii::app()->request->getParam('id');
        $video=new AdventModel();
        $r=$video->GetVById($id);
        $data=[
            0=>[
                'id'=>'home_banner',
                'name'=>'首页banner',
            ],
            1=>[
                'id'=>'home_adv1',
                'name'=>'首页广告1',
            ],
            2=>[
                'id'=>'home_adv2',
                'name'=>'首页广告2',
            ]
        ];
        $data['weizhi']=$data;

        $data['data']=$r;
        $this->render('edit',$data);
    }

    function actionGoEdit(){
        $data=$_POST;
        $data['img']=$data['logo'];
        unset($data['logo']);
        $data['showname']=$this->GetShowname($data['show']);
        $m=new AdventModel();
        $video=new AdventModel();
        $r=$video->EditAdv($data);
        if($r){
            $this->redirect('/Advent/List');
        }else{
            $this->redirect('/Advent/add/error/添加失败');
        }
    }




}