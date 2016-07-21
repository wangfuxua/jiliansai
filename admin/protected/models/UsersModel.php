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
    function GetUserL(){
        $criteria = new CDbCriteria;
        $w='where 1';
        $sql="select count(1) from `jls_users`";
        $num=Yii::app()->db->createCommand($sql)->queryScalar();;
//        echo $num;die;

        $page=new CPagination($num);
        $page->pageSize=20;//每页数量
        $sql="select a.*,b.name from `jls_users` as a left join `jls_user_info` as b on a.uid=b.uid  {$w}";
        $sql=$sql." limit :offset,:limit";
        $page->applyLimit($criteria);
        $model=Yii::app()->db->createCommand($sql);
        $model->bindValue(':offset',$page->currentPage*$page->pageSize);
        $model->bindValue(':limit',$page->pageSize);
        $data=$model->queryAll();
//        var_dump($data);die;
        return array('data'=>$data,'page'=>$page);
    }


}


?>