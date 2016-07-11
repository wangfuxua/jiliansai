<?php
class UsersModel extends CommonModel{
    public  $username;
    public $password;
    public  function init(){
        parent::init();
    }
    public function GoLogin(){
       $sql="select * from `jls_admin_users` where password=:passowrd and username=:username";
        return Yii::app()->db->createCommand($sql)->bindParam(':passowrd',$this->password)->bindParam(':username',$this->username)->queryRow();
    }

}


?>