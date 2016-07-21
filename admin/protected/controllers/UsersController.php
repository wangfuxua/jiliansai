<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Lee
 * Date: 16-7-21
 * Time: 下午4:26
 * To change this template use File | Settings | File Templates.
 */
class UsersController extends  CommonController{
    function init(){
        parent::init();
    }
    /*
     * 注册用户列表
     * */
    function actionList(){
        $u=new UsersModel();
        $data=$u->GetUserL();
        $this->render('list',$data);
    }
}