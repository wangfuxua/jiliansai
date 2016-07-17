<?php
class PassportController extends CommonController{
    public $layout='main_admin_login';
    public $loginflag = "__jls_admin_flag";
    public $model = '';
    public $uid;
    public function init() {
        parent::init();
        $this->title = '季联赛';
        Yii::import('application.library.toolkit');
        $this->tool = new toolkit();
        $this->uid= Yii::app()->session['uid'];
        $m=Yii::app()->request->getParam('logout');;
        if($this->uid && !$m){
            $this->redirect("/index");
        }
    }
    function actionIndex(){
        $this->actionLogin();
    }
/*
 * 登陆界面
 * */
    function actionLogin(){
        $this->script = array('passport', 'jquery/Validform_v5.3.2_min');
        $data['errormsg']=Yii::app()->request->getParam('errormsg');;
        $this->renderPartial('login',$data);
    }

    function actionDoLogin(){
        $username=Yii::app()->request->getParam('username',0);
        $password=Yii::app()->request->getParam('password',0);

        if(!$username || !$password){
            $data['errormsg']=Yii::app()->request->getParam('errormsg');;
            $this->renderPartial('login',$data);
    }

        $user=new UsersModel();

        $user->username=$username;
        $user->password=$password;
        $r=$user->GoLogin();

        if($r){
            Yii::app()->user->id=$r['id'];
            $this->redirect('/index/index');
        }else{
            $this->redirect('/passport/Login');
        }
    }
  public  function actionLogout(){
      unset( Yii::app()->session['uid']);
      Header("Location: ".base_url('/'));
  }

    public function actionCheckAuthcodeValidform() {
        $code = isset($_POST['param']) ? $_POST['param'] : '';
        if (!$code)
            return 0;

        $rs = $this->checkAuthcode($code);
        $ret['status'] = 'n';
        $ret['info'] = '验证码错误！';
        if (!!$rs) {
            $ret['status'] = 'y';
            $ret['info'] = '通过信息验证！';
        }
        echo json_encode($ret); die;
    }
    /*
     * 检测验证码
     * */
    private function checkAuthcode($code) {
        if (!session_id()) session_start();
        // echo $_SESSION['authcode']; exit;
        $code = !!$code ? $code : Qii::segment(2);
        $flag = 0;
        if (isset($_SESSION['authcode']) && $_SESSION['authcode']==$code) {
            $flag = 1;
        }
        return $flag;
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
        // $green = ImageColorAllocate($authimage, 0, 255, 0);
        // $blue = ImageColorAllocate($authimage, 0, 0, 255);
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
        imagefill($authimage, 0, 0, $gray2);

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

?>