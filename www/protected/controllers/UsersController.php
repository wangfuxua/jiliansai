<?php
/**
 * Created by PhpStorm.
 * User: wangyan
 * Date: 16/7/17
 * Time: 下午3:50
 */
class UsersController extends CommonController{
    function init(){
        parent::init();
    }
    /*
     * 用户注册页面
     * */
    function actionRegView(){
        $this->render('regview');
    }
    /*
     * 用户注册第二部
     * */
    function actionReg2(){
       $code= Yii::app()->request->getParam('authcode');
        $phone= Yii::app()->request->getParam('phone');
        if(!$phone ||!$code){
            $this->redirect('/users/regview/errmsg/验证码或手机号不能为空');
        }
        if($code!= $_SESSION['authcode']){
            $this->redirect('/users/regview/errmsg/验证码错误');
        }
        $data['phone']=$phone;
        $this->render('reg2',$data);
    }
    /*
     * 用户注册第三部
     * */
    function actionReg3(){
        $code= Yii::app()->request->getParam('phonecode');
        $phone= Yii::app()->request->getParam('phone');

        if(!$phone ||!$code){
            $this->redirect('/users/Reg2/errmsg/验证码或手机号不能为空/phone/'.$phone.'/authcode/'.$_SESSION['authcode']);
        }
        $_SESSION['reg_'.$phone]=$code;
        if($code!= $_SESSION['reg_'.$phone]){
            $this->redirect('/users/Reg2/errmsg/验证码错误/phone/'.$phone.'/authcode/'.$_SESSION['authcode']);
        }
        $data['phone']=$phone;
        $this->render('reg3',$data);
    }

    /*
     * 用户注册第四部
     * */
    function actionReg4(){
        $password= Yii::app()->request->getParam('password');
        $password1= Yii::app()->request->getParam('password1');
        $phone= Yii::app()->request->getParam('phone');
        if(!$password ||!$phone){
            $this->redirect('/users/Reg3/errmsg/验证码或手机号不能为空/phone/'.$phone.'/phonecode/'.$_SESSION['reg_'.$phone]);
        }
        if($password!=$password1){
            $this->redirect('/users/Reg3/errmsg/两次密码输入不一致/phone/'.$phone.'/phonecode/'.$_SESSION['reg_'.$phone]);
        }
        $m=new UsersModel();
           $r=$m->Regin($phone,$password);
        if($r &&$r!=-1){
            $this->redirect('/');
            $this->render('reg4',$data);
        }else{
            if($r==-1){
                $this->redirect('/users/Login/errmsg/用户已经注册');
            }else{
            $this->redirect('/users/Reg3/errmsg/两次密码输入不一致/phone/'.$phone.'/phonecode/'.$_SESSION['reg_'.$phone]);
            }
        }
    }
    /*
     * 用户登录页面
     * */
    function actionLogin(){
//        echo Yii::app()->user->id;die;
        $this->render('login');
    }
    /*
     * 登陆动作
     * */
      function actionGoLogin(){
          $password= Yii::app()->request->getParam('password');
          $phone= Yii::app()->request->getParam('phone');
          $m=new UsersModel();
          if(!$m->CheckPhone($phone)){
              $this->redirect('/users/Login/errmsg/尚未注册');
          }
          $r=$m->Login($phone,$password);
          if(!$r){
              $this->redirect('/users/Login/errmsg/密码错误');
          }else{
              $this->redirect('/');
          }
      }
    /*
     * 退出登录
     * */
    function actionLogout(){
        Yii::app()->user->id=0;
        $this->redirect('/');
    }
    /*
     * 找回密码
     * */
    function actionGetPass(){
        $this->render('getpass');
    }
    function actionGoGetPass(){
        $password= Yii::app()->request->getParam('password');
        $password1= Yii::app()->request->getParam('password1');
        $phone= Yii::app()->request->getParam('phone');
        $phonecode= Yii::app()->request->getParam('phonecode');
        if($password!=$password1){
            $this->redirect('/users/GetPass/errmsg/两次密码输入不一致');die;
        }
//        if($phonecode!=$_SESSION['reg_'.$phone]){
//            $this->redirect('/users/GetPass/errmsg/手机验证码错误');die;
//        }
        $m=new UsersModel();
        $r=$m->GetPass($phone,$password);
        if($r){
            $this->redirect('/users/Login');die;
        }else{
            $this->redirect('/users/GetPass/errmsg/两次密码输入不一致');die;
        }

    }

    /**
     * 验证码
     * @param  string $type 生成种类
     * @return [type]       [description]
     */
    public function actionAuthcode($type='') {
        $type = !!$type ? $type : (isset($_GET['type']) ? $_GET['type'] : '');

        header("Content-type:image/PNG");

        srand((double)microtime() * 1000000);
        $imagewidth = 100;
        $imageheight = 40;
        // 注释掉多余的颜色
        $authimage = imagecreate($imagewidth, $imageheight);
        $black = ImageColorAllocate($authimage, 0, 0, 0);
        // $white = ImageColorAllocate($authimage, 255, 255, 255);
        $red = ImageColorAllocate($authimage, 255, 0, 0);
         $green = ImageColorAllocate($authimage, 0, 255, 0);
         $blue = ImageColorAllocate($authimage, 0, 0, 255);
        $gray = ImageColorAllocate($authimage, 200, 200, 200);
        $gray2 = ImageColorAllocate($authimage, 155, 155, 155);

        // $lcd_back = ImageColorAllocate($authimage, 98, 136, 30);
        // $lcd_font = ImageColorAllocate($authimage, 61, 75, 28);

        // 颜色种子
        $color = array(
            // ImageColorAllocate($authimage, 255, 0, 0),
            // ImageColorAllocate($authimage, 61, 95, 28),
            // ImageColorAllocate($authimage, 0, 75, 150),
            // ImageColorAllocate($authimage, 255, 175, 55),
            ImageColorAllocate($authimage, 55, 55, 55),
            ImageColorAllocate($authimage, 25, 25, 25)
        );
        // $color = array(ImageColorAllocate($authimage, 255, 175, 55));
        // 字体种子
        $fontloc = "data/fonts";
        $fonts = array(
            "{$fontloc}/arial.ttf",
            // "{$fontloc}/alger.ttf",
            // "{$fontloc}/showg.ttf",
            "{$fontloc}/ds-digib.ttf",
            // "{$fontloc}/TimKid.ttf"
        );

        // $font = "style/fonts/TimKid.ttf";


        // 背景颜色
        imagefill($authimage, 0, 0, $green);

        // 随机的生成一些干扰像素
        for($i = 0; $i < 200; $i++) {
            $randcolor = ImageColorallocate($authimage, rand(10, 255), rand(10, 255), rand(10, 255));
            imagesetpixel($authimage, rand()%$imagewidth, rand()%$imageheight, $randcolor);
        }

        // 随机的画几条线段
        /*
        for($i = 0; $i < 6; $i++) {
            imageline($authimage, rand()%$imagewidth, rand()%$imageheight, rand()%$imagewidth, rand()%$imageheight, $black);
        }
        */

        // 生成验证串
        $seed = "0123456789";
        if ("str" == $type) {
            $seed = "0123456789abcdefghijklmnopqrstuvwxyz";
        }
        $max = strlen($seed) - 1;
        // echo $max; exit;
        $authcode = '';
        for($i = 0; $i < 4; $i++) {
            $authcode .=substr($seed, rand(0, $max), 1);
        }
        // todo
        // 将结果集存入session
        // session_start();
        if (!session_id()) session_start();
        $_SESSION['authcode'] = $authcode;

        $arr = str_split($authcode);
        $left = 5;
        $max_font = count($fonts) - 1;
        $max_color = count($color) - 1;
        foreach ($arr as $item) {
            imagettftext($authimage, rand(15, 30), rand(-15, 15), $left, $imageheight-5, $color[rand(0, $max_color)], $fonts[rand(0, $max_font)], $item);
            $left += 22;
        }
        // imagettftext($authimage, rand(15, 22), rand(-15, 15), 5, $imageheight, $color2, $font, $authcode);

        ImagePNG($authimage);
        ImageDestroy($authimage);
    }



}