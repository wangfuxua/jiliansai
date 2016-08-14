<?php
class ItemController extends CommonController{
    function  init(){
        parent::init();
    }
    /*
     * 报名列表
     * */

    function actionIndex(){
        $m=new ItemModel();
//        echo 4%2;die;
       $data['list']= $m->GetItems();
        $this->render('index',$data);
    }
    /*
     * 报名比赛选择页面
     * */
    function actionGame(){
        $this->layout='main2';
        $itemid= Yii::app()->request->getParam('itemid');
        $m=new ItemModel();
//        echo 4%2;die;
        $data['list']= $m->GetGaems($itemid);
        $data['itemid']=$itemid;
//        var_dump($data);die;
        $this->render('game',$data);
    }
    /*
     * 报名比赛第二
     * */
    function actionBGanme(){
        $itemid= Yii::app()->request->getParam('itemid');
        $gameid= Yii::app()->request->getParam('gameid');
        $m=new ItemModel();
        $r=$m->Checkgame($gameid);
        if(!$r){
            $this->redirect('/item/game/errmsg/该比赛未开赛或不在报名时间内/itemid/'.$itemid);die;
        }
        $data['gameid']=$gameid;
        $this->render('bgame',$data);
    }
    /*
     * 报名比赛3
     * */
    function actionCgame(){
        $m=new ItemModel();
        $data['gameid']=$gameid= Yii::app()->request->getParam('gameid');
        $data['uid']= $uid=Yii::app()->user->id;
            $data['name']=$name= Yii::app()->request->getParam('name');
        $data['phone']=$phone= Yii::app()->request->getParam('phone');
      $vercode= Yii::app()->request->getParam('vercode');
        $imgcode= Yii::app()->request->getParam('imgcode');
        $itemid=$m->GetItemid($gameid);
      if($imgcode!=$_SESSION['bmauthcode']) {
          $this->redirect('/item/bgame/itemid/'.$itemid.'/gameid/'.$gameid.'/errmsg/图片验证码错误');
      }

       $r= $m->AddGame1($data);
        if($r){
            $this->render('cgame',$data);
        }else{
            $this->redirect('/item/bgame/itemid/'.$itemid.'/gameid/'.$gameid.'/errmsg/提交的数据不完整');
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
        $_SESSION['bmauthcode'] = $authcode;

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