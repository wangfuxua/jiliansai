<?php
class UsersModel extends CommonModel{
    public  $username;
    public $password;
    public  function init(){
        parent::init();
    }
    public function GoLogin(){
        $sql="select * from `jls_admin_users` where  username=:username";

        $r= Yii::app()->db->createCommand($sql)->bindParam(':username',$this->username)->queryRow();
        return $this->CheckPass($this->password,$r['password']);

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
}


?>