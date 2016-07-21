<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Lee
 * Date: 16-7-18
 * Time: 下午12:05
 * To change this template use File | Settings | File Templates.
 */
class UsersModel extends CommonModel{
    function init(){
        parent::init();
    }

    /*
     * 用户注册
     * */
    function Regin($phone,$pwd){
        try{
            $user=new Dtable('users');
            $user->uid=$uid=time().rand(100000,999999);
            $user->phone=$phone;
             $user->password=$this->AddPass($pwd);
             $user->timeline=time();
             Yii::app()->user->id=$uid;
            return $user->save();
        }catch (Exception $e){
            return -1;
        }
    }
    /*
     * 登陆
     * */
    function Login($phone,$pwd){
        $user=new Dtable('users');
        $criteria = new CDbCriteria;
        $criteria->addCondition('phone='.$phone);
        $r=$user->find($criteria);
//        var_dump($r);
//        echo $r->password;
//        die;
        $r1= $this->CheckPass($pwd,$r->password);
//        var_dump();
        if($r1){

            Yii::app()->user->id=$r->uid;
            return 1;
        }else{
            return 0;
        }
    }
    /*
     * 根据用户uid 获取用户手机号
     * */
    function GetPhone(){
        $uid=Yii::app()->user->id;
        $user=new Dtable('users');
          $criteria = new CDbCriteria;
        $criteria->addCondition('uid='.$uid);
        $criteria->select='phone';
        return $user->find($criteria);
    }
    /*
     * 根据用户uid更新用户密码
     * */
    function UpuserPwd($pwd){
    $uid=Yii::app()->user->id;
        if(!$uid) return 0;
        $user=new Dtable('users');
        $criteria = new CDbCriteria;
        $criteria->addCondition('uid='.$uid);
      return   $user->update($criteria);
    }
    /*
 * 加密
 * */
    public  function AddPass($str){
        if(!$str) return 0;
        include_once('./protected/library/class-phpass.php');
        // Create the new Password
        $wp_hasher = new PasswordHash(8, TRUE);
        $str = $wp_hasher->HashPassword($str);
        return  $str;
    }

    /*
     * 验证密码
     * */
    public function CheckPass($need,$pwd){
        include_once('./protected/library/class-phpass.php');
        // chcek password
        $wp_hasher = new PasswordHash(8, TRUE);
        $rs = $wp_hasher->CheckPassword($need, $pwd);
        return $rs;
    }
    /*
     * 找回密码
     * */
    function GetPass($phone,$pwd){
            $pwd=$this->AddPass($pwd);
            $sql="update `jls_users` set password='{$pwd}' where phone={$phone}";
        return Yii::app()->db->createCommand($sql)->execute();
    }


}